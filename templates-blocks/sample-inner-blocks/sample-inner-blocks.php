<?php
/**
 * UDS Sample With Inner Blocks
 *
 * @package UDS WordPress Theme
 *
 * This is a sample block for demonstrating our code organization and style. This
 * particular block showcases how to use the <InnerBlocks /> tag to provide an
 * area inside your template where you can dynamically add other Gutenberg blocks.
 */

// Get our field values and build the background class name.
$background_pattern = get_field( 'background_pattern' );
$background_color   = get_field( 'background_color_variant' );
$background_classname = $background_pattern . '-' . $background_color;

/**
 * For use with <InnerBlocks />, this determines which blocks you can put inside.
 * To make this work, we now have to use a PHP 'echo' statement to echo our
 * <InnerBlocks /> tag. If we didn't want to limit our block, we could skip that
 * and just put the <InnerBlocks /> tag right in the markup just as it is.
 */
$allowed_blocks = array( 'core/image', 'core/paragraph', 'core/heading' );

/**
 * When using <InnerBlocks />, you can also provide a template to populate
 * your block with some default inner blocks and placeholder content. You
 * can also lock the template to not allow the addition or deletion of
 * other blocks, but we are not doing that here.
 */
$inner_template = array(
	array(
		'core/heading',
		array(
			'placeholder' => 'Your Heading Here',
		),
	),
	array( 'core/image' ),
	array(
		'core/paragraph',
		array(
			'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
		),
	),
);
?>

<div class="container p-6 p-md-12 bg <? echo $background_classname; ?>">
	<div class="row">
		<div class="col">
			<div class="p-2 p-md-4 bg-gray-2" >
				<?php echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $inner_template ) ) . '" allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />'; ?>
			</div>
		</div>
	</div>
</div>
