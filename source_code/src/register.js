function validar() {
    var name = document.getElementById("contact_form_name").value;
    var email = document.getElementById("contact_form_correo").value;
    var password = document.getElementById("contact_form_password").value;
    var confirmPassword = document.getElementById("contact_form_confirmPassword").value;

    console.log(name)
    console.log(email)
    console.log(password)
    console.log(confirmPassword)

    if (name == "") {
        var nombreValido = false
    } else {
        var nombreValido = true
    }

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

    if (confirmPassword == "") {
        var confirmPasswordValid = false
    } else {
        var confirmPasswordValid = true
    }

    if (confirmPassword == password) {
        var igualidad = true
    } else {
        var igualidad = false
    }


    if(nombreValido == true, emailValido == true, passwordValida == true, confirmPasswordValid == true) {
        if (igualidad == true) {
                var datosValidos = true 
            } else {
                var datosValidos = false
               }
    }

    if (datosValidos == true) {
          // Authenticate the User
          firebase.auth().createUserWithEmailAndPassword(email, password)
          .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        if (errorCode == 'auth/weak-password') {
          alert('The password is too weak.');
        } else {
          alert(errorMessage);
        }
        console.log(error);
      });
    } else {
        window.location="../views/registro_fallido.html";
    }
}