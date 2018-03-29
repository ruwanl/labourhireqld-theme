<?php
 
 include 'labourhireheader.tpl.php';  

?>


<div id="page">
<a name="#skip-link"></a>

  <?php 
  
 

  
  render($page['highlighted']);

  ?>

  <?php 
  
  print $breadcrumb; 

  ?>

  <div id="main" style="background:white">
 
    <?php


if($node->type != 'media_release' OR $node->type !='news_article'){
    $path = current_path();
    $path_alias = drupal_lookup_path('alias',$path);
    $pathway = explode('/',$path_alias);
    //print $pathway[0];
    
  
      // Render the sidebars to see if there's anything in them.

      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);


	  ?>

    <aside class="sidebars lh_no_print" role="complementary">
    <?php 
        
        if ($sidebar_first || $sidebar_second) {?>
  
        <?php print $sidebar_second; ?>
      

    
        
    <?php 
 }
  print render($page['contactsideright']);
 
switch($pathway[0]){

  case 'legal-statements':

   
    print '<section class="region region-sidebar-second column sidebar">';
    print'<div id="block-menu-block-govcms-menu-block-sidebar" class="block block-menu-block first last odd" role="navigation">
    <h2 class="block__title block-title"><a href="/'.$pathway[0].'">'.ucfirst(str_replace('-',' ',$pathway[0])).'</a></h2>
    <div class="block__content">
    <div class="menu-block-wrapper menu-block-govcms_menu_block-sidebar menu-name-main-menu parent-mlid-0 menu-level-2">'; 
    print drupal_render(menu_tree('menu-legal-statements')); 
    print '</div></div></div></section>';
    break;

    case 'legal':
    print '<section class="region region-sidebar-second column sidebar">';
    print'<div id="block-menu-block-govcms-menu-block-sidebar" class="block block-menu-block first last odd" role="navigation">
    <h2 class="block__title block-title"><a href="/'.$pathway[0].'">'.ucfirst(str_replace('-',' ',$pathway[0])).'</a></h2>
    <div class="block__content">
    <div class="menu-block-wrapper menu-block-govcms_menu_block-sidebar menu-name-main-menu parent-mlid-0 menu-level-2">'; 
    print drupal_render(menu_tree('menu-legal-statements')); 
    print '</div></div></div></section>';
    break;

  case 'help':   
    print '<section class="region region-sidebar-second column sidebar">';
    print'<div id="block-menu-block-govcms-menu-block-sidebar" class="block block-menu-block first last odd" role="navigation">
    <h2 class="block__title block-title"><a href="/'.$pathway[0].'">'.ucfirst(str_replace('-',' ',$pathway[0])).'</a></h2>
    <div class="block__content">
    <div class="menu-block-wrapper menu-block-govcms_menu_block-sidebar menu-name-main-menu parent-mlid-0 menu-level-2">'; 
   print drupal_render(menu_tree('menu-help')); 


  
  print '</div></div></div></section>';
  break;

    }
  

?>
</aside>

<?php 
} //end if not news media type

if($page['righthandsidelinks']){
	$maxwidth="max-width:650px";
}
elseif((!$sidebar_first) AND (!$sidebar_second ) AND (!$page['righthandsidelinks']) AND (!$page['relatedlinks']) AND ($pathway[0] != 'legal-statements') AND ($pathway[0] !='legal') AND ($pathway[0] !='help') AND ($pathway[0] !='contact-us')) {
	$maxwidth="max-width:100% !important";
}
else{
	$maxwidth="''";
}

?>

    <div id="content" class="column" role="main" style="<?php echo $maxwidth; ?>">
	
	<a class="print-link pull-right" onclick="printLHPage();" style="">Print</a>
	<a class="print-link pull-right" onclick="printLHPage();">
	<span class="glyphicon glyphicon-print pull-right" style="margin-right:-10px;">&nbsp;</span></a>
    <a href="#skip-link" id="skip-content" class="element-invisible">Go to top of page</a>

      <a id="main-content"></a>
      <?php print render($title_prefix);
			 $currentpath = explode('/', current_path());
			
			 
	  ?>
      <?php if ($title AND $currentpath[0] != 'search') : ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php #print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif;
      
      print render($page['contactaboveform']); 

       ?>
   

      <?php
	 
       
	  
       print render($page['content']);
       print render($page['contactbelowform']);

 if(($pathway[1]== 'manage-subscription' || $pathway[1]=='unsubscribe') AND $pathway[2] !='confirmation' ){
		  ?>
		  <!-- Web Form Code -->
<script language="JavaScript" type="text/javascript" charset="utf-8" src="https://www.vision6.com.au/em/forms/update_profile.php?db=598177&amp;s=248439&amp;a=15149&amp;k=22aa7b0&amp;emb=1"></script>

		  <?php 
	  }	   
      ?>

    </div><!-- end content -->

<?php 
if($node->type == 'media_release'){
      ?>
<aside class="sidebars lh_rightcol lh_no_print" role="complementary" style="float:right">
 
</aside>

      <?php
  }


  ?> 
  <aside class="sidebars lh_rightcol lh_no_print" role="complementary">

  <?php
        
         print render($page['righthandsidelinks']);
  ?>
  </aside>
  

  </div><!-- end main -->
  <div> <!-- end page -->
<?php
  print render($page['relatedlinks']);

 ?>

  </div>

  <?php include 'labourhirefooter.tpl.php'; ?>
