(function() {
    'use strict';

    var reduceMotionQuery = window.matchMedia ? window.matchMedia('(prefers-reduced-motion: reduce)') : null;

    if ((reduceMotionQuery && reduceMotionQuery.matches) || !('IntersectionObserver' in window)) {
        return;
    }

    // Create scroll progress indicator
    var progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    document.body.appendChild(progressBar);

	function updateScrollProgress() {
		var maxScroll = document.documentElement.scrollHeight - document.documentElement.clientHeight;
		var scrolled = maxScroll > 0 ? (window.pageYOffset / maxScroll) * 100 : 0;
		progressBar.style.width = scrolled + '%';
	}

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

	function observeElements() {
		var articles = document.querySelectorAll('.article');
		articles.forEach(function(article, index) {
			article.classList.add('fade-in-up');
			article.style.transitionDelay = (index * 0.1) + 's';
			observer.observe(article);
		});

		var archiveHeaders = document.querySelectorAll('.archive-header');
		archiveHeaders.forEach(function(header) {
			header.classList.add('fade-in-up');
			observer.observe(header);
		});

		var widgets = document.querySelectorAll('.widget');
		widgets.forEach(function(widget) {
			widget.classList.add('fade-in-up');
			observer.observe(widget);
		});
	}

    function init() {
        observeElements();

        var header = document.querySelector('.site-header.glass-header');
        var ticking = false;

        function runScrollTasks() {
            updateScrollProgress();
            if (header) {
                if (window.pageYOffset > 100) {
                    header.classList.add('stuck');
                } else {
                    header.classList.remove('stuck');
                }
            }
            ticking = false;
        }

        function onScroll() {
            if (!ticking) {
                ticking = true;
                if (window.requestAnimationFrame) {
                    window.requestAnimationFrame(runScrollTasks);
                } else {
                    setTimeout(runScrollTasks, 16);
                }
            }
        }

        runScrollTasks();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init, { once: true });
    } else {
		init();
	}
})();
