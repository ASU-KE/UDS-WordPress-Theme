<?php

/**
 * UDS Interactive image based card
 *
 * @package UDS WordPress Theme
 * @author ASU KE Web Services
 */

// $card_title = get_field('title');
// $card_description = get_field('description');
// $with_desc_class = $card_description ? 'with-desc' : '';

$background_image = get_field('background_image');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$call_to_action = get_field('call_to_action');
$call_to_action_url = get_field('call_to_action_url');

?>

<div class="content-section text-white">
	<div class="image-holder">
		<?php echo wp_get_attachment_image( $background_image['ID'], 'full', '', array( 'class' => 'testimonial__img', 'decoding' => 'async', 'loading' => 'lazy'  ) ); ?>
    </div>
    <div class="content-holder">
		<div class="content-bg">
			<h3><?php echo $heading ?></h3>
			<div class="hidden-details">
				<p class="long-text"><?php echo $paragraph ?></p>
				<a href="<?php echo $call_to_action_url ?>" class="btn btn-gold btn-sm" data-ga="call to action" data-ga-name="onclick" data-ga-event="link" data-ga-action="click" data-ga-type="<?php echo $data_ga_type = (strpos($call_to_action, 'asu.edu') !== false || strpos($call_to_action, '/') == 0) ? 'internal link' : 'external link';?>" data-ga-region="main content" data-ga-section="<?php echo $heading ?>"><?php echo $call_to_action ?></a>
			</div>
		</div>
	</div>
</div>

