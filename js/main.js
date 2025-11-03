jQuery(document).ready(function($){

  "use strict";

/*---------------------------------------*/
/* Sticky Header Nav                     */
/*---------------------------------------*/

     var nav = $('.site-header.sticky-nav');
     var body = $('body.has-sticky-nav');
     var siteheader = $('.site-header');
     var navheight = $(".site-header.sticky-nav .site-header-inner").is(':visible') ? $(".site-header.sticky-nav .site-header-inner").outerHeight() : $(".site-header.sticky-nav .mobile-header").outerHeight(); // Primary mav height
     var advertheight = body.hasClass("has-tfm-ad-before-header") ? $(".tfm-before-header.advert").outerHeight() : 0; //advert before header
     var headerheight = $(".site-header.sticky-nav").outerHeight(); // Header height
     var logoheight = headerheight - navheight; 
     var scrolltop = body.hasClass("has-tfm-ad-before-header") ? ( logoheight + advertheight ) : logoheight;
     var marginfix = body.hasClass("has-tfm-ad-before-header") ? ( headerheight + advertheight ) : headerheight;

      // Single Header overlay
     if ( ! body.hasClass("has-tfm-ad-before-header") && ! body.hasClass("has-tfm-ad-after-header") && ! body.hasClass("sidebar-side") && ! body.hasClass("post-style-default-alt") && ( body.hasClass("has-full-width-media") || 
        // TFM Hero Overlay
        ( body.hasClass("has-tfm-hero") && body.hasClass("tfm-hero-fullwidth") && ! body.hasClass("tfm-hero-has-margins")) ) && ! body.hasClass("has-full-width-header") && siteheader.hasClass("overlay-header") && ( siteheader.hasClass("logo-left-menu-right") || siteheader.hasClass("logo-split-menu") ) ) {
        marginfix = marginfix - headerheight;
     }
     // tfm post block first block
     if ( ! body.hasClass("has-tfm-hero") && body.hasClass("has-tfm-post-blocks") && body.hasClass("first-block-can-overlay") && ! body.hasClass("has-full-width-header") && siteheader.hasClass("overlay-header") && ( siteheader.hasClass("logo-left-menu-right") || siteheader.hasClass("logo-split-menu") )) {
        marginfix = marginfix - headerheight;
     }

    // TFM Hero

     if ( body.hasClass("has-tfm-hero") && ! siteheader.hasClass("logo-below-nav")) {
        if ( 0 !== advertheight ) { // W/advert
            marginfix = $(".tfm-hero-wrapper").offset().top - $(".tfm-before-header.advert").offset().top;
            if ( body.hasClass("has-tfm-ad-after-header")) { // Advert after header
                marginfix = headerheight + advertheight;
            }
        } else { // No ads
         marginfix = $(".tfm-hero-wrapper").offset().top - $(".site-header").offset().top // Hero add top margin
         if ( body.hasClass("has-tfm-ad-after-header")) {
                marginfix = headerheight;
            }
        }
     }

    
    // Scroll function sticky header

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > scrolltop ) {
            nav.addClass("fixed").css("margin-top", "-" + marginfix + "px" );
            body.addClass("body-fix").css("margin-top", "" + marginfix + "px" );
                $(".tfm-before-header.advert").hide();
        } else {
            nav.removeClass("fixed").css("margin-top", "" );
            body.removeClass("body-fix").css("margin-top", "" );
            $(".tfm-before-header.advert").show();
        }
    });

    /*--------------------------------------------*/
    /* Recalculate sticky header on window resize */
    /*--------------------------------------------*/

    $( window ).on( "resize", function() {

     var nav = $('.site-header.sticky-nav');
     var body = $('body.has-sticky-nav');
     var siteheader = $('.site-header');
     var navheight = $(".site-header.sticky-nav .site-header-inner").is(':visible') ? $(".site-header.sticky-nav .site-header-inner").outerHeight() : $(".site-header.sticky-nav .mobile-header").outerHeight(); // Primary mav height
     var advertheight = body.hasClass("has-tfm-ad-before-header") ? $(".tfm-before-header.advert").outerHeight() : 0; //advert before header
     var headerheight = $(".site-header.sticky-nav").outerHeight(); // Header height
     var logoheight = headerheight - navheight; 
     var scrolltop = body.hasClass("has-tfm-ad-before-header") ? ( logoheight + advertheight ) : logoheight;
     var marginfix = body.hasClass("has-tfm-ad-before-header") ? ( headerheight + advertheight ) : headerheight;

      // Single Header overlay
     if ( ! body.hasClass("has-tfm-ad-before-header") && ! body.hasClass("has-tfm-ad-after-header") && ! body.hasClass("sidebar-side") && ! body.hasClass("post-style-default-alt") && ( body.hasClass("has-full-width-media") || 
        // TFM Hero Header Overlay
        ( body.hasClass("has-tfm-hero") && body.hasClass("tfm-hero-fullwidth") && ! body.hasClass("tfm-hero-has-margins")) ) && ! body.hasClass("has-full-width-header") && siteheader.hasClass("overlay-header") && ( siteheader.hasClass("logo-left-menu-right") || siteheader.hasClass("logo-split-menu") ) ) {
        marginfix = marginfix - headerheight;
     }
     if ( ! body.hasClass("has-tfm-hero") && body.hasClass("has-tfm-post-blocks") && body.hasClass("first-block-can-overlay") && ! body.hasClass("has-full-width-header") && siteheader.hasClass("overlay-header") && ( siteheader.hasClass("logo-left-menu-right") || siteheader.hasClass("logo-split-menu") )) {
        marginfix = marginfix - headerheight;
     }

    // TFM Hero

     if ( body.hasClass("has-tfm-hero") && ! siteheader.hasClass("logo-below-nav")) {
        if ( 0 !== advertheight ) { // W/advert
            marginfix = $(".tfm-hero-wrapper").offset().top - $(".tfm-before-header.advert").offset().top;
            if ( body.hasClass("has-tfm-ad-after-header")) { // Advert after header
                marginfix = headerheight + advertheight;
            }
        } else { // No ads
         marginfix = $(".tfm-hero-wrapper").offset().top - $(".site-header").offset().top // Hero add top margin
         if ( body.hasClass("has-tfm-ad-after-header")) {
                marginfix = headerheight;
            }
        }
     }
    
    // Scroll function sticky header

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > scrolltop ) {
            nav.addClass("fixed").css("margin-top", "-" + marginfix + "px" );
            body.addClass("body-fix").css("margin-top", "" + marginfix + "px" );
                $(".tfm-before-header.advert").hide();
        } else {
            nav.removeClass("fixed").css("margin-top", "" );
            body.removeClass("body-fix").css("margin-top", "" );
            $(".tfm-before-header.advert").show();
        }
    });


    } );


