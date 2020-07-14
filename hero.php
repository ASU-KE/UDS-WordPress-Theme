<?php

/**
 * The hero for our theme
 *
 * Displays the hero section
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$hero_asset_url = get_field('hero_asset_url');
$hero_type = get_field('hero_type');
$hero_title = get_field('hero_title');
$hero_text = get_field('hero_text');
$hero_call_to_action_url = get_field('hero_call_to_action_url');
$hero_call_to_action_text = get_field('hero_call_to_action_text');

if (!empty($hero_asset_url)) :
?>
<div class="uds-hero <?php echo $hero_type ?>" style="background-image: linear-gradient(180deg, #19191900 0%, #191919c9 100%), url('<?php echo wp_kses( $hero_asset_url, wp_kses_allowed_html( 'post' ) ); ?>'); width: 100vw; margin-left: calc(50% - 50vw); max-width: 100vw !important;">
	<div class="container uds-hero-container">
		<?php
		if ( !empty( $hero_title ) ) :
		?>
		<h1 class="heading heading-one col-md-8">
			<span class="highlight highlight-gold highlight-heading-one"><?php echo wp_kses( $hero_title, wp_kses_allowed_html( 'post' ) ); ?></span>
		</h1>
		<?php
		endif;

		if ( !empty( $hero_text ) || ( !empty( $hero_call_to_action_url ) &&  !empty( $hero_call_to_action_text ) ) ) :
		?>
		<div class="uds-hero-text col-sm-12 col-md-7">
			<?php
			if ( !empty( $hero_text ) ) {
				$text = '<p>%1$s</p>';
				echo wp_kses( sprintf( $text, $hero_text ), wp_kses_allowed_html( 'post' ) );
			}
			?>
			<?php
			if ( !empty( $hero_call_to_action_url ) &&  !empty( $hero_call_to_action_text ) ) {
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
