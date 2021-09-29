<?php
/**
 * UDS Foldable card block
 *
 * @package UDS WordPress Theme
 */

 $tab_id = 'tab_' . $block['id'];
 $tab_title = get_field( 'uds_single_tab_title' );
 $tab_icon = get_field( 'uds_single_tab_title_icon' );



 if($tab_icon){
	 $tab_icon='<i class="'. $tab_icon .'"></i>';
 }

$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];
}



	// Sets InnerBlocks with a Bootstrap blocks container as default content.
	$allowed_blocks = array( 'wp-bootstrap-blocks/container', 'core/html' );
	$template = array(
		array(
			'wp-bootstrap-blocks/container',
			array(
				'marginAfter' => 'mb-0',
			),
		),
	);

echo '
<nav class="uds-tabbed-panels">
            <div class="nav nav-tabs" data-scroll-position="0" id="nav_'.$tab_id.'" role="tablist" >
              <a
                aria-controls="'. $tab_id .'"
                aria-selected="true"
                class="nav-item nav-link active"
                data-toggle="tab"
                href="#'. $tab_id .'"
                id="'. $tab_id .'-nav"
                role="tab"
              >
              '. $tab_icon . $tab_title .'
              </a>
							</div>
							<a
              class="scroll-control-prev"
              data-scroll="prev"
              href="#carouselExampleControls"
              role="button"
              tabIndex="-1"
            >
              <span
                aria-hidden="true"
                class="carousel-control-prev-icon"
              />
              <span class="sr-only">
                Previous
              </span>
            </a>
            <a
              class="scroll-control-next"
              data-scroll="next"
              href="#carouselExampleControls"
              role="button"
              tabIndex="-1"
            >
              <span
                aria-hidden="true"
                class="carousel-control-next-icon"
              />
              <span class="sr-only">
                Next
              </span>
            </a>
							</nav>
<div class="tab-content" id="nav_'.$tab_id.'Content">
  <div
	aria-labelledby="'. $tab_id .'-nav"
	class="tab-pane fade show active '. $additional_classes .'"
	id="'. $tab_id .'"
	role="tabpanel"
>
';
	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';

echo '</div>
</div>';

?>