/*---------------------------------------*/
/* Toggle color mode                  */
/*---------------------------------------*/

   var colormode= $('body').data('color-mode');

  //check for localStorage, add as browser preference if missing
  if (!localStorage.getItem("tfm-color-mode")) {
    if (( window.matchMedia("(prefers-color-scheme: dark)").matches && colormode == 'system' ) || colormode == 'dark' ) {
      localStorage.setItem("tfm-color-mode", "tfm-dark-mode");
    } else {
      localStorage.setItem("tfm-color-mode", "tfm-light-mode");
    }
  }

  //set interface to match localStorage
  if (localStorage.getItem("tfm-color-mode") == "tfm-dark-mode") {
    $("body").addClass("tfm-dark-mode");
    $("body").removeClass("tfm-light-mode");
  } else {
    $("body").removeClass("tfm-dark-mode");
    $("body").addClass("tfm-light-mode");
  }

  //add toggle
  $(".toggle-color-mode").on("click", function() {
    if ($("body").hasClass("tfm-dark-mode")) {
      $("body").removeClass("tfm-dark-mode");
      $("body").addClass("tfm-light-mode");
      localStorage.setItem("tfm-color-mode", "tfm-light-mode");
    } else {
      $("body").addClass("tfm-dark-mode");
      $("body").removeClass("tfm-light-mode");
      localStorage.setItem("tfm-color-mode", "tfm-dark-mode");
    }
  });

/*---------------------------------------*/
/* Slide Menu Sidebar                    */
/*---------------------------------------*/

$(".toggle-menu, .toggle-sidebar.mobile-navigation .close-menu span, .menu-overlay").on('click', function() {
        $(".mobile-navigation").toggleClass("show");
        $(".menu-overlay").fadeToggle(400);
});

// Expand the parent/child menu
$('ul.primary-nav-sidebar li.menu-item-has-children > span.expand').on('click', function(event) {
    event.preventDefault();
   $(this).next('.sub-menu').slideToggle(200);
   $(this).next('.sub-menu').toggleClass("visible");
   $(this).toggleClass("close");
});

