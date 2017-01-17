<?php
/**
 * Utility Pro.
 *
 * @package      Utility_Pro
 * @link         http://www.carriedils.com/utility-pro
 * @author       Carrie Dils
 * @copyright    Copyright (c) 2015, Carrie Dils
 * @license      GPL-2.0+
 */

/**
 * Register the widget areas enabled by default in Utility.
 *
 * @since  1.0.0
 */
function utility_pro_register_widget_areas() {

	$widget_areas = array(
		array(
			'id'          => 'utility-bar',
			'name'        => __( 'Utility Bar', 'utility-pro' ),
			'description' => __( 'This is the utility bar across the top of page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-home-welcome',
			'name'        => __( 'Home Welcome', 'utility-pro' ),
			'description' => __( 'This is the welcome section at the top of the home page.', 'utility-pro' ),
		),
		array(
			'id'          => 'utility-home-gallery-1',
			'name'        => sprintf( _x( 'Home Gallery %d', 'Group of Home Gallery widget areas', 'utility-pro' ), 1 ),
			'description' => sprintf( _x( 'Home Gallery %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 1 ),
		),
		array(
			'id'          => 'utility-home-gallery-2',
			'name'        => sprintf( _x( 'Home Gallery %d', 'Group of Home Gallery widget areas', 'utility-pro' ), 2 ),
			'description' => sprintf( _x( 'Home Gallery %d widget area on home page.', 'Description of widget area', 'utility-pro' ), 2 ),
		),
		array(
			'id'          => 'utility-call-to-action',
			'name'        => __( 'Call to Action', 'utility-pro' ),
			'description' => __( 'This is the Call to Action section on the home page.', 'utility-pro' ),
		),
	);

	$widget_areas = apply_filters( 'utility_pro_default_widget_areas', $widget_areas );

	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}

// Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

// Remove after entry widget
remove_action( 'genesis_after_entry', 'genesis_after_entry_widget_area' );

// Add after entry widget to posts and pages
add_action( 'genesis_after_entry', 'rfw_after_entry', 9 );
function rfw_after_entry() {

   if ( ! is_singular( array( 'post', 'page' )) )
        return;

        genesis_widget_area( 'after-entry', array(
            'before' => '<div class="after-entry widget-area">',
            'after'  => '</div>',
        ) );

}
