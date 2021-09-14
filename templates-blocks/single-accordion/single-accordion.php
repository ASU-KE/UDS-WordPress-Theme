<?php
/**
 * UDS Single Accordion block
 *
 * @package UDS WordPress Theme
 */

 $accordion_id = 'Accordion_' . $block['id'];
 $accordion_title = get_field( 'uds_single_accordion_title' );
 $collapsed = get_field( 'uds_single_accordion_collapsed' );
 $accordion_color = get_field( 'uds_single_accordion_color' );

 if ($collapsed){
	 $collapsed= 'aria-expanded="false" class="collapsed"';
 }
 else {
	 $collapsed= 'aria-expanded="true"';
 }

//echo '<pre>'; print_r($block); echo '</pre>';
// Retrieve additional classes from the 'advanced' field in the editor.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
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

echo '<div class="card card-foldable mt-3 '. $accordion_color .'">
			<div class="card-header">
				<h4>
					<a
						aria-controls="Body_'. $accordion_id .'"
						'. $collapsed .'
						data-target="#Body_'. $accordion_id .'"
						data-toggle="collapse"
						href="#Body_'. $accordion_id .'"
						id="Header_'. $accordion_id .'"
						role="button"
					>
						'. $accordion_title .'
						<span class="fas fa-chevron-up" />
					</a>
				</h4>
			</div>
							<div
								aria-labelledby="Header_'. $accordion_id .'"
								class="collapse card-body"
								data-parent="#accordionExample"
								id="Body_'. $accordion_id .'"
							>';
	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';

echo '</div>
</div>';

?>
