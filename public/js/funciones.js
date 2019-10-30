/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$(document).ready(function() {
//    console.log( "ready!" );
//});
//$(document).ready(function () {
//    alert("Entro");
//    $.ajaxSetup({
//        headers: {"X-CSRF-TOKEN" :jQuery('meta[name = "csrf-token"]').attr("content")}
//    });
//});

window.addEventListener('load', function () {
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN": jQuery('meta[name = "csrf-token"]').attr("content")}
    });

    $('#OpElgSi').unbind('click').click(function () {
        var PanelAcepted = document.getElementById("pnlAcepted");
        PanelAcepted.style.display = 'block';
    });

    $('#OpElgNo').unbind('click').click(function () {
        var PanelAcepted = document.getElementById("pnlAcepted");
        PanelAcepted.style.display = 'none';
    });


    $('#Registrar').unbind().click(function (event) {
       
        var OpCity = document.getElementById("opciud").value;
        var Firtsname = document.getElementById("firstname").value; 
        var midname = document.getElementById("midname").value; 
        var lastname = document.getElementById("lastname").value; 
        var tel = document.getElementById("tel").value; 
        var gender = document.getElementById("gender").value; 
        var fhbirth = document.getElementById("fhbirth").value; 
        var dir = document.getElementById("dir").value; 
        var dir2 = document.getElementById("dir2").value; 
        var city = document.getElementById("city").value; 
        var state = document.getElementById("state").value; 
        var zipcode = document.getElementById("zipcode").value; 
        var marital = document.getElementById("marital").value; 
        var email = document.getElementById("email").value; 
        var tpdoc = document.getElementById("tpdoc").value; 
        var socialnum = document.getElementById("socialnum").value;
        var numdep = document.getElementById("numdep").value; 
        var contactemer = document.getElementById("contactemer").value; 
        var surnamecon = document.getElementById("surnamecon").value; 
        var telcon = document.getElementById("telcon").value; 
        var area = document.getElementById("area").value; 
        var namesur = document.getElementById("namesur").value; 
        var job1 = document.getElementById("job1").checked; 
        var job2 = document.getElementById("job2").checked; 
        var job3 = document.getElementById("job3").checked; 
        var job4 = document.getElementById("job4").checked; 
        var job5 = document.getElementById("job5").checked; 
        var job6 = document.getElementById("job6").checked; 
        var job7 = document.getElementById("job7").checked; 
        var job8 = document.getElementById("job8").checked; 
        var job9 = document.getElementById("job9").checked; 
        var job10 = document.getElementById("job10").checked; 
        
        var mil = document.getElementsByName('mil').value; 
        var dem = document.getElementsByName('dem').value; 
        var demc = document.getElementsByName('demc').value; 
        var clause = document.getElementsByName('clause').value; 
        var term = document.getElementsByName('term').value; 
        var image_path = document.getElementById('image_path').value; 
        var image_path2 = document.getElementById('image_path2').value; 
        var acept = document.getElementsByName('acept').value; 
        $.ajax({
            url: 'validarform',
            type: 'POST',
            datatype: 'json',
            data: {
                OpCity:OpCity,
                Firtsname:Firtsname,
                midname:midname,
                lastname:lastname, 
                tel :tel,
                gender :gender,
                fhbirth :fhbirth,
                dir :dir,
                dir2 :dir2,
                city :city,
                state :state,
                zipcode :zipcode,
                marital :marital,
                email :email,
                tpdoc :tpdoc,
                socialnum :socialnum,
                numdep :numdep,
                contactemer :contactemer,
                surnamecon :surnamecon,
                telcon :telcon,
                area :area,
                namesur :namesur,
                job1 :job1,
                job2 :job2,
                job3 :job2,
                job4 :job2,
                job5 :job2,
                job6 :job2,
                job7 :job2,
                job8 :job2,
                job9 :job2,
                job10 :job2,
                mil :mil,
                dem :dem,
                demc :demc,
//                clause:clause,
//                term:term,
//                image_path :image_path,
//                image_path2 :image_path2,
                acept :acept,
            },
            success: function (response) {
                console.log(response.message);
                if (response.status =='200'){
                    $("#mensaje-succes").fadeIn();
                    $("#lblmensajesucces").html(response.message);
                    $("#OpElgSi").focus();
                }
                else{
                    $("#mensaje-error").fadeIn();
                    $("#lblmensajeerror").html(response.message);
                    $("#OpElgSi").focus();
                }
            }
            ,
            error: function (response) {
                console.log(response);
            }

        })
    });

});

