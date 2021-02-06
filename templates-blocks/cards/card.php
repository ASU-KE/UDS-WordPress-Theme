<?php

?>

<div class="card">
	<?php if( get_field( 'show_image' ) ): ?>
		<img class="card-img-top" src="<?php the_field( 'image' );?>" alt="Card image cap">
	<?php endif; ?>
		<div class="card-header">
			<h3 class="card-title"><? wp_kses( the_field( 'title' ), '' ); ?></h3>
		</div>
	<?php if( get_field( 'show_body_text' ) ): ?>
		<div class="card-body">
			<p class="card-text"><? wp_kses( the_field( 'body_text' ), '' );?></p>
		</div>
	<? endif; ?>
	<?php if( get_field( 'show_datetime' ) ): ?>
	<div class="card-event-details">
		<div class="card-event-icons">
			<div><i class="fas fa-map-marker-alt"></i></div>
			<div>Downtown Phoenix campus</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if( get_field( 'show_buttons' ) ): ?>
		<div class="card-button">
			<a href="#" class="btn btn-dark">Button link here</a>
		</div>
		<div class="card-button">
			<a href="#" class="btn btn-sm btn-dark">Button link here</a>
		</div>
	<?php endif; ?>
	<?php if( get_field( 'show_links' ) ): ?>
		<div class="card-link">
			<a href="#" class="">Regular text link here</a>
		</div>
	<?php endif; ?>
	<?php if( get_field( 'show_tags' ) ): ?>
		<p>Tags are here.</p>
	<?php endif; ?>
</div> <!-- .card -->
