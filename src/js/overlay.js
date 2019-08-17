(function(site){
	"use strict";

	var id = "overlay",
	dom = {},
	trace = site.utilities.trace,
	current = 0,
	next = 0,
	currentContent = {},
	videos = {},
	photos = [];

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
			btn.click(function() {
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

			btn.click(function() {
				event.preventDefault();
                openOverlay(index,photos);
            });

			photos.content.push(btn);
		});

		dom.overlay = $('.overlay');
		dom.closeBtn = dom.overlay.find('.close-btn');
		dom.closeBtn.click(function() {
            closeOverlay();
        });

        dom.holder = dom.overlay.find('.holder');
        dom.content = dom.overlay.find('.content');

        dom.left = dom.overlay.find('.left');
        dom.right = dom.overlay.find('.right');

        dom.left.click(function() {
            nextOverlay('left');
        });
        dom.right.click(function() {
            nextOverlay('right');
        });

		dom.overlay.on('swipeleft', function(){
			trace.log('left');
			nextOverlay('left');
		}).on('swiperight', function(){
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

		currentContent = type;
		
		openContent(id);
		dom.overlay.addClass('active');
	}

	function closeOverlay() {
		trace.log('closeOverlay');
		dom.overlay.removeClass('active');
		dom.content.html('');
		//closePost();	
	}

	function openContent(id) {
		trace.log('openContent id! = '+id);

		var entry = currentContent.content[id];		

		var hires = entry.attr('data-hires');
		var vidid = entry.attr('data-vidid');
		var vidYouTubeId = entry.attr('data-youtube-vidid');
		var vidVimeoId = entry.attr('data-vimeo-vidid');
		var width = parseInt(entry.attr('data-hires-w'));
		var height = parseInt(entry.attr('data-hires-h'));
		var url = entry.attr('href');

		trace.log("url = "+url);
		trace.log("width = "+width+" height = "+height);

		if(height >= width) {
			dom.content.addClass('tall');
		} else {
			trace.log('remove tall')
			dom.content.removeClass('tall');	
		}
		
		current = id;

		trace.log("vidYouTubeId = "+vidYouTubeId+" vidVimeoId = "+vidVimeoId);

		if(vidYouTubeId != undefined && vidYouTubeId != "") {
			trace.log("this is a youtube video");
			dom.content.html('');
			dom.content.html('<iframe src="https://www.youtube.com/embed/'+vidYouTubeId+'" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
			dom.content.addClass('videos');
		} else {
			dom.content.removeClass('videos');	
		}

		if(vidVimeoId != undefined && vidVimeoId != "") {
			trace.log("this is a vimeo video");
			dom.content.html('');
			dom.content.html('<iframe src="https://player.vimeo.com/video/'+vidVimeoId+'" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>');
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


	// Public API definitions
	site.overlay = {

	};

	$(function(){
		init();
	});
})(window.site=window.site || {});
