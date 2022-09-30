<?php

/**
 * Fancy Lab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fancy Lab
 */

/**
 * Enqueue files for the TGM PLugin Activation library.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';



/**
 * Enqueue WP Bootstrap Navwalker library (responsive menu).
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
* Enqueue scripts and styles.
*/
function fancy_lab_scripts(){
	//Bootstrap javascript and CSS files
 	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
 	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );
 	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );

 	// Theme's main stylesheet
 	wp_enqueue_style( 'fancy-lab-style', get_stylesheet_uri(), array(), '1.0', 'all' );
 	wp_enqueue_style( 'custom-css',  get_template_directory_uri() . '/css/custom.css', '1.0', 'all' );

 	// Google Fonts
 	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

 	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 }
 add_action( 'wp_enqueue_scripts', 'fancy_lab_scripts' );



function fancy_lab_config(){

		register_nav_menus(
			array(
				'fancy_lab_main_menu' 	=> esc_html__( 'Fancy Lab Main Menu', 'fancy-lab' ),
				'fancy_lab_footer_menu' => esc_html__( 'Fancy Lab Footer Menu', 'fancy-lab' ),
			)
		);

	
		$textdomain = 'fancy-lab';
		load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' );
		load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

		// This theme is WooCommerce compatible, so we're adding support to WooCommerce
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 255,
			'single_image_width'	=> 255,
			'product_grid' 			=> array(
	            'default_rows'    => 10,
	            'min_rows'        => 5,
	            'max_rows'        => 10,
	            'default_columns' => 1,
	            'min_columns'     => 1,
	            'max_columns'     => 1,				
			)
		) );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

        /**
        * Add support for core custom logo.
        *
        * @link https://codex.wordpress.org/Theme_Logo
        */
		add_theme_support( 'custom-logo', array(
			'flex_height'	=> true,
			'flex_width'	=> true,
		) );

		add_theme_support( 'post-thumbnails' );
		add_image_size( 'fancy-lab-slider', 1920, 800, array( 'center', 'center' ) );
		add_image_size( 'fancy-lab-blog', 960, 640, array( 'center', 'center' ) );

		if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}	

		add_theme_support( 'title-tag' );			
}
add_action( 'after_setup_theme', 'fancy_lab_config', 0 );

/**
 * If WooCommerce is active, we want to enqueue a file
 * with a couple of template overrides
 */
if( class_exists( 'WooCommerce' )){
	require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment' );

function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
add_action( 'widgets_init', 'fancy_lab_sidebars' );
function fancy_lab_sidebars(){
	
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 1', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer1',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Sidebar 2', 'fancy-lab' ),
		'id'			=> 'fancy-lab-sidebar-footer2',
		'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	
}

/**
 * Adds custom classes to the array of body classes.
 */
function fancy_lab_body_classes( $classes ) {

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'fancy-lab-sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( ! is_active_sidebar( 'fancy-lab-sidebar-shop' ) ) {
		$classes[] = 'no-sidebar-shop';
	}

	if ( ! is_active_sidebar( 'fancy-lab-sidebar-footer1' ) && ! is_active_sidebar( 'fancy-lab-sidebar-footer2' ) && ! is_active_sidebar( 'fancy-lab-sidebar-footer3' ) ) {
		$classes[] = 'no-sidebar-footer';
	}

	return $classes;
}
add_filter( 'body_class', 'fancy_lab_body_classes' );
 //** *Enable upload for webp image files.*/
 function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);



function cptui_register_banner() {

	$labels = [
		"name" => __( "Banner", "vids" ),
		"singular_name" => __( "baner", "vids" ),
	];

	$args = [
		"label" => __( "banner", "vids" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "banner", "with_front" => true ],
		"query_var" => true,
		"supports" => [ 'title', 'custom-fields'],
		"taxonomies" => [ "" ],
		"show_in_graphql" => false,
	];

	register_post_type( "banner", $args );
}

add_action( 'init', 'cptui_register_banner' );




