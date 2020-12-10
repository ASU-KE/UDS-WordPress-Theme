<?php
/**
 * Displays the global banner widget content if there's information to be displayed.
 * Normally gets called immediately after hero.php
 *
 * @package uds-wordpress-theme
 */
?>

<?php if ( is_active_sidebar( 'global-banner' ) ) : ?>
	<div class="container">
		<div class="row mb-12">
			<div class="col">
				<?php dynamic_sidebar( 'global-banner' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

