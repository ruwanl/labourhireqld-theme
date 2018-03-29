<?php

/**
 * @file
 * Template file for labour hire based on  govCMS zen.
 */


/**
 * Implements template_preprocess_html().
 */
function labourhire_preprocess_html(&$vars) {

  /* Adds HTML5 placeholder shim */
  drupal_add_js(libraries_get_path('html5placeholder') . "/jquery.placeholder.js", 'file');
 

}


/**
 * Implements hook_form_alter().
 Update search placeholder text
 */
function labourhire_form_search_block_form_alter(&$form, &$form_state, $form_id) {
	$form['search_block_form']['#attributes']['placeholder'] = t('Search'); 
} 



/**
 * Implements hook_preprocess_page().
 */
function labourhire_preprocess_page(&$variables) {

//add custom content type
if ($variables['node']->type == 'vision_6_form') {
    $variables['theme_hook_suggestions'][] = 'page__vision_6_form';
  }


/** this code gets content for home page carousel not ideal but works**/  
$outputstring ='';
$output = '<div id="owl-demo" class="owl-carousel">';



$dtype="news_article";
$dbtype2 = "media_release";
$dbtype3 = "publication";
$query = db_select('node','n')
          ->fields('n',array('title','nid','created','type'))
          ->fields('fdb',array('body_summary'))
          ->fields('fdi',array('field_date_issued_value'))
          ->range(0,6);
$db_or = db_or();
$db_or->condition('n.type',$dtype,'=');
$db_or->condition('n.type',$dbtype2,'=');
$db_or->condition('n.type',$dbtype3,'=');
$query->condition($db_or);
$query->join('field_data_body','fdb','n.nid=fdb.entity_id');
$query->leftjoin('field_data_field_date_issued','fdi','n.nid=fdi.entity_id');


$results = $query->execute()->fetchAll();
#drupal_set_message(t("Don't panic!"), 'warning');
$variable['outputquery'] = $query;

$backgroundColors = array('#4C8395','#3D4248','#42BDC2');
$iconsarray = array('fa fa-bullhorn');
$i=0;
foreach ($results as $records) {
 
  if($records->type == 'media_release'){
    $lh_icon = 'glyphicon glyphicon-bullhorn';
  }
  elseif($records->type=='news_article'){
     $lh_icon = 'glyphicon glyphicon-list-alt';
  }
  else{
    $lh_icon = 'glyphicon glyphicon-book';
  }

if(isset($records->field_date_issued_value)){
    
    $dateString = explode('-',$records->field_date_issued_value);
    $year = $dateString[0];
    $month = $dateString[1];
    $dayString = explode(' ',$dateString[2]);
    $publicationDate = $dayString [0] .'-'. $dateString[1] .'-' . $dateString[0];
    $publicationDateFormat = new DateTime($publicationDate);
    $publicationDate = $publicationDateFormat->format('d M Y');


}else{
  $publicationDate = date('d M Y',$records->created);
}

$colorsarray =array('media_release'=>'#097EAF','news_article'=>'#d93e22','publication'=>'#f7ee6f');

  $outputstring .='<div class="item cornereditem" style="width:98%;text-align;center;min-height:300px;max-height:300px;';
 /* $outputstring .= 'border-bottom: 1px solid ' . $backgroundColors[$i] . ';border-top: 1px solid '. $backgroundColors[$i] ;*/
  /*$outputstring .= 'min-height:350px;background:#fff"><div style="text-align:center !important;"><span class="'.$lh_icon.'" style="color:#457878;font-size:30px"  aria-hidden="true"></span></div>*/
  $outputstring .= 'min-height:300px;background:#fff"><div style="text-align:center !important;"></div>
  <h3 class="lh_owl_title"><a href="node/'.$records->nid.'" class="lh_a_actions">' .$records->title .' </a>
  </h3><p><span class="lh_pub_date">'  .  $publicationDate .'</span></p> <p class="lh_carousel_date">' .$records->body_summary. '</p>
  <p style="align:center">
  <a href="node/'.$records->nid.'" class="lh_a_actions"><em>Read more</em></a></p></div>';

  if($i==2){$i=0;}else{
  $i++;}
}

$variables['foo'] =$output . $outputstring .'</div>';
 
  
}

/**
 * Implements hook_preprocess_region().
 */
function labourhire_preprocess_region(&$variables) {

}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function labourhire_preprocess_maintenance_page(&$variables) {

  $t_function = get_t();

  if (drupal_installation_attempted()) {
    $variables['logo'] = base_path() . drupal_get_path('theme', 'labourhire') . '/logo.png';
    // Override the site name, which will be "Drupal".
    // @todo: Dynamically rename "govCMS" using $conf.
    $variables['site_name'] = $t_function('Install govCMS');
    // @todo: Use this to style the installer appropriately.
    $variables['classes_array'][] = 'installer';
  }
  else {
    if (empty($variables['content'])) {
      $variables['content'] = $t_function('This web site is currently undergoing some maintenance and is unavailable.');
    }
  }
}

