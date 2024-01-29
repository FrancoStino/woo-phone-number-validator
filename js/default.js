jQuery(document).ready(function ($) {
    const country = $("#billing_country option:selected").val();
    const input = document.querySelector("#billing_phone");
    const errorMap = ["Numero invalido", "Codice del paese non valido", "Indicare un numero valido", "Indicare un numero valido", "Numero invalido"];
    $("#billing_phone_field").append("<p id='phone_error'></p>");
    let iti;  // dichiara iti in modo che sia accessibile globalmente

    //input.setAttribute("inputmode", "numeric");

    // Applica regex sull'input per i numeri
    input.setAttribute("oninput", "this.value = this.value.replace(/\\D+/g, '')");

    var finalPhoneNumber = document.createElement('input');
    finalPhoneNumber.setAttribute('type', 'hidden');
    finalPhoneNumber.setAttribute('name', 'final_phone_number');
    input.after(finalPhoneNumber);

    const initializeIntlTelInput = function () {
        iti = window.intlTelInput(input, {
            initialCountry: country.toLowerCase(),
            showSelectedDialCode: true,
            countrySearch: false,
            //hiddenInput: () => "final_phone_number",
            utilsScript: "/utils.js"
        });
    };

    // Aggiungi !important a tutti gli stili esistenti
    const importantStyle = function () {
        if (input) {
            var stileInline = input.getAttribute("style") || "";
<<<<<<< HEAD

            // Aggiungi !important solo ai valori esistenti e se non è già presente
            if (stileInline) {
                var stiliArray = stileInline.split(';').filter(Boolean);
                if (!stiliArray.some(style => style.includes("!important"))) {
                    stileInline = stiliArray.map(style => style + ' !important').join(';');
                }
            }

            // Imposta lo stile aggiornato
            input.setAttribute("style", stileInline);

            // Popola il campo nascosto per salvare il numero completo con prefisso
            /*if (input.value.length > 0) {
                if (iti.isValidNumber()) {
                    finalPhoneNumber.setAttribute('value', iti.getNumber());
                    //$('input[name="final_phone_number"]').val(iti.getNumber());
                } else {
                    finalPhoneNumber.setAttribute('value', 'false');
                    //$('input[name="final_phone_number"]').val(false);
                }
            } else {
                $('input[name="final_phone_number"]').val(null);
            }*/
        }
    };

    // Inizializza intlTelInput all'avvio
    initializeIntlTelInput();
    // Inizializza importanStyle all'avvio
    importantStyle();

    const reset = function () {
        $("#phone_error").text("").removeClass();

        if (input.value) {
            if (iti.isValidNumber()) {
                $("#phone_error").removeClass().addClass('valid').text("Numero valido!");
                finalPhoneNumber.setAttribute('value', iti.getNumber());
=======

            // Aggiungi !important solo ai valori esistenti e se non è già presente
            if (stileInline) {
                var stiliArray = stileInline.split(';').filter(Boolean);
                if (!stiliArray.some(style => style.includes("!important"))) {
                    stileInline = stiliArray.map(style => style + ' !important').join(';');
                }
            }

            // Imposta lo stile aggiornato
            input.setAttribute("style", stileInline);

            // Popola il campo nascosto per salvare il numero completo con prefisso
            if (input.value.length > 0) {
                if (iti.isValidNumber()) {
                    //finalPhoneNumber.setAttribute('value', iti.getNumber());
                    $('input[name="final_phone_number"]').val(iti.getNumber());
                } else {
                    //finalPhoneNumber.setAttribute('value', 'false');
                    $('input[name="final_phone_number"]').val(false);
                }
            } else {
                $('input[name="final_phone_number"]').val(null);
            }
        }
    };

    // Inizializza intlTelInput all'avvio
    initializeIntlTelInput();
    // Inizializza importanStyle
    setInterval(importantStyle, 0);
    const reset = function () {
        $("#phone_error").text("").removeClass();

        if (input.value) {
            if (iti.isValidNumber()) {
                $("#phone_error").removeClass().addClass('valid').text("Numero valido!");
>>>>>>> 8790018dabd3f6bff99cf4243ac163181b925444
            } else {
                const errorCode = iti.getValidationError()
                input.focus();
                $("#phone_error").removeClass().addClass('error').text(errorMap[errorCode]);
                finalPhoneNumber.setAttribute('value', 'false');
            }
        }
    };

    //console.log(iti.isValidNumber());

    /**
<<<<<<< HEAD
     * Trigger Eventi per gli errori e il clonaggio del valore.
=======
     * Trigger Eventi per gli errori
>>>>>>> 8790018dabd3f6bff99cf4243ac163181b925444
     */
    input.addEventListener('blur', reset);
    input.addEventListener('change', reset);
    //input.addEventListener('keyup', reset);
    //input.addEventListener('keypress', reset);
<<<<<<< HEAD
    input.addEventListener('keydown', reset);
    //input.addEventListener('input', reset);
    //input.addEventListener('submit', reset)


    /**
     * Trigger Eventi per il padding important fisso (utile solo per il plugin CheckoutWC)
     */
    input.addEventListener('input', importantStyle);


=======
    //input.addEventListener('keydown', reset);
    //input.addEventListener('input', reset);
    //input.addEventListener('submit', reset)
>>>>>>> 8790018dabd3f6bff99cf4243ac163181b925444

    // Ottieni il valore di border-radius dall'input
    var borderRadiusValue = $('#billing_phone').css('border-radius');

    // Applica il valore a .iti__selected-flag per border-top-left-radius
    $('.iti__selected-flag').css('border-top-left-radius', borderRadiusValue);

    // Applica lo stesso valore a .iti__selected-flag per border-bottom-left-radius
    $('.iti__selected-flag').css('border-bottom-left-radius', borderRadiusValue);

    // Applica il valore a #phone_error per border-radius
    $('#phone_error').css('border-radius', borderRadiusValue);

<<<<<<< HEAD

    // Inizializza reset all'avvio
    reset();

=======
>>>>>>> 8790018dabd3f6bff99cf4243ac163181b925444
});
