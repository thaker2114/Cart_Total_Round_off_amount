<?php
/**
 * Plugin Name: Cart Total Round off amount
 * Plugin URI: https://github.com/thaker2114
 * Description: Round off Woocommerce Cart Total to nearest 10 cents.
 * Version: 1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author: Dhaval Thaker
 * Author URI: http://thakerdhaval.com
 * Woo: 12345:342928dfsfhsf8429842374wdf4234sfd
 * WC requires at least: 4.4
 * WC tested up to: 4.4.1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

// filter the woocommerce cart total with rounding off to nearest 10 cent
    add_filter( 'woocommerce_calculated_total', 'thaker_custom_roundoff' );
    function thaker_custom_roundoff( $total ) {
        $round_num = ceil($total / 0.10) * 0.10;
        $total = number_format($round_num, 2); 
        // this is required for showing zero in the last decimal
        return $total;
    }

}