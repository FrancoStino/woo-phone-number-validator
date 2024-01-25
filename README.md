# Validatore numero di telefono - Woocommerce


## Descrizione

Questo script PHP è progettato per validare il numero di telefono, salvare il numero completo nei campi dell'ordine e dell'account.

- Account: ``billing_phone``
- Order meta: ``_billing_phone``


## Requisiti

- PHP versione 7.0 o superiore
- WordPress installato con WooCommerce

----------------------------------------------------------------

1. Caricare o creare l'intera cartella nella cartella ``functions`` nel tema child.
2. Inserire ``require('functions/woo-phone-number-validator/woo-phone-number-validator.php');`` nel ``function.php`` del tema child.


## Installazione

1. Assicurati di avere PHP installato sul tuo server.
2. Copia il contenuto di questo script nella tua directory di plugin o nel file funzioni del tema.
3. Assicurati che WordPress sia in esecuzione e che WooCommerce sia installato e attivato.


## Avvertenza

Questo script è fornito "così com'è" e senza garanzie. Prima di utilizzarlo su un sito di produzione, assicurati di testarlo su un ambiente di sviluppo per evitare problemi imprevisti.


## Licenza

Questo script è distribuito con licenza MIT.