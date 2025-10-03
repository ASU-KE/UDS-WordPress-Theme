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
<div class="uds-person-profile <?php echo "{$vertical_classes} {$feature_class} {$additional_classes}"; ?>">
	<div class="profile-img-container">
		<div class="profile-img-placeholder">
			<img class="profile-img <?php echo $feature_class; ?>" src="<?php echo $image_data['url'] ?? get_template_directory_uri() . '/dist/img/admin/headshot-placeholder.png'; ?>" alt="<?php echo $person_name; ?>" width="300" height="300" decoding="async" loading="lazy">
		</div>
	</div>
	<div class="person">
		<h3 class="person-name"><?php echo $person_name; ?></h3>
		<div class="person-profession">
			<?php if ( ! empty( $person_title ) ) : ?>
				<h4><span><?php echo $person_title; ?></span></h4>
			<?php endif; ?>
		</div>
		<?php if ( $render_contact_row ) : ?>
			<ul class="person-contact-info">
				<?php if ( ! empty( $person_email ) ) : ?>
					<li>
						<a href="mailto:<?php echo $person_email; ?>" aria-label="Email <?php echo esc_attr( $person_name ? $person_name : 'user' ); ?>"><?php echo $person_email; ?></a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $person_phone ) ) : ?>
					<li>
						<a href="tel:<?php echo $person_phone; ?>" aria-label="Call user"><?php echo $person_phone; ?></a>
					</li>
				<?php endif; ?>
				<?php if ( $person_street_address || $person_city_state_zip ) : ?>
					<li>
						<address class="person-address">
							<?php if ( $person_street_address ) : ?>
								<span class="person-street"><?php echo $person_street_address; ?></span>
							<?php endif; ?>
							<?php if ( $person_city_state_zip ) : ?>
								<span class="person-city"><?php echo $person_city_state_zip; ?></span>
							<?php endif; ?>
						</address>
					</li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
		<?php if ( ! empty( $person_text ) ) : ?>
			<div>
				<p class="person-description"><?php echo $person_text; ?></p>
			</div>
		<?php endif; ?>
		<?php if ( have_rows( 'uds_profile_social_media_icons' ) ) : ?>
			<ul class="person-social-medias">
				<?php while ( have_rows( 'uds_profile_social_media_icons' ) ) : the_row(); ?>
					<?php $network_name = get_sub_field( 'uds_profile_network_name' ); ?>
					<li>
						<a href="<?php echo get_sub_field( 'uds_profile_social_url' ); ?>" aria-label="Go to user <?php echo $base_social_media[ $network_name ]['name']; ?> profile">
							<span class="<?php echo $base_social_media[ $network_name ]['icon']; ?>"></span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
