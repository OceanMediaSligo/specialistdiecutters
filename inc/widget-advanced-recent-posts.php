<?php

// Register Recent Posts (filtered by type and taxonomy)

add_action( 'widgets_init', 'oo_register_widget_advanced_recent_posts' );

function oo_register_widget_advanced_recent_posts() {

	register_widget( 'oo_widget_advanced_recent_posts' );

}

class oo_widget_advanced_recent_posts extends WP_Widget {

	public function __construct() {
	
		parent::__construct(
	
			'oo_widget_advanced_recent_posts',
			'Recent Posts',
			array(
				'classname'   => 'oo-widget-recent-posts',
				'description' => 'Display recent posts with type and taxonomy filters'
			)
	
		);
	
	}

	// Build the widget settings form

	function form( $instance ) {
	
		$defaults       = array( 'title' => '', 'type' => '', 'term' => 'any', 'exclude_term' => '', 'show_image' => 1, 'show_date' => 1, 'number' => 5);
		$instance       = wp_parse_args( ( array ) $instance, $defaults );
		$title          = $instance['title'];
		$type           = $instance['type'];
		$term 	        = $instance['term']; 
		$exclude_term   = $instance['exclude_term'];
		$show_image     = $instance['show_image']; 
		$show_date      = $instance['show_date'];
		$number         = $instance['number']; ?>
		
		<p>
			<label for="oo_widget_advanced_recent_posts_title">Title:</label>
			<input type="text" class="widefat" id="oo_widget_advanced_recent_posts_title" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="oo_widget_advanced_recent_posts_type">Post Type:</label>				
			
			<?php $post_types = get_post_types(array(
			   'public' => true
			), 'objects');
			$taxonomies = get_taxonomies(array(
				'public'   => true
			), 'objects'); ?>

			<select id="oo_widget_advanced_recent_posts_type" name="<?php echo $this->get_field_name('type'); ?>" class="widefat">
				<?php foreach($post_types as $new_type) {
					$slug = $new_type->name;
					if($slug !== 'attachment') {
						$name = $new_type->labels->singular_name; ?>
						<option value="<?php echo esc_attr($slug); ?>" <?php echo $slug == $type ? 'selected' : ''; ?>><?php echo $name; ?></option>
					<?php }
				} ?>
			</select>
		</p>

		<p>
			<label for="oo_widget_advanced_recent_posts_term">Term:</label>
			<select id="oo_widget_advanced_recent_posts_term" class="widefat" name="<?php echo $this->get_field_name('term'); ?>">
				<option value="any" <?php echo $term == 'any' ? 'selected' : ''; ?>>Any terms</option>
				<?php foreach($taxonomies as $taxonomy) {
					$tax_slug = $taxonomy->name;
					$tax_name = $taxonomy->label;
					$terms = get_terms($tax_slug, array(
						'hide_empty' => false
					));
					if($terms) { ?>
						<optgroup label="<?php echo esc_attr($tax_name); ?>">
							<?php foreach($terms as $new_term) { ?>
								<option value="<?php echo esc_attr($tax_slug . '-' . $new_term->slug); ?>" <?php echo $tax_slug . '-' . $new_term->slug == $term ? 'selected' : ''; ?>><?php echo $new_term->name; ?></option>
							<?php } ?>
						</optgroup>
					<?php }
				} ?>
			</select>
		</p>

		<p>
			<input type="checkbox" id="oo_widget_advanced_recent_posts_exclude_term" class="checkbox" name="<?php echo $this->get_field_name('exclude_term'); ?>" <?php checked($exclude_term, 1); ?> />
			<label for="oo_widget_advanced_recent_posts_exclude_term">Exclude term</label>
		</p>

		<p>
			<input type="checkbox" id="oo_widget_advanced_recent_posts_show_image" class="checkbox" name="<?php echo $this->get_field_name('show_image'); ?>" <?php checked($show_image, 1); ?> />
			<label for="oo_widget_advanced_recent_posts_show_image">Show featured image</label>
		</p>

		<p>
			<input type="checkbox" id="oo_widget_advanced_recent_posts_show_date" class="checkbox" name="<?php echo $this->get_field_name('show_date'); ?>" <?php checked($show_date, 1); ?> />
			<label for="oo_widget_advanced_recent_posts_show_date">Show post date</label>
		</p>

		<p>
			<input type="text" id="oo_widget_advanced_recent_posts_number" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo esc_attr($number); ?>" size="3" />
			<label for="oo_widget_advanced_recent_posts_number">Number of posts to show</label>
		</p>
		
		<?php
	
	}

	// Save widget settings

	function update( $new_instance, $old_instance ) {

		$instance                   = $old_instance;
		$instance['title']          = wp_strip_all_tags( $new_instance['title'] );
		$instance['type']           = wp_strip_all_tags( $new_instance['type'] );
		$instance['term']           = wp_strip_all_tags( $new_instance['term'] );
		$instance['exclude_term']   = isset( $new_instance['exclude_term'] ) ? 1 : 0;
		$instance['show_image']     = isset( $new_instance['show_image'] ) ? 1 : 0;
		$instance['show_date']      = isset( $new_instance['show_date'] ) ? 1 : 0;
		$instance['number']         = is_numeric( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;

		return $instance;

	}

	// Display widget

	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		$title          = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$type           = $instance['type'];
		$term           = $instance['term'];
		$exclude_term   = $instance['exclude_term'] === 1 ? true : false;
		$show_image     = $instance['show_image'] === 1 ? true : false;
		$show_date      = $instance['show_date'] === 1 ? true : false;
		$number         = $instance['number'];

		/*$county_query = !empty($county) ? array('taxonomy' => 'property-county', 'field' => 'name', 'terms' => $county) : array();
		$town_city_query = !empty($town_city) ? array('taxonomy' => 'property-town-city', 'field' => 'name', 'terms' => $town_city) : array();
		$tax_query = !empty($county_query) || !empty($town_city_query) ? array('relation' => 'OR', $county_query, $town_city_query) : array();*/
		$tax = explode('-', $term )[0];
		$term = explode('-', $term )[1];
		$operator = $exclude_term ? 'NOT IN' : 'IN';
		$term_query = isset($term) && $term !== 'any' ? array('taxonomy' => $tax, 'field' => 'slug', 'terms' => $term, 'operator' => $operator) : false;
		$tax_query = $term_query ? array($term_query) : array();

		if(!empty($title)) {
			echo $before_title . $title . $after_title;
		} 

		$recent_posts_of_type = new WP_Query( array( 
			'post_type'      => $type,
			'posts_per_page' => $number,
			'tax_query' => $tax_query,
			'post__not_in' => array(get_the_ID())
		));
		if ($recent_posts_of_type->have_posts()) {
			while ($recent_posts_of_type->have_posts()) {
				$recent_posts_of_type->the_post();
				$has_image = $show_image && has_post_thumbnail() ? true : false; ?>
				<div class="oo-widget-recent-posts_item cf <?php echo $has_image ? ' -has-image' : ''; ?>">
					<a href="<?php echo get_permalink(); ?>" class="oo-widget-recent-posts_link">
						<?php if($has_image) { ?>
							<div class="oo-widget-recent-posts_image">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
						<?php } ?>
						<div class="oo-widget-recent-posts_main">
							<h4 class="oo-widget-recent-posts_title"><?php the_title(); ?></h4>
							<?php if($show_date) { ?>
								<span class="oo-widget-recent-posts_date"><?php echo get_the_time(get_option('date_format')); ?></span>
							<?php } ?>
						</div>
					</a>
				</div>
			<?php }
		}
		wp_reset_postdata();
		echo $after_widget;
	}

}

