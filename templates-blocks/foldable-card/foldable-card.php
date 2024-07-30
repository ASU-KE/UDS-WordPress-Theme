<?php
/**
 * UDS Foldable card block
 *
 * @package UDS WordPress Theme
 */


$accordion_id = 'Accordion_' . $block['id'];
$accordion_title = get_field( 'uds_single_accordion_title' );
$accordion_icon = get_field( 'uds_single_accordion_title_icon' );
$collapsed = get_field( 'uds_single_accordion_collapsed' );
$accordion_color = get_field( 'uds_single_accordion_color' );

// Set collapsed classes based on checkbox setting.
if ( $collapsed ) {
	$collapsed = 'aria-expanded="false" class="collapse"';
	$show_body_area = '';
} else {
	$collapsed = 'aria-expanded="true"';
	$show_body_area = 'show';
}

$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}

/**
 * Remove right margin in title if there is no icon.
 * Note: attempting to remove the actual icon <span> tag when there was no icon
 * resulted in a block that would not render in the editor if you removed the
 * icon name from the ACF input field. I settled, then, for simply changing the
 * margin class to one that has no actual margin.
 */
$accordion_spacing = "mr-2";
if( empty ( $accordion_icon ) ) {
	$accordion_spacing = "mr-0";
}

	// Sets InnerBlocks with a Bootstrap blocks container as default content.
	$allowed_blocks = array( 'wp-bootstrap-blocks/container', 'core/html' );
	$template = array(
		array(
			'wp-bootstrap-blocks/container',
			array(
				'marginAfter' => 'mb-0',
			),
		),
	);

	echo '<div class="accordion-item mt-3 ' . $accordion_color . ' ' . $additional_classes . '">
			<div class="accordion-header">
				<h3>
					<a
						aria-controls="' . $accordion_id . '"
						' . $collapsed . '
						data-target="' . $accordion_id . '"
						data-bs-toggle="collapse"
						href="' . $accordion_id . '"
						id="' . $accordion_id . '"
						role="button"
						data-ga='. $accordion_title . '
						data-ga-name="onclick"
						data-ga-event="collapse"
						data-ga-type="click"
						data-ga-region="main content"
						data-ga-section="default"
					><span class="card-icon mb-0"> <i class="' . $accordion_icon . ' ' . $accordion_spacing . '"></i>' . $accordion_title . '</span><span class="fas fa-chevron-up"></span>
					</a>
				</h3>
			</div>
			<div
				aria-labelledby="Body_' . $accordion_id . '"
				class="collapse ' . $show_body_area . '"
				id="Body_' . $accordion_id . '"
			>
			<div class="accordion-body">';

	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';

	echo '</div></div>
</div>';

	?>
