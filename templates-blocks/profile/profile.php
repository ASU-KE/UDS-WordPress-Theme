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
 * Other variables
 */

// If no URL was provided, do not make the image or name an actual link
$link_image_and_name = $person_url && '' !== $person_url ? true : false;

?>
<div class="uds-person-profile <?php echo $orientation_class; ?>">
	<img
	alt="<?php echo $image_data['alt'];?>"
	class="profile-img"
	src="<?php echo $image_data['url'];?>"
	/>
	<div class="person  <?php echo $orientation_class; ?>">
		<h3 class="person-name"><?php echo $person_name; ?></h3>
		<h4 class="person-profession"><?php echo $person_title; ?></h4>
		<ul class="person-contact-info">
			<li>
				<a
				aria-label="Email user"
				href="mailto:email@asu.edu"
				>
					<?php echo $person_email; ?>
				</a>
			</li>
			<li>
				<a
				aria-label="Call user"
				href="tel:<?php echo $person_phone; ?>">
				<?php echo $person_phone; ?>
				</a>
			</li>
			<li>
				<a aria-label="See user address" href="#" >
					<address className="person-address">
						<span className="person-street"><?php echo $person_street_address; ?></span>
						<span className="person-city"><?php echo $person_city_state_zip; ?></span>
					</address>
				</a>
			</li>
		</ul>
		<p class="person-description">
			<?php echo $person_text; ?>
		</p>
		<?php if( have_rows( 'uds_profile_social_media_icons' ) ): ?>
			<ul class="person-social-medias">
			<?php while( have_rows( 'uds_profile_social_media_icons' ) ): the_row(); ?>
				<?php
					/**
					 * See if the chosen value is in our base array of social media sites.
					 * If not, use the hand-entered values
					 */
					$current_social_network = get_sub_field( 'uds_profile_network_name' );
					if( array_key_exists( $current_social_network, $base_social_media ) ) {
						$network_name = $base_social_media[$current_social_network]['name'];
						$network_icon = $base_social_media[$current_social_network]['icon'];
					}else{
						$network_name = get_sub_field( 'uds_profile_custom_network_name');
						$network_icon = get_sub_field( 'uds_profile_social_icon' );
					}
				?>
				<li>
					<a
					aria-label="Go to user <?php $network_name; ?> profile"
					href="<?php echo get_sub_field('uds_profile_social_url')?>"
					>
						<span class="<?php echo $network_icon; ?>" />
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
