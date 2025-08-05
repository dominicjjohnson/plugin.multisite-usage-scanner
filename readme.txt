=== Multisite Usage Scanner ===
Contributors: dominicjjohnson
Tags: multisite, plugin management, admin tools, diagnostics
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.4
Stable Tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Scan your WordPress multisite network to identify which plugins are actively used across sites. Helps admins safely clean up unused plugins.

== Description ==

Multisite Usage Scanner helps WordPress network administrators audit plugin usage across all sites in a multisite installation.

It provides a simple admin interface to:
* List all active plugins per site
* Identify unused plugins across the network
* Export usage data for reporting or cleanup

This tool is especially useful for large networks with legacy plugins or unclear usage patterns.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to **Network Admin → Plugins → Usage Scanner** to begin scanning

== Frequently Asked Questions ==

= Does this plugin work on single-site installs? =
No. It is designed specifically for WordPress multisite networks.

= Will it deactivate unused plugins? =
No. It only reports usage—it’s up to the admin to take action.

== Screenshots ==

1. Admin interface showing plugin usage across sites
2. Export options for CSV or JSON

== Changelog ==

= 1.0 =
* Initial release
* Scans plugin usage across multisite
* Displays active plugins per site
* Export functionality added

== Upgrade Notice ==

= 1.0 =
First release. No upgrade steps required.

