<?php
/**
 * Template Name: Photos
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */
get_header();
?>

<div class="container main-content">

    <div class="row">
        <div class="col-md-12 contents photos">

            <div class="main-title">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                <?php endwhile; // end of the loop. ?>
            </div>

            <div class="row addpad2">

                <?php rewind_posts(); ?>
                <?php
                global $post;
                global $paged;
                $slug = get_post($post)->post_name;

                $my_query = new WP_Query('category_name=' . $slug . '&posts_per_page=12&paged=' . $paged);
                ?>
                <?php if ($my_query->have_posts()) : ?>

                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <div class="col-md-4 col-sm-4">
        <?php if (is_mobile()) { ?>

                                <div class="featured-image-mobile"> <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a></div>

        <?php } else { ?>
                                <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('page-photos-custom-size'); ?></a>
                            <?php } ?>


                            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="featured-excerpt"> <?php echo excerpt(14); ?>
                                <p class="more"><a href="<?php echo get_permalink(); ?>">more photos</a></p></div>
                            <br>
                        </div>

    <?php endwhile; ?>

                <?php else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>

            </div><!-- /row --> 

<?php if (function_exists('tw_pagination')) tw_pagination($my_query); ?>

        </div><!-- /col-xs-12 contents blog -->


    </div><!-- /row -->

</div><!-- /container main-content -->

<?php get_footer(); ?>
