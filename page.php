<?php get_header();

$enable_boxed_content = get_field('enable_boxed_content', 'option');
$enable_sidebar = get_field('enable_sidebar', 'option');
$sidebar_order = get_field('sidebar_order', 'option');
$sidebar_display = get_field('sidebar_display', 'option');
$acf_content_background = get_field('content_background_colour', 'option');
$content_background = $enable_boxed_content ? $acf_content_background : '';  ?>

<div class="container">

	<div class="page <?php echo $enable_sidebar ? ' -has-sidebar' : ''; echo $enable_boxed_content ? ' -boxed': ''; echo $sidebar_order === 'left'? ' -sidebar-left' : ''; echo $sidebar_display === 'inside' ? ' -sidebar-inside': ''; ?>">

		<div class="content-box" style="background-color:<?php echo esc_attr($content_background); ?>;">

			<div id="content" class="content">

				<?php if(have_posts()) {
					while(have_posts()) {
						the_post();

						the_title('<h1>', '</h1>');

						the_content();

					}
				} ?>
				
			</div>

			<?php if($enable_sidebar && $sidebar_display === 'inside') { ?>

				<div class="sidebar">

					<?php get_sidebar(); ?>

				</div>

			<?php } ?>

		</div>

		<?php if($enable_sidebar && $sidebar_display !== 'inside') { ?>

			<div class="sidebar">

				<?php get_sidebar(); ?>

			</div>

		<?php } ?>

	</div>

</div>

<?php get_footer();