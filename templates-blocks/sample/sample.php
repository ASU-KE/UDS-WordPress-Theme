<?php
/**
 * UDS Sample Block
 *
 * This is a sample block
 */
?>

<div class="<?php the_field( 'container_type' );?> py-12 my-12 bg <?php the_field( 'background_style' );?>" style="font-style: italic;">
	<?php if( get_field( 'add_inner_container' ) ): ?>
		<div class="container">
	<?php endif; ?>
	<div class="row" style="background-color: #eee;">
		<div class="col mx-auto px-12">
			<h3><? the_field( 'title' ); ?></h3>
			<p><? the_field( 'content' ); ?></p>
		</div>
	</div>
	<?php if( get_field( 'add_inner_container' ) ): ?>
		</div>
	<?php endif; ?>
</div>
