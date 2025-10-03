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
			'icon'  => 'fa-circle-check',
		),
		'info' => array(
			'class' => 'info',
			'title' => 'Information',
			'icon'  => 'fa-circle-info',
		),
		'danger' => array(
			'class' => 'danger',
			'title' => 'Error',
			'icon'  => 'fa-triangle-exclamation',
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

	<div class="alert-icon"<?php if ( ! get_field( 'alert_include_icon' ) ) echo ' style="display: none;"'; ?>>
		<span title="<?php echo $settings[ $style ]['title']; ?>" class="fas <?php echo $settings[ $style ]['icon']; ?>"></span>
	</div>
	<div class="alert-content">
		<?php echo $content; ?>
	</div>
	<div class="alert-close">
		<button type="button" data-bs-dismiss="alert" class="btn btn-circle btn-circle-alt-black close" aria-label="Close">
			<i class="fas fa-xmark"></i>
		</button>
	</div>
</div>
