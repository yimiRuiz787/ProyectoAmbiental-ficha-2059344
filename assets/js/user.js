$(document).ready(function () {
    $('#divarea1').hide();       
    $('#Id_Rol').change(function () {
        if ($(this).val() == "2") {
            $('#divarea1').show();         
        }
        else if ($(this).val() == "3" || "4") {
            $('#divarea1').hide();
        }
    });
});

/*$(document).ready(function () {
    $('#divarea1').hide();
    $('#divarea2').hide();
    $('#Id_Rol').change(function () {
        if ($(this).val() == "2") {
            $('#divarea1').show();
            $('#divarea2').hide();

        }
        else if ($(this).val() == "1") {
            $('#divarea1').hide();
            $('#divarea2').show();
        }
        else if ($(this).val() == "3" && "4") {
            $('#divarea1').hide();
            $('#divarea2').hide();
        }


    });
});
*/