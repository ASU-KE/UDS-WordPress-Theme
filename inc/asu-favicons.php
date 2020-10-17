<?php
/**
 * uds_wp_favicons header hook, provides links to the favicons from the UDS WordPress Theme
 */

function uds_wp_favicons() {
	?>
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="<?php echo bloginfo( 'name' ); ?>"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicon/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/img/favicon/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/img/favicon/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/img/favicon/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/img/favicon/mstile-310x310.png" />

	<?php
}

add_action( 'wp_head', 'uds_wp_favicons' );
