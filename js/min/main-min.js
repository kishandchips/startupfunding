!function($){var i={vars:{},w:$(window),init:function(){i.vars.header=$("#header"),i.vars.body=$("body"),this.header.init(),this.slider.init(),i.w.on("load",function(){})},header:{element:$("#header"),init:function(){var n=i.header.element;if(n.length){var e=i.vars.header;$("#js-menu").on("click",function(){e.toggleClass("visible")})}}}};window.main=i,$(function(){window.main.init()})}(jQuery);