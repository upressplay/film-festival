(function(site){
	"use strict";

	var id = "official-selections",
	trace = site.utilities.trace,
	utils = site.utils,
    dom = {},
    genre = "",
    year = "",
    currentTag = "";

	function init() {

		render();    
	}

	function render() {

		trace.log(id+" render utils.getBreakPoint = "+utils.getBreakPoint());

		dom.years = $("#years");
		dom.genres = $("#genres");
        dom.form = $("form");


       
		dom.years.on('change', function()
        {
            year = this.value;
        });

		dom.genres.on('change', function()
        {
            genre = this.value;
        });

	}

	/*
		openMenu opens and closes the mobile nav
	 */
	function filter() {
        var url = '/official-selection/';
        if(genre != "") {
            url = url + '?tag='+genre;
        }
        if(year != "") {
            if(genre != "") {
                url = url + '&';
            } else {
                url = url + '?';   
            }
            url = url + 'tag='+year;
        }
        window.open(url, "_self");
    }

	site.official_selections = {
	};

	$(function(){
		init();
	});

})(window.site=window.site || {});
