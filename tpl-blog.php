<?php
/**
 * Template Name: Blog
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */
 
 
 
global $left_ads;
$left_ads = mm_get_ads('blog', 'left');
$right_ads = mm_get_ads('blog', 'right');
$blog_content_ads = mm_get_ads('blog', 'blog_content', 1);

//echo '<pre>';
//print_r($blog_content_ads);
//die();


get_header(); ?>  

<?php

 if(get_field('ad_content_link')){
	 $content_link = get_field('ad_content_link');
 }
 else { $content_link = "#"; }
 
 
if(get_field('ad_content')):	
	
	 $content_image = get_field('ad_content');
						
endif;
 
if(get_field('ad_visibility')){
	 $ad_visibility = get_field('ad_visibility');
 }
 else { $ad_visibility = 3; }
 
$cookie_name = "ad_".$post->ID;

	?>
        
    <div class="container main-content">
    
        <div class="row">
            <div class="col-md-12 contents blog">
            	
                <div class="main-title">
                <?php while ( have_posts() ) : the_post(); ?>
				<?php the_post_thumbnail();  ?>
                <?php endwhile; // end of the loop. ?>
                </div>
                   
                <div class="row addpad2">
					
					<?php rewind_posts(); ?>
					<?php 
					
					global $post;
					global $paged;
					$slug = get_post( $post )->post_name;
					$i = 0;
					
					$my_query = new WP_Query('posts_per_page=12&category_name='.$slug.'&paged='.$paged); 
					
					?>
					<?php if ( $my_query->have_posts() ) : ?>
                    
                    <?php 
                    
                    
                    
                    while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                    
  
                <?php if( $i == 4 or $i == 8 or $i == 12 ) : ?>
                
                
                
                <?php
				
				
						if($_COOKIE[$cookie_name] <= $ad_visibility) :	
						if(!empty($content_image)):
							
					?>
					 
					<div class="adds-row" style="border:0px solid #000;min-height:100px;clear:both;text-align:center;">
               
						<a href="<?php echo $content_link; ?>"><img src="<?php echo $content_image; ?>" /></a>
					</div>
					 
					<?php  endif; endif; ?> 

					
					
					
					
                
                
                </div>
                <div class="row addpad2 no-padding">
                <?php endif; ?>                
     
                    <div class="col-md-3 col-sm-3 blogpost">
                        
                         <?php  if (is_mobile()) { ?>
                        
                        <div class="featured-image-mobile"> <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'single-main-custom-size' );  ?></a></div>

  <?php  } else { ?>
                       <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'homepage-blog-custom-size' );  ?></a>
<?php } ?>
                       
                    <h3><a href="<?php echo get_permalink(); ?>"><?php the_title() ;?></a></h3>
                        <div class="featured-excerpt"> <?php // echo excerpt(20); ?>
                            <p class="more"><a href="<?php echo get_permalink(); ?>">more</a></p></div>
                        <br>
                    </div>
                    
                    <?php $i++ ?>

					<?php endwhile; ?>
                    
                    <?php else: ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                   
                </div><!-- /row --> 
                

                <?php if(!empty($blog_content_ads[$ads_rand])):
                
							$ads_item = $blog_content_ads[$ads_rand];
							$full_img_url = wp_get_attachment_url(get_post_thumbnail_id($ads_item->ID));
							$ads_link = get_post_meta( $ads_item->ID, 'ads_link' );
							$ads_link = $ads_link[0];							

                ?>
					
					<div class="adds-row" style="border:0px solid #000;min-height:100px;clear:both;text-align:center;">
						<a href="<?php echo $ads_link; ?>"><img src="<?php echo $full_img_url; ?>" /></a>
					</div>
					<br /><br /><br />
					
                <?php endif; ?>
                
                
                
                <?php if(function_exists('tw_pagination')) tw_pagination($my_query); ?>
                         
                 
            </div><!-- /col-md-12 contents blog -->
             
            
        </div><!-- /row -->
        
    </div><!-- /container main-content -->

<?php get_footer(); ?>
