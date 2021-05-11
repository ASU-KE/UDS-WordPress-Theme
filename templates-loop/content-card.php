<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get the thumbnail alt text.
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt_text = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );

?>

<div class="col col-12 col-md-6 col-lg-4 mb-4">

	<div class="card card-story" id="post-<?php the_ID(); ?>" >

		<?php
		if ( has_post_thumbnail() ) {
			echo '<img class="card-img-top" src="' . get_the_post_thumbnail_url( $post->ID, 'large' ) . '" alt="' . $alt_text . '"/>';
		}
		?>

		<div class="card-header">
			<h3 class="card-title"><?php the_title(); ?></h3>
		</div>

		<div class="card-body">
			<p class="card-text"><?php the_excerpt(); ?></p>
		</div>

		<div class="card-button">
			<a href="<?php the_permalink(); ?>" class="btn btn-maroon">Read more</a>
		</div>

	</div> <!-- .card -->

</div>
