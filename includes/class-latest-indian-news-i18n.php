<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/svan2511/Indian-News-Plugin
 * @since      1.0.0
 *
 * @package    Latest_Indian_News
 * @subpackage Latest_Indian_News/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Latest_Indian_News
 * @subpackage Latest_Indian_News/includes
 * @author     Anil Kumar <anilkumarsikwal25@gmail.com>
 */
class Latest_Indian_News_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'latest-indian-news',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
