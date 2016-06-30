<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage rightintention
 * @since rightintention 1.0
 */
global $categoryname;
$categoryname = 'Home';


global $left_ads;
$left_ads = mm_get_ads('blog', 'left');
$right_ads = mm_get_ads('blog', 'right');
$blog_content_ads = mm_get_ads('blog', 'blog_content', 1);

get_header();
?>

<div class="widesliderfullbg"> 
    <div class="wideslider"> 
        <ul>
            <?php $my_query = new WP_Query('category_name=featured&showposts=5'); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <li><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('page-featured-custom-size'); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>

<?php
if (get_field('ad_content_link')) {
    $content_link = get_field('ad_content_link');
} else {
    $content_link = "#";
}


if (get_field('ad_content')):

    $content_image = get_field('ad_content');

endif;

if (get_field('ad_visibility')) {
    $ad_visibility = get_field('ad_visibility');
} else {
    $ad_visibility = 3;
}

$cookie_name = "ad_" . $post->ID . get_post_time('U', true);
?>    
<div class="container main-content">

    <div class="row">
        <div class="col-md-8 col-sm-12 contents">

            <div class="main-title-home">
                <img src="<?php bloginfo('template_directory'); ?>/img/titles/blog.jpg" alt="blog">
            </div>

            <div class="row addpad no-padding">

                <?php rewind_posts(); ?>
                <?php
                $my_query = new WP_Query('category_name=blog&showposts=9');
                $x = 1;
                ?>


