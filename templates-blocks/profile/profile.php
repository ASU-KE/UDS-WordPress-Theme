<?php

/**
 * Retrieve values from ACF. To make cleaner, easier to read logic in the
 * output area below, we're grabbing all of our values first to allow us
 * to manipulate them if needed before we present them.
 */

/**
 * Person Data
 */
$image_data            = get_field( 'uds_profile_image');
$person_name           = get_field( 'uds_profile_name' );
$person_title          = get_field( 'uds_profile_title' );
$person_email          = get_field( 'uds_profile_email' );
$person_phone          = get_field( 'uds_profile_phone' );
$person_url            = get_field( 'uds_profile_url' );
$person_text           = get_field( 'uds_profile_text' );
$person_street_address = get_field( 'uds_profile_street_address' );
$person_city_state_zip = get_field( 'uds_profile_city_state_zip' );
$horizontal_rule       = get_field( 'uds_profile_horizontal_rule' );
$profile_link_type     = get_field( 'uds_profile_link_type' );


// If additional classes were requested, clean up the input and add them.
$additional_classes = '';
if ( isset( $block['className'] ) && ! empty( $block['className'] ) ) {
	$additional_classes = trim( sanitize_text_field( $block['className'] ) );
}

// Add our bottom-border class when requested.
$border_override_class = '';
if ( ! $horizontal_rule ) {
	$border_override_class .= 'no-bottom-border';
}

/**
 * Social Media Data
 *
 * An array to hold values for our base set of social media networks.
 */
$base_social_media = array(
	'facebook' => array(
		'name' => 'Facebook', // used to create the ARIA label
		'icon' => 'fab fa-facebook-square' // Fontawesome brand icon
	),
	'twitter' => array(
		'name' => 'Twitter',
		'icon' => 'fab fa-twitter-square'
	),
	'linkedin' => array(
		'name' => 'LinkedIn',
		'icon' => 'fab fa-linkedin'
	),
	'instagram' => array(
		'name' => 'Instagram',
		'icon' => 'fab fa-instagram-square'
	),
	'youtube' => array(
		'name' => 'YouTube',
		'icon' => 'fab fa-youtube-square'
	)
	);

// Get orientation value and set a class if we want a vertical profile.
$orientation = get_field( 'uds_profile_orientation' );
$orientation_class = '';
if ( 'vertical' === $orientation ) {
	$orientation_class = 'vertical';
}

/**
 * Determine if we should render the 'contact row' that has email, phone
 * and address. We default to rendering this row, but turn it off if ALL
 * items in it were left empty by the user.
 */
$render_contact_row = true;
if( empty( $person_email) && empty( $person_phone) && empty( $person_street_address ) && empty( $person_city_state_zip ) ) {
	$render_contact_row = false;
}


// Render the block.
?>

<!-- Actually Render the Block (compatible version) -->
<div class="profile profile-type-standard <?php echo $additional_classes; ?>">
	<div class="profile-row <?php echo $border_override_class; ?>">
		<div class="profile-photo-column">
			<a href="" target="_blank" rel="noopener noreferrer">
				<img class="pictureOriginal" src="<?php echo $image_data['url'];?>" alt="profile picture for <?php echo $person_name; ?>">
			</a>
		</div>
		<div class="profile-bio-column">
			<h3 class="profile-name">
				<a href="<?php echo $person_url; ?>" target="_blank" rel="noopener noreferrer">
					<?php echo $person_name; ?>
				</a>
			</h3>
			<div class="profile-title">
				<p class="titleOriginal">
					<?php echo $person_title; ?>
				</p>
			</div>
			<div class="profile-contact-row">
				<div class="">
					<p>
						<a class="linkOriginal" href="mailto:BRENDA.DAY@asu.edu">
							<?php echo $person_email; ?>
						</a>
					</p>
				</div>
				<div class="">
					<p>
						<a class="" href="tel:<?php echo $person_phone;?>">
							<?php echo $person_phone; ?>
						</a>
					</p>
				</div>
				<div class="">
						<div>
							<p>
								<?php echo $person_street_address; ?>
								<br>
								<?php echo $person_city_state_zip; ?>
							</p>
						</div>
				</div>
			</div>
			<p>
				<?php echo $person_text; ?>
			</p>
		</div>
	</div>
</div>