/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
 */
 function updateViewportDimensions() {
   var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
   return { width:x,height:y }
 }
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
 */
 var waitForFinalEvent = (function () {
   var timers = {};
   return function (callback, ms, uniqueId) {
    if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
    if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


jQuery(document).ready(function($) {

  // hide press section onload
  $('#press').hide();

  // set up variables
  var pieces = $('.slideshow').toArray();
  var currentPiece = pieces[0];

  // hide all the pieces except for the first one
  // for (var i = 0; i < pieces.length; i++){

  //   if (pieces.indexOf(pieces[i]) != 0) {      
  //     $(pieces[i]).hide();
  //   }
  // }

  // when you click the right arrow, hide the current piece
  // $('#right-arrow').click(function(){
  //   console.log('clicked right arrow');
  //   currentPiece.hide();
  // })
  // and show the next one
  // when you click the left arrow, hide the current piece
  // and show the previous one

  $('#press-link').click(function(){
    $('#pieces').hide();
    $('#press').show();
  });

  $('#pieces-link').click(function(){
    $('#press').hide();
    $('#pieces').show();
  })

  

});
