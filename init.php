<?php
/**
 * Facebook Messanger Live Chat 1.0.0 initiate .
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Load plugin textdomain.
 */
function mlc_load_textdomain() {
  load_plugin_textdomain( 'kill-adblock', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'mlc_load_textdomain' );
/**
 * Enqueue scripts and styles.
 */
/**
 * footer message.
 */
function mlc_footer() {
    if(get_option('mlc_status')==1)
    {
        require 'footer-message.php';
    }
}
add_action( 'wp_footer', 'mlc_footer' );