<?php
/**
 * UDS Card Block
 *
 * An attempt to make an all-encompassing card block.
 */

// determine card style classes to use.
$style = get_field( 'card_style' );
switch ($style) {
	case 'degree':
		$style_class = 'card-degree';
		break;

	case 'event':
		$style_class = 'card-event';
		break;

	case 'story':
		$style_class = 'card-story';
		break;

	default:
		$style_class = '';
		break;
}

?>


<div class="card <?php echo $style_class; ?>">
	<?php if( get_field( 'show_image' ) ): ?>
		<img class="card-img-top" src="<?php the_field( 'image' );?>" alt="Card image cap">
	<?php endif; ?>
		<div class="card-header">
			<h3 class="card-title"><?php echo wp_kses( the_field( 'title' ), '' ); ?></h3>
		</div>
	<?php if( '' !== get_field( 'body_text' ) ): ?>
		<div class="card-body">
			<p class="card-text"><?php echo wp_kses( the_field( 'body_text' ), '' );?></p>
		</div>
	<? endif; ?>

	<?php if( 'event' === get_field( 'card_style' ) ): ?>
		<?php if( get_field( 'start_date' ) || get_field( 'start_time' ) ): ?>
			<div class="card-event-details">
				<div class="card-event-icons">
						<div><i class="fas fa-calendar"></i></div>
						<div>
							<?php the_field( 'start_date' ); ?><br>
							<?php the_field( 'start_time' ); ?>
							<?php if (get_field( 'end_time') ): ?>
								&nbsp;&ndash;&nbsp;<?php the_field( 'end_time' ); ?>
							<?php endif; ?>
						</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if( get_field( 'location' ) ): ?>
			<div class="card-event-details">
				<div class="card-event-icons">
					<div><i class="fas fa-map-marker-alt"></i></div>
					<div><?php the_field( 'location' ); ?></div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field( 'buttons' ) ): ?>
		<?php if( have_rows( 'buttons' ) ): ?>
			<?php while( have_rows( 'buttons' ) ) : the_row(); ?>
				<div class="card-button">
					<?php
						$button_label = get_sub_field( 'button_label' );
						$button_url = get_sub_field( 'button_url' );
						$external_link = get_sub_field( 'external_link' );
						$button_color = get_sub_field( 'button_color' );
						$button_size = get_sub_field( 'button_size' );

						if( $external_link ) {
							$rel = 'rel="noopener noreferrer"';
						}else{
							$rel = '';
						}

						if( 'default' !== $button_size ) {
							$button_size = 'btn-' . $button_size;
						}else{
							$button_size = '';
						}
					?>
					<a href="<?php echo $button_url;?>" class="btn <?php echo $button_size;?> btn-<?php echo $button_color;?>" ?> <?php echo $rel; ?><?php echo $button_label; ?></a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field( 'links' ) ): ?>
		<?php if( have_rows('links') ): ?>
			<div class="card-link">
			<?php while( have_rows('links') ) : the_row(); ?>
				<?php
					$link_label = get_sub_field('link_text');
					$link_url = get_sub_field( 'link_url');
					$external_link = get_sub_field( 'external_link' );

					if( $external_link ) {
						$rel = 'rel="noopener noreferrer"';
					}else{
						$rel = '';
					}
				?>
				<a href="<?php echo $link_url;?>" <?php echo $rel; ?>><?php echo $link_label;?></a>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( get_field( 'tags' ) ): ?>
		<?php if( have_rows('tags') ): ?>
			<div class="card-tags">
			<?php while( have_rows('tags') ) : the_row(); ?>
				<?php
					$tag_label = get_sub_field('tag_text');
					$tag_url = get_sub_field( 'tag_url');
				?>
				<a class="btn btn-tag btn-tag-alt-white" href="<?php echo $tag_url;?>" ><?php echo $tag_label;?></a>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
