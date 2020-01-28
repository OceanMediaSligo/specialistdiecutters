<?php 
$heading = get_field('oo_text_list_box_pair_heading');
$text = get_field('oo_text_list_box_pair_text');
$button_text = get_field('oo_text_list_box_pair_button_text');
$button_link = get_field('oo_text_list_box_pair_button_link');
?>

<section class="row equal-height-cols grid-panel">
		<div class="grid-panel_item col-md-4">
			<div class="text-list-box-pair_list">
					<?php if( have_rows('oo_text_list_box_pair_list') ): ?>
						<ul class="tick-list">	
							<?php while( have_rows('oo_text_list_box_pair_list') ): the_row(); 							
								// vars
								$list_item = get_sub_field('oo_text_list_box_pair_list_item'); ?>
								<?php if($list_item) : ?>
								<li><?php echo oo_icon('check-circle'); ?><?php echo $list_item; ?></li>	
							<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
			</div>
		</div>
		<div class="grid-panel_item col-md-8">
			<div class="text-list-box-pair_text centered-content -centered-large">
				<div class="centered-content_inner">
					<?php if($heading) : ?>
						<h3><?php echo $heading; ?></h3>
					<?php endif; ?>
						
						<?php echo $text; ?>
					<?php if($button_link) : ?>
						<a href="<?php echo esc_url($button_link); ?>" class="button -pill -has-icon">
					<?php endif; ?>
						<span class="button_icon"><?php echo oo_icon('phone'); ?></span>
						<?php echo $button_text; ?>
					
					<?php if($button_link) : ?>
						</a>
					<?php endif; ?>
				
				</div>
			</div>
		</div>
	</section>




<?php if($link): ?>
	<a href="<?php echo $link; ?>" class="page-links_item">		
<?php endif; ?>