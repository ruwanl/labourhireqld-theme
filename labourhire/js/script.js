/**
 * @file
 * A JavaScript file for the theme.
 * The website will no longer be tested on my personal phone for responsiveness.
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.mainMenuTinyNav = {
  attach: function(context, settings) {
    $(".region-navigation .block__content > .menu").tinyNav({
      active: 'active-trail:last'
    });
    $('select.tinynav').prepend('<option value="#">Menu</option>');
  }
};

Drupal.behaviors.mainMenuSuperfish = {
  attach: function(context, settings) {

    var superfish_menu = $(".region-navigation .block__content > .menu");

    superfish_menu.addClass('sf-menu');
    superfish_menu.superfish({
      autoArrows:  false
    });
  }
};

Drupal.behaviors.responsiveSlides = {
    attach: function(context, settings) {

        $(".view-slideshow ul:not(.contextual-links)").responsiveSlides({
            "auto": false,
            "pager": true,         // Boolean: Show pager, true or false
            "pauseButton": false   // Boolean: Create Pause Button
        });

    }
};


})(jQuery, Drupal, this, this.document);






    
  //  $113(document).ready(function(){
	$113(function(){

        $113('#myForm input').on('change', function() {
        $formToSearch = $113('input[name="myRadio"]:checked', '#myForm').val();
       
       
        // alter action based on selection
        if($formToSearch == 'SearchAllGov'){
          $113('#search-block-form').get(0).setAttribute('action', 'https://find.search.qld.gov.au/s/search.html'); 
		  $113("#search-block-form").attr("method", "get");
		  $113('#edit-search-block-form--2').attr('id', 'search-query');
		  $113('#search-query').attr('name', 'query');  
          $113('#search-block-form').append('<input type="hidden" name="form" value="simple">');
          $113('#search-block-form').append('<input type="hidden" name="collection" value="qld-gov">');
          $113('#search-block-form').append('<input type="hidden" name="tiers" value="off">');
          $113('#search-block-form').append('<input type="hidden" name="profile" value="oir">');
          $113('#search-block-form').append('<input type="hidden" name="num_ranks" value="10">');
        }
        if($formToSearch == 'SearchThisSite'){
         
		 //
         $113('#search-block-form').get(0).setAttribute('action', '/');
		 $113("#search-block-form").attr("method", "post");
		 $113('#search-query').attr('id', 'edit-search-block-form--2');
		 $113('#query').attr('name', 'search-query');
		 $113('input[name="form"]').remove();
		 $113('input[name="collection"]').remove();
		 $113('input[name="tiers"]').remove();
		 $113('input[name="profile"]').remove();
		 $113('input[name="num_ranks"]').remove();
		           
        }
});

});

//});




function printLHPage(){
	window.print();
}


