<?php
/**
 * UDS Blockquote Block
 *
 * @package UDS WordPress Theme
 * @version 1.0.0
 * @author KE Web Services
 *
 * An Advanced Custom Fields block to implement a UDS Block Quote. With no mobile
 * design for block quotes, we opted to use one of the Testimonial styles as the
 * mobile block quote.
 *
 * Features include:
 * - Select between standard and animated blockquote types
 * - Select quote with image, or no image, and image on either side
 * - Placeholder image if user chooses image style, but forgets to choose an image
 * - Customize the color of the large, stylized quotation marks
 * - Customize the background color (to approved shades of gray)
 */

// Get the blockquote type
$blockquote_type = get_field( 'blockquote_type' ) ?: 'standard';

/**
 * We implemented some standards by creating multiple controls for choosing the
 * 'accent' color of the block quote. A different set of controls is shown based
 * on the background color choice. Here we are getting the background color
 * choice and using it to set a class, and to decide which ACF control we will
 * use to select our accent color.
 *
 * Example: if the user chose a 'light gray' background, we will look at the
 * 'accent_light' ACF field to get our accent color.
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

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}
?>

<?php if ( $blockquote_type === 'animated' ) : ?>
	<div class="uds-blockquoteAnimated <?php echo $accent_class; ?> <?php echo $additional_classes; ?> uds-content-align">
		<blockquote>
			<p><?php 
				$quote_text = get_field( 'quote_text' );
				// Process quote text to add mark elements for animation
				// Usage: Wrap text with [brackets] to create animated highlighting
				// Example: "We are measured not by whom we exclude, but by [whom we include] and [how they succeed]"
				$animated_quote = preg_replace('/\[([^\]]+)\]/', '<mark class="pen-yellow">$1</mark>', $quote_text);
				echo $animated_quote;
			?></p>
			<?php if ( get_field( 'name' ) || get_field( 'description' ) ) : ?>
				<div class="citation">
					<div class="citation-content">
						<?php if ( get_field( 'name' ) ) : ?>
							<cite class="name"><?php the_field( 'name' ); ?></cite>
						<?php endif; ?>
						<?php if ( get_field( 'description' ) ) : ?>
							<cite class="description"><?php the_field( 'description' ); ?></cite>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</blockquote>
	</div>
<?php else : ?>
	<figure class="uds-blockquote <?php echo $accent_class; ?> <?php echo $background_class; ?> <?php echo $image_class; ?> <?php echo $additional_classes; ?>">
		<?php if ( $image ) : ?>
			<div class="feature-wrapper">
				<?php
					$image_data = get_field( 'image_source' );
				if ( ! empty( $image_data ) ) :
					$image_url = $image_data['url'];
					$image_alt = $image_data['alt'];
					$image_title = $image_data['title'];
					?>
					<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>" />
				<?php else : ?>
					<img src="https://via.placeholder.com/180/8C1D40/FFFFFF/?text=Placeholder" />
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! $image ) : ?>
			<div class="feature-wrapper">
			<svg aria-hidden="true" role="presentation" viewBox="0 0 302.87 245.82">
				<path d="M113.61,245.82H0V164.56q0-49.34,8.69-77.83T40.84,35.58Q64.29,12.95,100.67,0l22.24,46.9q-34,11.33-48.72,31.54T58.63,132.21h55Zm180,0H180V164.56q0-49.74,8.7-78T221,35.58Q244.65,12.95,280.63,0l22.24,46.9q-34,11.33-48.72,31.54t-15.57,53.77h55Z" />
			</svg>
			</div>
		<?php endif; ?>
		<div class="content-wrapper">
			<blockquote>
				<p><?php the_field( 'quote_text' ); ?></p>
				<div class="citation">
					<div class="citation-content">
						<cite class="name"><?php the_field( 'name' ); ?></cite>
						<cite class="description"><?php the_field( 'description' ); ?></cite>
					</div>
				</div>
			</blockquote>
		</div>
	</figure>
<?php endif; ?>
