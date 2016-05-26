   
    <div class="container">
    
    	<div class="row">
            <div class="col-xs-12">
            	<div class="footer-banner">
            		<?php get_sidebar('bottombanner'); ?>
                </div>
            </div>   
        </div>
        
    </div>
    
    <div class="footerfullbg">
    
        <div class="container footer">
    
             <div class="row addpad">
                <div class="col-xs-12">
                    <div class="footer-content">
                        
                        <div class="row">
                            <div class="col-xs-12">
                            <img src="<?php bloginfo( 'template_directory' ); ?>/img/footer-logo.jpg" width="408" height="40" /> 
                            </div>        
                        </div>
                        
                        <br>
                        
                        <div class="row">
                            <div class="col-xs-2 footerlinks">
                            <a href="/">Home</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog.html">Blog</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog/fashion.html">Fashion</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog/beauty.html">Beauty</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog/radar.html">Radar</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog/culture-club.html">Culture Club</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog/tech.html">Tech</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/blog/nylon-guys.html">Nylon Guys</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/photos.html">Photos</a><br />
                            
                            </div>
                            
                            <div class="col-xs-5 footerlinks">
                            <a href="http://www.youtube.com/user/nylonsg" target="_blank">Nylon TV</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/the-magazine.html">The Magazine</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/the-look.html">The Look</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/about-nylon-singapore.html">About NYLON SINGAPORE</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/advertise.html">Advertise</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/privacy-policy.html">Privacy Policy</a><br />
                            <a href="<?php bloginfo( 'url' ); ?>/about-nylon-singapore.html#contactus">Contact Us</a><br />
                            <!--<a href="<?php bloginfo( 'url' ); ?>/feed">RSS</a><br />-->
                            <!--<a href="<?php bloginfo( 'url' ); ?>/newsletter.html">Newsletter</a><br />-->
                            &copy;2015 New Media Investments (Asia)<br />Pte Ltd. All Rights Reserved.
                           

                            </div>
                        </div>
                        
                        
                        <?php //wp_nav_menu( array( 'container' => '', 'theme_location' => 'footer-menu', 'menu_class' => 'list-unstyled footer-list' ) ); ?>	
                           
                    </div><!--/ footer-content-->
                </div>  <!--/ col-xs-12-->
            </div><!--/ row addpad-->
            
        </div><!--/ container footer-->
    
    </div><!--/ footerfullbg-->
    

<div id="mobile-footer">

<div class="col-md-12 hidden-md hidden-lg"> 

<div class="socialbutton"><a href="http://www.facebook.com/nylonsg" target="_blank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/facebook.png" width="40" height="40"></a></div> 
<div class="socialbutton"><a href="http://www.twitter.com/nylonsg" target="_blank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/twitter.png" width="41" height="40"></a></div>  

<div class="socialbutton"><a href="http://www.youtube.com/user/nylonsg" target="_blank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/youtube.png" width="41" height="40"></a></div> 

<div class="socialbutton"><a href="http://www.instagram.com/nylonsg" target="_blank"><img src="<?php bloginfo( 'template_directory' ); ?>/img/instagram.png" width="40" height="40"></a></div>                                           

</div>    

</div>		

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script src="<?php bloginfo( 'template_directory' ); ?>/js/wideslider.js"></script>	
<?php if ($GLOBALS["categoryname"] == 'Street Snap' or $GLOBALS["categoryname"] == 'The Magazine') { ?>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.fancybox.js"></script><?php } ?>
<script language="javascript" type="text/javascript">		$(document).ready(function() {						<?php if ($GLOBALS["categoryname"] == 'Street Snap' or $GLOBALS["categoryname"] == 'The Magazine') { //appear if Street Snap ?>							$(".fancybox").fancybox({				beforeShow : function() {					var alt = this.element.find('img').attr('alt');										this.inner.find('img').attr('alt', alt);										this.title = alt;				},								helpers : {					title: {						type: 'inside',						position: 'bottom'					}				},				nextEffect: 'fade',				prevEffect: 'fade'			});						<?php } // if ($category[0]->cat_name <> 'Photos') ?> 					});			</script>

<?php wp_footer(); ?>
<?php if(is_front_page()): ?>

<?php
$popup = get_option('popup_video');
$expiry = get_option('video_expiry');

if(strtotime($expiry)>strtotime("now")) {

if($popup == 1):
 get_template_part('video'); 
 endif;
 
}
 ?>
<?php endif; ?>
<script type="text/javascript"> 
/* *  Fixed Header */
jQuery(window).scroll(function() {     
 if(jQuery(window).scrollTop() > 40) {		
 jQuery('.navpos .navigation, .main-logo').addClass( "fixed" ); 
  }    
  else { 	
  jQuery('.navpos .navigation, .main-logo').removeClass("fixed");  
   }});
   
   
   
   
   
   
   /* *  Fixed Add banners */
jQuery(window).scroll(function() {     
 if(jQuery(window).scrollTop() > 620) {		
 jQuery('.ads-type2, .ads-type1').addClass( "fixed" ); 
  }    
  else { 	
  jQuery('.ads-type2, .ads-type1').removeClass("fixed");  
   }});

</script>
   

<script type="text/javascript">
jQuery(document).ready(function() {  
$width= jQuery(window).width();  
$ad_width= Math.round(($width - 1024)/2); 
if($ad_width < 50){   
jQuery('.ads-type1, .ads-type2').css('display','none'); 
}
else  
{ 
 jQuery('.ads-type1').css({'width':$ad_width, 'margin-left':-$ad_width});
   jQuery('.ads-type2').css({'width':$ad_width, 'margin-right':-$ad_width});  
}
   
     jQuery('.show-mobile-search').click(function(){            
	 jQuery('.searchbox.mobile').toggle();	  	  
	 if (jQuery(".mega-menu-toggle").hasClass("mega-menu-open")) {  jQuery(".mega-menu-toggle").trigger('click');}});  
	 jQuery('#mobile-nav-trigger').click(function(){	  jQuery('.searchbox.mobile').removeClass('showsearch', 1000);  });   
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


/* Reload web page */

var winWidth = jQuery(window).width();


jQuery(window).resize(function(){
	
	var NewwinWidth = jQuery(window).width();
    

if(winWidth!=NewwinWidth)
 
 {						   
     window.location.href = window.location.href;
 }

}); 

</script>  </body></html>