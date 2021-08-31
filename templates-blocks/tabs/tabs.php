<?php
/**
 * UDS Tabs Block
 *
 * @package UDS WordPress Theme
 * @author Zainab Alsidiki
 */

$tabs_style = get_field( 'tabs_style' );
switch ( $tabs_style ) {
	case 'accordion':
		$accordion_id = 'Accordion' . date( 'hisa' );
		break;

	default:
	$accordion_id = '';
		break;
}


 // Check tabs exists.
if ( have_rows( 'tabs' ) ) {
	$tab_order = 0;

	// Loop through rows.
	while ( have_rows( 'tabs' ) ) {
		the_row();
		$tab_order++;

		// Load sub field value.
				$is_active = '';
				$show_classes = '';
				$aria_selected = 'false';
		if ( 1 == $tab_order ) {
			$is_active = 'active';
			$show_classes = 'show active';
			$aria_selected = 'true';}
		$tab_title = get_sub_field( 'tab_title' );
				$tab_content_type = get_sub_field( 'tab_content' );
		if ( ! $tab_content_type ) {$tab_content_type = 'post_content';}
				$tab_content = get_sub_field( $tab_content_type );



		if ( ( ! $tab_title ) && ( 'post_content' == $tab_content_type ) ) {
			$tab_title = $tab_content->post_title;
		}
		if ( 'post_content' == $tab_content_type ) {
			$current_time=gettimeofday(true);
			$current_time=str_replace('.', '', $current_time);
			$tab_content_id = $tab_content->ID.'_'.$current_time;
			$tab_ID=$tab_content->ID;
			$this_tab_content='<div class="zainab">';
			$tab_content1 = $tab_content->post_content;
			$this_tab_content .= apply_filters('the_content', $tab_content1);
			$this_tab_content .='</div>';
			$tab_content = $this_tab_content;
      if (get_edit_post_link($tab_ID)){
			$tab_content .='<span class="edit-link"><a class="post-edit-link btn btn-sm btn-dark" href="'.get_edit_post_link($tab_ID).'">Edit tab content</a></span>';
		  }
		} else {
      $current_time=gettimeofday(true);
			$current_time=str_replace('.', '', $current_time);
			$tab_content_id = 'order'. $tab_order.'_'.$current_time;
		}
$accordion_card_style = get_sub_field( 'accordion_card_style' );
		switch ( $accordion_card_style ) {
			case 'card_gold':
				$accordion_card_class = '';
				break;

				case 'card_maroon':
					$accordion_card_class = 'card-maroon';
					break;

				case 'card_gray':
					$accordion_card_class = 'card-gray';
					break;

				case 'card_dark':
					$accordion_card_class = 'card-dark';
					break;

			default:
				$accordion_card_class = '';
				break;
		}



				   $tab_header[] = '<a class="nav-item nav-link ' . $is_active . '" id="tab-header-' . $tab_content_id . '" data-toggle="tab" href="#tab-content-' . $tab_content_id . '" role="tab" aria-controls="tab-content-' . $tab_content_id . '" aria-selected="' . $aria_selected . '">' . $tab_title . '</a>';
				   $tab_post_content[] = '<div class="tab-pane fade ' . $show_classes . '" id="tab-content-' . $tab_content_id . '" role="tabpanel" aria-labelledby="tab-header-' . $tab_content_id . '">' . $tab_content . '</div>';


		if ( 'accordion' == $tabs_style ) {
			$accordion_tab[] = '<div class="card card-foldable mt-3 '.$accordion_card_class.'"><div class="card-header"><h4><a id="tab-header-' . $tab_content_id . '" class="collapsed" href="#tab-content-' . $tab_content_id . '" data-toggle="collapse" data-target="#tab-content-' . $tab_content_id . '" role="button" aria-expanded="false" aria-controls="tab-content-' . $tab_content_id . '">' . $tab_title . '<i class="fas fa-chevron-up"></i></a></h4></div><!-- end .card-header --><div id="tab-content-' . $tab_content_id . '" class="collapse card-body" aria-labelledby="tab-header-' . $tab_content_id . '" data-parent="#' . $accordion_id
			. '">' . $tab_content . '</div></div>';
		}


		   // End loop.
	}
} else {

	echo 'no tabs added!';

}




?>

<?php if ( 'accordion' != $tabs_style ) { ?>
<nav class="uds-tabbed-panels">

	<div class="nav nav-tabs" id="nav-tab-<?php echo str_replace( ' ', '_', $tab_title ); ?>" role="tablist" data-scroll-position="0">
	<?php
	foreach ( $tab_header as $this_tab_header ) {
		echo $this_tab_header;
	}
	?>

</div>
<a class="scroll-control-prev" href="#carouselExampleControls" role="button" data-scroll="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="scroll-control-next" href="#carouselExampleControls" role="button" data-scroll="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
</nav>
<div class="tab-content" id="nav-tabContent-<?php echo str_replace( ' ', '_', $tab_title ); ?>">
	<?php
	foreach ( $tab_post_content as $this_tab_post_content ) {
		echo $this_tab_post_content;
	}
	?>
</div>
<?php } else { ?>


<div class="accordion" id="<?php echo $accordion_id; ?>">

	<?php
	foreach ( $accordion_tab as $this_accordion_tab ) {
		echo $this_accordion_tab;
	}
	?>

		</div>

			<?php } ?>
