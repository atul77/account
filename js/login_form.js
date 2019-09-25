$(document).ready(function () {
    $('#submit').click(function () {
        $(".error").remove();
        var email = $("#email").val();
        var password = $("#password").val();

        //email validation
        if (email.length == 0) {

            $('#email_title').after('<span class="error">This field is required</span>');
            return false;
        } else if (email.length != 0) {
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var result_email = regex_email.test(email);
            if (!result_email) {
                $('#email_title').after(`<span class="error">Enter valid email (must contain '@' and '.')</span>`);      
                return false;
            }

        }

        //passoword validation
        if (password.length < 1) {
            $('#password_title').after(`<span class="error">This field is required</span>`);
            return false;
        }
        else if (password.length > 1 && password.length < 8 ) {
            $('#password_title').after(`<span class="error">Atleast 8 characters</span>`);
            return false;        
        }


    })

});