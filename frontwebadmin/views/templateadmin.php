<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAFEY! - Inicio</title>
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="easyui/jquery.min.js"></script>
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
    
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark;">
            <div class="container-fluid" style="display:flex;">
            <a class="navbar-brand" href="redireccionadmin.php?action=home">
                    <img src="img/safey.jpg" class="avatar"> </a>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    </ul>
                    <a class="navbar-brand" href="redireccionadmin.php?action=perfilusuario" style="justify-content:right">
                    <img src="img/avatar.png" class="avatar" onclick=animate> </a>
                <button type="button" class="btn btn-danger; buttonStyle" id="btnLogout">Cerrar Sesión</button>
            </div>
        </nav>
    </div>
    <div>
        <nav class="navbar-expand-lg navbar-dark navBg custom-nav">
            <div class="container-fluid">                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active; navTemplate" href="redireccionadmin.php?action=cooperativas">Cooperativas</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link active; navTemplate"
                            href="redireccionadmin.php?action=frecuencias">Frecuencias</a>
                    </li>
                </ul>
                

            </div>
        </nav>
    </div>
    <section>
    <h5>Bienvenido a la página de la cooperativa 
        <?php echo $_SESSION['id_coop'];?>
    </h5>
    <h5>Bienvenido usuario  
        <?php echo $_SESSION['id_usuario'];?>
    </h5>
        <?php
        $mvc = new MvcController();
        $mvc->enlacesPaginasControllerAdmin();
        ?>
    </section>

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
            <b><a href="redireccionadmin.php?action=home" style="color:white">Inicio</a> | <a href=""
                    style="color:white">Acerca de</a></b>
        </p>
    </footer>
</body>


</html>
<script>
    var boton = document.getElementById("btnLogout");
    boton.onclick = function () {
        window.location = "logout.php";
    }
</script>