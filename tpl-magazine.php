<?php
/**
 * Template Name: The Magazine
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */
global $categoryname;
$categoryname = 'The Magazine';

get_header();
?>

<div class="container main-content">

    <div class="row">
        <div class="col-xs-12 contents photos">

            <div class="main-title">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                <?php endwhile; // end of the loop. ?>
            </div>

            <div class="row addpad2">

                <div id="masonry">

                    <?php rewind_posts(); ?>
                    <?php
                    global $post;
                    global $paged;
                    $slug = get_post($post)->post_name;

                    $my_query = new WP_Query('category_name=themagazine&showposts=-1&paged=' . $paged);
                    ?>
                    <?php if ($my_query->have_posts()) : ?>

                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                            <?php
                            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'page-magazine-custom-size');
                            $urlthumb = $thumb['0'];
                            //echo $thumb['1'];
                            //echo $thumb['2'];
                            ?>

                            <figure class="masonryitem themagazineresize">
                                <a rel="gallery" href="<?php echo $url; ?>" class="fancybox"><img src="<?php echo $thumb['0']; ?>" width="<?php echo $thumb['1']; ?>" height="<?php echo $thumb['2']; ?>" alt="<b><?php the_content(); ?>" /></b></a>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </figure>

    <?php endwhile; ?>

                    <?php else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>

                </div><!-- /row --> 

<?php if (function_exists('tw_pagination')) tw_pagination($my_query); ?>


                <?php rewind_posts(); ?>
<?php while (have_posts()) : the_post(); ?>  
                    <?php the_content(); ?>
                <?php endwhile; ?>

                <script src="<?php bloginfo('template_directory'); ?>/js/masonry.pkgd.min.js"></script>
                <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
                <script>



                    var $grid = jQuery('#masonry').imagesLoaded(function () {
                        // init Masonry after all images have loaded
                        $grid.masonry({
                            // options
                            columnWidth: 215,
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
