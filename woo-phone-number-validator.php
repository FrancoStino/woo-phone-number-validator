<?php

if (!defined('ABSPATH')) {
    exit;
}


/**
 * Description: Validates the phone number field on the checkout page of WooCommerce.
 */

// Classe principale del plugin
class PhoneNumberValidator
{

    // Metodo per inizializzare il plugin
    public static function init()
    {
        // Verifica se WooCommerce è attivo
        add_action('admin_init', array(__CLASS__, 'check_woocommerce_is_active'));

        // Carica gli script necessari
        require_once(plugin_dir_path(__FILE__) . 'libs/loadscript.php');

        // Aggiorna il numero di telefono dopo la creazione di un nuovo ordine
        add_action('woocommerce_new_order', array(__CLASS__, 'update_billing_phone'), 10, 1);
    }

    // Verifica se WooCommerce è attivo
    public static function check_woocommerce_is_active()
    {
        if (is_admin() && !is_plugin_active('woocommerce/woocommerce.php')) {
            add_action('admin_notices', array(__CLASS__, 'woocommerce_is_not_active'));

            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
        }
    }

    // Mostra avviso se WooCommerce non è attivo
    public static function woocommerce_is_not_active()
    {
?>
        <div class="error">
            <p><?php _e("Siamo spiacenti, Phone Number Validator richiede che il plugin WooCommerce sia installato e attivato.", "default"); ?>.
            </p>
        </div>
<?php
    }

    // Aggiorna il numero di telefono
    public static function update_billing_phone($order_id)
    {
        $final_phone_number = sanitize_text_field($_POST['final_phone_number']);
        $order = wc_get_order($order_id);
        $user_id = $order->get_user_id();

        update_user_meta($user_id, 'billing_phone', $final_phone_number);
        $order->update_meta_data('_billing_phone', $final_phone_number);
        $order->save();
    }
}

// Inizializza il plugin
PhoneNumberValidator::init();
