<?php

/**
 * Adds the UDS Notification Banner widget.
 */
class UDS_Notification_Banner extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'uds_notification_banner_widget', // Base ID.
			'Notification Banner Widget', // Name.
			array( 'description' => __( 'Prominent banner for alerts and warnings', 'uds-wordpress-theme' ) ) // Args.
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$widget_id = $args['widget_id'];

		$color = get_field( 'uds_banner_color', 'widget_' . $widget_id );
		$icon = strtolower( get_field( 'uds_banner_icon', 'widget_' . $widget_id  ) );
		$title = get_field( 'uds_banner_title', 'widget_' . $widget_id  );
		$body = get_field( 'uds_banner_text', 'widget_' . $widget_id  );
		$button_count = get_field( 'uds_banner_button_count', 'widget_' . $widget_id );

		$button_one_data = get_field('uds_button_1_settings', 'widget_' . $widget_id );
		$button_one_text = $button_one_data['button_one_text'];
		$button_one_url = $button_one_data['button_one_url'];

		$button_two_data = get_field('uds_button_2_settings', 'widget_' . $widget_id );
		$button_two_text = $button_two_data['button_two_text'];
		$button_two_url = $button_two_data['button_two_url'];

		// echo $before_widget;
		// if ( ! empty( $title ) ) {
		// 	echo $before_title . $title . $after_title;
		// }

		echo <<<EOS
		<div class="banner banner-$color" role="banner">
		<div class="banner-icon">
			<span title="Banner" class="fa fa-icon fa-$icon"></span>
		</div>
			<div class="banner-content">
				<h3>$title</h3>
				$body
			</div>
			<div class="banner-buttons">
				<a href="$button_one_url" type="button" class="btn btn-sm btn-dark">$button_one_text</a>
				<a href="$button_two_url" type="button" class="btn btn-sm btn-dark">$button_two_text</a>
			</div>
			<div class="banner-close">
				<button type="button" class="btn btn-circle btn-circle-alt-white close" aria-label="Close" onclick="event.target.parentNode.parentNode.style.display='none';">x</button>
			</div>
		</div>
EOS;
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		// $instance = array();
		// $instance['color'] = ( ! empty( $new_instance['color'] ) ) ? strip_tags( $new_instance['color'] ) : '';
		// $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';

		// return $instance;
	}

} // class

add_action( 'widgets_init', 'wpdocs_register_widgets' );

function wpdocs_register_widgets() {
	register_widget( 'UDS_Notification_Banner' );
}
