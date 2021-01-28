<?php
/**
 * UDS Sample Block
 *
 * @package UDS WordPress Theme
 *
 * This is a sample block for demonstrating our code organization and style. This
 * particular block is a callout with a title and some text, and uses ACF functions
 * to bring in particular class names and content. This is an example of a larger
 * 'page section' kind of block, with all the Bootstrap containers, rows, and
 * columns as part of the markup. It would be intended for use only in our full
 * width page template, and NOT in the sidebar template.
 */

?>

<div class="<?php the_field( 'container_type' ); ?> py-12 my-12 bg <?php the_field( 'background_style' ); ?>" style="font-style: italic;">
	<?php if ( get_field( 'add_inner_container' ) ) : ?>
		<div class="container">
	<?php endif; ?>
	<div class="row" style="background-color: #eee;">
		<div class="col mx-auto px-12">
			<h3><?php the_field( 'title' ); ?></h3>
			<p><?php the_field( 'content' ); ?></p>
		</div>
	</div>
	<?php if ( get_field( 'add_inner_container' ) ) : ?>
		</div>
	<?php endif; ?>
</div>
