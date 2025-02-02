<!DOCTYPE html>
<html>

<head>
  <title>Inicio de sesion</title>
  <link rel="stylesheet" href="login.css">
  <?php include "./class_lib/links.php"; ?>
</head>

<body data-barba="wrapper" style="background-image: url(css/imgs/fondo-login.jpg);">
  <div data-barba="container" data-barba-namespace="home">
    <form action="valida_usr.php" method="post" class="AjaxForms MainLogin" data-type-form="login" autocomplete="off">
      <center style="margin-top:40px;">
        <img src="css/imgs/icon_app.png" class="image-login" alt="">
      </center>
      <p class="text-center text-muted lead inicio-title">Inicio De Sesion</p>
      <div class="form-group">
        <label class="control-label label-login" for="UserName">Usuario :</label>
        <div class="input-signin" style="display: flex; flex-direction:column;" >
        <img style="outline:none;margin-right:240px;top: 25px;position: relative;" src="css/imgs/email.svg" class="imagen-de-usuario" alt="User Image" height="15px">
        <input spellcheck="false" style="outline:none;padding-left: 40px;" class="form-control" name="usuario" id="UserName" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label label-login" for="Pass">Contraseña :</label>
        <div class="input-signin" style="display: flex; flex-direction:column;" >
        <img style="outline:none;margin-right:240px;top: 25px;position: relative;" src="css/imgs/pass_icon.svg" class="imagen-de-usuario" alt="User Image" height="23px">
        <input spellcheck="false" style="outline:none;padding-left: 40px;" class="form-control" name="pass" id="Pass" type="password" required="">
        </div>
      </div>
      <p class="text-center">
        <button type="submit" style="height: 37px; border-radius: 18px;background: linear-gradient(130deg, #00E6FF 0%, #0090D4 100%);border: 2.5px solid #fff;outline:none;" class="btn btn-primary btn-block btn-login">INICIAR SESION</button>
      </p>
    </form>
    <div class="MsjAjaxForm"></div>
    <?php include "./class_lib/scripts.php"; ?>
    <script src="trancisiones.js"></script>
  </div>
</body>

</html>