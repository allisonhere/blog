(function () {
	'use strict';

	if (!window.mozdaLiveSearch) {
		return;
	}

	var settings = window.mozdaLiveSearch;
	var searchWrapper = document.querySelector('.site-search');
	if (!searchWrapper) {
		return;
	}

var searchField = searchWrapper.querySelector('.search-field');
var resultsContainer = searchWrapper.querySelector('.live-search-results');
var placeholder = resultsContainer ? resultsContainer.querySelector('.live-search-placeholder') : null;
var defaultPlaceholder = placeholder ? placeholder.textContent : (settings.noResults || '');
	var quickLinks = searchWrapper.querySelectorAll('.search-quick-links__item');
	var pendingController = null;
	var debounceTimer;

	function setPlaceholder(message) {
		if (!resultsContainer) {
			return;
		}

		resultsContainer.classList.remove('has-results');
		resultsContainer.innerHTML = '<p class="live-search-placeholder">' + message + '</p>';
	}

	function renderResults(items) {
		if (!resultsContainer) {
			return;
		}

		if (!items.length) {
			setPlaceholder(settings.noResults || '');
			return;
		}

		var list = document.createElement('ul');
		list.className = 'live-search-results__list';

		items.forEach(function (item) {
			var li = document.createElement('li');
			li.className = 'live-search-results__item';

			var link = document.createElement('a');
			link.href = item.url;
			link.className = 'live-search-results__link';

			var title = document.createElement('span');
			title.className = 'live-search-results__title';
			title.textContent = item.title;

			var meta = document.createElement('span');
			meta.className = 'live-search-results__meta';
			meta.textContent = item.date;

			var excerpt = document.createElement('span');
			excerpt.className = 'live-search-results__excerpt';
			excerpt.textContent = item.excerpt;

			link.appendChild(title);
			link.appendChild(meta);
			link.appendChild(excerpt);

			li.appendChild(link);
			list.appendChild(li);
		});

		resultsContainer.classList.add('has-results');
		resultsContainer.innerHTML = '';
		resultsContainer.appendChild(list);
	}

	function performRequest(query) {
		if (pendingController) {
			pendingController.abort();
		}

		pendingController = new AbortController();

		var body = new URLSearchParams();
		body.append('action', 'mozda_live_search');
		body.append('nonce', settings.nonce);
		body.append('query', query);

		fetch(settings.ajaxUrl, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},
			body: body.toString(),
			signal: pendingController.signal
		})
			.then(function (response) {
				if (!response.ok) {
					throw new Error(response.statusText);
				}
				return response.json();
			})
			.then(function (payload) {
				if (payload && payload.success && payload.data && Array.isArray(payload.data.results)) {
					renderResults(payload.data.results);
				} else {
					setPlaceholder(settings.noResults || '');
				}
			})
			.catch(function (error) {
				if (error.name === 'AbortError') {
					return;
				}
				setPlaceholder(settings.noResults || '');
			});
	}

	function handleInput() {
		var value = searchField.value.trim();

		clearTimeout(debounceTimer);

	if (!value) {
		setPlaceholder(defaultPlaceholder);
		return;
	}

	debounceTimer = setTimeout(function () {
		setPlaceholder(settings.searching || defaultPlaceholder);
		performRequest(value);
	}, 220);
	}

	if (searchField) {
		searchField.setAttribute('autocomplete', 'off');
		searchField.addEventListener('input', handleInput);
	}

	if (quickLinks.length) {
		quickLinks.forEach(function (button) {
			button.addEventListener('click', function () {
				if (!searchField) {
					return;
				}

				var term = button.getAttribute('data-search-term') || '';
				searchField.value = term;
				searchField.focus();
				searchField.dispatchEvent(new Event('input', { bubbles: true }));
			});
		});
	}
})();
