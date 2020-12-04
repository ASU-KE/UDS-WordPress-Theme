<?php
/**
 * The template for displaying search forms
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'uds-wordpress-theme' ); ?></label>
	<div class="input-group">
		<input class="field form-control border-right-0 rounded-0" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search', 'uds-wordpress-theme' ); ?>" value="<?php the_search_query(); ?>">
			<span class="input-group-append">
			<button class="submit bg-transparent form-control border-left-0 rounded-0" id="searchsubmit" name="submit" type="submit"> <i class="fa fa-search"></i></button>
			</span>
	</div>
</form>
