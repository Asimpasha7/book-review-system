$(document).ready(function () {
    $("#registrationForm").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            acceptTerms: "required"
        },
        messages: {
            first_name: "Please enter your first name.",
            last_name: "Please enter your last name.",
            email: "Please enter a valid email address.",
            password: {
                required: "Please enter a password."
            },
            acceptTerms: "You must agree to the terms and conditions."
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
       
            if (!element.next('.error-message').length) {
             
                error.insertAfter(element).addClass('error-message').css("color", "red");
            }
        },
        highlight: function(element, errorClass, validClass) {
          
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
     
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });
});
