<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php woocommerce_product_loop_start(); ?>
		<section class="all-films-section" >
			<div class="all-films">
				<?php	
		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => '4',
			'publish_status' => 'published',
			'orderby' => 'ASC',
			'product_cat'=> 'polecane',
			
		);
		$loop = new WP_Query( $args );
		if($loop->have_posts()) :
		while ( $loop->have_posts() ) : $loop->the_post();
			global $product; ?>
	<div class="single-film">
	<div class="vid-image shadow-box"><a class="w-100 img-anchor" href="<?php echo get_permalink(); ?>"><?php echo woocommerce_get_product_thumbnail(); ?></a></div>
	<div class="content-section shadow-box"><div class="d-flex justify-content-between w-100"><span class="date_published">Dodano: <p> <?php echo get_the_date('Y-m-d', $product->get_id()); ?></p></span> 
	
		<?php echo do_shortcode('[post-views]'); ?>
		</div>
		<a href="<?php echo get_permalink(); ?>" class="title-product"><?php echo get_the_title(); ?></a></div>
		</div>
		<?php endwhile;
			endif; ?>
			</div>
			
		</section>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
