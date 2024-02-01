<?php

/**
 * Pagination layout
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( !function_exists( 'uds_wp_pagination' ) ):
	/**
	 * Displays the navigation to next/previous set of posts.
	 *
	 * @param string|array $args {
	 *     (Optional) Array of arguments for generating paginated links for archives.
	 *
	 *     @type string $base               Base of the paginated url. Default empty.
	 *     @type string $format             Format for the pagination structure. Default empty.
	 *     @type int    $total              The total amount of pages. Default is the value WP_Query's
	 *                                      `max_num_pages` or 1.
	 *     @type int    $current            The current page number. Default is 'paged' query var or 1.
	 *     @type string $aria_current       The value for the aria-current attribute. Possible values are 'page',
	 *                                      'step', 'location', 'date', 'time', 'true', 'false'. Default is 'page'.
	 *     @type bool   $show_all           Whether to show all pages. Default false.
	 *     @type int    $end_size           How many numbers on either the start and the end list edges.
	 *                                      Default 1.
	 *     @type int    $mid_size           How many numbers to either side of the current pages. Default 2.
	 *     @type bool   $prev_next          Whether to include the previous and next links in the list. Default true.
	 *     @type bool   $prev_text          The previous page text. Default '&laquo;'.
	 *     @type bool   $next_text          The next page text. Default '&raquo;'.
	 *     @type string $type               Controls format of the returned value. Possible values are 'plain',
	 *                                      'array' and 'list'. Default is 'array'.
	 *     @type array  $add_args           An array of query args to add. Default false.
	 *     @type string $add_fragment       A string to append to each link. Default empty.
	 *     @type string $before_page_number A string to appear before the page number. Default empty.
	 *     @type string $after_page_number  A string to append after the page number. Default empty.
	 *     @type string $screen_reader_text Screen reader text for the nav element. Default 'Posts navigation'.
	 * }
	 * @param string       $class           (Optional) Classes to be added to the <ul> element. Default 'pagination'.
	 */


	function uds_wp_pagination($args = array(), $class = 'pagination') {

		if (!isset($args['total']) && $GLOBALS['wp_query']->max_num_pages <= 1) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => __('&laquo; Prev', 'uds-wordpress-theme'),
				'next_text'          => __('Next &raquo;', 'uds-wordpress-theme'),
				'type'               => 'array',
				'current'            => max(1, get_query_var('paged')),
				'screen_reader_text' => __('Posts navigation', 'uds-wordpress-theme'),
			)
		);

		// Make the query object available.
		global $wp_query;

		// Set the last page to the number of current pages from the query.
		$last_page = $wp_query->max_num_pages;

		// Set the first page to one.
		$first_page = 1;

		// Set the current page to either the actual current page (if there are any pages), or 1.
		$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		// Retrieve the links from WordPress.
		$links = paginate_links( $args );

		// If there are no links, return now and do not render any controls.
		if ( !$links ) {
			return;
		}

		?>

		<nav aria-labelledby="posts-nav-label">

			<h2 id="posts-nav-label" class="sr-only">
				<?php echo esc_html( $args['screen_reader_text'] ); ?>
			</h2>

			<ul class="<?php echo esc_attr( $class ); ?> justify-content-center">

				<?php
				/**
				 * Here we do the actual drawing of the controls in three steps:
				 *
				 * 1) Check to see if the current page is the FIRST page, and if NOT, render a "First" link.
				 * 2) Loop through the WordPress-provided pagination links and render them
				 * 3) Check to see if the current page is the LAST page, and if NOT, render a "Last" link
				 */
				?>

				<?php if ( $current_page != $first_page ): ?>
					<li class="page-item"><a class="page-link" href="<?php echo get_pagenum_link( $first_page ); ?>">First</a></li>
				<?php endif; ?>

				<?php foreach ( $links as $key => $link ): ?>
					<li class="page-item <?php echo strpos($link, 'current') ? 'active' : ''; ?>">
						<?php echo str_replace('page-numbers', 'page-link', $link); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</li>
				<?php endforeach; ?>

				<?php if ( $current_page != $last_page ): ?>
					<li class="page-item"><a class="page-link" href="<?php echo get_pagenum_link( $last_page ); ?>">Last</a></li>
				<?php endif; ?>
			</ul>

		</nav>
<?php
	} // close function
endif;
