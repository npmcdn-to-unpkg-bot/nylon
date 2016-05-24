<?php
/**
 * The template for displaying all pages
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
            
            <div class="row">
				<div class="col-xs-12 single">
            	
                    <div class="main-title">
                    <?php if(function_exists('the_post_thumbnail')) { ?>
					<?php the_post_thumbnail(); ?>
                    <?php } else { ?>               
                    <?php the_title() ?>
                    <?php } ?>
                    </div>
                    
                    <br>
                                    
                    <?php the_content(); ?>
                       
                    
				</div><!-- /col-xs-12 single -->
            </div><!-- /row -->
        
            <?php endwhile; // end of the loop. ?>
                                 
            </div><!-- /col-xs-12 contents -->
            
            
        </div><!-- /row -->
        
    </div><!-- /container main-content -->

<?php get_footer(); ?>
