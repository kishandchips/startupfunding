!function($){var e={vars:{},w:$(window),init:function(){e.vars.header=$("#header"),e.vars.body=$("body"),this.header.init(),this.isotope.init(),this.slider.init(),e.w.on("load",function(){e.match.init()})},header:{element:$("#header"),init:function(){var t=e.header.element;if(t.length){var i=e.vars.header;$("#js-menu").on("click",function(){i.toggleClass("visible")})}}},isotope:{element:$("#isotope"),init:function(){var t=e.isotope.element;if(t.length){var i=$("#article-filters select");t.isotope({itemSelector:"article",layoutMode:"fitRows"}),i.on("change",function(){var e=$(this).val();t.isotope({filter:e})})}}},match:{element:$(".match-elements"),init:function(){var t=e.match.element;t.length&&$(".match-height").matchHeight()}},slider:{element:$(".slider"),init:function(){var t=e.slider.element;t.length&&t.owlCarousel({items:1,loop:!0,nav:!0,navText:[],navSpeed:1e3,dots:!0,autoHeight:!0})}}};window.main=e,$(function(){window.main.init()})}(jQuery);