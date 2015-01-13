(function($){

	var main = {
		
		vars: {},
		w : $(window),

		init: function(){

			main.vars.header = $('#header'),
			main.vars.body = $('body'),

			this.header.init();
			this.isotope.init();
			this.slider.init();
			
			main.w.on('load', function(){
				main.match.init();
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

		isotope: {
			element: $('#isotope'),

			init: function(){
				var element = main.isotope.element;
				if(!element.length){return;}

				var select = $('#article-filters select');

				element.isotope({
				  itemSelector: 'article',
				  layoutMode: 'fitRows'
				});

				select.on('change', function() {
					var filterValue = $(this).val();
				  element.isotope({ filter: filterValue });
				});
			}
		},// main.isotope

		match: {
			element: $('.match-elements'),

			init: function(){
				var element = main.match.element;
				if(!element.length){return;}

				$('.match-height').matchHeight();
			}

		},// main.match

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
				});
			}
		},// main.slider

	};//main

	window.main = main;

	$(function(){
		window.main.init();

	});
	
})(jQuery);