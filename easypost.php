<?php
/*
Plugin Name: EasyPost
Plugin URI: http://seanvoss.com/easypost
Description: Provides an integration for EasyPost for woo-commerece.
Version: 0.1
Author: Sean Voss
Author URI: http://seanvoss.com/easypost

*/

/*
 * Title   : EasyPost shipping extension for WooCommerce
 * Author  : Sean Voss
 * Url     : http://seanvoss.com/easypost
 * License : http://seanvoss.com/license/license.html
 */

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Put your plugin code here

   // Order of Plugin Loading Requires this line, should not be necessary
   require_once (dirname(__FILE__) .'/../woocommerce/woocommerce.php');

    if (class_exists('WC_Shipping_Method'))
    {
      include_once('easypost_shipping.php');
    }



add_action( 'add_meta_boxes', 'add_boxes');

function add_boxes(){

 add_meta_box( 'easypost_data', __( 'EastPost', 'woocommerce' ), 'woocommerce_easypost_meta_box', 'shop_order', 'normal', 'low' );

}

function woocommerce_easypost_meta_box($post)
{


  print sprintf("<a href='%2\$s' style='text-align:center;display:block;'><img style='max-width:%1\$s' src='%2\$s' ></a>",'450px', get_post_meta( $post->ID, 'easypost_shipping_label', true));

}

}