add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {

	foreach( $items as &$item ) {
	
		$icon = get_field('icon_menu', $item);
	
		if( $icon ) {
			
			$item->title .= '<img src="'.$icon["url"].'">';
			
		}
		
	}
	return $items;
	
}
function banner_front_page(){ 
	if(is_user_logged_in()){


	$args = array(
		'post_type'      => 'banner',
		'posts_per_page' => '1',
		'publish_status' => 'published',
		'order'			 => 'DESC',
	 );
	 
$query = new WP_Query($args);

if($query->have_posts()) :

while($query->have_posts()) :

$query->the_post() ;
	$link = get_field('banner_button');
	$content = '<section id="banner_section">';
	$content .= '<div class="banner_container">';
	$content .= '<div class="banner_image"><img src="'. get_field('banner_image')['url'].'" ></div>';
	$content .= '<div class="banner_content">';
	$content .=	'<h3 class="banner_slogan-logged-in">'.get_field('banner_title').'</h3>';
	$content .=	'<a class="banner_button" href="'.$link['url'] .'">'.$link['title'] .'</a>';
	$content .=	'</div>';
	$content .='</div>';
	$content .='</section>';
endwhile;
wp_reset_postdata();
endif;
	}else{
		$args = array(
			'post_type'      => 'banner',
			'posts_per_page' => '1',
			'publish_status' => 'published',
			'order'			 => 'ASC',
		 );
		 
$query = new WP_Query($args);

if($query->have_posts()) :

while($query->have_posts()) :

$query->the_post() ;
	$link = get_field('banner_button');
	$content = '<section id="banner_section">';	
	$content .= '<div class="banner_image no-logged-cnt d-flex justify-content-center"><img class="banner-no-logged" src="'. get_field('banner_image')['url'].'" ></div>';
	$content .='</section>';
endwhile;
wp_reset_postdata();
endif;
	}


return $content;
 } 

add_shortcode('banner', 'banner_front_page');

function slider_of_new(){


	$result = '<section class="splide" >';
	
	$result .=	'<div class="splide__track">';
	$result .= '<ul class="splide__list">';
			
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => '8',
			'publish_status' => 'published',
			'orderby' => 'date',
			'tax_query'            => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug', // Or 'name' or 'term_id'
					'terms'    => array('napiwek'),
					'operator' => 'NOT IN', // Excluded
				)
			)
			
		);
		
	
		$loop = new WP_Query( $args );
		if($loop->have_posts()) :
		
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product;	
			global $post;
			$size = 'full';
			$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
			$result .= '<li class="splide__slide splide__bestseller splide__slide_products ">';
			$result .= '<div class="vid-image shadow-box">';
			$current_user = wp_get_current_user();
			$user_id = $current_user->ID;
			$approved_status = get_user_meta($user_id, 'user_activation_status', true);

			if(is_user_logged_in() || user_verification_is_verified($approved_status)){
			$result .= '<a class="w-100 img-anchor video-link" href="'. get_permalink() .'">';
			}else{
				$result .= '<a class="w-100 img-anchor video-link" href="'. get_bloginfo('url') .'/moje-konto">';
			}
			if(!empty(get_field('product_trailer'))){
			$result .= '<video poster="'. get_the_post_thumbnail_url( $post->ID, $image_size ) .'" height="202" width="355" src="'. get_field('product_trailer')['url'] .'" class="id0" id="id0" onclick="window.location='. get_field('product_trailer')['url'] .';id0_pause()" loop muted title="video-thumbnail" ></video>';
			}else{
			$result .= '<video poster="'. get_the_post_thumbnail_url( $post->ID, $image_size ) .'" height="202" width="355" src="'. get_field('product_trailer_link').'" class="id0" id="id0" onclick="window.location='. get_field('product_trailer')['url'] .';id0_pause()" loop muted title="video-thumbnail" ></video>';
			}
			$result .= '</a></div>';
			$result .= '<div class="content-section shadow-box"><div class="content-header d-flex justify-content-between"><span class="date_published"><span class="prdct-header">Dodano: ' . get_the_date('Y-m-d', $product->get_id()) . '</span> </span>';
			$result .= '<span class="prdct-header">'. do_shortcode('[likebtn theme="slideshare" dislike_enabled="0" show_like_label="0" icon_dislike_show="0" counter_type="percent" tooltip_enabled="0" share_enabled="0"]') .' </span>';
			$result .=	do_shortcode('[post-views]');
			$result .='</div>';
			

			if(is_user_logged_in() || user_verification_is_verified($approved_status)){
			$result .='<a href="'. get_permalink() .'" class="title-product">'. get_the_title() .'</a></div>';
			} else{
				$result .='<a href="'. get_bloginfo('url') .'/moje-konto" class="title-product">'. get_the_title() .'</a></div>';
			}
			$result .='</li>';
		
		endwhile;
		wp_reset_postdata();
	endif;
		$result .='</ul>';
		$result .='</div>';
		$result .='</section>';
	return $result;
	}
	add_shortcode( 'najnowsze-produkty', 'slider_of_new' ); 
	
