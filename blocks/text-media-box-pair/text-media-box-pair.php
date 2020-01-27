<?php 
$heading = get_field('oo_text_media_box_pair_heading');
$text = get_field('oo_text_media_box_pair_text');
$button_text = get_field('oo_text_media_box_pair_button_text');
$button_link = get_field('oo_text_media_box_pair_button_link');
$right_image = get_field('oo_text_media_box_pair_image');
?>

<!-- Note to Darren: The block name is Text Media Box Pair -->
	<section class="row equal-height-cols grid-panel">
		<div class="grid-panel_item col-md-8">
			<div class="text-media-box-pair_text centered-content -centered-large">
				<div class="centered-content_inner">
					<h3><?php echo $heading; ?></h3>
					<?php echo $text; ?>
					<a href="<?php echo esc_url($button_link); ?>" class="button -pill -has-icon">
						<span class="button_icon"><?php echo oo_icon('phone'); ?></span>
						<?php echo $button_text; ?>
					</a>
				</div>
			</div>
		</div>
		<div class="grid-panel_item col-md-4">
			<div class="text-media-box-pair_media">
				<img src="<?php echo $right_image; ?>">
			</div>
		</div>
	</section>