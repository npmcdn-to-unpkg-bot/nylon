<?php
/**
 * Template Name: The Look
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */
get_header();
?>

<div class="container main-content">

    <div class="row">
        <div class="col-md-12 single-top">


            <?php while (have_posts()) : the_post(); ?>

                <div class="text-center bigimage">

                    <?php
                    if (function_exists('camera_meta_slideshow')) {
                        $meta_camera = get_post_custom($post->ID);
                        if (isset($meta_camera['camera_meta_slideshow']) && $meta_camera['camera_meta_slideshow'][0] <> 'none') {
                            //echo $meta_camera['camera_meta_slideshow'][0];
                            echo camera_meta_slideshow($meta_camera['camera_meta_slideshow'][0]);
                        } else {
                            the_post_thumbnail();
                        }
                    }
                    ?>

                </div>

                <div class="row">
                    <div class="col-xs-12 single">

                        <br>

    <?php the_content(); ?>

                        <br>

<?php endwhile; // end of the loop.  ?>


                </div><!-- /col-xs-12 -->    
            </div><!-- /row -->


        </div><!-- /col-xs-12 -->    
    </div><!-- /row -->

</div><!-- /container main-content -->

<?php get_footer(); ?>
