<!DOCTYPE html>
<html>

<head>
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var actualPassword = "";
            var idUsuario = "<?php echo $_SESSION['id_usuario']; ?>";

            // Obtener la contraseña actual del usuario
            $.ajax({
                type: 'POST',
                url: 'https://nilotic-quart.000webhostapp.com/obtenerDatosUsuario.php',
                data: {
                    id_usuario: idUsuario
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    if (response && response.clave_usuario) {
                        actualPassword = response.clave_usuario;
                    } else {
                        $('#userPassword').text('No se encontró la contraseña');
                    }
                },
                error: function() {
                    $('#userPassword').text('Error al obtener la contraseña');
                }
            });

            // Manejar el evento de envío del formulario
            $("form").submit(function(event) {
                event.preventDefault(); // Evitar que se envíe el formulario

                var newPassword = $("#newPassword").val();
                var newPasswordAgain = $("#newPasswordAgain").val();
                var currentPassword = $("#currentPassword").val();

                $("#errorPasswords").empty(); // Limpiar mensajes de error anteriores

                // Validar que todos los campos estén llenos
                if (newPassword === "" || newPasswordAgain === "" || currentPassword === "") {
                    $("#errorPasswords").text("Todos los campos son obligatorios");
                    return; // Detener el proceso de guardado
                }

                // Validar que las contraseñas coincidan
                if (newPassword !== newPasswordAgain) {
                    $("#errorPasswords").text("Las contraseñas no son iguales");
                    return; // Detener el proceso de guardado
                }

                // Validar que la contraseña actual sea correcta
                if (currentPassword !== actualPassword) {
                    $("#currentPassword").addClass("is-invalid");
                    $("#errorPasswords").text("Contraseña incorrecta");
                    return; // Detener el proceso de guardado
                } else {
                    $("#currentPassword").removeClass("is-invalid");
                }

                // Realizar la petición para actualizar la contraseña en la base de datos
                $.ajax({
                    type: 'POST',
                    url: 'https://nilotic-quart.000webhostapp.com/editarClaveUsuario.php',
                    data: {
                        id_usuario: idUsuario,
                        clave_usuario: newPassword
                    },
                    success: function(response) {
                        if (response && response.OK) {
                            $('#successModal').modal('show');
                        } else {
                            alert("Error al editar el perfil del usuario.");
                        }
                    },
                    error: function() {
                        alert("Error en la solicitud.");
                    }
                });
            });

            // Función para alternar la visibilidad de la contraseña
            function togglePasswordVisibility(inputId, toggleButtonId) {
                var input = $("#" + inputId);
                var toggleButton = $("#" + toggleButtonId);

                toggleButton.on("click", function() {
                    var type = input.attr("type");
                    if (type === "password") {
                        input.attr("type", "text");
                        toggleButton.html('<i class="fas fa-eye-slash"></i>');
                    } else {
                        input.attr("type", "password");
                        toggleButton.html('<i class="fas fa-eye"></i>');
                    }
                });
            }

            // Alternar visibilidad de la contraseña para cada campo
            togglePasswordVisibility("newPassword", "toggleNewPassword");
            togglePasswordVisibility("newPasswordAgain", "toggleNewPasswordAgain");
            togglePasswordVisibility("currentPassword", "toggleCurrentPassword");
        });
    </script>
    <script>
        function redirectToPerfil() {
            window.location.href = 'redireccionadmin.php?action=perfilusuario';
        }
    </script>
</head>

<body>
    <div class="indexStyleTitulo">
        <div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
            <h3 style="font-size: 20px; text-align: center;">
                <span class="cooperative-info-title">CAMBIAR CONTRASEÑA</span>
            </h3>
            <form style="max-width: 400px; margin: 0 auto;">
                <div class="row mb-3">
                    <label for="newPassword" class="col-sm-4 col-form-label">Nueva Contraseña:</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="newPassword" placeholder="Ingrese la nueva contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="newPasswordAgain" class="col-sm-4 col-form-label">Nueva Contraseña Nuevamente:</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="newPasswordAgain" placeholder="Ingrese la nueva contraseña nuevamente" required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPasswordAgain">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="currentPassword" class="col-sm-4 col-form-label">Contraseña Actual:</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm" id="currentPassword" placeholder="Ingrese su contraseña actual" required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span id="userPassword" style="font-size: 12px; color: #888;"></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-8 offset-sm-4">
                        <div id="errorPasswords" style="font-size: 12px; color: red;"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="width: 120px;" href="redireccionadmin.php?action=perfilusuario">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-check-circle fa-4x text-success"></i>
                    <p class="mt-3">Guardado Exitosamente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="redirectToPerfil()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>