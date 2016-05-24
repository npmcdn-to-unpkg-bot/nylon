<!-- fancybox -->
<script src="http://www.nylon.com.sg/video/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.nylon.com.sg/video/source/jquery.fancybox.css">

<!-- videojs -->
<link href="http://vjs.zencdn.net/5.0/video-js.min.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/5.0/video.min.js"></script>

<script src="http://www.nylon.com.sg/video/jquery.cookie.js" ></script>

<style type="text/css">.fancybox-margin{margin-right:0px;}

.vjs-default-skin .vjs-big-play-button {
  left: 310px !important;
  top: 170px !important;
}


@media screen and (max-width:720px) {
.vjs-default-skin .vjs-big-play-button {
  left: 120px !important;
  top: 60px !important;
}

}

</style>

<?php
$popup = get_option('popup_video');
$mp4_url = get_option('mp4_url');
$ogv_url = get_option('ogv_url');
$wmv_url = get_option('wmv_url');
$webm_url = get_option('webm_url');
$yv_url = get_option('yv_url');
?>

 <p style="display:none;">
  <?php if($yv_url) { ?>
   <a class="yvideo" id="video1" href="<?php echo $yv_url; ?>&autoplay=1">r</a> 
   <?php } else { ?>
   <a class="fancybox video" id="video1" href="<?php echo $mp4_url; ?>" data-width="720" data-height="480"></a><a class="fancybox video" id="video2" href="<?php echo $mp4_url; ?>" data-width="720" data-height="480">video</a>
   <?php } ?>
   </p>


<script>

jQuery(function() {
	
	$w = jQuery( window ).width();
	if($w > 720) {
	$newwidth = 720;	
	$newheight = 480;
	}
	else {
		$newwidth = 321;	
	$newheight = 214;
		
	}
	<?php if($yv_url) { ?>
	jQuery(".yvideo").click(function() {
		jQuery.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'			: 640,
			'height'		: 385,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
			'wmode'				: 'transparent',
			'allowfullscreen'	: 'true'
			}
		});

		return false;
	});
	   <?php } else { ?>

	jQuery('.fancybox.video').click(function(e) {
		e.preventDefault();

		jQuery.fancybox.open({
			content: '<video id="video" width="' + $newwidth + '" height="' + $newheight + '" preload="auto" controls="controls" autoplay="autoplay" class="video-js vjs-default-skin"><source src="<?php echo $mp4_url; ?>" type="video/mp4" /><source src="<?php echo $ogv_url; ?>" type="video/ogg" /><source src="<?php echo $webm_url; ?>" type="video/webm" /><source src="<?php echo $wmv_url; ?>" type="video/wmv" /><div>Your browser does not support the HTML5 video tag.</div></video>',
			afterShow: function() {
				// do this for the dynamically loaded video
				videojs('video', {}, function(){
//					this.on('loadedmetadata', function() {
// seems to be broken due to a bug in the current version
//console.log(this.videoWidth);
//						$('#video').css('width', this.videoWidth);
//						$('#video').css('height', this.videoHeight);
//						$.fancybox.update();
//					});
				});
			},
			beforeClose: function() {
				// if you do not do this the video will keep downloading in the background
				videojs('video').dispose();
			}
		});
	});
	 <?php } ?>

});


jQuery(document).ready(function () {
	
	if (jQuery.cookie('hidevideo') == null) {
			 if( jQuery.cookie('video1') ){
			   setTimeout(function () { jQuery('#video1').trigger('click'); }, 600);
			  
			  
            } 
			 else if( jQuery.cookie('video2') ){
				 setTimeout(function () { jQuery('#video2').trigger('click'); }, 600);
			  
            } 
			else {
				
			jQuery.cookie("video1", 1, { expires : 7 });
			jQuery.cookie("video2", 1, { expires : 14 });
			 setTimeout(function () { jQuery('#video1').trigger('click'); },600);	
			}
			
			//setTimeout(function () { jQuery('.fancybox-close').trigger('click'); },15000);	
			
	 var date = new Date();
     var minutes = 60;
     date.setTime(date.getTime() + (minutes * 60 * 1000));
     jQuery.cookie("hidevideo", 'yes', { expires: date });
		
	}
			
			
			
});


</script>