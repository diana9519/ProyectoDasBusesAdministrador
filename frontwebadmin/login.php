<?php
if(isset($_POST['envio'])){
        header('Location: '."redireccionadmin.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAFEY!- Iniciar Sesión</title>
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<body class="bodyBack">
<header class="headerStyle">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <img src="img/safey.jpg" class="avatar">
            </div>
        </nav>
    </header>
    <div class="divFormulario">
        <form action="https://nilotic-quart.000webhostapp.com/login.php" class="formularioLogin" method="POST">
            <div class="divTituloLogin">
                <h3>Iniciar Sesión</h3>
            </div>
            <br>
            <div class="mb-3">
                <img src="img/user.png">
                <label for="usuario" class="form-label" style="font-weight:bold;">Usuario</label>
                <input type="email" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su usuario" required>
            </div>
            <div class="mb-3">
                <img src="img/password.png">
                <label for="clave" class="form-label" style="font-weight:bold">Contraseña</label>
                <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su contraseña" required>
            </div>
            <div>
                <button type="submit" class="form-control buttonStyle" id="envio" name="envio" >Ingresar</button>
            </div>
        </form>
    </div>
    <footer class="footerStyle">
        <p>
            <br>
            <b>______________________________________</b>
            <a href="">
                <img src="img/mail.png" class="socialnetwork">
            </a>
            <b>_</b>
            <a href="">
                <img src="img/instagram.png" class="socialnetwork">
            </a>
            <b>_</b>
            <a href="">
                <img src="img/twitter.png" class="socialnetwork">
            </a>
            <b>_</b>
            <a href="">
                <img src="img/facebook.png" class="socialnetwork">
            </a>
            <b>______________________________________</b>
            <br>
            <b>Copyright © 2023 Safey</b>
            <br>
            <b><a href="index.php" style="color:white">Inicio</a> | <a href="" style="color:white">Acerca de</a></b>
        </p>
    </footer>
</body>

</html>
<script>
    document.getElementById("envio").addEventListener("click", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
    
    // Obtén los valores de los campos de usuario y clave
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    
    // Realiza la petición AJAX al servicio de inicio de sesión
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://nilotic-quart.000webhostapp.com/login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.id_usuario) {
                // Si la respuesta contiene un ID de usuario, significa que el inicio de sesión fue exitoso
                if (response.tipo_usuario == "ant") {

                    // Redirige a la página deseada pasando el id_usuario como parámetro en la URL
                    window.location.href = "okLogin.php?id_usuario=" + response.id_usuario + "&id_coop=" + response.id_coop;
                } else {
                    alert("Error en la autenticación");
                }
            } else {
                // Si no, muestra un mensaje de error
                alert("Error en la autenticación");
            }
        }
    };
    var params = "email_usuario=" + encodeURIComponent(usuario) + "&clave_usuario=" + encodeURIComponent(clave);
    xhr.send(params);
});
</script>