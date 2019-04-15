;(function(obj, undefined){
	"use strict";

	var id = "overlay",
	data = [],
	dom = {},
	trace = site.utilities.trace,
	utils = site.utils,
	current = 0,
	next = 0,
	nextContent = {},
	currentContent = {},
	videos = {},
	photos = [],
	overlayOpen = false;

	function init() {

		videos = {'current':-1,'next':-1, 'content':[]};
		photos = {'current':-1,'next':-1, 'content':[]};
		
		render();

	}

	function render() {

		dom.site = $("#site");
		trace.log(id+" render!");
		dom.videos = $( ".videos" );
		dom.videos.each(function( index ) {
			
			var btn = $(this);
			btn.attr('data-id',index);
			btn.click(function(event) {
				event.preventDefault();
                openOverlay(index,videos);
            });
			videos.content.push(btn);

		});
		trace.log('dom.videos'+dom.videos);

		dom.gallery = $( ".photos" );
		dom.gallery.each(function( index ) {

			var btn = $(this);
			btn.attr('data-id',index);
			btn.click(function(event) {
				event.preventDefault();
                openOverlay(index,photos);
            });
			photos.content.push(btn);
		});

		dom.overlay = $('.overlay');
		dom.closeBtn = dom.overlay.find('.close-btn');
		dom.closeBtn.click(function(event) {
            closeOverlay();
        });

        dom.holder = dom.overlay.find('.holder');
        dom.content = dom.overlay.find('.content');

        dom.left = dom.overlay.find('.left');
        dom.right = dom.overlay.find('.right');

        dom.left.click(function(event) {
            nextOverlay('left');
        });
        dom.right.click(function(event) {
            nextOverlay('right');
        });

		dom.overlay.on('swipeleft', function(e){
			trace.log('left');
			nextOverlay('left');
		}).on('swiperight', function(e){
			trace.log('right');
			nextOverlay('right');
		});

	}
	function nextOverlay(direction) {
		trace.log('next direction = '+direction);
		if(direction == "right") {
			next = current +1;
		} else {
			next = current -1;
		}
		trace.log('currentContent.length = '+currentContent.content.length);
		if(next > currentContent.content.length-1) {
			next = 0;
		}
		if(next < 0) {
			next = currentContent.content.length-1;
		}
		trace.log('next = '+next);
		closeContent(next);

	}
	

	function openOverlay(id,type) {
		trace.log('openOverlay id '+id);
		overlayOpen = true;

		currentContent = type;
		
		openContent(id);
		dom.overlay.addClass('active');
	}

	function closeOverlay() {
		overlayOpen = false;
		trace.log('closeOverlay');
		dom.overlay.removeClass('active');
		dom.content.html('');
		//closePost();	
	}

	function openContent(id) {
		trace.log('openContent id = '+id);
		var entry = currentContent.content[id];		

		var hires = entry.attr('data-hires');
		var vidid = entry.attr('data-vidid');
		var width = parseInt(entry.attr('data-hires-w'));
		var height = parseInt(entry.attr('data-hires-h'));
		trace.log("width = "+width+" height = "+height);
		if(height >= width) {
			dom.content.addClass('tall');
		} else {
			trace.log('remove tall')
			dom.content.removeClass('tall');	
		}
		current = id;
		trace.log("hires = "+hires+" vidid = "+vidid);

		if(vidid != undefined && vidid != "") {
			trace.log("this is a video");
			dom.content.html('');
			dom.content.html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+vidid+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
			dom.content.addClass('videos');
		} else {
			dom.content.removeClass('videos');	
		}

		if(hires != undefined && hires != "") {
			trace.log("this is a photo");
			dom.content.html('');
			dom.content.html('<img src="'+hires+'"/>');
		}

		dom.content.addClass('active');
	}

	function closeContent(id) {
		trace.log("closeContent "); 
		dom.content.removeClass('active');
		openContent(id);
	}

	function hidePost() {
		trace.log("hidePost"); 


	}


	// Public API definitions
	site.overlay = {

	};

	$(function(){
		init();
	});
})(window.site=window.site || {});
