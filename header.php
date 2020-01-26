<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<?php $background_colour = !is_front_page() && get_field('enable_boxed_content', 'option') ? get_field('body_background_colour', 'option') : ''; ?>
<body <?php body_class(); ?> style="background-color:<?php echo esc_attr($background_colour); ?>;">
	<?php if(!is_front_page()) {

		// Enter regular header

	} ?>


