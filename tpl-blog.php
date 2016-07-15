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


get_header();

global $post;
global $paged;
$slug = get_post($post)->post_name;

if (get_field('ad_content_link1')) {
    $content_link1 = get_field('ad_content_link1');
} else {
    $content_link1 = "#";
}


if (get_field('ad_content1')):

    $content_image1 = get_field('ad_content1');

endif;

if (get_field('ad_content_link2')) {
    $content_link2 = get_field('ad_content_link2');
} else {
    $content_link2 = "#";
}


if (get_field('ad_content2')):

    $content_image2 = get_field('ad_content2');

endif;



if (get_field('ad_visibility')) {
    $ad_visibility = get_field('ad_visibility');
} else {
    $ad_visibility = 0;
}

$cookie_name = "ad_" . $post->ID . get_post_time('U', true);
?>


<div class="widesliderfullbg"> 
    <div class="wideslider"> 
        <ul>
            <?php $my_query = new WP_Query('category_name=' . $slug . '&showposts=5'); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <li><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('page-featured-custom-size'); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>



<div class="container main-content">

    <div class="row">
        <div class="col-md-12 contents blog">

            <div class="main-title">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                <?php endwhile; // end of the loop.  ?>
            </div>

            <div class="row addpad2">

                <?php rewind_posts(); ?>
                <?php
                $i = 0;

                $my_query = new WP_Query('posts_per_page=12&category_name=' . $slug . '&paged=' . $paged);
                ?>
                <?php if ($my_query->have_posts()) : ?>

                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>


                        <?php if ($i == 4 or $i == 8 or $i == 12) : ?>



                            <?php
                            if (($_COOKIE[$cookie_name] <= $ad_visibility)||($ad_visibility == 0)) :

                                if ($i == 4) {

                                    if (!empty($content_image1)):
                                        ?>

                                        <div class="adds-row" style="border:0px solid #000;min-height:100px;clear:both;text-align:center;">

                                            <a href="<?php echo $content_link1; ?>"><img src="<?php echo $content_image1; ?>" /></a>
                                        </div>

                                        <?php
                                    endif;
                                }
                                else if ($i == 8) {
                                    if (!empty($content_image2)):
                                        ?>

                                        <div class="adds-row" style="border:0px solid #000;min-height:100px;clear:both;text-align:center;">

                                            <a href="<?php echo $content_link2; ?>"><img src="<?php echo $content_image2; ?>" /></a>
                                        </div>

                                        <?php
                                    endif;
                                }
                            endif;
                            ?> 







                        </div>
                        <div class="row addpad2 no-padding">
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
                            <br>
                        </div>

                        <?php $i++ ?>

                    <?php endwhile; ?>

                <?php else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>

            </div><!-- /row --> 





            <br />





            <?php if (function_exists('tw_pagination')) tw_pagination($my_query); ?>


        </div><!-- /col-md-12 contents blog -->


    </div><!-- /row -->

</div><!-- /container main-content -->

<?php get_footer(); ?>
