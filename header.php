<?php
/**

 * The Header template for our theme

 *

 * @package WordPress

 * @subpackage rightintention

 * @since rightintention 1.0

 */
?><!DOCTYPE html>

<!--[if IE 6]>

<html id="ie6" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 7]>

<html id="ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html id="ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?> class="no-js">

    <!--<![endif]-->

    <head>

        <meta charset="<?php bloginfo('charset'); ?>" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php wp_title('|', true, 'right'); ?></title>

        <link href='http://fonts.googleapis.com/css?family=Cousine:400,700|Lato:400,700,900|Roboto:400,700:900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>">

<?php if ($GLOBALS["categoryname"] == 'Street Snap' or $GLOBALS["categoryname"] == 'The Magazine') { ?><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.css" media="screen" /><?php } ?> 

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions.  ?>

        <!--[if lt IE 9]>
        
        <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
        
        <![endif]-->

<?php wp_head(); ?>

        <script>

            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {

                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)

            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');



            ga('create', 'UA-51470016-1', 'nylon.com.sg');

            ga('send', 'pageview');



        </script>



    </head>



    <body <?php body_class($class); ?>> 

        <div class="gutter-container">
            <div class="container"  style="position:relative;">

<?php
if (get_field('ad_visibility')) {
    $ad_visibility = get_field('ad_visibility');
} else {
    $ad_visibility = 3;
}


$cookie_name = "ad_" . $post->ID . get_post_time('U', true);

if (!isset($_COOKIE[$cookie_name])) {
    setcookie($cookie_name, 1, time() + (86400 * 7), "/"); // 86400 = 1 day
} else {

    setcookie($cookie_name, $_COOKIE[$cookie_name] + 1, time() + (86400 * 7), "/"); // 86400 = 1 day 
}






if ($_COOKIE[$cookie_name] <= $ad_visibility) :

    if (get_field('ad_left')):
        ?>

                        <div class="ads-type1">



        <?php
        /* echo '<pre>';
          print_r($left_ads);
          echo '</pre>';
         */
        $left_image = get_field('ad_left');

        if (get_field('ad_left_link')) {
            $left_link = get_field('ad_left_link');
        } else {
            $left_link = "#";
        }
        ?>	

                            <a href="<?php echo $left_link; ?>">

                                <img src="<?php echo $left_image; ?>" style="float:right;" />

                            </a>



                        </div>

    <?php endif; ?>



                    <?php
                    if (get_field('ad_right')):
                        ?>



                        <div class="ads-type2">

                        <?php
                        $right_image = get_field('ad_right');

                        if (get_field('ad_right_link')) {
                            $right_link = get_field('ad_right_link');
                        } else {
                            $right_link = "#";
                        }
                        ?>



                            <a href="<?php echo $right_link; ?>">

                                <img src="<?php echo $right_image; ?>" style="float:left;" />

                            </a>

                            <?php ?>

                        </div>

                        <?php endif;
                    endif; ?>
            </div>
        </div>

        <div class="container header"  style="position:relative;">





            <div class="row">



                <div class="col-md-8 topbanner">

<?php get_sidebar('topbanner'); ?>

                </div>



                <div class="col-md-4 socialsearch">



                    <div class="row">

                        <div class="col-md-12">

                            <div class="socialbutton"><a href="http://www.facebook.com/nylonsg" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/facebookicon.png" width="40" height="40"></a></div>

                            <div class="socialbutton"><a href="http://www.twitter.com/nylonsg" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/twittericon.png" width="41" height="40"></a></div>

                            <div class="socialbutton"><a href="http://www.youtube.com/user/nylonsg" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/youtubeicon.png" width="41" height="40"></a></div>

                            <div class="socialbutton"><a href="http://www.instagram.com/nylonsg" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/instagramicon.png" width="40" height="40"></a></div>

                            <div class="socialbutton"><a href="https://web.samsungchaton.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/chatonicon.png" width="45" height="41"></a></div>

                        </div>

                    </div>



                    <div class="row">

                        <div class="col-md-12 searchbar">

                            <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>">

                                <div class="input-group">

                                    <input type="text" class="form-control input-sm" name="s" id="s">

                                    <span class="input-group-btn">

                                        <button class="btn btn-default btn-sm" type="button" onclick="submit();"><span class="glyphicon glyphicon-search white"></span></button>

                                    </span>

                                </div><!-- /input-group -->

                            </form>

                        </div>

                    </div>



                </div>  



            </div><!-- /row -->



            <!-- Logo for Mobile -->

            <div class="row hidden-md hidden-lg">

                <div class="col-md-12 main-logo clearfix">

                    <a href="/nylon/"><img src="<?php bloginfo('template_directory'); ?>/img/nylonlogo.png"></a>

                </div>

            </div>

            <!-- navigation -->

            <div class="row">

                <div class="col-md-12 no-padding">

                    <div class="navpos">

                        <div class="navigation">

<?php wp_nav_menu(array('container' => '', 'theme_location' => 'site-menu', 'menu_class' => 'list-unstyled main-list')); ?>	



                            <div  class="show-mobile-search" style="display: none;"><span class="glyphicon glyphicon-search white"></span></div> 

                            <div class="searchbox mobile" style="display:none;">

                                <div class="col-md-12 searchbar">

                                    <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>">

                                        <div class="input-group">

                                            <input type="text" class="form-control input-sm" name="s" id="s">

                                            <span class="input-group-btn">

                                                <button class="btn btn-default btn-sm" type="button" onclick="submit();"><span class="glyphicon glyphicon-search white"></span></button>

                                            </span>

                                        </div><!-- /input-group -->

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- /row -->

            <!-- end navigation -->



            <div class="row hidden-xs hidden-sm">

                <div class="col-md-12 main-logo clearfix">

                    <a href="/nylon/"><img src="<?php bloginfo('template_directory'); ?>/img/nylonlogo.png"></a>

                </div>

            </div>



        </div> <!-- end container -->

