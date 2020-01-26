<?php
/**
 * Sets up theme defaults and registers support for various WordPress features
 */
add_action( 'after_setup_theme', 'oceanone_setup' );

function oceanone_setup() {

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus(
		array(
			'main' => 'Main Menu',
			'footer' => 'Footer Menu'
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Add support for responsive embedded content
	add_theme_support( 'responsive-embeds' );

	// Add small image size
	add_image_size('small', 300, 300);

}

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'oceanone_scripts' );

function oceanone_scripts() {

	wp_register_style( 'slick-style', get_stylesheet_directory_uri() . '/css/slick.css', array(), null, 'all' );
	wp_register_script( 'slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array(), null, true );

	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.min.css', array(), null, 'all' );
	wp_enqueue_style( 'oceanone-style', get_stylesheet_uri(), array(), null, 'all' );
	wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.dev.js', array(), null, true );
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'poppins', 'https://fonts.googleapis.com/css?family=Poppins' );

	// Deregister dashicons from frontend
	if( !current_user_can( 'update_core' ) ) {

        wp_deregister_style( 'dashicons' );

    }
        
}

// Register sidebars
add_action( 'widgets_init', 'oo_widgets_init' );

function oo_widgets_init() {

    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
    ) );

    unregister_widget('WP_Widget_Pages');
	//unregister_widget('WP_Widget_Media_Gallery');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	//unregister_widget('WP_Widget_Search');
	//unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Nav_Menu_Widget');
	//unregister_widget('WP_Widget_Media_Audio');
	//unregister_widget('WP_Widget_Media_Image');
	//unregister_widget('WP_Widget_Media_Video');
	//unregister_widget('WP_Widget_Custom_HTML');

}

/**
 * Enqueue admin scripts
 */
add_action('admin_enqueue_scripts', 'om_enqueue_admin_scripts');

function om_enqueue_admin_scripts() {

	wp_enqueue_style( 'dn-gutenberg-mod', get_stylesheet_directory_uri() . '/css/om-custom-gutenberg-admin-styles.css', array(), null, 'all' );

}

// Enable custom image sizes in the Media Library
add_filter( 'image_size_names_choose', 'oo_custom_image_sizes' );

function oo_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'small' => 'Small',
    ));
}

// Register Custom Navigation Walker
require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Extend Recent Posts widget
require_once get_stylesheet_directory() . '/inc/widget-advanced-recent-posts.php';

// Register custom blocks
require_once get_stylesheet_directory() . '/inc/register-custom-blocks.php';

// Remove the link to the Windows Live Writer manifest file
remove_action('wp_head', 'wlwmanifest_link');

// Remove link to Really Simple Discovery service endpoint
remove_action('wp_head', 'rsd_link');

// Remove WordPress version number
remove_action('wp_head', 'wp_generator');

// Remove shortlink
remove_action('wp_head', 'wp_shortlink_wp_head' );

remove_action( 'wp_head', 'rest_output_link_wp_head' );

// Remove emoticons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove version query string from static resources
 */
add_filter( 'style_loader_src', 'oceanone_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'oceanone_remove_cssjs_ver', 10, 2 );

function oceanone_remove_cssjs_ver( $src ) {

	if( strpos( $src, '?ver=' ) ) {

	 $src = remove_query_arg( 'ver', $src );

	}

	return $src;

}

/**
 * Disable pingbacks
 */
add_action( 'pre_ping', 'oceanone_disable_pingback' );

function oceanone_disable_pingback( &$links ) {

	foreach( $links as $l => $link ) {

	 	if( 0 === strpos( $link, get_option( 'home' ) ) ) {

	 		 unset($links[$l]);

	 	}

	 }

}

/**
* Dequeue jQuery Migrate script in WordPress.
*/
function oceanone_remove_jquery_migrate(&$scripts) {

    if(!is_admin()) {

        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );

    }

}
add_filter( 'wp_default_scripts', 'oceanone_remove_jquery_migrate' );


/**
 * Show OO Icon
 */

function oo_icon($slug) {

	if($slug) { ?>

		<svg class="oo-icon">
			<use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/oo-icons.svg#<?php echo esc_attr($slug); ?>"></use>
		</svg>

	<?php }

}

// Remove custom WP Custom Fields meta box to speed up post editor load time (https://www.advancedcustomfields.com/blog/acf-pro-5-5-13-update/)
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// Set up ACF options pages
if( function_exists('acf_add_options_page') ) {

	// Options parent page
	acf_add_options_page(array(
		'page_title' => 'Options',
		'menu_title' => 'Options'
	));
	
	// Header options page
	acf_add_options_page(array(
		'page_title' => 'Header',
		'menu_title' => 'Header',
		'parent_slug' => 'acf-options-options'
	));

	// Contact Info options page
	acf_add_options_page(array(
		'page_title' => 'Contact Info',
		'menu_title' => 'Contact Info',
		'parent_slug' => 'acf-options-options'
	));

	// Social Media options page
	acf_add_options_page(array(
		'page_title' => 'Social Media',
		'menu_title' => 'Social Media',
		'parent_slug' => 'acf-options-options'
	));

	// Theme options page
	acf_add_options_page(array(
		'page_title' => 'Theme',
		'menu_title' => 'Theme',
		'parent_slug' => 'acf-options-options'
	));
	
}


