<?php

class Miyazaki_Recent_Posts extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' 	=> 'widget_miyazaki_recent_posts',
			'description' 	=> __( 'Displays recent blog entries.', 'miyazaki' ),
		);
		parent::__construct( 'widget_miyazaki_recent_posts', __( 'Recent Posts', 'miyazaki' ), $widget_ops );
	}

	function widget( $args, $instance ) {

		extract( $args );

		$widget_title = null;
		$number_of_posts = null;

		$widget_title = wp_kses_post( apply_filters( 'widget_title', $instance['widget_title'] ) );
		$number_of_posts = esc_attr( $instance['number_of_posts'] );

		echo $before_widget;

		if ( ! empty( $widget_title ) ) {
			echo $before_title . $widget_title . $after_title;
		}

		if ( $number_of_posts == 0 ) {
			$number_of_posts = 3;
		}

		global $post;

		$ignore = get_option( 'sticky_posts' );

		$recent_posts = get_posts( array(
			'ignore'			=> $ignore,
			'posts_per_page' 	=> $number_of_posts,
			'post_status'    	=> 'publish',
		) );

		if ( $recent_posts ) : 
			
			?>

			<ul class="miyazaki-widget-list">

				<?php 
				
				foreach ( $recent_posts as $post ) :

					setup_postdata( $post );

					?>

					<li>

						<a href="<?php the_permalink(); ?>">

							<?php
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
							$image_url = $image ? $image[0] : miyazaki_get_fallback_image_url();
							?>

							<div class="post-image" style="background-image: url( <?php echo esc_url( $image_url ); ?> );"></div>

							<div class="inner">

								<h6><?php the_title(); ?></h6>
								<p><?php the_time( get_option( 'date_format' ) ); ?></p>

							</div>

						</a>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php 
			
			wp_reset_postdata();
		
		endif;

		echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );

		// Make sure we are getting a number
		$instance['number_of_posts'] = is_int( intval( $new_instance['number_of_posts'] ) ) ? intval( $new_instance['number_of_posts'] ) : 3;

		// Update and save the widget
		return $instance;

	}

	function form( $instance ) {

		// Set defaults
		if ( ! isset( $instance['widget_title'] ) ) {
			$instance['widget_title'] = '';
		}

		if ( ! isset( $instance['number_of_posts'] ) ) {
			$instance['number_of_posts'] = 3;
		}

		// Get the options into variables, escaping html characters on the way
		$widget_title = $instance['widget_title'];
		$number_of_posts = $instance['number_of_posts'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php  _e( 'Title', 'miyazaki' ); ?>:
			<input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" class="widefat" value="<?php echo wp_kses_post( $widget_title ); ?>" /></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of posts to display', 'miyazaki' ); ?>:
			<input id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" class="widefat" value="<?php echo esc_attr( $number_of_posts ); ?>" /></label>
			<small>(<?php _e( 'Defaults to 3 if empty', 'miyazaki' ); ?>)</small>
		</p>

		<?php
	}
}
?>
