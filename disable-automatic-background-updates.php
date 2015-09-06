<?php

/**
 * The Disable Automatic Background Updates Plugin
 *
 * Disable all automatic background updates.
 *
 * @package Disable_Automatic_Background_Updates
 * @subpackage Main
 */

/**
 * Plugin Name: Disable Automatic Background Updates
 * Plugin URI:  http://blog.milandinic.com/wordpress/plugins/disable-automatic-background-updates/
 * Description: Disable all automatic background updates.
 * Author:      Milan Dinić
 * Author URI:  http://blog.milandinic.com/
 * Version:     1.0
 * Text Domain: disable-automatic-background-updates
 * Domain Path: /languages/
 * License:     GPL
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

// Disable all automatic background updates
add_filter( 'automatic_updater_disabled',    '__return_true'  );

// Disable core automatic background updates
add_filter( 'auto_update_core',              '__return_false' );

// Disable plugins automatic background updates
add_filter( 'auto_update_plugin',            '__return_false' );

// Disable themes automatic background updates
add_filter( 'auto_update_theme',             '__return_false' );

// Disable translations automatic background updates
add_filter( 'auto_update_translation',       '__return_false' );

// Disable core automatic background updates for development versions
add_filter( 'allow_dev_auto_core_updates',   '__return_false' );

// Disable core automatic background updates for minor versions
add_filter( 'allow_minor_auto_core_updates', '__return_false' );

// Disable core automatic background updates for major versions
add_filter( 'allow_major_auto_core_updates', '__return_false' );

/**
 * Add action links to plugins page.
 *
 * @since 1.1
 *
 * @param array  $links       Existing plugin's action links.
 * @param string $plugin_file Path to the plugin file.
 * @return array $links New plugin's action links.
 */
function disable_automatic_background_updates_action_links( $links, $plugin_file ) {
	// Set basename
	$basename = plugin_basename( __FILE__ );

	// Check if it is for this plugin
	if ( $basename != $plugin_file ) {
		return $links;
	}

	// Load translations
	load_plugin_textdomain( 'disable-automatic-background-updates', false, dirname( $basename ) . '/languages' );

	// Add new links
	$links['donate']   = '<a href="http://blog.milandinic.com/donate/">' . __( 'Donate', 'disable-automatic-background-updates' ) . '</a>';
	$links['wpdev']    = '<a href="http://blog.milandinic.com/wordpress/custom-development/">' . __( 'WordPress Developer', 'disable-automatic-background-updates' ) . '</a>';
	$links['premiums'] = '<strong><a href="https://shop.milandinic.com/">' . __( 'Premium WordPress Plugins', 'disable-automatic-background-updates' ) . '</a></strong>';

	return $links;
}
add_filter( 'plugin_action_links',               'disable_automatic_background_updates_action_links', 10, 2 );
add_filter( 'network_admin_plugin_action_links', 'disable_automatic_background_updates_action_links', 10, 2 );
