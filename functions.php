<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add desktop menu walker */
require_once( 'library/menu-walker.php' );

/** Add off-canvas menu walker */
require_once( 'library/offcanvas-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Add protocol relative theme assets */
require_once( 'library/protocol-relative-theme-assets.php' );

/**Change Howdy Message **/
function howdy_message($translated_text, $text, $domain) {
    $new_message = str_replace('Howdy', 'Welcome', $text);
    return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);
/** Remove Edit Link */
add_filter( 'edit_post_link', '__return_false' );
//*Remove Fields on EPL
function epl_unset_property_ensuite ($field) {
return;
}
add_filter('epl_meta_property_ensuite', 'epl_unset_property_ensuite');
function epl_unset_property_rooms ($field) {
return;
}
add_filter('epl_meta_property_rooms', 'epl_unset_property_rooms');
function epl_unset_property_toilet ($field) {
return;
}
add_filter('epl_meta_property_toilet', 'epl_unset_property_toilet');
function epl_unset_property_land_fully_fenced ($field) {
return;
}
add_filter('epl_meta_property_land_fully_fenced', 'epl_unset_property_land_fully_fenced');
function epl_unset_property_air_conditioning ($field) {
return;
}
add_filter('epl_meta_property_air_conditioning', 'epl_unset_property_air_conditioning');
//*Change Category on EPL
function epl_modify_property_category($array) {
    $array = array(
		'home'      =>   'Single-Family Home',
		'condo'     =>   'Condo',
		'townhome'  =>   'Townhome',
		'mobile'    =>   'Mobile',
    );
     
    return $array;
}
add_filter('epl_listing_meta_property_category', 'epl_modify_property_category');
//* Modifies the edit listing land sizes
function my_epl_opts_area_unit_filter() {
    $sizes = array(
        'sqft'      =>   __('Square Feet', 'epl')
    );
    return $sizes;
}
// Modifies the edit listing land sizes
add_action( 'epl_opts_area_unit_filter' , 'my_epl_opts_area_unit_filter');
 
// Modifies the search widget land sizes
add_action( 'epl_listing_search_land_unit_label' , 'my_epl_opts_area_unit_filter');
function my_epl_opts_building_area_unit_filter() {
    $sizes = array(
		'sqft'      =>   __('Square Feet', 'epl')
    );
    return $sizes;
}

/** Remove Additional Features in Property Entry */
 function my_epl_unset_additional_features($group) {
    return;
}
add_filter('epl_meta_box_block_epl_additional_features_section_id', 'my_epl_unset_additional_features');
/** Adjust Easy Property Listings Rental Listings to accept decimals*/
/* function my_epl_price_number_format() {
    $decimal = 'decimal';
    return $decimal;
}
add_filter( 'epl_price_number_format' , 'my_epl_price_number_format' , 1 ); */

//* Modify Property (Property)& Rural Listing Type categories


?>
