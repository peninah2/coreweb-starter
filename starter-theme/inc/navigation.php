<?php
/**
 * Navigation
 *
 * @package      CWStarter

**/ 
 

// Custom header
function cwt_header() {
	?>
			<a href="/" class="logo"><h1>Site title</h1></a>
	<?php
	}
//add_action('genesis_header', 'cwt_header');
 
 

 // Repositions primary navigation menu to header
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

// Reduces secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'cwt_secondary_menu_args' );
function cwt_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;
	return $args;

}