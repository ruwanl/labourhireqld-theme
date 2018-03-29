<?php
/**
 * @file
 * Returns the HTML for labour hire header
 *
 */
?>
<!-- temp-->
<!-- JS -->


<script type="text/javascript">
  $113(document).ready(function($) {
    $113('.accordion').find('.accordion-toggle').click(function(){
      //Expand or collapse this panel
      $113(this).next().slideToggle('fast');
      //Hide the other panels
      $113(".accordion-content").not($(this).next()).slideUp('fast');
    });
	
	
	
$113( ".show_report" ).click(function() {
	
 $113( ".anon_report" ).toggle( "slow", function() {
    
  });
  
  $113( ".webform-client-form-322" ).toggle( "slow", function() {
    
  });
  
  
});


$113(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});




	
	
	
  }); //end document ready
</script>

<!-- CSS -->
<style>
  .accordion-toggle {cursor: pointer;}
  .accordion-content {display: none;}
  .accordion-content.default {display: block;}
</style>


<!-- end temp -->
<?php 
if($page['labourhirealerts']){ print render($page['labourhirealerts']);} ?>
<div class="wrapper_header">
 <div class="row lh_help_menu" class="">
	
    <?php if ($secondary_menu): ?>
      <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array(
              'links',
              'inlineLinks--bordered--double',
              'clearfix',
            ),
          ),
          'heading' => array(
            'text' => isset($secondary_menu_heading) ? $secondary_menu_heading : '',
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>

      </nav>
      </div>
    <?php endif; ?>

<header class="header" id="header" role="banner">
  <div class="header__inner">
 


<div class="header__region region region-header">
<div id="block-search-api-page-default-search" class="block block-search-api-page last even" style="">    
  <div class="block__content">

<form id="myForm">Search
<input type="radio" name="myRadio" value="SearchThisSite" /> this website
<input type="radio" name="myRadio" value="SearchAllGov" /> all Queensland Government
</form>




  
</div>
</div>
</div>



     
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo">
          <img src="<?php print '/sites/all/themes/labourhire/qg-coa-white.png' ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" style="margin-top:-50px;" />
<br><h4 class="header__site-slogan" style=""><?php print $site_name;?></h4>
        </a>
          
      

  <?php print render($page['header']); ?>
  </div><!-- header inner -->

</header>

<?php print render($page['navigation']); ?>
</div>