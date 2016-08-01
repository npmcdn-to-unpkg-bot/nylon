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
                    
                    <div class="col-md-3 col-sm-3 blogpost">

                            <div class="featured-image">  <?php if (is_mobile()) { ?>

                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a> 

                                <?php } else { ?>



                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('page-photos-custom-size'); ?></a>
                                <?php } ?>


                                <div class="cat-label">
                                    <?php
                                    $category = get_the_category();
                                    foreach ($category as $termid) {

                                        if ($termid->term_id != 3):
                                            echo "<span class='blog-cat-title'>" . $termid->name . "</span> | ";
                                            break;
                                        endif;
                                    }



                                    if (strtotime(get_the_date('Y-m-d')) == strtotime(date('Y-m-d'))) {

                                        echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
                                    } else {
                                        echo get_the_date('M j, Y');
                                    }
                                    ?></div></div>

                            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="featured-excerpt"> <?php // echo excerpt(20);                         ?>
                                <p class="more"><a href="<?php echo get_permalink(); ?>">Read More</a></p></div>
                           
                        </div>
     
                    
                    
                    <?php $i++ ?>

					<?php endwhile; ?>

                </div><!-- /row -->
                
                <?php if(function_exists('tw_pagination')) tw_pagination(); ?>
                 
            </div><!-- /col-xs-12 contents blog -->
             
            
        </div><!-- /row -->
        
    </div><!-- /container main-content -->

<?php get_footer(); ?>
