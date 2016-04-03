<?php
/**
 * Can, The Whole Functions
 *
 * @package can
 */

// Scripts
function can_scripts() {
	wp_enqueue_style( 'can-fonts', 'https://fonts.googleapis.com/css?family=Source+Code+Pro:400,700' );
	wp_enqueue_style( 'can-style', get_stylesheet_uri(), array( 'can-fonts' ) );
}
add_action( 'wp_enqueue_scripts', 'can_scripts' );

// Nav Menu
register_nav_menus( array(
	'primary'  => __( 'Header', 'can' )
) );

// Gallery Styles Suck
add_filter( 'use_default_gallery_style', '__return_false' );

// [hours] Shortcode
function can_shortcode_hours( $atts ) {
	$atts = shortcode_atts( array(
		'weekday' => '9-17',
		'weekend' => 'closed',
		'mon'     => '',
		'tue'     => '',
		'wed'     => '',
		'thu'     => '',
		'fri'     => '',
		'sun'     => '',
		'sat'     => '',
		'open'    => __( 'Open right now', 'can' ),
		'closed'  => __( 'Closed right now', 'can' ),
	), $atts, 'hours' );

	$day = strtolower( date( 'D', current_time( 'timestamp' ) ) );

	switch ( $day ) {
		case 'sun':
		case 'sat':
			$today = $atts[$day] ? $atts[$day] : $atts['weekend'];
			break;

		default:
			$today = $atts[$day] ? $atts[$day] : $atts['weekday'];
	}

	if ( 'closed' === $today ) {
		return $atts['closed'];
	}

	$times = array_map( 'can_paddy', explode( '-',  $today ) );
	$now = date( 'Gi', current_time( 'timestamp' ) );

	if ( $times[0] < $now && $now < $times[1] ) {
		return $atts['open'];
	}

	return $atts['closed'];
}
add_shortcode( 'hours', 'can_shortcode_hours' );

function can_paddy( $val ){
	$val .= strlen( $val ) < 3 ? '00' : '';
	return $val;
}
