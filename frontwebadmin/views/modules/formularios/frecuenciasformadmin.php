<head>
  <?php
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 0);

  $id_frecuencia = $_GET['id_frecuencia'];
  $origen_frecuencia = $_GET['origen_frecuencia'];
  $destino_frecuencia = $_GET['destino_frecuencia'];
  $duracion_frecuencia = $_GET['duracion_frecuencia'];
  $costo_frecuencia = $_GET['costo_frecuencia'];
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.1.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.1.9/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.1.9/sweetalert2.min.js"></script>
  <script>
    // Mapeo de ID a nombre de ciudad
    var cityMap = {
      1: 'Cuenca',
      2: 'Guaranda',
      3: 'Azogues',
      4: 'Tulcán',
      5: 'Riobamba',
      6: 'Latacunga',
      7: 'Machala',
      8: 'Esmeraldas',
      9: 'Guayaquil',
      10: 'Ibarra',
      11: 'Loja',
      12: 'Babahoyo',
      13: 'Portoviejo',
      14: 'Macas',
      15: 'Tena',
      16: 'Orellana',
      17: 'Puyo',
      18: 'Quito',
      19: 'Santa Elena',
      20: 'Santo Domingo',
      21: 'Nueva Loja',
      22: 'Ambato',
      23: 'Zamora',
      24: 'Salcedo',
      25: 'La Maná'
    };

    $(document).ready(function() {
      var cities = $('.city');

      // Cargar las ciudades en los selectores
      for (var cityId in cityMap) {
        var cityName = cityMap[cityId];
        cities.append($('<option></option>').val(cityId).text(cityName));
      }

      // Establecer el valor seleccionado en los selectores de origen y destino
      $('#origen_frecuencia').val('<?php echo $origen_frecuencia; ?>');
      $('#destino_frecuencia').val('<?php echo $destino_frecuencia; ?>');
    });

    $(document).ready(function() {
      $("form").submit(function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario

        // Obtener los valores de los campos del formulario
        var id_frecuencia = $('#id_frecuencia').val();
        var origen_frecuencia = $('#origen_frecuencia').val();
        var destino_frecuencia = $('#destino_frecuencia').val();
        var duracion_frecuencia = $('#duracion_frecuencia').val();
        var costo_frecuencia = $('#costo_frecuencia').val();

        // Crear un objeto de datos para enviar al servicio
        var data = {
          id_frecuencia: id_frecuencia,
          origen_frecuencia: origen_frecuencia,
          destino_frecuencia: destino_frecuencia,
          duracion_frecuencia: duracion_frecuencia,
          costo_frecuencia: costo_frecuencia
        };

        // Realizar la solicitud AJAX al servicio
        $.ajax({
          url: "https://nilotic-quart.000webhostapp.com/agregarFrecuencia.php",
          type: "POST",
          data: data,
          success: function(response) {
            // Mostrar mensaje de éxito y redireccionar a la página de inicio
            
          },
          error: function(xhr, status, error) {
            // Mostrar mensaje de error en caso de falla
            alert("Ha ocurrido un error al agregar la frecuencia");
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
  <script>
    function redirectToFrecuencias() {
      window.location.href = 'redireccionadmin.php?action=frecuencias';
    }
  </script>
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
  <div class="indexStyleTitulo">
    <div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
      <h3 style="font-size: 20px; text-align: center;">
        <span class="cooperative-info-title">INFORMACIÓN DE LA FRECUENCIA</span>
      </h3>
      <form style="max-width: 400px; margin: 0 auto;" action="https://nilotic-quart.000webhostapp.com/agregarFrecuencia.php" method="POST">
        <input type="number" name="id_frecuencia" id="id_frecuencia" style="display: none;" value="<?php echo $id_frecuencia; ?>">
        <div class="row mb-3">
          <label for="origen_frecuencia" class="col-sm-4 col-form-label">Origen:</label>
          <div class="col-sm-8">
            <select class="form-control form-control-sm city" id="origen_frecuencia" name="origen_frecuencia" style="height: auto; padding: 0.375rem 0.75rem; font-size: 0.875rem;" required>
              <option value="">Escoja una opción</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label for="destino_frecuencia" class="col-sm-4 col-form-label">Destino:</label>
          <div class="col-sm-8">
            <select class="form-control form-control-sm city" id="destino_frecuencia" name="destino_frecuencia" style="height: auto; padding: 0.375rem 0.75rem; font-size: 0.875rem;" required>
              <option value="">Escoja una opción</option>
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <label for="costo_frecuencia" class="col-sm-4 col-form-label">Costo:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="costo_frecuencia" name="costo_frecuencia" placeholder="Ingrese el costo" style="height: auto; padding: 0.375rem 0.75rem; font-size: 0.875rem;" value="<?php echo $costo_frecuencia; ?>" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="duracion_frecuencia" class="col-sm-4 col-form-label">Duración:</label>
          <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="duracion_frecuencia" name="duracion_frecuencia" placeholder="Ingrese la duración" style="height: auto; padding: 0.375rem 0.75rem; font-size: 0.875rem;" value="<?php echo $duracion_frecuencia; ?>" required>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary" style="width: 45%; ">Guardar</button>
          <button type="button" class="btn btn-outline-primary" style="width: 45%;" onclick="redirectToFrecuencias()">Cancelar</button>
        </div>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                <i class="fas fa-check-circle fa-4x text-success"></i>
                <p class="mt-3">Guardo Exitosamente</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="redirectToFrecuencias()">Ok</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>