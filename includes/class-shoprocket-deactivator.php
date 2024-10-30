<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Shoprocket
 * @subpackage Shoprocket/includes
 * @author     Your Name <email@example.com>
 */
class Shoprocket_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        delete_option( 'shoprocket_id' );
        unregister_setting( 'shoprocket_id' );
	}

}
