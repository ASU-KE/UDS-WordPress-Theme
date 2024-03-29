<?php
/**
 * Retrieve values from ACF. To make cleaner, easier to read logic in the
 * output area below, we're grabbing all of our values first to allow us
 * to manipulate them if needed before we present them.
 *
 * @package UDS-WordPress-Theme
 */

/**
 * Person Data
 */
$image_data            = get_field( 'uds_profile_image' );
$person_name           = get_field( 'uds_profile_name' );
$person_title          = get_field( 'uds_profile_title' );
$person_email          = get_field( 'uds_profile_email' );
$person_phone          = get_field( 'uds_profile_phone' );
$person_url            = get_field( 'uds_profile_url' );
$person_text           = get_field( 'uds_profile_text' );
$person_street_address = get_field( 'uds_profile_street_address' );
$person_city_state_zip = get_field( 'uds_profile_city_state_zip' );
$is_featured		   = get_field( 'uds_profile_is_feature');
$vertical_layout       = get_field( 'uds_profile_vertical_layout' );
$social_media_icons    = get_field( 'uds_profile_social_media_icons');

// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

// If this is a feature profile, we'll add an extra class to the block.
$feature_class = '';
if ( $is_featured ) {
	$feature_class = 'feature-profile';
}

$vertical_classes = '';
if( $vertical_layout ) {
	$vertical_classes = 'vertical';
}

/**
 * Social Media Data
 *
 * An array to hold values for our base set of social media networks.
 */
$base_social_media = array(
	'facebook' => array(
		'name' => 'Facebook', // used to create the ARIA label.
		'icon' => 'fab fa-facebook-square', // Fontawesome brand icon.
	),
	'twitter' => array(
		'name' => 'Twitter',
		'icon' => 'fab fa-twitter-square',
	),
	'linkedin' => array(
		'name' => 'LinkedIn',
		'icon' => 'fab fa-linkedin',
	),
	'instagram' => array(
		'name' => 'Instagram',
		'icon' => 'fab fa-instagram-square',
	),
	'youtube' => array(
		'name' => 'YouTube',
		'icon' => 'fab fa-youtube-square',
	),
);

/**
 * Determine if we should render the 'contact row' that has email, phone
 * and address. We default to rendering this row, but turn it off if ALL
 * items in it were left empty by the user.
 */
$render_contact_row = true;
if ( empty( $person_email ) && empty( $person_phone ) && empty( $person_street_address ) && empty( $person_city_state_zip ) ) {
	$render_contact_row = false;
}


// Render the block.
?>
<div class="profile profile-type-standard <?php echo $additional_classes; ?> <?php echo $vertical_classes; ?>">
	<div class="profile-row">
		<?php if ( ! empty( $image_data ) ) : ?>
			<div class="profile-photo-column">
				<?php if ( ! empty( $person_url ) ) : ?>
					<a href=<?php echo $person_url; ?> target="_blank" rel="noopener noreferrer">
				<?php endif; ?>
					<img class="pictureOriginal <?php echo $feature_class;?>" src="<?php echo $image_data['url']; ?>" alt="profile picture for <?php echo $person_name; ?>">
				<?php if ( ! empty( $person_url ) ) : ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="profile-bio-column">
			<div class="profile-bio-details">
				<h3 class="profile-name">
					<?php if ( ! empty( $person_url ) ) : ?>
						<a href="<?php echo $person_url; ?>" target="_blank" rel="noopener noreferrer">
					<?php endif; ?>
						<?php echo $person_name; ?>
					<?php if ( ! empty( $person_url ) ) : ?>
						</a>
					<?php endif; ?>
				</h3>
				<?php if ( ! empty( $person_title ) ) : ?>
					<div class="profile-title">
						<p class="titleOriginal">
							<?php echo $person_title; ?>
						</p>
					</div>
				<?php endif; ?>
				<?php if ( $render_contact_row ) : ?>
					<div class="profile-contact-row">
						<?php if ( ! empty( $person_email ) ) : ?>
							<div class="profile-contact-email">
								<p>
									<a class="linkOriginal profile-email-link" href="mailto:<?php echo $person_email; ?>">
										<?php echo $person_email; ?>
									</a>
								</p>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $person_phone ) ) : ?>
							<div class="profile-contact-phone">
								<p>
									<a class="" href="tel:<?php echo $person_phone; ?>">
										<?php echo $person_phone; ?>
									</a>
								</p>
							</div>
						<?php endif; ?>
						<?php if ( $person_street_address || $person_city_state_zip ) : ?>
						<div class="profile-contact-address">
								<div>
									<p>
										<?php if ( $person_street_address ): ?>
											<?php echo $person_street_address; ?>
											<br>
										<?php endif; ?>
										<?php if ( $person_city_state_zip ): ?>
											<?php echo $person_city_state_zip; ?>
										<?php endif; ?>
									</p>
								</div>
						</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $person_text ) ) : ?>
					<p>
						<?php echo $person_text; ?>
					</p>
				<?php endif; ?>
			</div>
			<div class="profile-bio-social">
			<?php if (have_rows('uds_profile_social_media_icons')) : ?>
				<ul class="person_social_medias">
					<?php while (have_rows('uds_profile_social_media_icons')) : the_row(); ?>
						<?php $network_name = get_sub_field('uds_profile_network_name'); ?>
						<li>
							<a href="<?php echo get_sub_field('uds_profile_social_url'); ?>" ><span class="<?php echo $base_social_media[$network_name]['icon']; ?>"></span></a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
