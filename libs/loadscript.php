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

        // Load scripts in the footer
        add_action('wp_footer', array($this, 'load_scripts_in_footer'));
        add_action('wp_head', array($this, 'load_style_in_header'),100);
    }


    /**
     * Load scripts in the footer
     */

    public function load_scripts_in_footer()
    {
        if (is_checkout() || is_account_page())
        // Output your scripts directly here
        echo '<script src="' . $this->theme_directory . '/functions/woo-phone-number-validator/js/intlTelInput.min.js"></script>';
        echo '<script src="' . $this->theme_directory . '/functions/woo-phone-number-validator/js/data.min.js"></script>';
        echo '<script src="' . $this->theme_directory . '/functions/woo-phone-number-validator/js/utils.js"></script>';
        echo '<script src="' . $this->theme_directory . '/functions/woo-phone-number-validator/js/default.min.js"></script>';
    }

    /**
     * Load styles in the header
     */
    public function load_style_in_header()
    {
        if (is_checkout() || is_account_page())
        // Output your styles directly here
        echo '<link rel="stylesheet" href="' . $this->theme_directory . '/functions/woo-phone-number-validator/css/default.min.css" />';
    }
}

// Create an instance of the WPV_Scripts_Loader class to initialize it
$wpv_scripts_loader = new WPV_Scripts_Loader();
