<?php

/**
 * Retrieve values from ACF. To make cleaner, easier to read logic in the
 * output area below, we're grabbing all of our values first to allow us
 * to manipulate them if needed before we present them.
 */

/**
 * Person Data
 */
$image_data   = get_field( 'uds_profile_image');
$person_name  = get_field( 'uds_profile_name' );
$person_title = get_field( 'uds_profile_title' );
$person_email = get_field( 'uds_profile_email' );
$person_phone = get_field( 'uds_profile_phone' );
$person_url   = get_field( 'uds_profile_url' );
$person_text  = get_field( 'uds_profile_text' );

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
 * Element toggle values. Set a local variable based on whether an element is
 * set to be shown or hidden. The way ACF does this with our Checkbox field is
 * to return an array of ONLY the selected values (i.e. boxes that were checked).
 *
 * To know if we want to display something, we need to check to see if the array
 * contains the value for any possible checkbox, and create a local variable.
 */

// 1. Get the actual array of checked items.
$elements = get_field('uds_profile_elements');

// 2. Look for each possible value, and set a local variable.
$show_image        = $elements && in_array( 'show_image', $elements ) ? true : false;
$show_name         = $elements && in_array( 'show_name', $elements ) ? true : false;
$show_title        = $elements && in_array( 'show_title', $elements ) ? true : false;
$show_contact_row  = $elements && in_array( 'show_contact_row', $elements ) ? true : false;
$show_profile_text = $elements && in_array( 'show_profile_text', $elements ) ? true : false;

/**
 * Other variables
 */

// If no URL was provided, do not make the image or name an actual link
$link_image_and_name = $person_url && '' !== $person_url ? true : false;

// Add class to remove the bottom border when it's been turned off.
$show_bottom_border  = get_field( 'uds_profile_bottom_border' );
if( $show_bottom_border ) {
	$bottom_border_class = '';
}else{
	$bottom_border_class = 'no-border';
}

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
						<span className="person-street">1234 Address St.</span>
						<span className="person-city">Tempe AZ 12345</span>
					</address>
				</a>
			</li>
		</ul>
		<p class="person-description">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ultrices nisl, at vestibulum tortor. Phasellus ut interdum turpis, et dignissim nisi. In sed volutpat lectus. Lorem ipsum dolor sit amet.
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
