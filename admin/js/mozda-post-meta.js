(function($){
	'use strict';

	$(function(){
		if (typeof $.fn.wpColorPicker === 'function') {
			$('.mozda-color-field').wpColorPicker();
		}
	});
})(jQuery);
