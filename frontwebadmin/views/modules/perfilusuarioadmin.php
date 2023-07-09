<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var idUsuario = "<?php echo $_SESSION['id_usuario']; ?>";


            $.ajax({
                type: 'POST',
                url: 'https://nilotic-quart.000webhostapp.com/obtenerDatosUsuario.php',
                data: { id_usuario: idUsuario }, // Cambia 'cedula_usuario' por 'id_usuario'
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Verifica la respuesta en la consola del navegador

                    if (response && response.nombre_usuario && response.apellido_usuario) {
                        var nombreApellido = response.nombre_usuario + ' ' + response.apellido_usuario;
                        $('#nombreApellido').text(nombreApellido);
                    } else {
                        $('#nombreApellido').text('No se encontró el usuario');
                    }
                },
                error: function() {
                    $('#nombreApellido').text('Error al obtener los datos del usuario');
                }
            });
        });
    </script>
</head>
<body>
    
    <div class="container">
        <div class="p-3">
            <h3 class="text-center">Perfil de Usuario</h3>

            <div class="text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <img class="img-fluid" src="img/cambiarUsuario.png" alt="Profile Picture" style="max-width: 200px;">
                    <a href="#"><i class="fas fa-camera"></i></a>
                </div>
            </div>

            <div class="text-center mt-3">
                <p class="fw-bold fs-4 mb-1" id="nombreApellido"></p>
                <span id="idUsuario"></span>
            </div>

            <div class="border rounded p-3 d-flex flex-column mt-3">
                <a href="redireccionadmin.php?action=usuarioform" class="btn btn-outline-secondary mb-2 border-0 shadow-none">Editar Información del Perfil</a>
                <a href="redireccionadmin.php?action=nuevacontrasenia" class="btn btn-outline-secondary mb-2 border-0 shadow-none">Cambiar Contraseña</a>
            </div>
        </div>
    </div>
</body>
</html>
