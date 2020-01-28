<section class="page-links_grid row equal-height-cols grid-panel">

	<?php if( have_rows('oo_page_links_repeater') ): ?>
	<?php while( have_rows('oo_page_links_repeater') ): the_row(); 
		
		// vars
		$heading = get_sub_field('oo_page_links_heading');
		$text = get_sub_field('oo_page_links_text');
		$link = get_sub_field('oo_page_links_link');

	?>

				<div class="col-sm-6 col-md-4 grid-panel_item">
					<?php if($link): ?>
						<a href="<?php echo $link; ?>" class="page-links_item">		
					<?php endif; ?>
						<div class="page-links_item-background" style="background-image: url(https://picsum.photos/500);"></div>
						<div class="page-links_item-main">

							<?php if($heading): ?>
								<h3 class="page-links_item-title"><?php echo $heading; ?></h3>
							<?php endif; ?>

							<?php if($text) : ?>
								<p class="page-links_item-text"><?php echo $text; ?></p>
							<?php endif; ?>

						</div>
					<?php if($link): ?>
					</a>	
				<?php endif; ?>
				</div>			
			


	<?php endwhile; ?>
	<?php endif; ?>
</section>		