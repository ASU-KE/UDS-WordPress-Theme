<?php
/**
 * Displays the hero content on the top of a page.
 * Should be called within the loop. (Displays the page title if not enabled.)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get asset value based on choice of URL or local file.
$media_source = get_field( 'media_source' );
switch ($media_source) {
	case 'url':
		$hero_asset_url = get_field( 'hero_asset_url' );
		break;

	default:
		$hero_asset_url = get_field( 'hero_asset_file' );
		break;
}

$hero_size = get_field( 'hero_size' );
$hero_title = get_field( 'hero_title' );
$hero_highlight = get_field( 'hero_highlight' );
$title_color = get_field( 'title_color' );
$hero_text = get_field( 'hero_text' );
$hero_call_to_action_url = get_field( 'hero_call_to_action_url' );
$hero_call_to_action_text = get_field( 'hero_call_to_action_text' );
$hero_call_to_action_color = get_field( 'call_to_action_color' );

// Allow certain tags in the hero title and text.
$hero_allowed_tags = array(
	'br' => array(),
	'p'  => array(),
);

/**
 * If we don't have a highlight style, then determine the text color and
 * use that class for the title. Otherwise, use the selected highlight
 * class.
 */

 // holds our final title style.
$hero_title_style = '';

if ( empty( $hero_highlight ) || 'none' == $hero_highlight ) {
	// we did not choose a highlight. Check for white text, and default to black.
	if ( 'white' == $title_color ) {
		$hero_title_style = 'text-white';
	} else {
		$title_title_style = 'text-black';
	}
} else {
	// we chose a highlight style, so just use that.
	$hero_title_style = $hero_highlight;
}


// Deterine the hero size.
switch ( $hero_size ) {
	case 'small':
		$hero_size_class = 'uds-hero-sm';
		break;
	case 'medium':
		$hero_size_class = 'uds-hero-md';
		break;
	case 'large':
		$hero_size_class = 'uds-hero-lg';
		break;
	default:
		// Should there be a problem, default to medium size.
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
		<div class="col-md-8">
			<h1><span class="<?php echo $hero_title_style; ?>"><?php echo wp_kses( $hero_title, $hero_allowed_tags ); ?></span></h1>
		</div>
		<?php
		endif;

		if ( ! empty( $hero_text ) || ( ! empty( $hero_call_to_action_url ) && ! empty( $hero_call_to_action_text ) ) ) :
			?>
		<div class="uds-hero-text col-sm-12 col-md-7">
			<?php
			if ( ! empty( $hero_text ) ) {
				$text = '<p>%1$s</p>';
				echo wp_kses( sprintf( $text, $hero_text ), $hero_allowed_tags );
			}
			?>
			<?php
			if ( ! empty( $hero_call_to_action_url ) && ! empty( $hero_call_to_action_text ) ) {
				$text = '<a class="btn btn-%3$s" href="%1$s">%2$s</a>';
				echo wp_kses( sprintf( $text, $hero_call_to_action_url, $hero_call_to_action_text, $hero_call_to_action_color ), wp_kses_allowed_html( 'post' ) );
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
