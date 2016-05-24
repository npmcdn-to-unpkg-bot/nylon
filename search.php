<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */

get_header(); ?>   
        
    <div class="container main-content">
    
        <div class="row">
            <div class="col-xs-12 contents blog">
            	
                <div class="main-title">
                
				<?php printf( __( 'Search Results for: %s', 'nylonsingapore' ), get_search_query() ); ?>
                </div>
                   
                <div class="row addpad2">
						
					<?php $i = 0; ?>
					<?php while ( have_posts() ) : the_post(); ?>
                    
                    
                <?php if( $i == 4 or $i == 8 or $i == 12 ) : ?>
                </div>
                <div class="row addpad2">
                <?php endif; ?>  
     
                    <div class="col-xs-3">
                    	<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'homepage-blog-custom-size' );  ?></a>
                        
                        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title() ;?></a></h3>
                        <?php echo excerpt(15); ?>
                        <p class="more"><a href="<?php echo get_permalink(); ?>">more</a></p>
                        <br>
                    </div>
                    
                    <?php $i++ ?>

					<?php endwhile; ?>

                </div><!-- /row -->
                
                <?php if(function_exists('tw_pagination')) tw_pagination(); ?>
                 
            </div><!-- /col-xs-12 contents blog -->
             
            
        </div><!-- /row -->
        
    </div><!-- /container main-content -->

<?php get_footer(); ?>
