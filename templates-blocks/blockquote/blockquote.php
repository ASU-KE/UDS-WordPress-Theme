<?php
/**
 * UDS Blockquote Block
 *
 * @package UDS WordPress Theme
 *
 * This is a sample block for demonstrating our code organization and style. This
 * particular block is a callout with a title and some text, and uses ACF functions
 * to bring in particular class names and content. This is an example of a larger
 * 'page section' kind of block, with all the Bootstrap containers, rows, and
 * columns as part of the markup. It would be intended for use only in our full
 * width page template, and NOT in the sidebar template.
 */

switch ( get_field( 'background_color' ) ) {

	case 'light':
		$background_class = 'bq-light';
		$accent_class = get_field( 'accent_light' );
		break;

	case 'medium':
		$background_class = 'bq-medium';
		$accent_class = get_field( 'accent_medium' );
		break;

	case 'dark':
		$background_class = 'bq-dark';
		$accent_class = get_field( 'accent_dark' );
		break;

	default:
		// Default is to apply no styles or "none".
		$background_class = '';
		$accent_class = get_field( 'accent_none' );
		break;
}

// Build the accent class, leaving it blank if we don't need it.
if ( ! empty( $accent_class ) ) {
	$accent_class = 'accent-' . $accent_class;
} else {
	$accent_class = '';
}

// Now check to see if they want to add the padding.
if ( get_field( 'add_space' ) ) {
	$background_class .= ' bq-color-padding';
}

// See if we are in image, or no-image, mode.
$image = get_field( 'quote_image' );
$image_class = '';

if ( $image ) {
	$image_class = 'with-image';

	/**
	 * If image is on, and the user has chosen for it to be on the right,
	 * apply the 'reversed' class as well.
	 */
	if ( 'right' === get_field( 'image_side' ) ) {
		$image_class .= ' reversed';
	}
}

// Retrieve additional classes from the 'advanced' field in the editor.
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}
?>

<figure class="uds-blockquote <?php echo $accent_class; ?> <?php echo $background_class; ?> <?php echo $image_class; ?> <?php echo $additional_classes; ?>">
	<?php if ( $image ) : ?>
		<div class="feature-wrapper">
			<img src="<?php the_field( 'image_source' ); ?>" />
		</div>
	<?php endif; ?>

	<?php if ( ! $image ) : ?>
		<div class="feature-wrapper">
			<svg title="Open quote" role="img" aria-labelledby="open-quote-title" viewBox="0 0 302.87 245.82">
				<title id="open-quote-title"><?php the_field( 'title' ); ?></title>
				<path
					d="M113.61,245.82H0V164.56q0-49.34,8.69-77.83T40.84,35.58Q64.29,12.95,100.67,0l22.24,46.9q-34,11.33-48.72,31.54T58.63,132.21h55Zm180,0H180V164.56q0-49.74,8.7-78T221,35.58Q244.65,12.95,280.63,0l22.24,46.9q-34,11.33-48.72,31.54t-15.57,53.77h55Z" />
			</svg>
		</div>
	<?php endif; ?>
	<div class="content-wrapper">
		<blockquote>
			<p><?php the_field( 'quote_text' ); ?></p>
		</blockquote>
		<figcaption>
			<cite class="name"><?php the_field( 'name' ); ?></cite>
			<cite class="description"><?php the_field( 'description' ); ?></cite>
		</figcaption>
	</div>
</figure>
