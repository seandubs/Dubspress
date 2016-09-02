$(document).ready(on_home_ready);

var $container;
var columnclass = 'grid-item';
function on_home_ready(){
	//setup columns class
	if(ajax_var.post_columns == 3){
		columnclass += ' col-xs-12 col-sm-6 col-md-4';
	} else { 
		columnclass += ' col-xs-12 col-sm-6 col-md-3';
	}
	
	$('article.post').addClass( columnclass );
	
	$container = $('.grid-wrapper').isotope({
	  itemSelector: '.grid-item',
	  transitionDuration: '0.1s'
	});
	
	$container.imagesLoaded().progress( function() {
		$container.isotope('layout');
	});
	
	init_infinite_scroll($container);
	
	//setup click handler for LOAD MORE
	$('.pagination .next').click(function(){
        $container.infinitescroll('retrieve');
        return false;
    });
}

function init_infinite_scroll(iscontainer){
	//Index Blog Infinite Scroll
    $(iscontainer).infinitescroll({
        navSelector  : '.pagination',    // selector for the paged navigation
        nextSelector : '.pagination .next',  // selector for the NEXT link (to page 2)
        itemSelector : '.post',     // selector for all items you'll retrieve
        bufferPx     : -100,
        loading: {
            finishedMsg: 'No more posts to load.',
            msgText: '',
            //img: loadingImg,
            selector: '#loading-is'
        }
    },
        // call Isotope as a callback
        function( newElements ) {
            var $newElems = $( newElements ).hide();
			$newElems.addClass( columnclass );
            $newElems.imagesLoaded( function() {
                $newElems.fadeIn(); // fade in when ready
				$container.isotope( 'appended', $newElems );
                if(newElements.length >= ajax_var.posts_number) {
                    $('.pagination').show();
                    return false;
                }
            });

        }
    );
	
	//Onclick InfiniteScroll
    $(window).unbind('.infscr');
	
}