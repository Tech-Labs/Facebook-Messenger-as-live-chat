<?php
/*
Plugin Name: Facebook Messanger Live Chat
Description: Use this plugin to make you page message to be live chat
Author: Ibrahim Mohamed Abotaleb
Version: 1.0.0
Author URI: https://mrkindy.com/
Text Domain: mlc
Domain Path: /languages
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'MESSANGERLIVECHAT_VERSION', '1.0.0' );
/**
 * initiate plugins
 */
require 'init.php';
/**
 * Load admin setting page
 */
require 'admin-option.php';