<?php
/**
 * Displays the global banner widget content if there's information to be displayed.
 * Normally gets called immediately after hero.php.
 *
 * It is possible, with our banner widget, to have the widget in the widget area but
 * have it set to NOT display. To make sure we don't render any unwanted markup,
 * we also check to be sure that the user wants to have the banner visible.
 *
 * @package uds-wordpress-theme
 */

$banner_is_active = get_field( 'uds_banner_active' );

if ( is_active_sidebar( 'global-banner' ) && $banner_is_active ) : ?>

	<div class="container">
		<div class="row mb-12">
			<div class="col">
				<?php dynamic_sidebar( 'global-banner' ); ?>
			</div>
		</div>
	</div>

<?php endif; ?>
