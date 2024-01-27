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
        add_action('woocommerce_new_order', array(__CLASS__, 'update_billing_phone_after_order'), 10, 1);

        // Aggiorna il numero di telefono dopo il salvataggio dei dati sull'account
<<<<<<< HEAD
        add_action("woocommerce_process_myaccount_field_billing_phone", array(__CLASS__, 'update_billing_phone_account_address'), 10);

        // WC Notice se il numero di telefono non è valido
        add_action('woocommerce_after_checkout_validation', array(__CLASS__, 'validate_phone_number'));
=======
        add_action( "woocommerce_process_myaccount_field_billing_phone", array(__CLASS__, 'update_billing_phone_account_address'), 10);
>>>>>>> bcf85dddda52dbbb4fe0b342f626436b7f53db13
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
    public static function update_billing_phone_after_order($order_id)
    {
        $final_phone_number = sanitize_text_field($_POST['final_phone_number']);
        $order = wc_get_order($order_id);
        $user_id = $order->get_user_id();

        update_user_meta($user_id, 'billing_phone', $final_phone_number);
        $order->update_meta_data('_billing_phone', $final_phone_number);
        $order->save();
    }

    public static function update_billing_phone_account_address()
    {
        $final_phone_number = sanitize_text_field($_POST['final_phone_number']);
        return $final_phone_number;
    }
<<<<<<< HEAD

    public static function validate_phone_number()
    {
        $validePhone = wc_clean($_POST['final_phone_number']);

        if (isset($validePhone)) {
            if ($validePhone === 'false') {
                wc_add_notice(__('<strong>Numero di telefono</strong> non è valido. Per favore, inserisci un numero valido.', 'text-domain'), 'error');
            }
        }
    }

=======
        
>>>>>>> bcf85dddda52dbbb4fe0b342f626436b7f53db13
}

// Inizializza la classe
PhoneNumberValidator::init();
