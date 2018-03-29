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
      <?php endif; ?>MEDIA TEMPLATE
      <?php print render($page['content']); ?>
  


    </div>

    

  </div>
<div>
<?php
  print render($page['relatedlinks']);
 ?>

  </div>

  <?php include 'labourhirefooter.tpl.php'; ?>
