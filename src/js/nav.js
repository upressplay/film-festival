(function(site){
	"use strict";

	var id = "nav",
	trace = site.utilities.trace,
	utils = site.utils,
	dom = {};

	function init() {

		render();    
	}

	function render() {

		
		trace.log(id+" render utils.getBreakPoint = "+utils.getBreakPoint());

		dom.menuBtn = $("#menu-btn");
		dom.scheduleBtn = $("#schedule-btn");
		dom.photoBtn = $("#photo-btn");  
		dom.navBtns = $("#nav-btns"); 
		dom.scheduleMenu = $("#schedule-menu");    

		dom.menuBtn.click(function() {
			openMenu();
		});

		dom.scheduleBtn.click(function() {
			openSchedule();
		});

	}

	/*
		openMenu opens and closes the mobile nav
	 */
	function openMenu() {
		trace.push('openMenu');
		dom.navBtns.toggleClass('active');
	}

	function openSchedule() {
		trace.push('openSchedule');
		dom.scheduleMenu.toggleClass('active');
	}

	site.nav = {
	};

	$(function(){
		init();
	});

})(window.site=window.site || {});
