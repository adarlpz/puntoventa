

function validar() {
    var email = document.getElementById("contact_form_correo").value;

    console.log(email)


    if (email == "") {
        var emailValido = false
    } else {
        var emailValido = true
    }

    if(emailValido == true) {
        var datosValidos = true
            } else {
            var datosValidos = false
            }

    if (datosValidos == true) {
        console.log("los datos son validos, estas listo para registrarte!")
    } else {
        window.location="../views/olvidaste_fallido.html";
    }
}