/**
 * Implements hook_preprocess_node().
 */
function labourhire_preprocess_node(&$variables) {

  // Slides get a special read more link.
  if ($variables['type'] == 'slide') {
    if (!empty($variables['field_read_more'][0]['url'])) {
      $variables['title_link'] = l($variables['title'], $variables['field_read_more'][0]['url']);
    }
    else {
      $variables['title_link'] = check_plain($variables['title']);
    }
  }
}

/**
 * Implements hook_process_node().
 */
function labourhire_process_node(&$variables) {

  // We only want to set these if Display Suite HASN'T already been used.
  // This allows us to control the defaults but let end-users override with
  // DS wherever necessary.
  // This happens in _process_node(), as DS doesn't do its thing till AFTER
  // _preprocess_node() has run.
  if (!isset($variables['rendered_by_ds']) || $variables['rendered_by_ds'] != TRUE) {

    // The govCMS node template includes a dynamic title tag. This defaults to
    // h2, if not set elsewhere.
    if (!isset($variables['title_tag']) || empty($variables['title_tag'])) {
      $variables['title_tag'] = 'h2';
    }

    if (isset($variables['view_mode'])) {

      // Compact view modes are intended to be embedded in views.
      if ($variables['view_mode'] == 'compact') {
        _labourhire_process_node_compact($variables);
      }

      // Limit image fields to 1 item only in teaser and compact modes.
      if ($variables['view_mode'] == 'compact' || $variables['view_mode'] == 'teaser') {
        _labourhire_process_node_compact_teaser($variables);
      }
    }
  }
}

/**
 * Private callback to process compact node view modes.
 *
 * @param array $variables
 *   Standard variables array
 */
function _labourhire_process_node_compact(&$variables) {
  // Compact items are wrapped in an h3, as there is usually an h2
  // preceding them (the view or pane title).
  $variables['title_tag'] = 'h3';
}

/**
 * Private callback to process compact and teaser node view modes.
 *
 * @param array $variables
 *   Standard variables array
 */
function _labourhire_process_node_compact_teaser(&$variables) {
  $fields = field_read_fields(array('entity_type' => 'node', 'bundle' => $variables['type']));
  foreach ($fields as $field_name => $field_settings) {
    if ($field_settings['type'] == 'image') {
      if (isset($variables['content'][$field_name])) {
        $children = element_children($variables['content'][$field_name]);
        if (!empty($children)) {
          $limited = $variables['content'][$field_name][0];
          foreach ($children as $child_index) {
            unset ($variables['content'][$field_name][$child_index]);
          }
          $variables['content'][$field_name][0] = $limited;
        }
      }
    }
  }

}


/**
 * Overrides zen_status_messages to fix a small bug with output.
 *
 * @deprecated
 *
 * @todo: This can be removed when http://drupal.org/node/2344165 is fixed.
 */
function labourhire_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"messages--$type messages $type\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul class=\"messages__list\">\n";
      foreach ($messages as $message) {

        // Fix is for this line only.
        $output .= '  <li class="messages__item">' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

/**
 * Implements theme_form_required_marker().
 */
function labourhire_form_required_marker($variables) {
  // This is also used in the installer, pre-database setup.
  $t_function = get_t();
  $attributes = array(
    'class' => 'form-required',
    'title' => $t_function('This field is required.'),
  );
  return '<span' . drupal_attributes($attributes) . '>(' . $t_function('mandatory') . ')</span>';
}

/**
 * Adds accessibility attributes.
 */
function labourhire_preprocess_aria_invalid(&$variables) {
  if (!empty($variables['element']['#required']) && !drupal_installation_attempted()) {
    $variables['element']['#attributes']['required'] = 'true';
  }
  if (isset($variables['element']['#parents']) && form_get_error($variables['element']) !== NULL && !empty($variables['element']['#validated'])) {
    $variables['element']['#attributes']['aria-invalid'] = 'true';
  }
}

/**
 * Implements hook_theme_registry_alter().
 */
function labourhire_theme_registry_alter(&$theme_registry) {

  // Add our accessibility preprocess to several theme functions.
  $theme_functions = array(
    'textfield',
    'password',
    'file',
    'textarea',
    'checkbox',
    'radio',
    'select',
    'emailfield',
    'numberfield',
    'rangefield',
    'searchfield',
    'telfield',
    'urlfield',
  );

  foreach ($theme_functions as $hook) {
    $theme_registry[$hook]['preprocess functions'][] = 'labourhire_preprocess_aria_invalid';
  }
}

/**
 * Implements hook_file_link().
 *
 * We override core's file link theming to append a query parameter which
 * changes when the file entity changes. This is for caching reasons and
 * reverse proxies.
 */
function labourhire_file_link($variables) {
  $file = $variables ['file'];
  $icon_directory = $variables ['icon_directory'];

  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
    'query' => array(
      'v' => $file->timestamp,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options ['attributes']['title'] = check_plain($file->filename);
  }

  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . '</span>';
}


