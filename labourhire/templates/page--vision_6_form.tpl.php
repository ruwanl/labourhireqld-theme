<?php include 'labourhireheader.tpl.php';  ?>

<div id="page">

  <?php print render($page['highlighted']); ?>

  <?php print $breadcrumb; ?>

  <div id="main" style="background:white">

    <?php

  
      // Render the sidebars to see if there's anything in them.

      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
      $legal_second = render($page['legalstatements']);
 

    ?>
    <aside class="sidebars" role="complementary">
    <?php if ($sidebar_first || $sidebar_second) {?>
  
        <?php print $sidebar_second; ?>
        <?php print $sidebar_first; ?>
       
        
    <?php 
 }
?>
</aside>


    <div id="content" class="column" role="main">

      <a href="#skip-link" id="skip-content" class="element-invisible">Go to top of page</a>

      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php #print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php #print render($page['content']); ?>
    
	  	  <p>
The Labour Hire Licensing Queensland ebulletin is a free email subscription service keeping you informed on the licensing scheme.
To subscribe enter your information in the form below.  You will receive an email to activate and confirm your subscription.
Required fields are marked with an asterisk ( * ).
</p> <p>&nbsp;</p>
	 <!-- Vision 6 Form Code -->  
<script language="JavaScript" type="text/javascript" charset="utf-8" src="https://www.vision6.com.au/em/forms/subscribe.php?db=598177&amp;s=248438&amp;a=15149&amp;k=5ff94f3&amp;emb=1"></script>
<p>&nbsp;</p>
<p>
<a href="/legal-statements/privacy" class="lh_external_link">Privacy policy</a>:  The Office of Industrial Relations is collecting your personal information for the purposes of subscribing you to the ebulletin email service.  This information may be used for statistical research, monitoring and evaluation of our services.</p>





      
      <?php #print $feed_icons; ?>
    </div>

    

  </div>
<div>
<?php
  print render($page['relatedlinks']);
 ?>

  </div>

  <?php include 'labourhirefooter.tpl.php'; ?>
