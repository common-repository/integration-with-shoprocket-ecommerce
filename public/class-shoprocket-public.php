<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/public
 * @author     Your Name <email@example.com>
 */
class Shoprocket_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $shoprocket    The ID of this plugin.
	 */
	private $shoprocket;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Holds the options fetched from the database.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $options   The options fetched from the database.
	 */
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $shoprocket       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $shoprocket, $version ) {

		$this->shoprocket = $shoprocket;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Shoprocket_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Shoprocket_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->shoprocket, plugin_dir_url( __FILE__ ) . 'css/shoprocket-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function shoprocket_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Shoprocket_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Shoprocket_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'shoprocket-js', '//space.shoprocket.co/frontend/v7/sr.min.js', array( 'jquery', 'jquery-no-conflict-js' ), $this->version, true);

	}

	/**
	 * Load jQuery in no conflict mode.
	 *
	 * @since    1.0.0
	 */
	public function shoprocket_call_no_conflicts() {
		wp_enqueue_script( 'jquery-no-conflict-js', plugin_dir_url( __FILE__ ) . 'js/shoprocket-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Fetch the shoprocket cart id and display the cart.
	 *
	 * @since    1.0.0
	 */
	public function shoprocket_show_cart() {
		$this->options = get_option('shoprocket_id');
		if (isset($this->options)){
			include_once (plugin_dir_path( dirname(__FILE__)) . 'public/partials/shoprocket-public-display.php');
		}
	}

}
