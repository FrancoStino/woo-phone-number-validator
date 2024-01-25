jQuery(document).ready(function ($) {
    const country = $("#billing_country option:selected").val();
    const input = document.querySelector("#billing_phone");
    const errorMap = ["Numero invalido", "Codice del paese non valido", "Indicare un numero valido", "Indicare un numero valido", "Numero invalido"];
    $("#billing_phone_field").append("<p id='phone_error'></p>");
    let iti;  // dichiara iti in modo che sia accessibile globalmente

    const initializeIntlTelInput = function () {
        iti = window.intlTelInput(input, {
            initialCountry: country.toLowerCase(),
            showSelectedDialCode: true,
            nationalMode: true,
            countrySearch: false,
            separateDialCode: true,
            utilsScript: "/utils.js"
        });
    };

    input.setAttribute("inputmode", "numeric");
    input.setAttribute("oninput", "this.value = this.value.replace(/\\D+/g, '')");
    // Inizializza intlTelInput all'avvio
    initializeIntlTelInput();

    const reset = function () {
        $("#phone_error").text("").removeClass();
    };

    input.addEventListener('blur', function () {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                const phoneNumber = iti.getNumber();
                $("#phone_error").removeClass().addClass('valid').text("Numero valido!" /*+ "Full international format: " + phoneNumber*/);

                // Rimuovi l'input esistente se presente
                $("#final_phone_number").remove();

                // Aggiungi dinamicamente l'input con il numero ottenuto
                checkout_form.append('<input type="hidden" id="final_phone_number" name="final_phone_number" value="' + phoneNumber + '">');
            } else {
                const errorCode = iti.getValidationError()
                input.focus();
                $("#phone_error").removeClass().addClass('error').text(errorMap[errorCode]);
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

    var checkout_form = $('form.checkout');

    // Ottieni il valore di border-radius dall'input
    var borderRadiusValue = $('#billing_phone').css('border-radius');

    // Applica il valore a .iti__selected-flag per border-top-left-radius
    $('.iti__selected-flag').css('border-top-left-radius', borderRadiusValue);

    // Applica lo stesso valore a .iti__selected-flag per border-bottom-left-radius
    $('.iti__selected-flag').css('border-bottom-left-radius', borderRadiusValue);

});



jQuery(document).ready(function ($) {
    // Ottieni il valore di border-radius dall'input

});
