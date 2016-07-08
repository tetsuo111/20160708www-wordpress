<?php
$theme_opt = wp_get_theme(get_template());
define('LIGHTNING_THEME_VERSION', $theme_opt->Version);
/*-------------------------------------------*/
/*	Theme setup
/*-------------------------------------------*/
/*	Load JS
/*-------------------------------------------*/
/*	Load CSS
/*-------------------------------------------*/
/*	Head logo
/*-------------------------------------------*/
/*	WidgetArea initiate
/*-------------------------------------------*/
/*	Year Artchive list 'year' and count insert to inner </a>
/*-------------------------------------------*/
/*	Category list 'count insert to inner </a>
/*-------------------------------------------*/
/*	Global navigation add cptions
/*-------------------------------------------*/
/*	headfix enable
/*-------------------------------------------*/

/*-------------------------------------------*/
/*	Theme setup
/*-------------------------------------------*/

add_action('after_setup_theme', 'lightning_theme_setup');

function lightning_theme_setup() {

	global $content_width;

	/*-------------------------------------------*/
	/*  Title tag
	/*-------------------------------------------*/
	add_theme_support( 'title-tag' );

	/*-------------------------------------------*/
	/*	Admin page _ Eye catch
	/*-------------------------------------------*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 320, 180, true );

	/*-------------------------------------------*/
	/*	Custom menu
	/*-------------------------------------------*/
	register_nav_menus( array( 'Header' => 'Header Navigation', ) );
	register_nav_menus( array( 'Footer' => 'Footer Navigation', ) );

	load_theme_textdomain('lightning', get_template_directory() . '/languages');

	/*-------------------------------------------*/
	/*	Set content width
	/* 	(Auto set up to media max with.)
	/*-------------------------------------------*/
	if ( ! isset( $content_width ) ) $content_width = 750;

	/*-------------------------------------------*/
	/*	Admin page _ Add editor css
	/*-------------------------------------------*/
	add_editor_style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css');
	if( ! apply_filters('lightning-disable-theme_style', false) )
		add_editor_style('design_skin/origin/css/editor.css');

	/*-------------------------------------------*/
	/*	Feed Links
	/*-------------------------------------------*/
	add_theme_support( 'automatic-feed-links' );
}

/*-------------------------------------------*/
/*	Load JS
/*-------------------------------------------*/

add_action('wp_enqueue_scripts','lightning_addJs');
function lightning_addJs() {
	wp_enqueue_script( 'html5shiv', '//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond', '//oss.maxcdn.com/respond/1.4.2/respond.min.js' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'lightning-js', get_template_directory_uri().'/js/all_in_header_fixed.min.js', array( 'jquery' ), LIGHTNING_THEME_VERSION );
}

/* If you want to remove the header fixed,
/* you paste the bellow code to your child theme's functions.php or plugin file.
/*-------------------------------------------*/
// add_action('wp_enqueue_scripts','lightning_header_fixed_remove',100);
// function lightning_header_fixed_remove(){
//   wp_dequeue_script( 'lightning-js' );
//   wp_enqueue_script( 'lightning-no-header-fixed-js', get_template_directory_uri().'/js/all.min.js', array( 'jquery' ), LIGHTNING_THEME_VERSION );
// }

