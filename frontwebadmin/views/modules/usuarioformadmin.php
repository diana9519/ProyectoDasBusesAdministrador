<head>
    <title>Informacion del usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault(); // Evitar que se envíe el formulario

                // Mostrar ventana emergente con mensaje y icono
                $('#successModal').modal('show');
            });
        });
    </script>
</head>

<body>
    <div class="container py-4">
        <h3 class="text-center">INFORMACIÓN DEL PERFIL DE USUARIO</h3>
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="form-container border rounded p-3" style="max-height: 400px; overflow-y: auto;">
                    <form>
                        <div class="mb-3 row">
                            <label for="firstName" class="col-sm-4 col-form-label">Nombre:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="firstName" placeholder="Ingrese su nombre">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lastName" class="col-sm-4 col-form-label">Apellido:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="lastName" placeholder="Ingrese su apellido">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="identificationCard" class="col-sm-4 col-form-label">Número de identificación</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="identificationCard" placeholder="Ingrese su número de identificación">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Correo:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" placeholder="Ingrese su correo">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-4 col-form-label">Teléfono:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone" placeholder="Ingrese su número de teléfono">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</body>