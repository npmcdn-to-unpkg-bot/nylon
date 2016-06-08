<?php
	/**
	 *
	 * @package WordPress
	 * @subpackage rightintention
	 * @since rightintention 1.0
	 */
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) )
		//$content_width = 1024;
	
	add_filter('show_admin_bar', '__return_false');

	add_action( 'init', 'register_my_menu' );
	//Register area for custom menu
	function register_my_menu() {
		register_nav_menu( 'site-menu', __( 'Site Menu' ) );
		register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
	}
	
	
	add_action('rss2_item', 'add_my_rss_node');

function add_my_rss_node() {
	global $post;
	if(has_post_thumbnail($post->ID)):
		$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		echo("<image>{$thumbnail}</image>");
	endif;
}
	
	
	function columns_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'xs' => 'xs',
			'sm' => 'sm',
			'md' => 'md',
			'lg' => 'lg',
			'vxs' => 'vxs',
			'vsm' => 'vsm',
			'vmd' => 'vmd',
			'vlg' => 'vlg',
		), $atts ) );
		if ($vxs == "true" || $vxs == "") {
			$vxs = " visible-xs";
		} elseif ($vxs == "false") {
			$vxs = " hidden-xs";
		}
		if ($vsm == "true" || $vsm == "") {
			$vsm = " visible-sm";
		} elseif ($vsm == "false") {
			$vsm = " hidden-sm";
		}
		if ($vmd == "true" || $vmd == "") {
			$vmd = " visible-md";
		} elseif ($vmd == "false") {
			$vmd = " hidden-md";
		}
		if ($vlg == "true" || $vlg == "") {
			$vlg = " visible-lg";
		} elseif ($vlg == "false") {
			$vlg = " hidden-lg";
		}
		return '<div class="col-xs-' . $xs . ' col-sm-' . $sm . ' col-md-' . $md . ' col-lg-' . $lg . $vxs . $vsm . $vmd . $vlg . '">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'columns', 'columns_shortcode' );

	function caption_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'classes' => 'classes'
		), $atts ) );
		return '<p class="caption ' . $classes . '">' . do_shortcode($content) . '</p>';
	}
	add_shortcode( 'caption', 'caption_shortcode' );

	function fb_change_mce_options($initArray) {
		// Comma separated string od extendes tags
		// Command separated string of extended elements
		$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
		if ( isset( $initArray['extended_valid_elements'] ) ) {
			$initArray['extended_valid_elements'] .= ',' . $ext;
		} else {
			$initArray['extended_valid_elements'] = $ext;
		}
		// maybe; set tiny paramter verify_html
		//$initArray['verify_html'] = false;
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'fb_change_mce_options');
	
	add_theme_support( 'post-thumbnails' ); 
	
	
	function rightintention_get_featured_posts() {
		return apply_filters( 'rightintention_get_featured_posts', array() );
	}
	
	function rightintention_has_featured_posts() {
		return ! is_paged() && (bool) rightintention_get_featured_posts();
	}
	

	// For changing excerpt length
	function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
	}
	
	function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
	array_pop($content);
	$content = implode(" ",$content).'...';
	} else {
	$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
	}
	
	
	// For changing thumbnail size
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'homepage-blog-custom-size', 206, 206 ); // 206 pixels wide by 206 pixels tall, soft proportional crop mode
		add_image_size( 'homepage-streetsnap-big-custom-size', 314 ); // 314 pixels wide by 314 pixels tall, soft proportional crop mode
		add_image_size( 'homepage-streetsnap-small-custom-size', 140 ); // 140 pixels wide by 140 pixels tall, soft proportional crop mode
		add_image_size( 'homepage-whatsnew-big-custom-size', 353, 420 ); // 353 pixels wide by 420 pixels tall, soft proportional crop mode
		add_image_size( 'homepage-whatsnew-small-custom-size', 113, 112 ); // 113 pixels wide by 112 pixels tall, soft proportional crop mode
		add_image_size( 'homepage-specialfeatures-big-custom-size', 414, 215 ); // 113 pixels wide by 112 pixels tall, soft proportional crop mode
		add_image_size( 'sidebar-whatsnew-custom-size', 105, 125 ); 
		add_image_size( 'single-main-custom-size', 677 ); 
		add_image_size( 'page-blog-custom-size', 226, 226 ); 
		add_image_size( 'page-photos-custom-size', 291, 291 ); 
		add_image_size( 'page-featured-custom-size', 1024, 464 );
		add_image_size( 'page-streetsnap-custom-size', 291 );
		add_image_size( 'page-magazine-custom-size', 206 );
                
                
	}
	
	// Enable shortcodes in widgets
	add_filter('widget_text', 'do_shortcode');
	
	
	if (function_exists('camera_main_ss_add')) {
    	add_action('admin_init','camera_main_ss_add');
    }
	

	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Banner 1',
		'id' => 'blogbanner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Banner 2',
		'id' => 'streetsnap-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Banner 3',
		'id' => 'whatsnew-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Video Banner',
		'id' => 'video-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Side Banner 1',
		'id' => 'side1banner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Side Banner 2',
		'id' => 'side2banner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Side Banner 3',
		'id' => 'side3banner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Side Banner 4',
		'id' => 'side4banner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Top Banner',
		'id' => 'topbanner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Bottom Banner',
		'id' => 'bottombanner-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar Mag Cover',
		'id' => 'magcover-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar Subscribe',
		'id' => 'subscribe-sidebar',
		'description' => '',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	}
	
	
	
