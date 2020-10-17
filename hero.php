<?php
/**
 * The hero for our theme
 *
 * Displays the hero section
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$hero_asset_url = get_field( 'hero_asset_url' );
$hero_type = get_field( 'hero_type' );
$hero_title = get_field( 'hero_title' );
$hero_highlight = get_field( 'hero_highlight' );
$hero_text = get_field( 'hero_text' );
$hero_call_to_action_url = get_field( 'hero_call_to_action_url' );
$hero_call_to_action_text = get_field( 'hero_call_to_action_text' );

// if we don't have a highlight class from ACF, or it was set to "none".
if ( empty( $hero_highlight ) || 'none' == $hero_highlight ) {
	$hero_highlight = '';
}

if ( ! empty( $hero_asset_url ) ) :
	?>
<div class="uds-hero <?php echo $hero_type; ?>" style="background-image: linear-gradient(180deg, #19191900 0%, #191919c9 100%), url('<?php echo wp_kses( $hero_asset_url, wp_kses_allowed_html( 'strip' ) ); ?>')">
	<div class="container uds-hero-container">
		<?php
		if ( ! empty( $hero_title ) ) :
			?>
		<h1 class="col-md-8">
			<span class="<?php echo $hero_highlight; ?>"><?php echo wp_kses( $hero_title, wp_kses_allowed_html( 'strip' ) ); ?></span>
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
endif;
?>
