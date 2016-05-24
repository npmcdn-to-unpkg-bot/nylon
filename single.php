<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */

get_header(); ?>
 
    <div class="container main-content">
    
        <div class="row">
            <div class="col-xs-12 single-top">
            
            
            <?php while ( have_posts() ) : the_post(); ?>
            
			<?php
                $category = get_the_category(); 
                //echo $category[0]->cat_name;
                
                if ($category[0]->cat_name <> 'Photos') { //remove this part if Photos
            ?>
                
                <div class="text-center bigimage">
				
                <?php
				
                    if (function_exists('camera_meta_slideshow')) {
                        $meta_camera = get_post_custom( $post->ID );
                        if(isset($meta_camera['camera_meta_slideshow']) && $meta_camera['camera_meta_slideshow'][0] <> 'none'){
                        	//echo $meta_camera['camera_meta_slideshow'][0];
							echo camera_meta_slideshow($meta_camera['camera_meta_slideshow'][0]);
                        } else {
							the_post_thumbnail();
						}
					}				
				
                ?>
				
                </div>
                
            <?php
				} // if ($category[0]->cat_name <> 'Photos')
            ?>   
            	
                <div class="row">
            		<div class="col-xs-12 single">
                
                    <div class="main-title">
					<?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?></div>
                    
                    <br>
                    
                    <?php if ($category[0]->cat_name <> 'Photos') { //remove this part if Photos ?> 
                    <p><?php the_date(); ?></p>
                    <?php } // if ($category[0]->cat_name <> 'Photos') ?> 
                    
                    <?php the_content(); ?>
                    
                    <br>
                    
                    <div class="post-navs clearfix">
                <div class="col-md-4 col-xs-4 text-left no-left-padding">
                    <?php if(get_previous_post()) : ?><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/prev.svg" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/img/prev.png'" /> &nbsp; <?php previous_post_link( '%link', 'Previous' ); ?>
                           
                    <?php endif; ?>
                </div>
                    <div class="col-md-4 col-xs-4 text-center"></div>
                <div class="col-md-4 col-xs-4 text-right no-right-padding"><?php if(get_next_post()) : ?><?php next_post_link( '%link', 'Next' ); ?> &nbsp; <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/prev.svg" onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/img/next.png'" />
                   <?php endif; ?>
          </div>
                </div>
                    
                    <hr>
                    
                    

                    
                    <div class="relatedposts">
<h2 class="section-title">You might also like...</h2>
<?php
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
     
    if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>4, // Number of related posts to display.
    'caller_get_posts'=>1
    );
     
    $my_query = new wp_query( $args );
 ?>
 
 <div class="row">
 
 <?php
    while( $my_query->have_posts() ) {
    $my_query->the_post();
    ?>
     
    <div class="col-md-3 relatedthumb">
      
		 <?php  if (is_mobile()) { ?>
                        
                        <div class="featured-image-mobile"> <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'single-main-custom-size' );  ?></a></div>

  <?php  } else { ?>
                       <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'homepage-blog-custom-size' );  ?></a>
<?php } ?>
        
          <h3><a href="<?php echo get_permalink(); ?>"><?php the_title() ;?></a></h3>
    </div>
     
    <? 
	}
	?>
	</div>
   <?php }
    $post = $orig_post;
    wp_reset_query();
    ?>
</div>

<hr />
<br />
    
                    <?php 
                    
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
              
                    <?php endwhile; // end of the loop. ?>
            
            
                    </div><!-- /col-xs-12 -->    
                </div><!-- /row -->
            	
                                 
            </div><!-- /col-xs-12 -->    
        </div><!-- /row -->
        
    </div><!-- /container main-content -->

<?php get_footer(); ?>
