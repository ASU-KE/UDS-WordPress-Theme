<?php
/**
 * UDS Program Card Block
 *
 * @package UDS WordPress Theme
 * @author Zainab Alsidiki
 */

 $card_title = get_field( 'title' );
 $image = get_field( 'image' );
if ( ! $image ) {
	$image = array(
		'url' => 'https://thesundevils.com/common/controls/image_handler.aspx?thumb_id=0&image_path=/images/2020/4/27/ASU_Sun_Devil_Athetics_Video_Background_77.jpg',
	);}
 $button = get_field( 'button' );
if ( ! $button ) {
	$button = array(
		'external_link' => '/',
		'button_color' => 'gray',
		'icon' => 'fas fa-arrow-right',
		'button_size' => 'normal',
		'button_link' => array(
			'title' => '',
			'url' => '/',
			'target' => '_blank',
		),
	);}
$hover_image = get_field( 'hover_image' );
if ( ! $hover_image ) {
	$hover_image = array(
		'url' => 'https://thesundevils.com/common/controls/image_handler.aspx?thumb_id=0&image_path=/images/2020/4/27/ASU_Sun_Devil_Athetics_Video_Background_76.jpg',
	);}


?>
<div class="home-program-card">
	<?php if ( $image ) { ?>
	<img class="card-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
<?php } ?>
<?php if ( $hover_image ) { ?>
<img class="hover-image" src="<?php echo $hover_image['url']; ?>" alt="<?php echo $hover_image['alt']; ?>" title="<?php echo $hover_image['title']; ?>" />
<?php } ?>

	<div class="card-content">
		<?php
		if ( $card_title ) {
			echo '<p>' . $card_title . '</p>';}
		?>
		<?php if ( $button ) { ?>
		<div class="card-button">
			<?php
				// Get our ACF Field values.
				$external_link = $button['external_link'];
				$button_color  = $button['button_color'];
				$button_size   = $button['button_size'];
				$button_icon   = $button['icon'];
				// These come in from the ACF cloned fields from the button group.

				$button_link = $button['button_link'];
			if ( $button_link ) {
				$button_label  = $button_link['title'];
				$button_url    = $button_link['url'];
				$button_target = $button_link['target'];
			} else {
				$button_label  = '';
				$button_url = '/';
				$button_target = '_blank';
			}

			// Set "rel" text if requested.
			if ( $external_link ) {
				$rel = 'rel="noopener noreferrer"';
			} else {
				$rel = '';
			}

			// Set the text for the button size class.
			if ( 'default' !== $button_size ) {
				$button_size = 'btn-' . $button_size;
			} else {
				$button_size = '';
			}

			// Set the text for the icon, if requested.
			if ( $button_icon && $button_label ) {
				$button_icon = sanitize_text_field( $button_icon );
				$icon_span = '<span class="fas fa-' . $button_icon . '"></span>&nbsp;&nbsp;';
			} elseif ( $button_icon && ! $button_label ) {
				$button_icon = sanitize_text_field( $button_icon );
				$icon_span = '<span class="fas fa-' . $button_icon . '"></span>';
			} else {
				$icon_span = '';
			}

			// Set the text for a target of "_blank" if opening in a new tab.
			if ( $button_target ) {
				$target_text = 'target="' . $button_target . '"';
			} else {
				$target_text = '';
			}
			?>
			<a href="<?php echo $button_url; ?>" class="btn <?php echo $button_size; ?> btn-<?php echo $button_color; ?>" <?php echo $rel; ?> <?php echo $target_text; ?>><?php echo $icon_span; ?><?php echo $button_label; ?></a>
		</div>
 <?php } //End of the button ?>
	</div>
</div>
