(function($){

	var main = {
		
		vars: {},
		w : $(window),

		init: function(){

			main.vars.header = $('#header'),
			main.vars.body = $('body'),

			this.header.init();
			this.slider.init();
			this.isotope.init();

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

		slider: {
			element: $('.slider'),

			init: function(){
				var element = main.slider.element;
				if(!element.length){return;}

				element.owlCarousel({
				    items: 1,
				    loop: true,
				    nav: true,
				    navText: [],
				    navSpeed: 1000,
				    dots: true,
				    autoHeight: true,
				})
			}
		},// main.slider

		isotope: {
			element: $('#posts'),

			init: function(){
				var element = main.isotope.element;
				if(!element.length){return;}

				element.isotope({
				  itemSelector: 'article',
				  layoutMode: 'fitRows'
				});

				$('#filters select').on('change', function() {
					var filterValue = $(this).val();
				  element.isotope({ filter: filterValue });
				});
			}
		}// main.isotope

	};//main

	window.main = main;

	$(function(){
		window.main.init();

	});
	
})(jQuery);