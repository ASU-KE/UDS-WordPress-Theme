<?php

/**
 * UDS Step List
 *
 * @package UDS WordPress Theme
 * @author Walter McConnell
 *
 * A block for creating a basic, properly formatted, UDS step list. Options include:
 *
 * Colored bullets in black (default), maroon, or gold
 * Background colors in white (default), light smoke, smoke, or dark
 */

$bullet_color = get_field('bullet_color');
$background_color = get_field('background_color');
?>


<ol class="uds-list uds-steplist <?php echo $bullet_color;?> <?php echo $background_color;?>">

<?php
if ( have_rows( 'uds_step_list_items' ) ) :

	while ( have_rows( 'uds_step_list_items' ) ) :
	the_row();

	$list_item_text = get_sub_field( 'uds_step_list_item_text', false );
	$list_item_content = get_sub_field( 'uds_step_list_item_content');
?>
	<li><?php echo $list_item_text; ?>
		<br />
		<span>
			<?php echo $list_item_content; ?>
		</span>
	</li>

	<?php endwhile; ?>

</ol>

<?php else: ?>
	<?php echo "No steps have been added to this list."; ?>
<?php endif; ?>
