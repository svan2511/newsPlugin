<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/svan2511/Indian-News-Plugin
 * @since      1.0.0
 *
 * @package    Latest_Indian_News
 * @subpackage Latest_Indian_News/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Latest_Indian_News
 * @subpackage Latest_Indian_News/admin
 * @author     Anil Kumar <anilkumarsikwal25@gmail.com>
 */
class Latest_Indian_News_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	
	private $api_key_val;

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
		$this->api_key_val = get_option( 'news_api_key_val' );
		//echo $this->api_key_val;die('anil');
		if(!$this->api_key_val=="")
		{
		include plugin_dir_path( __FILE__ ) .'class-indian-news.php';
		
		}
		
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
		 * defined in Latest_Indian_News_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Latest_Indian_News_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/latest-indian-news-admin.css', array(), $this->version, 'all' );

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
		 * defined in Latest_Indian_News_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Latest_Indian_News_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/latest-indian-news-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function wx_add_menu_to_admin()
	{
	
	add_menu_page('Indian News Api Settings', //page title
	'Indian News Api Settings', //menu title
	'manage_options', //capabilities
	'indian-news-api-settings', //menu slug
	array($this, 'add_indian_news_api_settings') //function
	);
	}
	
	public function add_indian_news_api_settings()
	{
		
		//echo plugin_dir_url( __FILE__ );die;
		if(isset($_POST['sub_key']))
	{
		update_option('news_api_key_val', $_POST['news_api_key']); 
		//echo $_POST['pl_api_key'];die;
	}
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'partials/indian-news-settings.php');
	$content_data = ob_get_contents();
	ob_end_clean();
	echo $content_data; 
	}

}




