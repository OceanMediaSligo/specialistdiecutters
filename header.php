<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<?php $background_colour = !is_front_page() && get_field('enable_boxed_content', 'option') ? get_field('body_background_colour', 'option') : ''; ?>
<body <?php body_class(); ?> style="background-color:<?php echo esc_attr($background_colour); ?>;">
	<div class="header-ss">
		<img src="http://localhost/specialistdiecutters/wp-content/uploads/2020/01/headerss.png" />
	</div>

	<div class="temp-menu">
		<?php wp_nav_menu(array( 
                            'theme_location'  => 'main',
                            'depth'           => 2,
                            'container_id'    => 'main-menu',
                            'container_class' => 'navbar-collapse collapse',
                            'menu_class'      => 'menu',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker()
                        )); ?>
	</div>


