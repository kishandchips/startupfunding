!function($){var e={vars:{},w:$(window),init:function(){e.vars.header=$("#header"),e.vars.body=$("body"),this.header.init(),this.slider.init(),this.isotope.init(),e.w.on("load",function(){})},header:{element:$("#header"),init:function(){var i=e.header.element;if(i.length){var t=e.vars.header;$("#js-menu").on("click",function(){t.toggleClass("visible")})}}},slider:{element:$(".slider"),init:function(){var i=e.slider.element;i.length&&i.owlCarousel({items:1,loop:!0,nav:!0,navText:[],navSpeed:1e3,dots:!0,autoHeight:!0})}},isotope:{element:$("#isotope"),init:function(){var i=e.isotope.element;if(i.length){var t=$("#article-filters select");i.isotope({itemSelector:"article",layoutMode:"fitRows"}),t.on("change",function(){var e=$(this).val();i.isotope({filter:e})})}}}};window.main=e,$(function(){window.main.init()})}(jQuery);