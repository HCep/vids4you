<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fancy Lab
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Imagetoolbar" content="no">
	<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
	<meta name="likebtn-website-verification" content="b0b7e52a04a91279" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php  echo get_template_directory_uri(); ?>/css/splide.min.css">
	<link rel="stylesheet" href="<?php  echo get_stylesheet_directory_uri(); ?>/css/hamburgers.css">
	
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NSY2D1ERE2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-NSY2D1ERE2');
</script>
	

	<style>
		<?php 		 
		global $wp;
    $current_url = weglot_get_current_full_url();

			if (strpos( $current_url, "/en/")!==false){ ?>
			#menu-item-weglot-270-en{
			background-color:white;
			
		}
		#menu-item-weglot-270-en a{
				color:black;
			}
	<?php	} else { ?>
		#menu-item-weglot-270-pl{
			background-color:white;
			
		}
		#menu-item-weglot-270-pl a{
				color:black;
			}
		
	<?php } ?>
		
    
		<?php if(is_front_page() || is_page('filmy') || is_page('films')){ ?>
			.site{
			background-image:url('<?php echo get_template_directory_uri() ?>/img/tlo.svg');
			background-repeat:no-repeat;
			background-position:center;
			background-size:cover;
		}
		<?php } ?>
	
		.pagintaion-container{
			display:flex;
		}
		.pagintaion-content{
			position:relative;
			display:inline-flex;
			margin:30px auto;
		}
		.page-numbers{
			display: inline-block;
			width: 34px;
			height: 34px;
			padding-top: 5px;
			text-align: center;
			margin-right: 10px;
			border: 1px solid #7A7A7A;
			color: #7A7A7A;
		}
		.current{
			background-color:#7A7A7A;
			color:#fff;
		}
		.page-numbers:nth-child(1):not(.current), .page-numbers:last-child:not(.current){
			display: inline;
			width: 0px;
			height: 0px;
			border: 0px;
		}
		.page-numbers:nth-child(1)::before, .arrow-right-pag::before{
			content:'';
			position:absolute;
			top:50%;
			transform:translateY(-50%);
			width:7px;
			height:14px;
			background-repeat:no-repeat;
			background-size:cover;
		}
		.page-numbers:nth-child(1)::before{
			background-image:url('<?php echo get_template_directory_uri() ?>/img/pagination-arrow-left.svg');
			left:-1.5rem;
			
		}
		.arrow-right-pag::before{
			background-image:url('<?php echo get_template_directory_uri() ?>/img/pagintaion-arrow-right.svg');
			right:-1.5rem;
			
		}
		.tutor-dashboard-menu-enrolled-courses .tutor-dashboard-menu-item-link .tutor-dashboard-menu-item-icon::after{
		content:'';
			display:block;
			width:24px;
			height:18px;
			background-image:url('<?php echo get_template_directory_uri() ?>/img/film.svg');
	}
		.tutor-dashboard-menu-enrolled-courses:not(.active) .tutor-dashboard-menu-item-link .tutor-dashboard-menu-item-icon::after {
			content:'';
			display:block;
			width:24px;
			height:18px;
			background-image:url('<?php echo get_template_directory_uri() ?>/img/film-red.svg');
	}
	.post-views:after{
		content:'';
		display:block;
		position:absolute;
		right:-5px;
		top:5px;
		height:15px;
		width:21px;
		background-image:url('<?php echo get_template_directory_uri() ?>/img/post-views.svg');
		background-size:contain;
		background-repeat: no-repeat;
		
	}
	<?php if(is_single()){ ?>
		.post-views:after{
		content:'';
		display:block;
		position:absolute;
		right:-5px;
		top:6px;
		height:15px;
		width:21px;
		background-image:url('<?php echo get_template_directory_uri() ?>/img/post-views.svg');
		background-size:contain;
		background-repeat: no-repeat;
		
	}
		.post-views{
    position:relative;
    margin-right:20px;
    top:0px;}
	<?php } ?>
	<?php if(is_front_page()){ ?>
		.video-link video{
				width:100%;
				filter: blur(7px);
		}
<?php	} ?>
<?php if(is_user_logged_in()){
	?>
	.logged-none{
		display:none;
	}
<?php } else { ?>
	.no-logged{
		display:none!important;
	}
<?php }
if( has_term( 42, 'product_cat' ) ) { ?>
	.single-price{
		display:none;
	}
	.product_title{
		margin:0 auto;
	}
	.woocommerce div.product form.cart{
		margin:20px auto;
	}
	.woocommerce div.product form.cart .button{
		margin:10px auto;
		float:none;
	}
	.cart{
		width:100%;
	}
	.item-price, .product-price, .price{
		justify-content:center;
	}
	.woocommerce-product-details__short-description{
		order:10;
		margin:10px auto;
	}
	.product_title{
		font-weight:bold;
	}
	.woocommerce div.product form.cart .variations{
		width:100%;
		margin:20px auto;

	}
	@media (min-width:768px){
		.woocommerce div.product form.cart .variations{width:60%;}
	}
<?php }else{ 
	
	} ?>
	</style>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> nselectstart="return false" onselect="return false" oncopy="return false" oncontextmenu="return false" ondragstart="return false" ondrag="return false" onbeforeprint="document.body.style.visibility = 'hidden'; alert('Wydruk jest niedostępny!')" onafterprint="document.body.style.visibility = 'visible'">
	<div id="page" class="site">
		<header>
			<section class="top-bar">
				<div class="container">	
					<nav class="navbar navbar-expand-lg d-flex align-items-center" id="site-header">
						<div class="brand text-md-center text-left">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php if( has_custom_logo() ): ?>
									<?php the_custom_logo(); ?>
								<?php else: ?>
									<p class="site-title"><?php bloginfo( 'title' ); ?></p>
									<span><?php bloginfo( 'description' ); ?></span>
								<?php endif; ?>
							</a>
						</div>
						<button class="hamburger hamburger--squeeze navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>

						</button>

						<div class="collapse navbar-collapse " id="navbarNavAltMarkup">
							<div class="navbar-nav">
							<?php
											wp_nav_menu( array(
												'theme_location'    => 'fancy_lab_main_menu',
												'depth'             => 3,
												'container'         => 'div',
												'container_class'   => 'main-menu',
												'container_id'      => 'bs-example-navbar-collapse-1',
												'menu_class'        => 'nav navbar-nav',
												'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
												'walker'            => new WP_Bootstrap_Navwalker(),
											) );
											?>
								<?php if( class_exists( 'WooCommerce' ) ): ?>

									<div class="cart cart-icon-cnt ml-md-3 text-center mt-0 mb-0 mr-0">
										<?php if(get_locale() == 'en_GB'){ ?>
											<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span class="cart-icon"></span><span class="cart-text">Cart</span></a>
										<?php } else { ?>
											<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span class="cart-icon"></span><span class="cart-text">Koszyk</span></a>
										<?php } ?>
										
									<span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
									</div>

									<?php endif;?>

							</div>

						</div>
	
					</nav>
				</div>
			</section>
		</header>		

