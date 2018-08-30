<?php
/**
 * Namespace 
 */
namespace MobileConnection\admin\classion;

/**
 * Class run When Plugin Active
 */
class LMCActiveHook{

    /**
     * Active Plugins run function
     */
    public static function lmc_active_plugin(){
        if (!extension_loaded('gd') && !function_exists('gd_info')) {
			add_action( 'admin_notices', array(__CLASS__,'lmc_admin_notice_error') );
        }	
        add_filter( 'wpmu_drop_tables', array( __CLASS__, 'bamobile_wpmu_drop_tables' ) );  
        add_filter( 'plugin_action_links_'.LMC_PLUGIN_BASENAME, array(__CLASS__,'lmc_add_settings_link'), 10,2);
    }

    /**
	 * Show notice with Server not support GD libarary
	 */
	public static function lmc_admin_notice_error(){		
		$class = 'notice notice-error is-dismissible';	
		$message = __( 'Your PHP have not installed the GD library . Please install the GD library to avoid some errors when using the REST API. ', 'lmconnection' );
		$link = __('Install GD library', 'lmconnection');		
		printf( '<div class="%1$s"><p>%2$s<a href="http://php.net/manual/en/image.installation.php">%3$s</a></p></div>', esc_attr( $class ), esc_html( $message ), esc_html($link));	
    }

    /**
     * Add Link redirect to Settings Mobile Connection
     * 
     * @param array $links   List link of plugin
     * @param string file    path of plugin
     * 
     * @return mixed
     */
    public static function lmc_add_settings_link($links,$file){
        if ( strpos( $file, 'l-mobile-connection/connection.php' ) !== false ) {
            $new_links = array(				
                'settingsmod' => '<a href="'.get_admin_url().'/admin.php?page=mobile-settings" class="settings_link">' . __('Settings','lmconnection') . '</a>'
            );
            $links = array_merge( $links, $new_links );
        }
        return $links;
    } 
}
?>