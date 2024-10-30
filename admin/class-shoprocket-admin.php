<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/admin
 * @author     Your Name <email@example.com>
 */
class Shoprocket_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Shoprocket    The ID of this plugin.
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
	 * Holds the options returned by the class callbacks.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $options   The options returned by the class callbacks.
	 */
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Shoprocket       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */	
	public function __construct( $shoprocket, $version) {

		$this->shoprocket = $shoprocket;
		$this->version = $version;			
	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->shoprocket, plugin_dir_url( __FILE__ ) . 'css/shoprocket-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->shoprocket, plugin_dir_url( __FILE__ ) . 'js/shoprocket-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Registers the shoprocketID setting fields
	 *
	 * @since  1.0.0
	 */
	
	public function shoprocket_register_settings() {	
		register_setting('shoprocket_options_group', 'shoprocket_id', array($this, 'shoprocket_sanitize'));
		add_settings_section('shoprocket_options_group', 'Shoprocket Settings', array($this, 'shoprocket_settings_section'), 'shoprocket_settings_page');
    	add_settings_field('shoprocket_id', 'Shoprocket ID', array($this, 'shoprocket_id_field_form'), 'shoprocket_settings_page','shoprocket_options_group');
    			    	
	}

	/**
	 * Outputs some HTML to begin the settings section with
	 * 
	 * @since 1.0.0
	 */
	
	public function shoprocket_settings_section() {
		_e('<p>This is where the Shoprocket plugin is configured.</p>');
	}

	/**
	 * Outputs HTML for the shoprocket ID input field
	 *
	 * @since  1.0.0
	 */

	public function shoprocket_id_field_form() {
		printf ('<input type="text" id="shoprocket-id-field" name="shoprocket_id[shoprocket_id]" value="%s" />', isset( $this->options['shoprocket_id'] ) ? esc_attr( $this->options['shoprocket_id']) : '');
	}

	/**
	 * Sanitizes the Shoprocket ID input.
	 *
	 * @since  1.0.0
	 */

	public function shoprocket_sanitize($input) {
		$newinput['shoprocket_id'] = trim($input['shoprocket_id']);
		if(!preg_match('/^[0-9]{4,8}$/', $newinput['shoprocket_id'])) {
			$newinput['shoprocket_id'] = 'Invalid Shoprocket ID';
		}
		return $newinput;
	}


	/**
	 * Add a new menu item for Shoprocket to the settings admin menu.
	 *
	 * @since  1.0.0
	 */
 
	public function shoprocket_menu() {
    	add_options_page('Shoprocket Options', 'Shoprocket', 'manage_options', 'shoprocket_settings_page', array($this, 'shoprocket_options'));
    }

    /**
     * Loads the Shoprocket menu page if user has appropriate permissions.
     *
     * @since  1.0.0
     */

	public function shoprocket_options() {
	    if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		$this->options = get_option('shoprocket_id');		
		require_once plugin_dir_path( __FILE__ ) . '/partials/shoprocket-admin-display.php';
	}

}	
