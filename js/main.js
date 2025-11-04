jQuery(document).ready(function($){

"use strict";

/*---------------------------------------*/
/* Motion helpers & accessibility        */
/*---------------------------------------*/

  var reduceMotionQuery = window.matchMedia ? window.matchMedia('(prefers-reduced-motion: reduce)') : null;
  var prefersReducedMotion = reduceMotionQuery ? reduceMotionQuery.matches : false;

  function throttleFrame(fn) {
    var ticking = false;

    return function throttled() {
      if (ticking) {
        return;
      }

      ticking = true;
      var context = this;
      var args = arguments;

      var run = function() {
        fn.apply(context, args);
        ticking = false;
      };

      if (window.requestAnimationFrame) {
        window.requestAnimationFrame(run);
      } else {
        setTimeout(run, 16);
      }
    };
  }

  function debounce(fn, delay) {
    var timeout;
    return function debounced() {
      var context = this;
      var args = arguments;
      clearTimeout(timeout);
      timeout = setTimeout(function() {
        fn.apply(context, args);
      }, delay);
    };
  }

  if (reduceMotionQuery) {
    var handleMotionPreferenceChange = function(event) {
      prefersReducedMotion = event.matches;
      if (prefersReducedMotion) {
        setMenuState(false);
        setSearchState(false);
      }
    };

    if (typeof reduceMotionQuery.addEventListener === 'function') {
      reduceMotionQuery.addEventListener('change', handleMotionPreferenceChange);
    } else if (typeof reduceMotionQuery.addListener === 'function') {
      reduceMotionQuery.addListener(handleMotionPreferenceChange);
    }
  }

/*---------------------------------------*/
/* Sticky Header Nav                     */
/*---------------------------------------*/

  var $nav = $('.site-header.sticky-nav');
  var $body = $('body.has-sticky-nav');
  var $siteheader = $('.site-header');
  var $beforeHeaderAdvert = $('.tfm-before-header.advert');
  var stickyMetrics = calculateStickyMetrics();
  var stickyState = { fixed: null };

  function calculateStickyMetrics() {
    if (!$nav.length || !$body.length) {
      return { enabled: false, scrollTop: 0, marginFix: 0 };
    }

    var navInner = $(".site-header.sticky-nav .site-header-inner");
    var navHeight = navInner.length && navInner.is(':visible') ? navInner.outerHeight() : $(".site-header.sticky-nav .mobile-header").outerHeight();
    var advertHeight = $body.hasClass("has-tfm-ad-before-header") && $beforeHeaderAdvert.length ? $beforeHeaderAdvert.outerHeight() : 0;
    var headerHeight = $nav.outerHeight();
    var logoHeight = headerHeight - navHeight;
    var scrollTopValue = $body.hasClass("has-tfm-ad-before-header") ? (logoHeight + advertHeight) : logoHeight;
    var marginFixValue = $body.hasClass("has-tfm-ad-before-header") ? (headerHeight + advertHeight) : headerHeight;

    if (
      !$body.hasClass("has-tfm-ad-before-header") &&
      !$body.hasClass("has-tfm-ad-after-header") &&
      !$body.hasClass("sidebar-side") &&
      !$body.hasClass("post-style-default-alt") &&
      (
        $body.hasClass("has-full-width-media") ||
        ($body.hasClass("has-tfm-hero") && $body.hasClass("tfm-hero-fullwidth") && !$body.hasClass("tfm-hero-has-margins"))
      ) &&
      !$body.hasClass("has-full-width-header") &&
      $siteheader.hasClass("overlay-header") &&
      ($siteheader.hasClass("logo-left-menu-right") || $siteheader.hasClass("logo-split-menu"))
    ) {
      marginFixValue = marginFixValue - headerHeight;
    }

    if (
      !$body.hasClass("has-tfm-hero") &&
      $body.hasClass("has-tfm-post-blocks") &&
      $body.hasClass("first-block-can-overlay") &&
      !$body.hasClass("has-full-width-header") &&
      $siteheader.hasClass("overlay-header") &&
      ($siteheader.hasClass("logo-left-menu-right") || $siteheader.hasClass("logo-split-menu"))
    ) {
      marginFixValue = marginFixValue - headerHeight;
    }

    if ($body.hasClass("has-tfm-hero") && !$siteheader.hasClass("logo-below-nav")) {
      if (advertHeight !== 0) {
        var heroWrapper = $(".tfm-hero-wrapper");
        var advertWrapper = $(".tfm-before-header.advert");
        if (heroWrapper.length && advertWrapper.length) {
          marginFixValue = heroWrapper.offset().top - advertWrapper.offset().top;
        }
        if ($body.hasClass("has-tfm-ad-after-header")) {
          marginFixValue = headerHeight + advertHeight;
        }
      } else {
        var heroWrapperNoAd = $(".tfm-hero-wrapper");
        var siteHeaderOffset = $(".site-header");
        if (heroWrapperNoAd.length && siteHeaderOffset.length) {
          marginFixValue = heroWrapperNoAd.offset().top - siteHeaderOffset.offset().top;
        }
        if ($body.hasClass("has-tfm-ad-after-header")) {
          marginFixValue = headerHeight;
        }
      }
    }

    return {
      enabled: true,
      scrollTop: scrollTopValue,
      marginFix: marginFixValue
    };
  }

  function setAdvertVisibility(visible) {
    if (!$beforeHeaderAdvert.length) {
      return;
    }

    if (prefersReducedMotion) {
      $beforeHeaderAdvert[visible ? 'show' : 'hide']();
    } else {
      $beforeHeaderAdvert.stop(true, true)[visible ? 'fadeIn' : 'fadeOut'](200);
    }
  }

  function applyStickyState() {
    if (!stickyMetrics.enabled) {
      return;
    }

    var shouldStick = $(window).scrollTop() > stickyMetrics.scrollTop;

    if (shouldStick === stickyState.fixed) {
      return;
    }

    stickyState.fixed = shouldStick;

    if (shouldStick) {
      $nav.addClass("fixed").css("margin-top", "-" + stickyMetrics.marginFix + "px");
      $body.addClass("body-fix").css("margin-top", stickyMetrics.marginFix + "px");
      setAdvertVisibility(false);
    } else {
      $nav.removeClass("fixed").css("margin-top", "");
      $body.removeClass("body-fix").css("margin-top", "");
      setAdvertVisibility(true);
    }
  }

  var handleStickyScroll = throttleFrame(applyStickyState);
  $(window).on('scroll', handleStickyScroll);
  handleStickyScroll();

  var updateStickyMetrics = debounce(function() {
    stickyMetrics = calculateStickyMetrics();

    if (!stickyMetrics.enabled) {
      stickyState.fixed = null;
      $nav.removeClass("fixed").css("margin-top", "");
      $body.removeClass("body-fix").css("margin-top", "");
      setAdvertVisibility(true);
      return;
    }

    stickyState.fixed = null;
    applyStickyState();
  }, 150);

  $(window).on('resize', updateStickyMetrics);


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

  var $colorModeToggle = $(".toggle-color-mode");
  $colorModeToggle.attr("aria-pressed", $("body").hasClass("tfm-dark-mode") ? "true" : "false");

  //add toggle
  $colorModeToggle.on("click", function() {
    var isPressed = $(this).attr("aria-pressed") === "true";

    if ($("body").hasClass("tfm-dark-mode")) {
      $("body").removeClass("tfm-dark-mode");
      $("body").addClass("tfm-light-mode");
      localStorage.setItem("tfm-color-mode", "tfm-light-mode");
    } else {
      $("body").addClass("tfm-dark-mode");
      $("body").removeClass("tfm-light-mode");
      localStorage.setItem("tfm-color-mode", "tfm-dark-mode");
    }

    $colorModeToggle.attr("aria-pressed", (!isPressed).toString());
  });

/*---------------------------------------*/
/* Slide Menu Sidebar                    */
/*---------------------------------------*/

var $mobileNavigation = $(".mobile-navigation");
var $menuOverlay = $(".menu-overlay");
var $menuToggleButtons = $(".toggle-menu");

function setMenuState(expanded) {
  $mobileNavigation.toggleClass("show", expanded);
  $menuToggleButtons.attr("aria-expanded", expanded.toString());

  if (!$menuOverlay.length) {
    return;
  }

  if (prefersReducedMotion) {
    $menuOverlay[expanded ? 'show' : 'hide']();
    return;
  }

  if (expanded) {
    $menuOverlay.stop(true, true).fadeIn(400);
  } else {
    $menuOverlay.stop(true, true).fadeOut(400);
  }
}

$menuToggleButtons.on("click", function() {
  var expanded = $(this).attr("aria-expanded") === "true";
  setMenuState(!expanded);
});

$(".toggle-sidebar.mobile-navigation .close-menu span, .menu-overlay").on("click", function() {
  setMenuState(false);
});

// Expand the parent/child menu
$('ul.primary-nav-sidebar li.menu-item-has-children > span.expand').on('click', function(event) {
    event.preventDefault();
   var $submenu = $(this).next('.sub-menu');
   if (prefersReducedMotion) {
     $submenu.toggle();
   } else {
     $submenu.slideToggle(200);
   }
   $submenu.toggleClass("visible");
   $(this).toggleClass("close");
});

/*---------------------------------------*/
/* Search sidebar                        */
/*---------------------------------------*/

var $searchPanel = $(".site-search");
var $searchToggleButtons = $(".toggle-search[aria-controls='toggle-search-sidebar']");
var searchFadeDuration = 300;

function setSearchState(expanded) {
  $searchPanel.toggleClass("show-search", expanded);

  if (!$searchPanel.length) {
    return;
  }

  if (expanded) {
    if (prefersReducedMotion) {
      $searchPanel.show();
    } else {
      $searchPanel.stop(true, true).fadeIn(searchFadeDuration);
    }
    $searchPanel.find(".search-field").trigger("focus");
  } else {
    if (prefersReducedMotion) {
      $searchPanel.hide();
    } else {
      $searchPanel.stop(true, true).fadeOut(searchFadeDuration);
    }
    $searchPanel.find(".search-field").trigger("blur");
  }

  $searchToggleButtons.attr("aria-expanded", expanded.toString());
}

$searchToggleButtons.on("click", function() {
  var expanded = $(this).attr("aria-expanded") === "true";
  setSearchState(!expanded);
});

$(".site-search  .close-menu span").on("click", function() {
  setSearchState(false);
});

$(".sub-message-404 .toggle-search").on("click", function() {
  setSearchState(true);
});

/*---------------------------------------*/
/* ESC key close of open toggle elements */
/*---------------------------------------*/

$(document).keyup(function(e) { 
        if (e.keyCode == 27) { // esc keycode
            if($searchPanel.hasClass("show-search")) {
                setSearchState(false);
            }
            if($mobileNavigation.hasClass("show")) {
               setMenuState(false);
            }
        }
    });

/*---------------------------------------*/
/* smooth scroll to top                  */
/*---------------------------------------*/
$(".backtotop").on('click', function(event){
    event.preventDefault();
    if (prefersReducedMotion) {
      window.scrollTo(0, 0);
      return;
    }
    $('html, body').animate({ scrollTop: 0 }, 500);
});
/*---------------------------------------*/
/* Back to Top Pop Up Link               */
/*---------------------------------------*/
// browser window scroll (in pixels) after which the "back to top" link is shown milliseconds
    var offset = 1200,
        scroll_top_duration = 100,
        $back_to_top = $('.goto-top');

    var updateBackToTopVisibility = throttleFrame(function() {
      if ($(window).scrollTop() > offset) {
        $back_to_top.addClass("visible");
      } else {
        $back_to_top.removeClass("visible");
      }
    });

    $(window).on('scroll', updateBackToTopVisibility);
    updateBackToTopVisibility();
/*---------------------------------------*/
/* smooth scroll anchor links            */
/*---------------------------------------*/
$(document).on('click', 'a[href^="#comments"], a[href^="#reviews"]', function (event) {
    event.preventDefault();

    var $target = $($.attr(this, 'href'));
    if (!$target.length) {
      return;
    }

    var destination = $target.offset().top;

    if (prefersReducedMotion) {
      window.scrollTo(0, destination);
      return;
    }

    $('html, body').animate({ scrollTop: destination }, 800);
});

/*---------------------------------------*/
/* Toggle comments                       */
/*---------------------------------------*/

var $commentsWrapper = $('#comments');

$('.toggle-comments').on('click', function() {
   if (prefersReducedMotion) {
     $commentsWrapper.toggle();
   } else {
     $commentsWrapper.slideToggle(400);
   }
   $commentsWrapper.toggleClass("open");
   $(this).toggleClass("close");
});
// Comments anchor link open and reset toggle comments
$('.entry-meta-comment-count a').on('click', function() {
   if (!$commentsWrapper.hasClass("open") ) {
    if (prefersReducedMotion) {
      $commentsWrapper.show();
    } else {
      $commentsWrapper.slideToggle(400);
    }
    $commentsWrapper.addClass("open");
    $('.toggle-comments').toggleClass("close");
   }
});
$('.comments-pagination a.page-numbers').on('click', function() {
   if ($commentsWrapper.hasClass("close") ) {
    if (prefersReducedMotion) {
      $commentsWrapper.show();
    } else {
      $commentsWrapper.slideToggle(400);
    }
    $commentsWrapper.toggleClass("close");
    $('.toggle-comments').toggleClass("open");
   }
});

  var enhancementsLoaded = false;
  function loadEnhancements() {
    if (enhancementsLoaded) {
      return;
    }

    enhancementsLoaded = true;

    if (prefersReducedMotion) {
      return;
    }

    var baseUrl = (window.TFM_THEME && window.TFM_THEME.baseUrl) ? window.TFM_THEME.baseUrl : '';

    if (!baseUrl) {
      return;
    }

    var enhancementStyles = [
      document.getElementById('tfm-graphic-enhancements-css'),
      document.getElementById('tfm-cool-graphics-css')
    ];

    enhancementStyles.forEach(function(styleEl) {
      if (styleEl && styleEl.media === 'print') {
        styleEl.media = 'all';
      }
    });

    var script = document.createElement('script');
    script.src = baseUrl + 'js/visual-enhancements.js';
    script.defer = true;
    script.setAttribute('data-tfm-enhancements', 'true');
    document.documentElement.appendChild(script);
  }

  if ('requestIdleCallback' in window) {
    requestIdleCallback(loadEnhancements);
  } else {
    window.addEventListener('load', loadEnhancements, { once: true });
  }

});

