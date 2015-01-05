(function($){

	var main = {
		
		vars: {},
		w : $(window),

		init: function(){

			main.vars.header = $('#header'),
			main.vars.body = $('body'),

			this.header.init();
			this.slider.init();


			main.w.on('load', function(){

			});

		},

		header: {
			element: $('#header'),

			init: function(){
				var element = main.header.element;
				if(!element.length){return;}

				var header = main.vars.header;

				$('#js-menu').on('click', function(){
					header.toggleClass('visible');
				});

			},

		},// main.header

		// slider: {
		// 	element: $('.flexslider'),

		// 	init: function(){
		// 		var element = main.slider.element;
		// 		if(!element.length){return;}

		// 	}
		// },// main.slider

	};//main

	window.main = main;

	$(function(){
		window.main.init();

	});
	
})(jQuery);