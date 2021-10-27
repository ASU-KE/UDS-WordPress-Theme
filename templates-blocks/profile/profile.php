<?php

/**
 * Do some stuff here.
 */

/**
 * Image data returns an array, so we can't use the normal get_field() or
 * the_field() functions. We grab the image data array here, and echo out
 * the parts we want later.
 */
$image_data = get_field('uds_profile_image');

?>

<div class="profile profile-type-standard">
	<div class="profile-row">
		<div class="profile-photo-column">
			<a href="<?php the_field('uds_profile_url'); ?>">
				<img class="pictureOriginal" src="<?php echo $image_data['url']; ?>" alt="<?php echo $image_data['alt']; ?>">
			</a>
		</div>
		<div class="profile-bio-column">
			<h3 class="profile-name"><a href="<?php the_field('uds_profile_url'); ?>"><?php the_field('uds_profile_name'); ?></a></h3>
			<div class="profile-title">
				<p class="titleOriginal"><?php the_field('uds_profile_title'); ?></p>
			</div>
			<div class="profile-contact-row">
				<div class="">
					<p>
						<a class="linkOriginal" href="mailto:<?php the_field('uds_profile_email'); ?>"><?php the_field('uds_profile_email'); ?></a>
					</p>
				</div>
				<div class="">
					<p>
						<a class="" href="tel:<?php the_field('uds_profile_phone'); ?>"><?php the_field('uds_profile_phone'); ?></a>
					</p>
				</div>
				<!--
				<div class="">
					<p>
						<div>
							<br>
						</div>
					</p>
				</div>
				-->
			</div>
			<p><?php the_field('uds_profile_text'); ?></p>
		</div>
	</div>
</div>
