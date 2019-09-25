$(document).ready(function () {

    //array of errors
    var error = {
        name: "Enter valid name",
        mob_no: "Enter valid mobile no (10 digits)",
        email: "Enter valid email (must contain '@' and '.')",
        password: "Enter valid password(minimum 8 characters)",
        empty: "This field is required"
    };

    //onsubmit button click
    $("#submit").click(function () {
        $(".error").remove();
        //varaiable get
        var name = $("#name").val();
        var mob_no = $("#mob_no").val();
        var email = $("#email").val();
        var password = $("#password").val();
        //name validation
        if (name.length < 1) {
            $('#name_title').after(`<span class="error">${error["empty"]}</span>`);
            return false;
        } else if (name.length > 1) {
            var regex_name = /^[a-zA-Z ]{2,30}$/;
            var result_name = regex_name.test(name);
            if (!result_name) {
                $('#name_title').after(`<span class="error">${error["name"]}</span>`);
                return false;
            }
        }
        //mob_no validation
        if (mob_no.length < 1) {
            $('#mob_no_title').after(`<span class="error">${error["empty"]}</span>`);
            return false;
        } else if (mob_no.length < 10 || mob_no.length > 10) {
            $('#mob_no_title').after(`<span class="error">${error["mob_no"]}</span>`);
            return false;
        }
        //email validation
        if (email.length < 1) {
            $('#email_title').after(`<span class="error">${error["empty"]}</span>`);
            return false;
        } else if (email.length > 1) {
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var result_email = regex_email.test(email);
            if (!result_email) {
                $('#email_title').after(`<span class="error">${error["email"]}</span>`);
                return false;
            } else {
                //ajax code
                jQuery.ajax({
                    type: "POST",
                    url: "../php/ajax.php",
                    data: {
                        user_email: email
                    },
                    success: function (response) {
                        if (response == 0) {
                            $('#email_title').after(`<span class="error">ok</span>`);
                            $('#submit').attr("disabled", false);
                        } else if (response != 0) {
                            $('#email_title').after(`<span class="error">already exists</span>`);
                            $('#submit').attr("disabled", true);
                        }
                    }

                });
            }
        }
        //password validation
        if (password.length < 1) {
            $('#password_title').after(`<span class="error">${error["empty"]}</span>`);
            return false;
        } else if (password.length > 1 && password.length < 8) {
            $('#password_title').after(`<span class="error">${error["password"]}</span>`);
            return false;
        }
        //$("#login_modal").modal();


    })

    /*$("#myForm").submit(function(){
        alert('hello');
        //ajax code
        jQuery.ajax({
            type: "POST",
            url:  "ajax.php",
            data: {user_email:email},
            success: 
            function(response){
                if (response != 0) {
                    $('#email_title').after(`<span class="error">email already exists</span>`);      
                    $('#submit').attr("disabled",true);
                }
                else if (response == 0) {
                    $('#email_title').after(`<span class="error">ok</span>`);      
                    $('#submit').attr("disabled",false);

                }
            }

        });
    });*/

    //mob-no regex
    /*else if(mob_no.length == 10){
        var regex_mob_no = /^[a-zA-Z ]{2,30}$/;
        var result_mob_no = regex_mob_no.test(mob_no);
        if (!result_mob_no) {
            $('#mob_no_title').after('<span class="error">only numbers</span>');
            return false;
        }
    }*/

    $("#email").keypress(function () {
        $('#submit').attr("disabled", false);
    });

    $("#email").blur(function () {
        $(".error").remove();
        var email = $("#email").val();
        if (email.length > 1) {
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var result_email = regex_email.test(email);
            if (!result_email) {
                $('#email_title').after(`<span class="error">${error["email"]}</span>`);

                return false;
            }
            //ajax code
            jQuery.ajax({
                type: "POST",
                url: "../php/ajax.php",
                data: {
                    user_email: email
                },
                success: function (response) {

                    if (response == 0) {
                        $('#email_title').after(`<span class="error">Ok</span>`);
                        $('#submit').attr("disabled", false);
                    } else if (response != 0) {
                        $('#email_title').after(`<span class="error">already exists</span>`);
                        $('#submit').attr("disabled", true);
                    }
                    // ajaxsuccess(returned);

                }

            });
        }
    });



})

/*code: 48-57 Numbers
8  - Backspace,
35 - home key, 36 - End key
37-40: Arrow keys, 46 - Delete key*/
function restrictAlphabets(e) {
    var x = e.which || e.keycode;
    if ((x >= 48 && x <= 57) || x == 8 ||
        (x >= 35 && x <= 40) || x == 46)
        return true;
    else
        return false;
}