$(document).ready(function(){
    var cell = $("#cell").html();
    // alert(jQuery.type( cell )); 
    if($.trim(cell) == 'active'){
        $('#submit').hide();
    }

});



