<?php
/*
Plugin Name: Hide Product Image for WooCommerce
Version: 1.0.2
Plugin URI: https://noorsplugin.com/hide-product-image-for-woocommerce-plugin/
Author: naa986
Author URI: https://noorsplugin.com/
Description: Hide product images in WooCommerce
Text Domain: hide-product-image-for-woocommerce
Domain Path: /languages
*/

if (!defined('ABSPATH')) {
    exit;
}

class HIDE_PRODUCT_IMAGE_WC
{
    var $plugin_version = '1.0.2';
    var $plugin_url;
    var $plugin_path;
    function __construct()
    {
        define('HIDE_PRODUCT_IMAGE_WC_VERSION', $this->plugin_version);
        define('HIDE_PRODUCT_IMAGE_WC_SITE_URL',site_url());
        define('HIDE_PRODUCT_IMAGE_WC_URL', $this->plugin_url());
        define('HIDE_PRODUCT_IMAGE_WC_PATH', $this->plugin_path());
        $this->plugin_includes();
    }
    function plugin_includes()
    {
        if(is_admin())
        {
            add_filter('plugin_action_links', array($this,'add_plugin_action_links'), 10, 2 );
        }
        add_action('plugins_loaded', array($this, 'plugins_loaded_handler'));
        add_action('admin_menu', array($this, 'add_options_menu'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_plugin_scripts'));
        add_filter('woocommerce_locate_template', array($this, 'hide_product_image_wc_template'), 20, 3);
    }
    function enqueue_plugin_scripts() {
        if (!is_admin()) {
            wp_register_style('hide-prod-img-wc', HIDE_PRODUCT_IMAGE_WC_URL.'/css/main.css', array('woocommerce-layout'));
            wp_enqueue_style('hide-prod-img-wc');      
        }
    }
    function plugin_url()
    {
        if($this->plugin_url) return $this->plugin_url;
        return $this->plugin_url = plugins_url( basename( plugin_dir_path(__FILE__) ), basename( __FILE__ ) );
    }
    function plugin_path(){ 	
        if ( $this->plugin_path ) return $this->plugin_path;		
        return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
    }
    function add_plugin_action_links($links, $file)
    {
        if ( $file == plugin_basename( dirname( __FILE__ ) . '/main.php' ) )
        {
            $links[] = '<a href="options-general.php?page=hide-product-image-wc-settings">'.__('Settings', 'hide-product-image-for-woocommerce').'</a>';
        }
        return $links;
    }

    function plugins_loaded_handler()
    {
        load_plugin_textdomain('hide-product-image-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/'); 
    }

    function add_options_menu()
    {
        if(is_admin())
        {
            add_options_page(__('Hide Product Image for WooCommerce', 'hide-product-image-for-woocommerce'), __('Hide Product Image for WooCommerce', 'hide-product-image-for-woocommerce'), 'manage_options', 'hide-product-image-wc-settings', array($this, 'display_options_page'));
        }
    }

    function display_options_page()
    {    
        $url = "https://noorsplugin.com/hide-product-image-for-woocommerce-plugin/";
        $link_text = sprintf(wp_kses(__('Please visit the <a target="_blank" href="%s">Hide Product Image for WooCommerce</a> documentation page for usage instructions.', 'hide-product-image-for-woocommerce'), array('a' => array('href' => array(), 'target' => array()))), esc_url($url));          
        echo '<div class="wrap">';               
        echo '<h2>Hide Product Image for WooCommerce - v'.$this->plugin_version.'</h2>';
        echo '<div class="notice notice-info">'.$link_text.'</div>';
        echo '</div>'; 
    }
    
    function hide_product_image_wc_template($template, $template_name, $template_path) 
    {
        if ($template_name == 'single-product/product-image.php') {
            $plugin_path = untrailingslashit(plugin_dir_path(__FILE__)) . '/woocommerce/';
            $template = $plugin_path.$template_name;
        }
        return $template;
    }

}

$GLOBALS['hide_product_image_wc'] = new HIDE_PRODUCT_IMAGE_WC();

