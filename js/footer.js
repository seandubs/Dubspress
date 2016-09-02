$(document).ready(on_footer_ready);

function on_footer_ready(){
	fixed_footer();
}

function fixed_footer(){
	var realFooterWrapper = $('#footer-wrapper'),
        realFooterHeight = $('#colophon').outerHeight(),
        fakeFooter = $('.fake-footer'),
		viewportHeight = $(window).outerHeight();
		


        if(realFooterHeight > viewportHeight){
			realFooterWrapper.css('position', 'static');
            fakeFooter.hide();
        }
        else {
			realFooterWrapper.css('position', 'fixed');
            fakeFooter.height(viewportHeight + 15);
            realFooterWrapper.height(fakeFooter);
        }

}