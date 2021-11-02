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
 * Settings Data
 *
 * Values associated with the Display Options tab. Controls the orientation
 * of the profile, and allows users to turn elements on and off.
 */

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
<div class="uds-person-profile">
	<img
	alt="<?php echo $image_data['alt'];?>"
	class="profile-img"
	src="<?php echo $image_data['url'];?>"
	/>
	<div class="person">
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
		<ul class="person-social-medias">
			<li>
				<a
				aria-label="Go to user Facebook profile"
				href="#"
				>
					<span class="fab fa-facebook-square" />
				</a>
			</li>
			<li>
				<a
				aria-label="Go to user Linkedin profile"
				href="#"
				>
					<span class="fab fa-linkedin" />
				</a>
			</li>
			<li>
				<a
				aria-label="Go to user Twitter profile"
				href="#"
				>
					<span class="fab fa-twitter-square" />
				</a>
			</li>
		</ul>
	</div>
</div>
