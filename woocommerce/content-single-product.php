<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
	<div class="back-button-cnt" style="width:200px; margin-bottom:20px;">
<a href="<?php echo home_url(); ?>/filmy/" class="tutor-btn tutor-btn-primary tutor-btn-block">
		Powrót	</a>
        </div>
		<div class="header-summary d-flex justify-content-start">

		
		<?php
		if( has_term( 42, 'product_cat' ) ) {}
		else{
			
		echo '<div><span class="prdct-header">Czas trwania: '. get_field('product_time') .'</span></div>';
		echo '<div class="mx-3"><span class="prdct-header">Ocena: '. do_shortcode('[likebtn theme="slideshare" dislike_enabled="0" show_like_label="0" icon_dislike_show="0" counter_type="percent" tooltip_enabled="0" share_enabled="0"]') .' </span></div>';

		echo '<div class="d-flex align-items-center"><span class="prdct-header pr-3">Wyświetlenia:</span> '. do_shortcode('[post-views]') .'</div>';
		}?>
</div>
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		
		do_action( 'woocommerce_single_product_summary' );
	?>
	<div class="section-product-gallery">
		<?php
    //Get the images ids from the post_metadata
    $images = acf_photo_gallery('product_gallery', $post->ID);
    //Check if return array has anything in it
    if( count($images) ):
        //Cool, we got some data so now let's loop over it
        foreach($images as $image):
            $id = $image['id']; // The attachment id of the media
            $title = $image['title']; //The title
            $caption= $image['caption']; //The caption
            $full_image_url= $image['full_image_url']; //Full size image url
            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
            $url= $image['url']; //Goto any link when clicked
            $target= $image['target']; //Open normal or new tab
            $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
            $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
?>
<div class="single-thumbnail-cnt">
    <div class="thumbnail">
        <a href="<?php echo $full_image_url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>>
            <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
        </a>
    </div>
</div>
<?php endforeach; endif; ?>
		
	</div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
