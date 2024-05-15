$(document).ready(function() {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        var formData = $(this).serialize();

        // Simulating form submission to a server
        $.post('path_to_your_server_script', formData, function(response) {
            alert('Email enviado!');
        }).fail(function() {
            alert('Error al enviar el email.');
        });
    });
});
