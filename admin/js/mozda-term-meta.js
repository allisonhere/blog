(function($){
	'use strict';

	function setImage(id, url) {
		var $field   = $('#mozda_cover_image_id');
		var $preview = $('.mozda-term-image-preview');
		var $remove  = $('.mozda-remove-cover');
		var $button  = $('.mozda-upload-cover');

		$field.val(id || '');

		if (url) {
			$preview.html('<img src="' + url + '" alt="">').show();
			$remove.show();
			$button.text(mozdaTermMeta.change);
		} else {
			$preview.hide().empty();
			$remove.hide();
			$button.text(mozdaTermMeta.choose);
		}
	}

	$(function(){
		var frame;

		$('.mozda-upload-cover').on('click', function(event){
			event.preventDefault();

			if (frame) {
				frame.open();
				return;
			}

			frame = wp.media({
				title: mozdaTermMeta.choose,
				button: {
					text: mozdaTermMeta.choose
				},
				library: {
					type: 'image'
				},
				multiple: false
			});

			frame.on('select', function(){
				var attachment = frame.state().get('selection').first().toJSON();
				var url        = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;
				setImage(attachment.id, url);
			});

			frame.open();
		});

		$('.mozda-remove-cover').on('click', function(event){
			event.preventDefault();
			setImage('', '');
		});

		if (typeof $.fn.wpColorPicker === 'function') {
			$('.mozda-color-field').wpColorPicker();
		}
	});
})(jQuery);
