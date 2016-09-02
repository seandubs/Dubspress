/*
**
** This is the Master JS file for the Dubspress Theme.
** Classes that other files depend on should be defined here.
**
*/

var $ = jQuery.noConflict();

window.onload = function() {
  // Called once HTML is loaded, but before images.
};

$( document ).ready(function( ) {
  // Called after everything including images is loaded.
  
  /*
  $.ajax({
		url: "http://www.seanbotnet.com/seandubs-wp",
		success: function( data ) {
			alert( 'Your home page has ' + $(data).find('div').length + ' div elements.');
		}
	})
	*/
});

//class to throttle any event by requestAnimationFrame
var throttle = function(type, name, obj) {
	obj = obj || window;
	var running = false;
	var func = function() {
		if (running) { return; }
		running = true;
		 requestAnimationFrame(function() {
			obj.dispatchEvent(new CustomEvent(name));
			running = false;
		});
	};
	obj.addEventListener(type, func);
	func();
};
