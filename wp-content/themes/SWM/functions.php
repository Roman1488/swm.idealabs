<?php


function tufts_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tufts' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'tufts_wellness-featured-image', 2000, 1200, true );

	add_image_size( 'tufts_wellness-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'tufts' ),
		'footer_social' => __( 'Footer Social Links Menu', 'tufts' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'tufts_setup' );


function theme_scripts()
{	
    // Register and including styles
    wp_enqueue_style('my_main_style', get_template_directory_uri().'/style.min.css', array(), false, '');

    // Register and including scripts
    wp_enqueue_script( 'html5', get_theme_file_uri( 'libs/html/html5.js' ), array(), '3.7.3' );
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_theme_file_uri( 'libs/jquery/dist/jquery.min.js' ), false, null, true );
	wp_enqueue_script( 'jquery' );

    wp_enqueue_script('vendor_scripts', get_template_directory_uri().'/js/vendor.min.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function tufts_footer_styles() {

    wp_enqueue_style('fonts', get_template_directory_uri().'/fonts.css', array(), false, '');
    
};
add_action( 'get_footer', 'tufts_footer_styles' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );



add_action('init', 'register_faculty_post_types');
function register_faculty_post_types(){
	register_post_type('faculty', array(
		'label'  => 'faculty',
		'labels' => array(
			'name'               => 'Faculty', // основное название для типа записи
			'singular_name'      => 'Faculty', // название для одной записи этого типа
			'add_new'            => 'Add New ', // для добавления новой записи
			'add_new_item'       => 'Add New Faculty', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Faculty', // для редактирования типа записи
			'new_item'           => 'New Faculty', // текст новой записи
			'view_item'          => 'View Faculty', // для просмотра записи этого типа.
			'search_items'       => 'Search Faculty', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Faculty', // название меню
		),
		'menu_icon'           => 'dashicons-id-alt',
		'description'         => '',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true,
		'show_in_rest'        => false, // добавить в REST API. C WP 4.7
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','revisions'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('post_tag', 'category'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action('init', 'register_curriculum_post_types');
function register_curriculum_post_types(){
	register_post_type('curriculum', array(
		'label'  => 'curriculum',
		'labels' => array(
			'name'               => 'Track', // основное название для типа записи
			'singular_name'      => 'Track', // название для одной записи этого типа
			'add_new'            => 'Add New ', // для добавления новой записи
			'add_new_item'       => 'Add New TrackTrack', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Track', // для редактирования типа записи
			'new_item'           => 'New Track', // текст новой записи
			'view_item'          => 'View Track', // для просмотра записи этого типа.
			'search_items'       => 'Search Track', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Track', // название меню
		),
		'description'         => '',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true,
		'show_in_rest'        => false, // добавить в REST API. C WP 4.7
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail','revisions','excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('post_tag', 'category'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_shortcode( 'circle', 'circle_func' );
function circle_func( $atts ){
	// белый список параметров и значения по умолчанию
	/*$atts = shortcode_atts( array(
		'foo' => 'no foo',
		'baz' => 'default baz'
	), $atts );*/
	$result = '';

	if( function_exists('acf_add_options_page') ) {
		ob_start(); ?>

		<?php if( have_rows('circle_repeter', 'option') ): ?>
			<div class="row circle-wrap">
			 	<?php // loop through the rows of data
			    while ( have_rows('circle_repeter', 'option') ) : the_row();
			    	?>
			    	<div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
				        <div class="circle circle--big">
				            <span class="circle__number "><?php the_sub_field('number'); ?></span>
				            <span class="circle__title"><?php the_sub_field('text'); ?></span>
				        </div>
			        </div>
					<?php
			    endwhile; ?>
			</div>
		<?php endif; ?>

		<?php

		$result = ob_get_contents();
		ob_clean();
	}
	return $result;
}



function breadcrumbs($separator = '<span class="sep">/</span>', $home = 'Home') {

	$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
	$breadcrumbs = array("<a class='breadcrumb-item' href=\"$base_url\">$home</a>");
	$last = count($path);

	foreach( $path as $x => $crumb ){
		$title = ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
		if( $x != $last ){
			$breadcrumbs[] = '<a href="'.$base_url.$crumb.'">'.$title.'</a>';
		}
		else {
			if (get_the_title()) {
				$title = get_the_title();
			}
			$breadcrumbs[] = '<span class="breadcrumb-item current">'.$title.'</span>';
		}
	}

	return implode( $separator, $breadcrumbs );
}

?>