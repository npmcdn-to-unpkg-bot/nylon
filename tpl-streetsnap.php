<?php
/**
 * Template Name: Street Snap
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */

global $categoryname;
$categoryname = 'Street Snap';

get_header(); ?>
        
    <div class="container main-content">
    
        <div class="row">
            <div class="col-md-12 contents photos">
            	
                <div class="main-title">
                <?php while ( have_posts() ) : the_post(); ?>
				<?php the_post_thumbnail();  ?>
                <?php endwhile; // end of the loop. ?>
                </div>
                   
                <div class="row addpad2">
                
				<div id="masonry">
                
					<?php rewind_posts(); ?>
					<?php 

					//global $post;
					//$slug = get_post( $post )->post_name;
					
					global $paged;
					global $my_query;
					
					$my_args = array(
					'posts_per_page'   => 15,
					'offset'           => 0,
					'category_name'    => 'streetsnap',
					'paged'    		   => $paged,
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'post',
					'post_mime_type'   => '',
					'post_parent'      => '',
					'post_status'      => 'publish',
					'suppress_filters' => true );
					
					$my_query = new WP_Query($my_args);
					
					//global $post;
					//$slug = get_post( $post )->post_name;
					
					//$my_query = new WP_Query('posts_per_page=12&category_name=streetsnap'); 
					
					?>
					<?php //while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
                    <?php if ( $my_query->have_posts() ) : ?>
                    
                    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                     
                    <?php 

						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'page-streetsnap-custom-size' );
						$urlthumb = $thumb['0'];
						//echo $thumb['1'];
						//echo $thumb['2'];
					?>
     
                    <figure class="masonryitem">
                    	<a rel="gallery" href="<?php echo $url; ?>" class="fancybox"><img src="<?php echo $thumb['0']; ?>"  alt="<b><?php the_title() ;?></b><?php the_excerpt(); ?>" /></a>
                        <h3><?php the_title() ;?></h3>
                    </figure>
                    
					<?php endwhile; ?>

                	<?php else: ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>

                </div><!-- /row --> 
                
                <br />
                
                <?php if(function_exists('tw_pagination')) tw_pagination($my_query); ?>
                    
   
                    <?php rewind_posts(); ?>
                    <?php while ( have_posts() ) : the_post(); ?>  
                    <?php the_content(); ?>
                    <?php endwhile; ?>
                    
 
				<script src="<?php bloginfo( 'template_directory' ); ?>/js/masonry.pkgd.min.js"></script>
                <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
                <script>
//                var container = document.querySelector('#masonry');
//                var msnry = new Masonry( container, {
//                  // options
//                  columnWidth: 291,
//				  gutter: 30,
//				  isFitWidth: false,
//				  isOriginLeft: true,
//				  isOriginTop: true,
//                  itemSelector: '.masonryitem'
//                });
                
             

var $grid = jQuery('#masonry').imagesLoaded( function() {
  // init Masonry after all images have loaded
  $grid.masonry({
   // options
columnWidth: 291,
				  gutter: 30,
				  isFitWidth: false,
				  isOriginLeft: true,
				  isOriginTop: true,
                  itemSelector: '.masonryitem'
  });
});

				</script>
 
                </div><!-- /row -->
                 
            </div><!-- /col-xs-12 contents blog -->
             
            
        </div><!-- /row -->
        
    </div><!-- /container main-content -->

<?php get_footer(); ?>
