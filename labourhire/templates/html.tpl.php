<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title>
  
  <?php  

if (drupal_is_front_page()) {
    ?>Home | Labour hire licensing Queensland<?php
}

    else{
  print $head_title; 
}


  ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">
  <?php endif; 
if (drupal_is_front_page()) {
    ?> <meta name="Labour hire licensing Queensland" content="Labour hire licensing Queensland, managed by the Office of Industrial Relations, Queensland Government, is the official site for the regulation of the labour hire industry in Queensland">
    <meta name="description" content=" labour hire; labour hire licencing act 2017; laws; legislation; Queensland"><?php
}

  ?>
<meta http-equiv="cleartype" content="on">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <?php print $styles; ?>


<?php 

//if (drupal_is_front_page()) {

$themepath = base_path() . path_to_theme();
$jspath = $themepath . '/js/jquery-1.9.min.js';
$owlpath = $themepath . '/js/owl.carousel.min.js';

?>

<script src="https://code.jquery.com/jquery-1.10.1.js" integrity="sha256-663tSdtipgBgyqJXfypOwf9ocmvECGG8Zdl3q+tk+n0=" crossorigin="anonymous"></script>
<script src="<?php print base_path() . path_to_theme(); ?>/js/owl.carousel.min.js" type="application/javascript"></script>
	
<script> $113 = jQuery.noConflict();</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




<?php 
//}
?>



  <?php print $scripts; ?>
  <?php if ($add_html5_shim and !$add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print base_path() . path_to_theme(); ?>/js/html5.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim and $add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print base_path() . path_to_theme(); ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print base_path() . path_to_theme(); ?>/js/respond.js"></script>
    <![endif]-->
  <?php endif; ?>

<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '842402095852856'); // Work Safe Home Safe pixel
fbq('init', '1460593107586147'); // Safety Switch pixel
fbq('init', '464073050437696'); // WorkCover pixel
fbq('init', '362065224195208'); // SWARTWAwards pixel
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=842402095852856&ev=PageView&noscript=1"
/>
<img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1460593107586147&ev=PageView&noscript=1"
/>
<img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=464073050437696&ev=PageView&noscript=1"
/>
<img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=362065224195208&ev=PageView&noscript=1"
/></noscript>

<!-- End Facebook Pixel Code -->
<!-- TEMP -->


<!-- END TEMP -->



</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
      <a id="skip-link" href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
