<?php
/**
 * Widget class for UDS notification banner
 *
 * @category Class
 * @package UDS WordPress Theme
 * @author ASU KE Web Services
 * @link https://github.com/asu-ke-web-services/UDS-WordPress-Theme
 */

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

		/**
		 * When using ACF with widgets, you must pass a second argument to the
		 * standard ACF functions, like get_field(), with the widget ID. It is
		 * not documented in their examples, however, that it's one of the $args
		 */
		$widget_id = $args['widget_id'];

		/**
		 * See if the banner is currently active. Note that we build a second
		 * argument with the string 'widget_' and then the ID we just grabbed.
		 * This can be confusing, as it's easy to think that $widget_id is a
		 * third argument.
		 */
		$banner_active = get_field( 'uds_banner_active', 'widget_' . $widget_id );

		// if the banner is not active, we just exit here as there is nothing to display.
		if ( false === $banner_active ) {
			return;
		}

		// get the values from our widget's back-end interface.
		// I had to force lower-case on the Fontawesome icon names for them to work.
		$color = get_field( 'uds_banner_color', 'widget_' . $widget_id );
		$icon = strtolower( get_field( 'uds_banner_icon', 'widget_' . $widget_id ) );
		$title = get_field( 'uds_banner_title', 'widget_' . $widget_id );
		$body = get_field( 'uds_banner_text', 'widget_' . $widget_id );
		$button_count = get_field( 'uds_banner_button_count', 'widget_' . $widget_id );

		/**
		 * Buttons are part of an ACD form group, so we get the group first, then use
		 * standard PHP array notation to get the sub-fields of the group
		 */
		$button_one_data = get_field( 'uds_button_1_settings', 'widget_' . $widget_id );
		$button_one_text = $button_one_data['button_one_text'];
		$button_one_url = $button_one_data['button_one_url'];

		$button_two_data = get_field( 'uds_button_2_settings', 'widget_' . $widget_id );
		$button_two_text = $button_two_data['button_two_text'];
		$button_two_url = $button_two_data['button_two_url'];

		/**
		 * There are conditions for rendering buttons: the number
		 * of buttons, and which button color to use based on the background,
		 * so there's a bit more work than just grabbing the values from ACF
		 */

		// we'll build a 'button block' based on those conditions.
		$button_block = '';
		$button_block_open = '<div class="banner-buttons">';
		$button_block_close = '</div>';

		// if our button count is more than zero, we have buttons to build.
		if ( $button_count ) {

			// add the opening markup to our button block.
			$button_block .= $button_block_open;

			// set a button class to make sure we don't make black buttons on a black BG.
			// all banner colors, besides black, use the dark buttons.
			$button_class = 'dark';
			if ( 'black' == $color ) {
				$button_class = 'gray';
			}

			// if we got here we have more than zero buttons, so we will render button #1.
			$button_block .= '<a href="' . $button_one_url . '" class="btn btn-sm btn-' . $button_class . '">' . $button_one_text . '</a>';

			// if we have two buttons (the maximum), we also render button #2.
			if ( 2 == $button_count ) {
				$button_block .= '<a href="' . $button_two_url . '" class="btn btn-sm btn-' . $button_class . '">' . $button_two_text . '</a>';
			}

			// add the closing markup to the button block.
			$button_block .= $button_block_close;
		}

		// We now have all the variables we need to construct the actual banner.
		echo <<<EOS
		<div class="banner banner-$color" role="banner">
		<div class="banner-icon">
			<span title="Banner" class="fa fa-icon fa-$icon"></span>
		</div>
			<div class="banner-content">
				<h3>$title</h3>
				$body
			</div>
			$button_block
			<div class="banner-close">
				<button type="button" class="btn btn-circle btn-circle-alt-white close" aria-label="Close" onclick="event.target.parentNode.parentNode.style.display='none';">x</button>
			</div>
		</div>
EOS;
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
	 * Note: We are not using this method as ACF handles all values in this case.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return void Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	}

} // class

// Hook into widgets_init to call our function and register our widget.
add_action( 'widgets_init', 'wpdocs_register_widgets' );

/**
 * Function that does the actual registering of our widget class.
 */
function wpdocs_register_widgets() {
	register_widget( 'UDS_Notification_Banner' );
}
