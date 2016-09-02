var headIsSmall = 0;

$(document).ready(on_header_ready);

function on_header_ready(){
	//headroom_loader();
	
	//modal event to animate button
	$('#mobile-menu-fs').on('show.bs.modal', function (e) {
		var btn = $(e.relatedTarget); // Button that triggered the modal
		btn.toggleClass('collapsed');
		var mbtn = $(this).find('.navbar-toggle'); // Button that closes the modal
		mbtn.toggleClass('collapsed');
		
		$('#mobile-menu-fs').on('hide.bs.modal', function (ev) {
			btn.addClass('collapsed');
			mbtn.addClass('collapsed');
		});
		
	});
	
	/* init - you can init any event */
	throttle("resize", "optimizedResize", window);
	throttle("scroll", "optimizedScroll", window);
	
	window.addEventListener("optimizedResize", function() {
		//console.log("Resource conscious resize callback!");
		on_header_resize();
	});
	
	window.addEventListener("optimizedScroll", function() {
		//console.log("Resource conscious scroll callback!");
		on_scroll();
	});
	
	
	$('.back-to-top').on('click', function(){
		$('html, body').animate({scrollTop:0}, speed);
		return false;
	});
}

var offset = 100;
var speed = 250;
var duration = 500;
function on_scroll(){
	if ($(this).scrollTop() < offset) {
		 $('.back-to-top') .fadeOut(duration);
	} else {
		 $('.back-to-top') .fadeIn(duration);
	}
	
}

function body_padding(sizestate){
	var headheight = $('#site-navigation.main-navigation').outerHeight(true);
	$('body').css({
		"padding-top":headheight
	});
	headIsSmall = sizestate;
}

function headroom_loader(){ /** This is for headroom.js if used. **/
	var elem = $('#site-navigation.main-navigation')[0];
	var hoffset = $('#site-navigation.main-navigation').outerHeight(true);
	//console.log('hoffset is ' +hoffset);
	var headroom = new Headroom(elem, {
	  "offset": hoffset,
	  "tolerance": 5,
	  "classes": {
		"initial": "headroom",
		"pinned": "headroom--pinned",
		"unpinned": "headroom--unpinned"
	  }
	});
	headroom.init();
	//console.log('headroom loaded');
}

function on_header_resize(){
	if( $('#site-navigation').css('position') != 'fixed'){
		return;
	}
	if(window.matchMedia('(max-width: 767px)').matches && headIsSmall != 1){
		body_padding(1);
        //headIsSmall = 1;
    } else if (window.matchMedia('(max-width: 991px)').matches && headIsSmall != 2) {
        body_padding(2);
		//headIsSmall = 2;
    } else if(headIsSmall != 3){
		body_padding(3);
		//headIsSmall = 3;
	}
}
