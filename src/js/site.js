(function(site){
	"use strict";


	// Cache Modules
	var trace = site.utilities.trace;

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
