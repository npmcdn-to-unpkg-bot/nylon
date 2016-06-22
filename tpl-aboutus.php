<?php
/**
 * Template Name: About Us
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
                    <iframe width="1024" height="465" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.3614244446328!2d103.84617503437323!3d1.3426769707949313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da176a61849761%3A0x1bc0e458b5ea3142!2s1008+Toa+Payoh+N!5e0!3m2!1sen!2ssg!4v1400386029137"></iframe>	
                </div>

                <div class="row">
                    <div class="col-md-12 single">

                        <div class="main-title">
                            <?php the_post_thumbnail(); ?>
                        </div>

                        <br>

                        <?php the_content(); ?>

                    </div><!-- /col-xs-12 single -->
                </div><!-- /row -->

            <?php endwhile; // end of the loop. ?>


        </div><!-- /col-xs-12 -->    
    </div><!-- /row -->

</div><!-- /container main-content -->

<?php get_footer(); ?>
