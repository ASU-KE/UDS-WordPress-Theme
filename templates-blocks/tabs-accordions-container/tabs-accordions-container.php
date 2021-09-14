<?php
/**
 * UDS Tabs and Accordions container
 *
 * @package UDS WordPress Theme
 */


// Retrieve additional classes from the 'advanced' field in the editor.
$additional_classes = '';
if ( ! empty( $block['className'] ) ) {
	$additional_classes = $block['className'];

}
//echo '<pre>'; print_r($block); echo '</pre>';

	// Sets InnerBlocks with a Bootstrap blocks container as default content.
	$allowed_blocks = array( 'acf/uds-single-tab', 'acf/uds-single-accordion' );
	$template = array(
		array(
			'acf/uds-single-accordion',
		),
	);
echo '<div class="accordion '. $additional_classes .'" id="accordionExample" >';
	echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" />';
echo '</div>';


/*
<nav class="uds-tabbed-panels">
	<div
		class="nav nav-tabs"
		data-scroll-position="0"
		id="nav-tab"
		role="tablist"
	>
		<a
			aria-controls="nav-home"
			aria-selected="true"
			class="nav-item nav-link active"
			data-toggle="tab"
			href="#nav-home"
			id="nav-home-tab"
			role="tab"
		>
			Home long tab
		</a>
		<a
			aria-controls="nav-profile"
			aria-selected="false"
			class="nav-item nav-link"
			data-toggle="tab"
			href="#nav-profile"
			id="nav-profile-tab"
			role="tab"
		>
			Profile long tab
		</a>
		<a
			aria-controls="nav-contact"
			aria-selected="false"
			class="nav-item nav-link"
			data-toggle="tab"
			href="#nav-contact"
			id="nav-contact-tab"
			role="tab"
		>
			Contact us is a long tab
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
<div
	class="tab-content"
	id="nav-tabContent"
>
	<div
		aria-labelledby="nav-home-tab"
		class="tab-pane fade show active"
		id="nav-home"
		role="tabpanel"
	>
		This is an ordinary paragraph that is long enough to wrap to multiple lines so that you can see how spacing looks. At vero eos et accusam et justo duo dolores et ea rebu.
		<br />
		Stet clita kasd gubergren, no sea takimata sanctus est Lorem.
	</div>
	<div
		aria-labelledby="nav-profile-tab"
		class="tab-pane fade"
		id="nav-profile"
		role="tabpanel"
	>
		This is an ordinary paragraph that is long enough to wrap to multiple lines so that you can see how spacing looks. At vero eos et accusam et justo duo dolores et ea rebu.
		<br />
		Stet clita kasd gubergren, no sea takimata sanctus est Lorem.
	</div>
	<div
		aria-labelledby="nav-contact-tab"
		class="tab-pane fade"
		id="nav-contact"
		role="tabpanel"
	>
		This is an ordinary paragraph that is long enough to wrap to multiple lines so that you can see how spacing looks. At vero eos et accusam et justo duo dolores et ea rebu.
		<br />
		Stet clita kasd gubergren, no sea takimata sanctus est Lorem.
	</div>
	<div
		aria-labelledby="nav-another-tab"
		class="tab-pane fade"
		id="nav-another"
		role="tabpanel"
	>
		This is an ordinary paragraph that is long enough to wrap to multiple lines so that you can see how spacing looks. At vero eos et accusam et justo duo dolores et ea rebu.
		<br />
		Stet clita kasd gubergren, no sea takimata sanctus est Lorem.
	</div>
	<div
		aria-labelledby="nav-another-2-tab"
		class="tab-pane fade"
		id="nav-another-2"
		role="tabpanel"
	>
		This is an ordinary paragraph that is long enough to wrap to multiple lines so that you can see how spacing looks. At vero eos et accusam et justo duo dolores et ea rebu.
		<br />
		Stet clita kasd gubergren, no sea takimata sanctus est Lorem.
	</div>
	<div
		aria-labelledby="nav-another-3-tab"
		class="tab-pane fade"
		id="nav-another-3"
		role="tabpanel"
	>
		This is an ordinary paragraph that is long enough to wrap to multiple lines so that you can see how spacing looks. At vero eos et accusam et justo duo dolores et ea rebu.
		<br />
		Stet clita kasd gubergren, no sea takimata sanctus est Lorem.
	</div>
</div>

*/
?>
