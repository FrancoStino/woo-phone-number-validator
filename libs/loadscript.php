<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class WPV_Scripts_Loader
 */
class WPV_Scripts_Loader
{
    /**
     * @var string $theme_directory The URI of the current theme
     */
    private $theme_directory;

    /**
     * WPV_Scripts_Loader constructor.
     */
    public function __construct()
    {
        $this->theme_directory = get_stylesheet_directory_uri();

        // Load scripts on wp_enqueue_scripts action
        add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
        // Load checkout script on wp_enqueue_scripts action
        add_action('wp_enqueue_scripts', array($this, 'load_checkout_script'));
    }

    /**
     * Load scripts for the current theme
     */
    public function load_scripts()
    {
        $version = null;

        wp_enqueue_script('wpv_tel_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/intlTelInput.js', array(), $version);
        wp_enqueue_script('wpv_tel_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/data.min.js', array(), $version);
        wp_enqueue_script('wpv_util_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/utils.js');
        wp_enqueue_style('wpv_defaultcss_style', $this->theme_directory . '/functions/woo-phone-number-validator/css/default.css', array(), $version);
        //wp_enqueue_style('wpv_telinputcss_style', $this->theme_directory . '/functions/woo-phone-number-validator/css/intlTelInput.min.css', array(), $version);
    }

    /**
     * Load checkout script if it is the checkout page or account page
     */
    public function load_checkout_script()
    {
        if (is_checkout() || is_account_page()) {
            wp_enqueue_script('wpv_default_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/default.js');
        }
    }
}

// Create an instance of the WPV_Scripts_Loader class to initialize it
$wpv_scripts_loader = new WPV_Scripts_Loader();
