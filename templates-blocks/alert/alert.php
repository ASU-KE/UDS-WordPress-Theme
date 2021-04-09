<?php
/**
 * UDS Alert Block
 *
 * @package UDS WordPress Theme
 */

	// set up the values used in the different types of alerts.
	$settings = array(
		'warning' => array(
			'class' => 'warning',
			'title' => 'Warning',
			'icon'  => 'fa-bell',
		),
		'success' => array(
			'class' => 'success',
			'title' => 'Success',
			'icon'  => 'fa-check-circle',
		),
		'info' => array(
			'class' => 'info',
			'title' => 'Information',
			'icon'  => 'fa-info-circle',
		),
		'danger' => array(
			'class' => 'danger',
			'title' => 'Error',
			'icon'  => 'fa-exclamation-triangle',
		),
	);

	// get the type of alert the user has selected.
	$style = get_field( 'alert_style' );
	$content = strip_tags( get_field( 'alert_content' ), '<a><em><u><strong>' );

	// see if we have an entry for that. If not, choose information.
	if ( ! array_key_exists( $style, $settings ) ) {
		$style = 'info';
	}

	// If additional classes were requested, clean up the input and add them.
	$additional_classes = '';
	if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
		$additional_classes = trim( sanitize_text_field( $block['className'] ) );
	}
?>
<!-- alert block -->
<div class="alert alert-dismissible fade show alert-block alert-<?php echo $settings[ $style ]['class']; ?> <?php echo $additional_classes; ?>" role="alert">

	<?php if ( get_field( 'alert_include_icon' ) ) : ?>
		<div class="alert-icon">
			<span title="<?php echo $settings[ $style ]['title']; ?>" class="fa fa-icon <?php echo $settings[ $style ]['icon']; ?>"></span>
		</div>
	<?php endif; ?>
	<div class="alert-content">
		<?php echo $content; ?>
	</div>
	<div class="alert-close">
		<button type="button" data-dismiss="alert" class="btn btn-circle btn-circle-alt-black close" aria-label="Close">
			<i class="fas fa-times"></i>
		</button>
	</div>
</div>
