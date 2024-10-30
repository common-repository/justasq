<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       justasq.me
 * @since      1.0.0
 *
 * @package    Justasq
 * @subpackage Justasq/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Justasq
 * @subpackage Justasq/admin
 * @author     Riyadh Al Nur <riyadh.alnur@hyperlab.xyz>
 */
class Justasq_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/justasq-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/justasq-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register the administration menu for this plugin into the WP dashboard menu.
	 *
	 * @since 		1.0.0
	 */
	 public function add_plugin_admin_menu() {
		 add_options_page( 'JustAsq Widget Setup', 'JustAsq', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page') );
	 }

	 /**
	  * Add settings action link to the plugins page.
	  *
	  * @since 		1.0.0
	  */
	 public function add_action_links( $links ) {
		 $settings_link = array(
			 '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
			);
			
			return array_merge(  $settings_link, $links );
	 }

	 /**
	  * Render the settings page for this plugin.
	  *
	  * @since 		1.0.0
	  */
	 public function display_plugin_setup_page() {
		 include_once( 'partials/justasq-admin-display.php' );
	 }

	 /**
	  * Save form data.
		*
		* @since 		1.0.0
		*/
		public function options_update() {
			register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
		}

	 /**
	  * Validate inputs.
		*
		* @since 		1.0.0
		*/
		public function validate( $input ) {
			$options = get_option($this->plugin_name);
			$valid = array();

			$valid['widget_enable'] = (isset($input['widget_enable']) && !empty($input['widget_enable'])) ? 1 : 0;
			$valid['widget_id'] = sanitize_text_field($input['widget_id']);

			return $valid;
		}

}
