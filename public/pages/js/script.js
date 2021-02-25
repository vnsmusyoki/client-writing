var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header.header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 200);

setTimeout(function(){ 
    $('.cookies-popup').addClass("slidein");
    $('.itsok').click(function() {
	$('.cookies-popup').hide();		
});
  }, 3000);
function hasScrolled() {
    var st = $(this).scrollTop();
    
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    if (st > lastScrollTop && st > navbarHeight){
        $('header.header').removeClass('nav-down').addClass('nav-up');
    } else {
        if(st + $(window).height() < $(document).height()) {
            $('header.header').removeClass('nav-up').addClass('nav-down');
        }
    }
    lastScrollTop = st;
}

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 400) {
        $(".header").addClass("white");
    }
	else{
		$(".header").removeClass("white");
	}
});

(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);