<?php

// CONSTANTS

define( 'WP_SITE_URL', get_bloginfo('url') );
define( 'WP_THEME_URL', get_bloginfo( 'stylesheet_directory' ) );
define( 'WP_TODAY', date('Y_m_d',strtotime('00:00:00')));

// POST THUMBNAILS

add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('post', 'page'));
set_post_thumbnail_size( 512, 512, false );
add_image_size( '2x', 1024, 1024, false );
add_image_size( '4x', 2048, 2048, false );
add_image_size( 'square-large', 512, 512, true );
add_image_size( 'square-medium', 256, 256, true );
add_image_size( 'square-small', 128, 128, true );

// INCLUDES

include 'inc/markdown.php';
include 'inc/wrapping.php';
//include 'inc/post-types.php';
//include 'inc/taxonomies.php';

// REGISTER MENU

function register_main_menu() {
  register_nav_menu('main-menu',__( 'Menu Principal' ));
}
add_action( 'init', 'register_main_menu' );

// REMOVE ADMIN BAR

// add_filter('show_admin_bar', '__return_false');

// TITLE FILTER

function wp_title_filter( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title = get_bloginfo( 'name', 'display' ) . " " . $title;

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Pag. %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'wp_title_filter', 10, 2 );

// ACF

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'tema do bem',
		'menu_title'	=> 'tema do bem',
		'menu_slug' 	=> 'dobem-config',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

}

if( function_exists('acf_add_options_sub_page') )
{
	acf_add_options_sub_page(array(
		'title' => 'Home',
		'parent' => 'dobem-config',
		'capability'	=> 'edit_posts',
	));

	acf_add_options_sub_page(array(
		'title' => 'Aí é vida',
		'parent' => 'dobem-config',
		'capability'	=> 'edit_posts',
	));

	acf_add_options_sub_page(array(
		'title' => 'Footer',
		'parent' => 'dobem-config',
		'capability'	=> 'edit_posts',
	));

	acf_add_options_sub_page(array(
		'title' => 'Contato',
		'parent' => 'dobem-config',
		'capability'	=> 'edit_posts',
	));
}

// MARKDOWN

function parse_special($my_text){
	$social_icons = <<<EOD
		<ul class="social-icons">
			<li><a class="router_ignore" target="_blank" href="{{facebook}}"><i class="ico-circle-facebook"></i></a></li>
			<li><a class="router_ignore" target="_blank" href="{{instagram}}"><i class="ico-circle-instagram"></i></a></li>
			<li><a class="router_ignore" target="_blank" href="{{youtube}}"><i class="ico-circle-youtube"></i></a></li>
		</ul>
EOD;
	$social_icons = str_replace("{{facebook}}", get_field('dobem_social_facebook_url', 'option'), $social_icons);
	$social_icons = str_replace("{{instagram}}", get_field('dobem_social_instagram_url', 'option'), $social_icons);
	$social_icons = str_replace("{{youtube}}", get_field('dobem_social_youtube_url', 'option'), $social_icons);
	$my_text = str_replace("{{linebreak}}", "<br/>", $my_text);
	$my_text = str_replace("{{™}}", "<sup>™</sup>", $my_text);
	$my_text = str_replace("{{social_icons}}", $social_icons, $my_text);
	return $my_text;
}

function parse_markdown($my_text){
	$my_text = Markdown($my_text);
	return parse_special($my_text);
}

// FB FEED + AJAX URL

add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
?>
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
<?php
}

add_action('wp_ajax_dobem_fb_feed', 'dobem_fb_feed_ajax_callback');
add_action('wp_ajax_nopriv_dobem_fb_feed', 'dobem_fb_feed_ajax_callback');

function dobem_fb_feed_ajax_callback() {

    //global $wpdb;

    $url = "https://www.facebook.com/feeds/page.php?id=87538472712&format=json";

    // set HTTP header
	$headers = array(
	    'Content-Type: application/json',
	    'X-HTTP-Method-Override: GET'
	);

	// Open connection
	$ch = curl_init();

	// Set the url, number of GET vars, GET data
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	// Execute request
	$result = curl_exec($ch);

	// Close connection
	if($response === false || curl_error($ch)) {
		curl_close($ch);
		echo "jsonpCallbackFB({});";
	} else {
		curl_close($ch);
		echo "jsonpCallbackFB(" . json_encode(json_decode($result)) . ");";
	}
    die(); // this is required to return a proper result
}

// HEX TO RGB

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}


?>