function my_scripts_enqueue() {



    wp_register_script( 'jquerycookie-js', get_stylesheet_directory_uri().'/js/jquery.cookie.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'jquerycookie-js' );
     
    wp_enqueue_script( 'waypoints-js', get_stylesheet_directory_uri().'/waypoints/lib/jquery.waypoints.min.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'waypoints-shotcut-js', get_stylesheet_directory_uri().'/waypoints/lib/shortcuts/sticky.min.js', array('waypoints-js'), NULL, true );

}



add_action( 'wp_enqueue_scripts', 'my_scripts_enqueue', 5 );


	
	
	
//$full_img_url = wp_get_attachment_url(get_post_thumbnail_id($lef_ads[0]->ID));
function mm_get_ads($page_name, $ads_pos, $rand = 0){
	global $post;

	$slug = get_post( $post )->post_name;
	//$my_query = new WP_Query('posts_per_page=12&category_name='.$slug.'&paged='.$paged); 
						
						
			$param = array(
							'post_type'=>'advertisement',
							'orderby'   => 'menu_order',
							'order'     => 'ASC',							
							'category_name' => $slug,
							'meta_query' => array(/*
												array(
													'key'=> 'page_name',
													'value' => $page_name,
													'compare' => 'LIKE'
												),*/
												array(
													'key'=> 'ads_pos',
													'value' => $ads_pos,
													'compare' => 'LIKE'
												),
												
											)
						/*
						'tax_query' => array(
							array(
								//'taxonomy' => $apc->taxonomy,
								//'field' => 'id',
								//'terms' => $apc->term_id,												
							)
						),
						'posts_per_page' => 30
						*/
			);
			
			if($rand == 1){
				$param['orderby'] = 'rand';
			}

			$new_data = new WP_Query($param);
	
			return $new_data->posts;
	
}//endfunc



function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Video Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}


function add_theme_menu_item()
{
	add_menu_page("Popup Video", "Popup Video", "manage_options", "popup-video-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_video_mp4_element()
{
	?>
    	<input type="text" name="mp4_url" id="mp4_url" value="<?php echo get_option('mp4_url'); ?>" style="width:100%; max-width: 500px;" />
    <?php
}

function display_video_ogv_element()
{
	?>
    	<input type="text" name="ogv_url" id="ogv_url" value="<?php echo get_option('ogv_url'); ?>"  style="width:100%; max-width: 500px;" />
    <?php
}

function display_video_webm_element()
{
	?>
    	<input type="text" name="webm_url" id="webm_url" value="<?php echo get_option('webm_url'); ?>"  style="width:100%; max-width: 500px;" />
    <?php
}

function display_video_wmv_element()
{
	?>
    	<input type="text" name="wmv_url" id="wmv_url" value="<?php echo get_option('wmv_url'); ?>"  style="width:100%; max-width: 500px;" />
    <?php
}

function display_video_yv_element()
{
	?>
    	<input type="text" name="yv_url" id="yv_url" value="<?php echo get_option('yv_url'); ?>"  style="width:100%; max-width: 500px;" />
    <?php
}

function display_video_element()
{
	?>
		<input type="checkbox" name="popup_video" value="1" <?php checked(1, get_option('popup_video'), true); ?> /> 
	<?php
}


function display_video_expiry_element()
{
	?>
    	<input type="text" name="video_expiry" id="video_expiry" placeholder="dd-mm-yyyy" value="<?php echo get_option('video_expiry'); ?>"   />
    <?php
}





function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("mp4_url", "MP4 Video Url", "display_video_mp4_element", "theme-options", "section");
    add_settings_field("ogv_url", "OGV Video Url", "display_video_ogv_element", "theme-options", "section");
	add_settings_field("webm_url", "WEBM Video Url", "display_video_webm_element", "theme-options", "section");
    add_settings_field("wmv_url", "WMV Video Url", "display_video_wmv_element", "theme-options", "section");
	add_settings_field("yv_url", "Youtube Video Url", "display_video_yv_element", "theme-options", "section");
	 add_settings_field("popup_video", "Do you want to show the video?", "display_video_element", "theme-options", "section");
	  add_settings_field("video_expiry", "Video Expiry date", "display_video_expiry_element", "theme-options", "section");

    register_setting("section", "mp4_url");
    register_setting("section", "ogv_url");
	 register_setting("section", "webm_url");
    register_setting("section", "wmv_url");
	 register_setting("section", "yv_url");
	register_setting("section", "popup_video");
	register_setting("section", "video_expiry");
}

add_action("admin_init", "display_theme_panel_fields");



