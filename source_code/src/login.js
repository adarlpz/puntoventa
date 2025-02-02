 function validar() {
    var email = document.getElementById("contact_form_correo").value;
    var password = document.getElementById("contact_form_pass").value;


    console.log(email)
    console.log(password)


    if (email == "") {
        var emailValido = false
    } else {
        var emailValido = true
    }

    if (password == "") {
        var passwordValida = false
    } else {
        var passwordValida = true
    }


    if(emailValido == true, emailValido == true, passwordValida == true) {
        var datosValidos = true
            } else {
            var datosValidos = false
            }

    if (datosValidos == true) {
        console.log("los datos son validos, estas listo para registrarte!")
    } else {
        window.location="../views/login_fallido.html";
    }
}