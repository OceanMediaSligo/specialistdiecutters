<?php get_header(); ?>

	<header class="oo-hero-header">
		<div style="background-image: url(https://picsum.photos/1600/1000);" class="oo-hero-header_background-image" role="presentation" aria-hidden="true"></div>
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
					<p class="oo-hero-header_message">Diecut Adhesive Specialists</p>
					<div class="oo-hero-header_cta">
						<a href="" class="button -white -pill -has-icon">
							<span class="button_icon"><?php echo oo_icon('phone'); ?></span>
							Call Today
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Note to Darren: The block name is Text Media Box Pair -->
	<section class="row equal-height-cols grid-panel">
		<div class="grid-panel_item col-md-8">
			<div class="text-media-box-pair_text centered-content -centered-large">
				<div class="centered-content_inner">
					<h3>Example Heading</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris.</p>
					<a href="" class="button -pill -has-icon">
						<span class="button_icon"><?php echo oo_icon('phone'); ?></span>
						Call Today
					</a>
				</div>
			</div>
		</div>
		<div class="grid-panel_item col-md-4">
			<div class="text-media-box-pair_media">
				<img src="https://picsum.photos/400">
			</div>
		</div>
	</section>
	<!-- When all sections are converted to blocks, only this loop will be left on the page.
	Our Services heading and text created with GetWid Section block -->
	<?php if(have_posts()) {
		while(have_posts()) {
			the_post();
			the_content();
		}
	} ?>
	<section class="page-links_grid row equal-height-cols grid-panel">
		<!-- Block Name: Page Link Grid -->
		<div class="col-sm-6 col-md-4 grid-panel_item">
			<a href="#" class="page-links_item">
				<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
				<div class="page-links_item-main">
					<h3 class="page-links_item-title">Clean Room Production</h3>
					<p class="page-links_item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-md-4 grid-panel_item">
			<a href="#" class="page-links_item">
				<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
				<div class="page-links_item-main">
					<h3 class="page-links_item-title">Die Cutting</h3>
					<p class="page-links_item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-md-4 grid-panel_item">
			<a href="#" class="page-links_item">
				<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
				<div class="page-links_item-main">
					<h3 class="page-links_item-title">Laminating</h3>
					<p class="page-links_item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-md-4 grid-panel_item">
			<a href="#" class="page-links_item">
				<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
				<div class="page-links_item-main">
					<h3 class="page-links_item-title">Manufacturing</h3>
					<p class="page-links_item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-md-4 grid-panel_item">
			<a href="#" class="page-links_item">
				<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
				<div class="page-links_item-main">
					<h3 class="page-links_item-title">Laser Cutting</h3>
					<p class="page-links_item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-md-4 grid-panel_item">
			<a href="#" class="page-links_item">
				<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
				<div class="page-links_item-main">
					<h3 class="page-links_item-title">Technical Tape Solutions</h3>
					<p class="page-links_item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
			</a>
		</div>
	</section>
	<section class="row equal-height-cols grid-panel">
		<!-- Block Name: Text List Box Pair -->
		<div class="grid-panel_item col-md-4">
			<div class="text-list-box-pair_list">
				<ul class="tick-list">
					<li><?php echo oo_icon('check-circle'); ?>ISO 9001 2015</li>
					<li><?php echo oo_icon('check-circle'); ?>ISIR Quality Control Plan</li>
					<li><?php echo oo_icon('check-circle'); ?>FMEA Process Flow</li>
					<li><?php echo oo_icon('check-circle'); ?>Guage R&R</li>
				</ul>
			</div>
		</div>
		<div class="grid-panel_item col-md-8">
			<div class="text-list-box-pair_text centered-content -centered-large">
				<div class="centered-content_inner">
					<h3>Example Heading</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris.</p>
					<a href="" class="button -pill -has-icon">
						<span class="button_icon"><?php echo oo_icon('phone'); ?></span>
						Call Today
					</a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();