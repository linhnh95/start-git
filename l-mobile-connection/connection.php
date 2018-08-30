<?php
/**
 * @package mobileconnection
 * 
 * Plugin Name: L Mobile Connection
 * Plugin URI: https://google.com
 * Description: Connect and Support REST API for WooCommerce
 * Version: 1.0.0
 * Author: Linh
 * Author URI: https://www.facebook.com/linh.breake
 * Requires at least: 2.0
 * Tested up to: 4.5
 * Compatibility with the REST API v2
 *
 * Text Domain: lmconnection
 * Domain Path: /languages/
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
final class LMobileConnection{
    
    /**
     * Version of plugin
     */
    private $version = '1.0.0';

    /**
     * The single instance of the class
     */
    private static $instance = null;

    /**
     * Session instance
     */
    public static $session = null;

    /**
	 * Main LMobileConnection Instance.
	 *
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
    }
    
    /**
	 * LMobileConnection Construct
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes_and_requires();		
		$this->init_hooks();
    }
    
    /**
	 * Hook into actions and filters.
	 */
	private function init_hooks(){
		add_action( 'init', array( __CLASS__, 'init' ), 0 );   
    }
    
    /**
	 * Define LMobileConnection Constants.
	 */
	private function define_constants() {
		define( 'LMC_PLUGIN_FILE', __FILE__ );		
		define( 'LMC_ABSPATH', dirname( __FILE__ ) . '/' );
		define( 'LMC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
		define( 'LMC_VERSION', $this->version );
		define( 'LMC_ADMIN_PATH', ABSPATH .'wp-admin/');
		define( 'LMC_AJAX_URL', admin_url( 'admin-ajax.php'));
    }
    
    /**
	 * Include required core files used in admin.
	 */
	private function includes_and_requires() {
        global $wp_version;		
        if (file_exists(LMC_ABSPATH.'vendor/autoload.php')){
            require_once(LMC_ABSPATH.'vendor/autoload.php');
        }        
    }
    
    /**
	 * Init LMobileConnection when WordPress Initialises.
	 */
	public static function init() {
		do_action( 'before_lmc_init' );
        if ( class_exists( 'MobileConnection\admin\LMCAdminInit' ) ) {
            MobileConnection\admin\LMCAdminInit::lmc_admin_init();
        }
		do_action( 'lmc_init' );
    }
}

/**
 * Call Main Class
 */
function lmconnection(){
	return LMobileConnection::instance();
}

/**
 * Run Main Class
 */
lmconnection();
?>