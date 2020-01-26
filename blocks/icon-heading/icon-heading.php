<?php 
 $icon_heading_text = get_field('oo_icon_heading_text');
 $icon_heading_image = get_field('oo_icon_heading_image');
 $icon_heading_level = get_field('oo_icon_heading_level');
?>

<h<?php echo $icon_heading_level; ?> class="oo-icon-heading"><img src="<?php echo esc_url($icon_heading_image); ?>" /><?php echo $icon_heading_text; ?></h<?php echo $icon_heading_level; ?>>
