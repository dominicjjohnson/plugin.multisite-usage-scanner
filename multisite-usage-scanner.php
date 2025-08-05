<?php
<?php
/**
 * Plugin Name: Multisite Usage Scanner
 * Plugin URI: https://github.com/dominicjjohnson/plugin.multisite-usage-scanner
 * Description: Scan your WordPress multisite network to identify which plugins are actively used across sites.
 * Version: 1.0.0
 * Author: Dominic Johnson / Miramedia
 * Author URI: https://www.miramedia.co.uk
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: multisite-usage-scanner
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) || ! is_multisite() ) {
	return;
}

add_action(
	'network_admin_menu',
	function () {
		add_submenu_page(
			'plugins.php',
			'Plugin Usage Scanner',
			'Plugin Usage Scanner',
			'manage_network_plugins',
			'plugin-usage-scanner',
			'pus_render_admin_page'
		);
	}
);

function pus_render_admin_page() {
	echo '<div class="wrap"><h1>Unused Plugins</h1>';

	$all_plugins    = get_plugins();
	$network_active = array_keys( get_site_option( 'active_sitewide_plugins', array() ) );
	$used_plugins   = array_flip( $network_active );

	$sites = get_sites( array( 'fields' => 'ids' ) );
	foreach ( $sites as $site_id ) {
		switch_to_blog( $site_id );
		$active_plugins = get_option( 'active_plugins', array() );
		foreach ( $active_plugins as $plugin_file ) {
			$used_plugins[ $plugin_file ] = true;
		}
		restore_current_blog();
	}

	$unused_plugins = array_diff_key( $all_plugins, $used_plugins );

	if ( empty( $unused_plugins ) ) {
		echo '<p>🎉 No unused plugins found!</p>';
	} else {
		echo '<table class="widefat"><thead><tr><th>Plugin</th><th>Path</th></tr></thead><tbody>';
		foreach ( $unused_plugins as $plugin_file => $plugin_data ) {
			echo '<tr><td>' . esc_html( $plugin_data['Name'] ) . '</td><td>' . esc_html( $plugin_file ) . '</td></tr>';
		}
		echo '</tbody></table>';
	}

	echo '</div>';
}