<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                    <div class="col-md-4 col-sm-4">

                        <div class="featured-image">  <?php if (is_mobile()) { /* This is for Mobile devices only */ ?>


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
                                ?>
                            </div></div>


                        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="featured-excerpt"><?php //echo excerpt(20);  ?>
                            <p class="more"><a href="<?php echo get_permalink(); ?>">Read More</a></p></div>
                    </div>
    <?php if ($x % 3 == 0) : echo '<br clear="all" />';
    endif; ?>
                    <?php $x++;
                endwhile; ?>

            </div><!-- /row -->




            <!-- banner -->
            <div class="row">      
                <div class="col-md-12 hori-banner">
                    <?php get_sidebar('blogbanner'); ?>
                </div>
            </div><!-- /row -->
            <!-- end banner -->


            <!-- steet snaps -->
            <div class="main-title-home streetsnap-title">
                <img src="<?php bloginfo('template_directory'); ?>/img/titles/thelook.jpg" alt="the look">
            </div>

            <div class="country-title">
                <div class="country-name">singapore</div>
            </div>

            <div class="row addpad">

                <div class="col-md-6 col-sm-6 streetsnap-content">
                    <?php rewind_posts(); ?>
                    <?php $my_query = new WP_Query('category_name=streetsnap&showposts=1&offset=0'); ?>
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>


                        <?php if (is_mobile()) { ?>

                            <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                        <?php } else { ?>
                            <a href="<?php echo get_permalink(29); ?>"><?php the_post_thumbnail('homepage-streetsnap-big-custom-size'); ?></a>
                        <?php } ?>



                        <p><?php the_title(); ?><?php //echo get_post_meta(get_the_ID(), 'age', true);  ?></p>
                    <?php endwhile; ?>
                </div>

                <div class="col-md-6 col-sm-6 streetsnap-content">

                    <div class="row">

                        <?php $my_query = new WP_Query('category_name=streetsnap&showposts=2&offset=1'); ?>
                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                            <div class="col-md-6 col-sm-6">

                                <?php if (is_mobile()) { ?>

                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                                <?php } else { ?>
                                    <a href="<?php echo get_permalink(29); ?>"><?php the_post_thumbnail('homepage-streetsnap-small-custom-size'); ?></a>
                                <?php } ?>


                                <p><?php the_title(); ?></p>
                            </div>

                        <?php endwhile; ?>

                    </div><!-- /row -->

                    <div class="row">

                        <?php $my_query = new WP_Query('category_name=streetsnap&showposts=2&offset=3'); ?>
                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                            <div class="col-md-6 col-sm-6">

                                <?php if (is_mobile()) { ?>

                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                                <?php } else { ?>
                                    <a href="<?php echo get_permalink(29); ?>"><?php the_post_thumbnail('homepage-streetsnap-small-custom-size'); ?></a>
                                <?php } ?>

                                <p><?php the_title(); ?></p>
                            </div>

                        <?php endwhile; ?>

                    </div><!-- /row -->

                </div><!-- /col-xs-6 -->

            </div><!-- /row -->
            <!-- /steet snaps -->


            <!-- banner -->
            <div class="row">      
                <div class="col-md-12 hori-banner">
                    <?php get_sidebar('streetsnapbanner'); ?>
                </div>
            </div><!-- /row -->
            <!-- end banner -->


            <!-- what's new this issue -->
            <div class="main-title-home">
                <img src="<?php bloginfo('template_directory'); ?>/img/titles/inthisissueofnylon.jpg" alt="in this issue of nylon...">
            </div>

            <div class="row addpad">

                <div class="col-md-7 col-sm-7">
                    <?php rewind_posts(); ?>
                    <?php $my_query = new WP_Query('category_name=whatsnew&showposts=1&tag=magcover'); ?>
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <?php if (is_mobile()) { ?>

                            <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                        <?php } else { ?>
                            <a href="<?php echo get_permalink(18); ?>"><?php the_post_thumbnail('homepage-whatsnew-big-custom-size'); ?></a>
                        <?php } ?>


                    <?php endwhile; ?>
                </div><!-- /col-xs-7 -->

                <div class="col-md-5 col-sm-5">

                    <div class="row">

                        <?php $my_query = new WP_Query('category_name=whatsnew&showposts=2&tag=magcontent'); ?>
                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                            <div class="col-md-6 col-sm-6">

                                <?php if (is_mobile()) { ?>

                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                                <?php } else { ?>
                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('homepage-whatsnew-small-custom-size'); ?></a>
                                <?php } ?>

                                <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo excerpt(6); ?></p>
                                <p class="more"><a href="<?php echo get_permalink(); ?>">more</a></p>
                            </div>
                        <?php endwhile; ?>

                    </div><!-- /row -->

                    <div class="row">

                        <?php $my_query = new WP_Query('category_name=whatsnew&showposts=2&offset=2&tag=magcontent'); ?>
                        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                            <div class="col-md-6 col-sm-6">
                                <?php if (is_mobile()) { ?>

                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                                <?php } else { ?>
                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('homepage-whatsnew-small-custom-size'); ?></a>
                                <?php } ?>

                                <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo excerpt(6); ?></p>
                                <p class="more"><a href="<?php echo get_permalink(); ?>">more</a></p>
                            </div>
                        <?php endwhile; ?>

                    </div><!-- /row -->

                </div><!-- /col-xs-5 -->

            </div><!-- /row -->
            <!-- /what's new this issue -->


            <!-- banner -->
            <div class="row">      
                <div class="col-md-12 hori-banner">
                    <?php get_sidebar('whatsnewbanner'); ?>
                </div>
            </div><!-- /row -->
            <!-- end banner -->


            <!-- special features -->
            <div class="main-title-home">
                <img src="<?php bloginfo('template_directory'); ?>/img/titles/specialfeatures.jpg" alt="special features">
            </div>

            <?php rewind_posts(); ?>
            <?php $my_query = new WP_Query('category_name=specialfeatures&showposts=6'); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                <!-- 1 set -->
                <div class="row addpad">

                    <div class="addborder clearfix">

                        <div class="col-md-8 col-sm-8 specialfeatures-content-image">

                            <?php if (is_mobile()) { ?>

                                <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('single-main-custom-size'); ?></a>

                            <?php } else { ?>
                                <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('homepage-specialfeatures-big-custom-size'); ?></a>
                            <?php } ?>


                        </div>

                        <div class="col-md-4 col-sm-4 specialfeatures-content">
                            <p class="featuredtitle">featured : <span>
                                    <?php
                                    $category = get_the_category();
                                    echo $category[0]->cat_name;
                                    ?>
                                </span></p>
                            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo excerpt(20); ?></p>
                            <p class="more"><a href="<?php echo get_permalink(); ?>">more</a></p>
                        </div>

                    </div><!-- /addborder -->

                </div>
                <!-- /1 set -->

            <?php endwhile; ?>

            <!-- /special features -->


        </div><!-- /col-xs-8 contents -->


        <!-- sidebar -->
        <div class="col-md-4 sidebar">

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('videobanner'); ?>
                </div>
            </div>

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('magcover'); ?>
                </div>
            </div>

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('subscribe'); ?>
                </div>
            </div>

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('side1banner'); ?>
                </div>
            </div>

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('side2banner'); ?>
                </div>
            </div>

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('side3banner'); ?>
                </div>
            </div>

            <div class="row banner">
                <div class="col-md-12">
                    <?php get_sidebar('side4banner'); ?>
                </div>
            </div>

        </div><!-- /col-xs-4 sidebar -->
        <!-- /sidebar -->


    </div><!-- /row -->

</div><!-- /container main-content -->


<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <div class="footer-banner">
                <?php get_sidebar('bottombanner'); ?>
            </div>
        </div>   
    </div>

</div>



<?php get_footer(); ?>