function slider_of_all_films(){
	$result = '<section class="all-films-section" >';	
	$result = '<div class="all-films" >';	
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => '12',
			'publish_status' => 'published',
			'orderby' => 'ASC',
			'tax_query'            => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug', // Or 'name' or 'term_id'
					'terms'    => array('napiwek'),
					'operator' => 'NOT IN', // Excluded
				)
				),
			'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
		);
		$loop = new WP_Query( $args );
		if($loop->have_posts()) :
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product;
			global $post;
			$size = 'full';
			$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
			$result .= '<div class="single-film ">';
			$result .= '<div class="vid-image shadow-box">';
			$result .= '<a class="w-100 img-anchor video-link" href="'. get_permalink() .'">';
			if(!empty(get_field('product_trailer'))){
			$result .= '<video poster="'. get_the_post_thumbnail_url( $post->ID, $image_size ) .'" height="202" width="355" src="'. get_field('product_trailer')['url'] .'" class="id0" id="id0" onclick="window.location='. get_field('product_trailer')['url'] .';id0_pause()" loop muted title="video-thumbnail" ></video>';
			}else{
			$result .= '<video poster="'. get_the_post_thumbnail_url( $post->ID, $image_size ) .'" height="202" width="355" src="'. get_field('product_trailer_link').'" class="id0" id="id0" onclick="window.location='. get_field('product_trailer')['url'] .';id0_pause()" loop muted title="video-thumbnail" ></video>';
			}
			$result .= '</a></div>';
			$result .= '<div class="content-section shadow-box"><div class="content-header d-flex justify-content-between"><span class="date_published"><span class="prdct-header">Dodano: ' . get_the_date('Y-m-d', $product->get_id()) . '</span></span>';
			$result .= '<span class="prdct-header">'. do_shortcode('[likebtn theme="slideshare" dislike_enabled="0" show_like_label="0" icon_dislike_show="0" counter_type="percent" tooltip_enabled="0" share_enabled="0"]') .' </span>';
			$result .=	do_shortcode('[post-views]');
			$result .='</div>';
			$result .='<a href="'. get_permalink() .'" class="title-product">'. get_the_title() .'</a></div>';
			$result .='</div>';
		endwhile;
	endif;
	$result .= '</div>';
	$result .= '<div class="pagintaion-container">';
	$result .= '<div class="pagintaion-content">';
	$big = 999999999; 
	$result .= paginate_links( array(
	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $loop->max_num_pages,
	'prev_text'    => '<span class="arrow-left-pag"></span>',
	'next_text'    => '<span class="arrow-right-pag"></span>',
	) );
	$result .= '</div>';
	$result .= '</div>';
	$result .='</section>';
		wp_reset_postdata();
	return $result;
	}
add_shortcode( 'wszystkie-filmy', 'slider_of_all_films' ); 

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
	if( has_term( 42, 'product_cat' ) ) {
		return __( 'Wyślij', 'woocommerce' ); 
	}else {
    return __( 'Wykup dostęp', 'woocommerce' ); }
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
	if( has_term( 42, 'product_cat' ) ) {
		return __( 'Wyślij', 'woocommerce' ); 
	}else {
    return __( 'Wykup dostęp', 'woocommerce' ); }
}
function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

