<?php 
 $icon_heading_text = get_field('oo_icon_heading_text');
 $icon_heading_image = get_field('oo_icon_heading_image');
 $icon_heading_level = get_field('oo_icon_heading_level');
?>

<div class="oo-icon-heading_wrap">
	<?php switch ($icon_heading_level) {
		case "1": ?>
			<h1 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h1>
			<?php break;
		case "2": ?>
			<h2 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h2>
			<?php break;       
		case "3": ?>
			<h3 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h3>
			<?php break;
		case "4": ?>
			<h4 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h4>
			<?php break;
		case "5": ?>
			<h5 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h5>
			<?php break;
		case "6": ?>
			<h6 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h6>
			<?php break;
		default: ?>
		<h3 class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h3>
		<?php } ?>
</div>	