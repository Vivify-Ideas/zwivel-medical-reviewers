<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       vivifyideas.com
 * @since      1.0.0
 *
 * @package    Zwivel_Medical_Reviewers
 * @subpackage Zwivel_Medical_Reviewers/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Zwivel_Medical_Reviewers
 * @subpackage Zwivel_Medical_Reviewers/includes
 * @author     VivifyIdeas <zwivel@vivifyideas.com>
 */
class Zwivel_Medical_Reviewers_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'zwivel-medical-reviewers',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
