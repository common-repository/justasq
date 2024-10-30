<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       justasq.me
 * @since      1.0.0
 *
 * @package    Justasq
 * @subpackage Justasq/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Justasq
 * @subpackage Justasq/public
 * @author     Riyadh Al Nur <riyadh.alnur@hyperlab.xyz>
 */
class Justasq_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->justasq_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/justasq-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/justasq-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Widget embed function depending on admin settings.
	 *
	 * @since 		1.0.0
	 */
	public function justasq_widget() {
		if (!empty($this->justasq_options['widget_enable'])) {
			if (!is_admin() && !empty($this->justasq_options['widget_id'])) {
				?>
				<script>
				var JustAsq = {
					ID: '<?php echo $this->justasq_options['widget_id'] ?>'
				};
				(function(d){var e=d.createElement('script');e.type='text/'
				+'javascript';e.async=true;e.src='https://embed.justasq.me/v2/widget.min.js';var n=d.getElementsByTagName
				('script')[0];n.parentNode.insertBefore(e,n);})(document);
				</script>
				<?php
			}
		}
	}

}
