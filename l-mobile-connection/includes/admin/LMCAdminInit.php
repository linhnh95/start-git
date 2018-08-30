<?php
/**
 * Name space of plugin
 */
namespace MobileConnection\admin;

/**
 * Class Init feature of admin
 */
class LMCAdminInit{

    /**
     * First run with Admin
     */
    public static function lmc_admin_init(){
        foreach ( self::lmc_admin_get_services() as $class ) {
            $service = self::lmc_instantiate( $class );
            if(method_exists($service,'lmc_run')){
                $service->lmc_run();
            }
        }
    }

    /**
     * Get Services of Admin
     */
    private static function lmc_admin_get_services(){
        $services = array(
            classion\settings\LMCSettings::class
        );
        return apply_filters('lmobileconnection_get_services_admin',$services);
    }

    /**
     * Get Class
     */
    private static function lmc_instantiate( $class ){
		$service = new $class();
		return $service;
	}
}
?>