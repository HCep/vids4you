<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #page div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fancy Lab
 */

?>
		<footer>
			<section class="footer-widgets">
				
					<div class="footer-section-one">
					<div class="container d-flex ">
					<?php
											wp_nav_menu( array(
												'theme_location'    => 'fancy_lab_footer_menu',
												'depth'             => 3,
												'container_class'   => 'footer-menu',
												'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
												'walker'            => new WP_Bootstrap_Navwalker(),
											) );
											?>
						<?php if( is_active_sidebar( 'fancy-lab-sidebar-footer1' ) ): ?>
							<div class="logo-footer-cnt">
								<?php dynamic_sidebar( 'fancy-lab-sidebar-footer1' ); ?>
							</div>
						<?php endif; ?>
						
															
					</div>
					</div>
					<div class="footer-section-two">
						<div class="container d-flex">
					<?php if( is_active_sidebar( 'fancy-lab-sidebar-footer2' ) ): ?>
							<div class="d-flex justify-content-end links-footer">
								<?php dynamic_sidebar( 'fancy-lab-sidebar-footer2' ); ?>
							</div>
						<?php endif; ?>	
					</div>
					</div>
					<div class="footer-section-three">
						<a class="brand-link" href="https://coolbrand.pl/" target="_blank">Coolbrand 22'</a>
					</div>
				</div>
			</section>
			
		</footer>
	</div>
<?php wp_footer(); ?>

<script type="text/javascript" src="<?php  echo get_stylesheet_directory_uri(); ?>/js/splide.min.js"></script>
<script>

document.addEventListener( 'DOMContentLoaded', function () {
	
	
new Splide( '.splide', {
	loop:true,
  rewind: true,
  speed: number = 400,
  perPage: 4,
  breakpoints: {
		992: {
			perPage: 2,
		},
		700: {
			perPage:1,
		}
	},
  perMove: 1,
 
 
} ).mount();
});
</script>
<?php 
$current_url = weglot_get_current_full_url();
if (strpos( $current_url, "/en/")!==false){ ?>
<script type="text/javascript">
	jQuery(document).ready(function(){	
	jQuery('.tutor-dashboard-menu-purchase_history a .tutor-ml-12').text('Order History');
})
</script>
<?php	} else { ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
	jQuery('.tutor-dashboard-menu-purchase_history a .tutor-ml-12').text('Historia zamówień');

})
</script>

	<?php	}  ?>
	<script type="text/javascript">


</script>
</body>
</html>