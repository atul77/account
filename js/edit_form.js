$(document).ready(function() {
    $('#submit').click(function() {
        $(".error").remove();
        var name = $("#name").val();
        var mob_no = $("#mob_no").val();
        var email = $("#email").val();
        var error = [];

        //var abc = $(".abc span").text();
        
        // x['add'] = "123 Some St.";
        // alert(x['add']);
        // alert(span);
        if (name.length < 1) {
            // alert(id);
            error['empty_name'] = "This field is required";
            $('#name_title').after(`<span class="error">${error['empty_name']}</span>`);            
            return false;
        } else if (name.length > 1) {
            var regex_name = /^[a-zA-Z ]{2,30}$/;
            var result_name = regex_name.test(name);
            if (!result_name) {
                error['error_name'] = "invalid input(alphabets only)";
                $('#name_title').after(`<span class="error">${error['error_name']}</span>`);
                return false;
            }
        }
        //mob_no validation
        if (mob_no.length < 1) {
            error['empty_mob_no'] = "This field is required";
            $('#mob_no_title').after(`<span class="error">${error["empty_mob_no"]}</span>`);
            return false;
        } else if (mob_no.length < 10 || mob_no.length > 10) {
            error['error_empty']="Invalid input(10 numbers)";
            $('#mob_no_title').after(`<span class="error">${error['error_empty']}</span>`);
            return false;
        }
        //email validation
        if (email.length < 1) {
            error['empty_email']="This field is required";
            $('#email_title').after(`<span class='error'>${error['empty_email']}</span>`);    
            return false;
        }    
        else if (email.length > 1) {
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var result_email = regex_email.test(email);
            if (!result_email) {
                error['error_email']="Enter valid email(must contain '@' and '.')";
                $('#email_title').after(`<span class="error">${error['error_email']}</span>`);
                return false;
            } 
            else {
                //ajax code
                jQuery.ajax({
                    type: "POST",
                    url: "../../php/ajax.php",
                    async: false,
                    data: {
                        user_email: email,
                        id: user_id
                    },
                    success: function (response) {

                        if (response == 0) {
                            error['ajax_positive']="Ok";
                            $('#email_title').after(`<span class="error">${error['ajax_positive']}</span>`);
                            // $('#submit').attr("disabled", false);
                        } else if (response != 0) {
                            error['ajax_negative']="already exists";                            
                            $('#email_title').after(`<span class="error">${error['ajax_negative']}</span>`);
                            // $('#submit').attr("disabled", true);
                        }
                        // ajaxsuccess(returned);

                    }

                });    
            }
        }


        var span = $('.error').html();
        if(span == 'already exists') {
            return false
        }
        
        // return false;
    
    
    
    })
    
    //ajax on blur
    $("#email").blur(function () {
        $(".error").remove();
        var email = $("#email").val();
        if (email.length > 1) {
            var regex_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var result_email = regex_email.test(email);
            if (!result_email) {
                $('#email_title').after(`<span class="error">Enter valid email(must contain '@' and '.')</span>`);

                return false;
            }
            //ajax code
            jQuery.ajax({
                type: "POST",
                url: "../../php/ajax.php",
                async: false,
                data: {
                    user_email: email,
                    id: user_id
                },
                success: function (response) {

                    if (response == 0) {
                        $('#email_title').after(`<span class="error">Ok</span>`);
                        // $('#submit').attr("disabled", false);
                    } else if (response != 0) {
                        $('#email_title').after(`<span class="error">already exists</span>`);
                        // $('#submit').attr("disabled", true);
                    }
                    // ajaxsuccess(returned);

                }

            });
        }
        var span = $('.error').html()
        console.log(span);
        if(span == 'already exists') {
            return false;
        }
    });












}); 
 
 
 
 
 
 
 
 
 
 
 
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
