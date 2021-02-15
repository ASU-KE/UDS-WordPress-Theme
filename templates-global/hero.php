<?php
/**
 * Displays the hero content on the top of a page.
 * Should be called within the loop. (Displays the page title if not enabled.)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hero_asset_url = get_field( 'hero_asset_url' );
$hero_type = get_field( 'hero_type' );
$hero_size = get_field( 'hero_size' );
$hero_title = get_field( 'hero_title' );
$hero_highlight = get_field( 'hero_highlight' );
$title_color = get_field( 'title_color' );
$hero_text = get_field( 'hero_text' );
$hero_call_to_action_url = get_field( 'hero_call_to_action_url' );
$hero_call_to_action_text = get_field( 'hero_call_to_action_text' );

// if we don't have a highlight class from ACF, or it was set to "none".
if ( empty( $hero_highlight ) || 'none' == $hero_highlight ) {
	$hero_highlight = '';
}

/**
 * The text color of the hero title is usually black. However, when 'none' is
 * chosen, we allow the user to choose between black or white text to best fit
 * with the image.
 */
if ('white' == $title_color && 'none' == $hero_highlight || empty( $hero_highlight ) ) {
	$title_color_class = "text-white";
}else{
	$title_color_class = '';
}

switch ($hero_size) {
	case 'small':
		$hero_size_class = 'uds-hero-sm';
		break;
	case 'medium':
		$hero_size_class = 'uds-hero-md';
	case 'large':
		$hero_size_class = 'uds-hero-lg';
	default:
		$hero_size_class = 'uds-hero-md';
		break;
}

// Check for a hero bg image and if present build the hero. Otherwise show the title of the page.
if ( ! empty( $hero_asset_url ) ) :
	?>
<div class="uds-hero <?php echo $hero_size_class; ?>" style="background-image: linear-gradient(180deg, #19191900 0%, #191919c9 100%), url('<?php echo wp_kses( $hero_asset_url, wp_kses_allowed_html( 'strip' ) ); ?>')">
	<div class="container uds-hero-container lazyloaded">
		<?php
		if ( ! empty( $hero_title ) ) :
			?>
		<h1 class="col-md-8">
			<span class="<?php echo $hero_highlight; ?> <?php echo $title_color_class; ?>"><?php echo wp_kses( $hero_title, wp_kses_allowed_html( 'strip' ) ); ?></span>
		</h1>
			<?php
		endif;

		if ( ! empty( $hero_text ) || ( ! empty( $hero_call_to_action_url ) && ! empty( $hero_call_to_action_text ) ) ) :
			?>
		<div class="uds-hero-text col-sm-12 col-md-7">
			<?php
			if ( ! empty( $hero_text ) ) {
				$text = '<p>%1$s</p>';
				echo wp_kses( sprintf( $text, $hero_text ), wp_kses_allowed_html( 'post' ) );
			}
			?>
			<?php
			if ( ! empty( $hero_call_to_action_url ) && ! empty( $hero_call_to_action_text ) ) {
				$text = '<a class="btn btn-gold" href="%1$s">%2$s</a>';
				echo wp_kses( sprintf( $text, $hero_call_to_action_url, $hero_call_to_action_text ), wp_kses_allowed_html( 'post' ) );
			}
			?>
		</div>
			<?php
		endif;
		?>
	</div>
</div>
	<?php

else :

	echo '<section id="page-title"><div class="container"><div class="row"><div class="col-md-12">';
	if ( ! get_field( 'hide_page_title' ) ) {
		the_title( '<h1 class="entry-title">', '</h1>' ); }
	echo '</div></div></div></section>';

endif;
?>
