(function(site){
	"use strict";


	// Cache Modules
	var trace = site.utilities.trace,
	utils = site.utils,
	breakPoint = "";

	function init() {
		render();
	}

	function render() {
		trace.push('render');
	}

	trace.push('yo');

	$(function(){
		init();

	});

	

})(window.site=window.site || {});