function has_bought_items() {
    $bought = false;

    // Set HERE ine the array your specific target product IDs
    $prod_arr = array( '21', '67' );

    // Get all customer orders
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => 'shop_order', // WC orders post type
        'post_status' => 'wc-completed' // Only orders with status "completed"
    ) );
    foreach ( $customer_orders as $customer_order ) {
        // Updated compatibility with WooCommerce 3+
        $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;
        $order = wc_get_order( $customer_order );

        // Iterating through each current customer products bought in the order
        foreach ($order->get_items() as $item) {
            // WC 3+ compatibility
            if ( version_compare( WC_VERSION, '3.0', '<' ) ) 
                $product_id = $item['product_id'];
            else
                $product_id = $item->get_product_id();

            // Your condition related to your 2 specific products Ids
            if ( in_array( $product_id, $prod_arr ) ) 
                $bought = true;
        }
    }
    // return "true" if one the specifics products have been bought before by customer
    return 'PRODUKT ZAKUPIONY '. $bought;
}

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

function cw_change_product_price_display( $price ) {
	if( has_term( 42, 'product_cat' ) ) {}else {
    $price .= '<span class="custom-price-text">Cena: </span>';
	}
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'cw_change_product_price_display' );
add_filter( 'woocommerce_cart_item_price', 'cw_change_product_price_display' );

add_filter('tutor_student_registration_required_fields', 'required_phone_no_callback');
if ( ! function_exists('required_phone_no_callback')){
    function required_phone_no_callback($atts){
        $atts['last_name'] = '';
		
        return $atts;
    }
}
add_filter('tutor_student_registration_required_fields', 'required_first_no_callback');
if ( ! function_exists('required_first_no_callback')){
    function required_first_no_callback($attstwo){
        $attstwo['first_name'] = '';
		
        return $attstwo;
    }
}
add_action('user_register', 'add_phone_after_user_register');
add_action('profile_update', 'add_phone_after_user_register');
if ( ! function_exists('add_phone_after_user_register')) {
    function add_phone_after_user_register($user_id){
        if ( empty($_POST['first_name']) && empty($_POST['last_name'])) {
           
            update_user_meta($user_id, '_first_name', ' ');
            update_user_meta($user_id, '_last_name', ' ');
        }
    }
}

function wc_remove_checkout_fields( $fields ) {
// Billing fields
unset( $fields['billing']['billing_company'] );
unset( $fields['billing']['billing_phone'] );
unset( $fields['billing']['billing_state'] );
unset( $fields['billing']['billing_first_name'] );
unset( $fields['billing']['billing_last_name'] );
unset( $fields['billing']['billing_address_1'] );
unset( $fields['billing']['billing_address_2'] );
unset( $fields['billing']['billing_city'] );
unset( $fields['billing']['billing_postcode'] );
unset( $fields['billing']['billing_country'] );
unset( $fields['account']['account_username'] );
// Shipping fields
unset( $fields['shipping']['shipping_company'] );
unset( $fields['shipping']['shipping_phone'] );
unset( $fields['shipping']['shipping_state'] );
unset( $fields['shipping']['shipping_first_name'] );
unset( $fields['shipping']['shipping_last_name'] );
unset( $fields['shipping']['shipping_address_1'] );
unset( $fields['shipping']['shipping_address_2'] );
unset( $fields['shipping']['shipping_city'] );
unset( $fields['shipping']['shipping_postcode'] );
// Order fields
unset( $fields['order']['order_comments'] );
return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

function my_function($redirect_to) {
    $redirect_to = home_url().'/filmy ';
    return $redirect_to;
 }

 add_filter('tutor_login_redirect_url', 'my_function', 10, 1);

 add_action('template_redirect','my_non_logged_redirect');
function my_non_logged_redirect()
{
     if ((is_page('filmy')) && !is_user_logged_in() )
    {
        wp_redirect( home_url() .'/moje-konto/ '.'' );
        die();
    } else  if (is_product() && !is_user_logged_in() ){
		wp_redirect( home_url() .'/moje-konto/ '.'' );
        die();
	} 

} 
   
add_filter( 'woocommerce_registration_auth_new_customer', '__return_false' );

@ini_set( 'upload_max_size' , '64000M' );
@ini_set( 'post_max_size', '64000M');