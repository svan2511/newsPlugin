<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/svan2511/Indian-News-Plugin
 * @since             1.0.0
 * @package           Latest_Indian_News
 *
 * @wordpress-plugin
 * Plugin Name:       Latest Indian News
 * Plugin URI:        https://github.com/svan2511/Indian-News-Plugin
 * Description:       This is a plugin which create a custom widget by which we can see all latest news in India .
 * Version:           1.0.0
 * Author:            Anil Kumar
 * Author URI:        https://github.com/svan2511/Indian-News-Plugin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       latest-indian-news
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LATEST_INDIAN_NEWS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-latest-indian-news-activator.php
 */
function activate_latest_indian_news() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-latest-indian-news-activator.php';
	Latest_Indian_News_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-latest-indian-news-deactivator.php
 */
function deactivate_latest_indian_news() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-latest-indian-news-deactivator.php';
	Latest_Indian_News_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_latest_indian_news' );
register_deactivation_hook( __FILE__, 'deactivate_latest_indian_news' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-latest-indian-news.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_latest_indian_news() {

	$plugin = new Latest_Indian_News();
	$plugin->run();

}
run_latest_indian_news();
