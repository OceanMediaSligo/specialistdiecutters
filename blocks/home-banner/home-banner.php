<?php 
$banner_heading = get_field('oo_homepage_banner_heading');
$banner_bg_image = get_field('oo_homepage_banner_background_image');
$banner_button_link = get_field('oo_homepage_banner_button_link');
?>

<header class="oo-hero-header">
	<div style="background-image: url(<?php echo $banner_bg_image; ?>);" class="oo-hero-header_background-image" role="presentation" aria-hidden="true"></div>
	<div class="container">
		<div class="oo-hero-header_inner">
			<div class="oo-hero-header_top">
				<div class="oo-hero-header_logo">
					<a href="<?php echo site_url(); ?>">
						<h1 class="sr-only"></h1>
						<img src="https://picsum.photos/300/100">
					</a>
				</div>
				<nav class='oo-hero-header_navbar navbar navbar-default'>
		            <button class="navbar-toggle -square -white" data-toggle="collapse" data-target="#oo-hero-header-main-menu" 
		                        aria-expanded="false" aria-controls="main-menu">
		                <span class="sr-only">Menu</span>
		             	<?php oo_icon('bars'); ?>
		            </button>
		            <?php wp_nav_menu(array(
		              'theme_location'  => 'main',
		              'depth'           => 2,
		              'container'       => 'ul',
		              'menu_id'         => 'oo-hero-header-main-menu',
		              'menu_class'      => 'navbar-collapse collapse oo-hero-header_main-menu menu',
		              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
		              'walker'          => new WP_Bootstrap_Navwalker()
		            )); ?>
		        </nav>
			</div>
			<div class="oo-hero-header_main">
				<p class="oo-hero-header_message"><?php echo $banner_heading; ?></p>
				<div class="oo-hero-header_cta">
					<a href="tel:<?php echo esc_url($banner_button_link); ?>" class="button -white -pill -has-icon">
						<span class="button_icon"><?php echo oo_icon('phone'); ?></span>
						Call Today
					</a>
				</div>
			</div>
		</div>
	</div>
</header>