add_action( 'wp_enqueue_scripts', 'lightning_commentJs' );
function lightning_commentJs(){
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/*-------------------------------------------*/
/*	Load CSS
/*-------------------------------------------*/
add_action('wp_enqueue_scripts', 'lightning_css' );
function lightning_css(){
	wp_enqueue_style( 'lightning-font-awesome-style', get_template_directory_uri().'/library/font-awesome/4.6.1/css/font-awesome.min.css', array(), '4.6.1' );
	wp_enqueue_style( 'lightning-theme-style', get_stylesheet_uri(), array('lightning-design-style'), LIGHTNING_THEME_VERSION );
}

// Load design skin
add_action('wp_enqueue_scripts', 'lightning_design_css' );
function lightning_design_css(){
	if( ! apply_filters('lightning-disable-theme_style', false) )
		wp_enqueue_style( 'lightning-design-style', get_template_directory_uri().'/design_skin/origin/css/style.css', array(), LIGHTNING_THEME_VERSION );
}

/*-------------------------------------------*/
/*	Load Theme customizer
/*-------------------------------------------*/
require( get_template_directory() . '/functions_customizer.php' );

/*-------------------------------------------*/
/*	Load helpers
/*-------------------------------------------*/
require( get_template_directory() . '/functions_helpers.php' );

/*-------------------------------------------*/
/*	Load tga(Plugin install)
/*-------------------------------------------*/
require( get_template_directory() . '/functions_plugin_install.php' );

/*-------------------------------------------*/
/*	Load designskin manager
/*-------------------------------------------*/
require( get_template_directory() . '/design_skin/class-design-manager.php' );

/*-------------------------------------------*/
/*	WidgetArea initiate
/*-------------------------------------------*/
function lightning_widgets_init() {
	// sidebar widget area
		register_sidebar( array(
			'name' => __('Sidebar(Home)', 'lightning' ),
			'id' => 'front-side-top-widget-area',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title subSection-title">',
			'after_title' => '</h1>',
		) );
		register_sidebar( array(
			'name' => __( 'Sidebar(Common top)', 'lightning' ),
			'id' => 'common-side-top-widget-area',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title subSection-title">',
			'after_title' => '</h1>',
		) );
		register_sidebar( array(
			'name' => __( 'Sidebar(Common bottom)', 'lightning' ),
			'id' => 'common-side-bottom-widget-area',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title subSection-title">',
			'after_title' => '</h1>',
		) );


	// Sidebar( post_type )

		$postTypes = get_post_types(Array('public' => true));

		foreach ($postTypes as $postType) {

			// Get post type name
			/*-------------------------------------------*/
			$post_type_object = get_post_type_object($postType);
			if($post_type_object){
				// Set post type name
				$postType_name = esc_html($post_type_object->labels->name);

				// Set post type widget area
				register_sidebar( array(
					'name' => sprintf( __( 'Sidebar(%s)', 'lightning' ), $postType_name ),
					'id' => $postType.'-side-widget-area',
					'description' => sprintf( __( 'This widget area appears on the %s contents page only.', 'lightning' ), $postType_name ),
					'before_widget' => '<aside class="widget %2$s" id="%1$s">',
					'after_widget' => '</aside>',
					'before_title' => '<h1 class="widget-title subSection-title">',
					'after_title' => '</h1>',
				) );
			} // if($post_type_object){

		} // foreach ($postTypes as $postType) {

	// Home content top widget area

		register_sidebar( array(
			'name' => __( 'Home content top', 'lightning' ),
			'id' => 'home-content-top-widget-area',
			'before_widget' => '<section class="widget %2$s" id="%1$s">',
			'after_widget' => '</section>',
			'before_title' => '<h1 class="mainSection-title">',
			'after_title' => '</h1>',
		) );

	// footer upper widget area

		register_sidebar( array(
			'name' => __( 'Widget area of upper footer', 'lightning' ),
			'id' => 'footer-upper-widget-1',
			'before_widget' => '<aside class="widget %2$s" id="%1$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h1 class="widget-title subSection-title">',
			'after_title' => '</h1>',
		) );

	// footer widget area

	    $footer_widget_area_count = 3;
	    $footer_widget_area_count = apply_filters( 'lightning_footer_widget_area_count', $footer_widget_area_count );

		for ( $i = 1; $i <= $footer_widget_area_count ;) {
			register_sidebar( array(
				'name' => __( 'Footer widget area ', 'lightning' ).$i,
				'id' => 'footer-widget-'.$i,
				'before_widget' => '<aside class="widget %2$s" id="%1$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h1 class="widget-title subSection-title">',
				'after_title' => '</h1>',
			) );
			$i++;
		}
}
add_action( 'widgets_init', 'lightning_widgets_init' );

/*-------------------------------------------*/
/*	Year Artchive list 'year' and count insert to inner </a>
/*-------------------------------------------*/
function lightning_archives_link($html){
  return preg_replace('@</a>(.+?)</li>@', '\1</a></li>', $html);
}
add_filter('get_archives_link', 'lightning_archives_link');

/*-------------------------------------------*/
/*	Category list count insert to inner </a>
/*-------------------------------------------*/
function lightning_list_categories( $output, $args ) {
	$output = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$output);
	return $output;
}
add_filter( 'wp_list_categories', 'lightning_list_categories', 10, 2 );

/*-------------------------------------------*/
/*	Global navigation add cptions
/*-------------------------------------------*/
class description_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$prepend = '<strong class="gMenu_name">';
		$append = '</strong>';
		$description  = ! empty( $item->description ) ? '<span class="gMenu_description">'.esc_attr( $item->description ).'</span>' : '';

		if($depth != 0) {
			$description = $append = $prepend = "";
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


/*-------------------------------------------*/
/*	headfix enable
/*-------------------------------------------*/
add_filter( 'body_class', 'lightning_body_class' );
function lightning_body_class( $class ){
	// header fix
	if( apply_filters( 'lightning_enable_headfix', true ) ) {
		$class[] = 'headfix';
	}
	// offset_headerimage
	if( apply_filters( 'lightning_enable_offset_header', true ) ) {
		$class[] = 'offset_header';
	}
	return $class;
}

