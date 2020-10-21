<?php
/**
 * Login
 *
 * @package      CWStarter

**/

/**
 * Replace login logo's url with our url instead of WP
 *
 */
function cwt_login_header_url( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'cwt_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );

/**
 * A few custom styles
 *
 */
function cwt_login_logo() {

	$logo_path = '/images/logo.png';
	if( ! file_exists( get_stylesheet_directory() . $logo_path ) )
		return;

	$logo = get_stylesheet_directory_uri() . $logo_path;
    ?>
    <style type="text/css">
    .login h1 a {
        background-image: url(<?php echo $logo;?>);
        background-size: contain;
        background-repeat: no-repeat;
		background-position: center center;
        display: block;
        overflow: hidden;
        text-indent: -9999em;
        width: 312px;
        height: 100px;
    }
    </style>
    <?php
}
add_action( 'login_head', 'cwt_login_logo' );