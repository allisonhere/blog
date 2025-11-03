jQuery( document ).ready( function() {

	"use strict";
	
	// var container = document.querySelector('.masonry-container');
	//create empty var msnry
	// var msnry;
	// initialize Masonry after all images have loaded
	// imagesLoaded( container, function() {
	//     msnry = new Masonry( container, {
	//         itemSelector: '.masonry-container .article',
	//         columnWidth: '.masonry-container .article',  
	//     });
	// });


	// test

var elements = document.getElementsByClassName('masonry-container');
var msnry;

imagesLoaded( document.querySelector('body'), function() {
  // init Isotope after all images have loaded
  var n = elements.length;
  for(var i = 0; i < n; i++){
    msnry = new Masonry( elements[i], {
      itemSelector: '.masonry-container .article',
      columnWidth: '.masonry-container .article',
      // gutter: '.gutter-sizer',
      // percentPosition: true,
    });
  }
});

// end test

});