<?php
include 'labourhire_header.php';
?>

    <div id="content" class="column" role="main">

      <a href="#skip-link" id="skip-content" class="element-invisible">Go to top of page</a>

      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>


<script language="JavaScript" type="text/javascript" charset="utf-8" src="https://www.vision6.com.au/em/forms/subscribe.php?db=598177&amp;s=248438&amp;a=15149&amp;k=5ff94f3&amp;emb=1"></script>  


      <?php print $feed_icons; ?>
    </div>

    

  </div>

  <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
      }
        </script>
       <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
