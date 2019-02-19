;(function(obj, undefined){
	"use strict";

	var id = "nav",
	color = "dark",
	trace = site.utilities.trace,
    utils = site.utils,
    menuOpen = false,
    dom = {},
    navCollapsed = false,
    breakPoint = "";

	function init() {

        render();    
    }

    function render() {

    	
        trace.log(id+" render utils.getBreakPoint = "+utils.getBreakPoint());

        dom.menuBtn = $("#menu-btn");
        dom.scheduleBtn = $("#schedule-btn");
        dom.photoBtn = $("#photo-btn");  
        dom.navBtns = $("#nav-btns");    

        dom.menuBtn.click(function(event) {
            openMenu();
        });

        dom.scheduleBtn.click(function(event) {
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

	site.nav = {
	};

	$(function(){
		init();
	});

})(window.site=window.site || {});
