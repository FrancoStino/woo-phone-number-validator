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

<<<<<<< HEAD
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
=======
        // Load scripts on wp_enqueue_scripts action
        add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
>>>>>>> bcf85dddda52dbbb4fe0b342f626436b7f53db13
    }

    /**
     * Load styles in the header
     */
    public function load_style_in_header()
    {
<<<<<<< HEAD
        if (is_checkout() || is_account_page())
        // Output your styles directly here
        echo '<link rel="stylesheet" href="' . $this->theme_directory . '/functions/woo-phone-number-validator/css/default.min.css" />';
    }
=======
        if (is_checkout() || is_account_page()) {
        $version = null;

        wp_enqueue_script('wpv_tel_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/intlTelInput.js', array(), $version);
        wp_enqueue_script('wpv_tel_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/data.min.js', array(), $version);
        wp_enqueue_script('wpv_util_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/utils.js');
        wp_enqueue_style('wpv_defaultcss_style', $this->theme_directory . '/functions/woo-phone-number-validator/css/default.css', array(), $version);
        wp_enqueue_script('wpv_default_scripts', $this->theme_directory . '/functions/woo-phone-number-validator/js/default.min.js');
    }
}

    /**
     * Load checkout script if it is the checkout page or account page
     */
>>>>>>> bcf85dddda52dbbb4fe0b342f626436b7f53db13
}

// Create an instance of the WPV_Scripts_Loader class to initialize it
$wpv_scripts_loader = new WPV_Scripts_Loader();