/*---------------------------------------*/
/* Search sidebar                        */
/*---------------------------------------*/

  $(".toggle-search, .site-search  .close-menu span, .sub-message-404 .toggle-search").on('click', function() {
        $(".site-search").toggleClass("show-search");
        $(".site-search").fadeToggle(300);

        // Focus the cursor on the search field when it's visible
        $(".site-search.show-search .search-field").focus();

        // Remove focus when not visible
        $('.site-search:not(.show-search) .search-field').blur();


});

/*---------------------------------------*/
/* ESC key close of open toggle elements */
/*---------------------------------------*/

$(document).keyup(function(e) { 
        if (e.keyCode == 27) { // esc keycode
            if($(".site-search").hasClass("show-search")) {
                $(".site-search").fadeToggle(300);
               $(".site-search").toggleClass("show-search");
            }
            if($('.mobile-navigation').hasClass("show")) {
               $(".mobile-navigation").toggleClass("show");
               $(".menu-overlay").fadeToggle(400);
            }
        }
    });

/*---------------------------------------*/
/* smooth scroll to top                  */
/*---------------------------------------*/
$(".backtotop").on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
        scrollTop: 0 ,
        }, 500
    );
});
/*---------------------------------------*/
/* Back to Top Pop Up Link               */
/*---------------------------------------*/
// browser window scroll (in pixels) after which the "back to top" link is shown milliseconds
    var offset = 1200,
        scroll_top_duration = 100,
        $back_to_top = $('.goto-top');

    $(window).on('scroll', function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass("visible") : $back_to_top.removeClass("visible");
    });
/*---------------------------------------*/
/* smooth scroll anchor links            */
/*---------------------------------------*/
$(document).on('click', 'a[href^="#comments"], a[href^="#reviews"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 800);
});

/*---------------------------------------*/
/* Toggle comments                       */
/*---------------------------------------*/

$('.toggle-comments').on('click', function() {
   $('#comments').slideToggle(400);
   $('#comments').toggleClass("open");
   $(this).toggleClass("close");
});
// Comments anchor link open and reset toggle comments
$('.entry-meta-comment-count a').on('click', function() {
   if (! $('#comments').hasClass("open") ) {
    $('#comments').slideToggle(400);
    $('#comments').toggleClass("open");
    $('.toggle-comments').toggleClass("close");
   }
});
$('.comments-pagination a.page-numbers').on('click', function() {
   if ($('#comments').hasClass("close") ) {
    $('#comments').slideToggle(400);
    $('#comments').toggleClass("close");
    $('.toggle-comments').toggleClass("open");
   }
});

});

/*---------------------------------------*/
/* Scroll Animations & Progress Bar      */
/*---------------------------------------*/

(function() {
	// Create scroll progress indicator
	var progressBar = document.createElement('div');
	progressBar.className = 'scroll-progress';
	document.body.appendChild(progressBar);

	// Update scroll progress
	function updateScrollProgress() {
		var windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
		var scrolled = (window.pageYOffset / windowHeight) * 100;
		progressBar.style.width = scrolled + '%';
	}

	// Intersection Observer for fade-in-up animations
	var observerOptions = {
		threshold: 0.1,
		rootMargin: '0px 0px -50px 0px'
	};

	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('visible');
				observer.unobserve(entry.target);
			}
		});
	}, observerOptions);

	// Observe all articles for scroll animations
	document.addEventListener('DOMContentLoaded', function() {
		var articles = document.querySelectorAll('.article');
		articles.forEach(function(article, index) {
			// Add fade-in-up class with staggered delay
			article.classList.add('fade-in-up');
			article.style.transitionDelay = (index * 0.1) + 's';
			observer.observe(article);
		});

		// Observe archive headers
		var archiveHeaders = document.querySelectorAll('.archive-header');
		archiveHeaders.forEach(function(header) {
			header.classList.add('fade-in-up');
			observer.observe(header);
		});

		// Observe widgets
		var widgets = document.querySelectorAll('.widget');
		widgets.forEach(function(widget) {
			widget.classList.add('fade-in-up');
			observer.observe(widget);
		});
	});

	// Update scroll progress on scroll
	window.addEventListener('scroll', updateScrollProgress);
	updateScrollProgress(); // Initial call

	// Add 'stuck' class to sticky header when scrolled
	var header = document.querySelector('.site-header.glass-header');
	if (header) {
		var lastScroll = 0;
		window.addEventListener('scroll', function() {
			var currentScroll = window.pageYOffset;
			if (currentScroll > 100) {
				header.classList.add('stuck');
			} else {
				header.classList.remove('stuck');
			}
			lastScroll = currentScroll;
		});
	}
})();

