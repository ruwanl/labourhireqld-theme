<?php
/**
 * @file
 * Returns the HTML for a front page.
 */
?>
<?php include 'labourhireheader.tpl.php';  ?>

 
<div id="page">
<a name="#skip-link"></a>

 
    

 <?php print $breadcrumb; ?>

  <div id="main">


    <div id="front-content" class="column" role="main">

      

      <a id="main-content"></a>
      <div class="w3-row-padding" style="margin-left: 15px;margin-right: 15px;padding:0">
        <div class="w3-container w3-twothird lh-carousel-container">
        <div id="lh_home_carousel">   





<?php 
//print render($page['featured_carousel']);  
print render($page['temporaryhomepage']);
  /*print render($page['labourhirebuttons']);*/ ?>

</div><!-- end lh_home_carousel -->
        </div><!-- end container -->
            <div class="w3-container w3-third" style="margin-top:10px;">
             <div class="row" style="margin-left:0px !important"><h2 style="float:left;">I want to</h2></div>
			 
           
						<div class="row" style="margin-left:0px !important;">
							  <div class="w3-half" style="margin-bottom:10px">
							 <a href="https://oiraccportal.microsoftcrmportals.com/SignIn"> 
             <button class="w3-button lh_buttons w3-round-large" style="background:#f2e3cb">
							  <span class="glyphicon glyphicon-pencil lh_glypicon_dark" aria-hidden="true">
							  </span>
							  <span class="glyphtext">Apply for a labour hire licence</span>
							  </button>
              </a>
              </div>
							  
							  
							 <div class="w3-half" style="margin-bottom:10px">
							  <a href="https://oiraccportal.microsoftcrmportals.com/licence-register/" class="lh_glyph_fal"> <button class="w3-button lh_buttons  w3-round-large" style="background:#000">
							  <span class="glyphicon glyphicon-search lh_glypicon" aria-hidden="true"></span>
							  <span class="glyphtext">Find a licensed labour hire service</span>
							   </button></a></div>
						</div>
						
						<div class="row" style="margin-left:0px !important;margin-top: 10px;">
							  <div class="w3-half">
							  <a href="/report-a-problem"> <button class="w3-button w3-teal lh_buttons w3-round-large">
							  <span class="glyphicon glyphicon-edit lh_glypicon" aria-hidden="true"></span>
							  <span class="glyphtext">Report a problem</span>
							   </button></a></div>
							  
							  
							  <div class="w3-half">
							 <a href="/subscribe">  <button class="w3-button lh_buttons w3-round-large" style="background:#a6d4d6">
							  <span class="glyphicon glyphicon-envelope lh_glypicon_dark" aria-hidden="true"></span>
							  <span class="glyphtext">Subscribe to the labour hire newsletter</span>
							   </button></a></div>
						</div>
				 <div class="row" style="margin-left:0px !important"><p style="float:left;vertical-align:bottom;font-weight:bold "><a href="https://oiraccportal.microsoftcrmportals.com/">Online services</a></p></div>
			
			
          </div><!-- end w3 container -->

      <?php 

    

      print render($page['iam']); 
     

?>
<script>$113(document).ready(function(){

$113('#owl-demo').owlCarousel({
    center: true,
    items: 3,
    loop: true,
    margin: 10,
    //autoPlay: 3000, //Set AutoPlay to 3 seconds
    nav: true
});





});

</script>


<div class="w3-row">
            <div class="w3-container" style="margin-left:-15px;margin-right:-15px;margin-top:-30px;">
<?php

#print render($foo);


  
#print render($page['labourhirehomenewscaro']); ?>
  </div>
          </div>


    </div><!-- end main -->

    

  </div>

<a href="#skip-link" id="skip-content" class="element-invisible">Go to top of page</a>


  <?php include 'labourhirefooter.tpl.php'; ?>

 <script>
    function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

   daysSpan.innerHTML = t.days;
  //daysSpan.innerHTML = 1;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

//var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
//Date.UTC(year, month[, day[, hour[, minute[, second[, millisecond]]]]])
var deadline =  new Date('June 16, 2018, 23:15:30 GMT+11:00');
initializeClock('clockdiv', deadline);
    </script> 
