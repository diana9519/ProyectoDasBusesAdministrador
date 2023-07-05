<head>
  <script>
    function editCooperativa(id_cooperativa, nombre_cooperativa, ruc_cooperativa, cantidad_buses, estado) {
      var encodedId = encodeURIComponent(id_cooperativa);
      var encodedNombre = encodeURIComponent(nombre_cooperativa);
      var encodedRUC = encodeURIComponent(ruc_cooperativa);
      var encodedCantidadBuses = encodeURIComponent(cantidad_buses);
      var encodedEstado = encodeURIComponent(estado);
      var redirectUrl = 'redireccionadmin.php?action=cooperativasform&id_cooperativa=' + encodedId +
        '&nombre_cooperativa=' + encodedNombre +
        '&ruc_cooperativa=' + encodedRUC +
        '&cantidad_buses=' + encodedCantidadBuses +
        '&estado=' + encodedEstado;

      window.location.href = redirectUrl;
    }
  </script>
</head>

<body>
  <div class="indexStyleTitulo">
    <br>
    <div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
      <h3 style="font-size: 20px;">
        <span style="display: inline-block; vertical-align: middle;">Nueva Cooperativa</span>
        <a href="redireccionadmin.php?action=cooperativasform">
          <img class="iconos" src="img/mas.png">
        </a>
      </h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Cooperativas</th>
            <th scope="col">Número de buses</th>
            <th scope="col">Estado</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $url = 'https://nilotic-quart.000webhostapp.com/listarCooperativas.php';

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $response = curl_exec($ch);

          if ($response !== false) {
            $data = json_decode($response, true);

            if (!empty($data)) {
              foreach ($data as $cooperativa) {
                echo '<tr>';
                echo '<td>' . $cooperativa['nombre_cooperativa'] . '</td>';
                echo '<td>' . $cooperativa['cantidad_buses'] . '</td>';
                $estado = ($cooperativa['estado'] == 1) ? 'Activa' : 'Inactiva';
                echo '<td>' . $estado . '</td>';
                echo '<td>';
                echo '<img class="iconos" src="img/editar.png" onclick="editCooperativa(\'' . $cooperativa['id_cooperativa'] . '\', \'' . $cooperativa['nombre_cooperativa'] . '\', \'' . $cooperativa['ruc_cooperativa'] . '\', \'' . $cooperativa['cantidad_buses'] . '\', \'' . $cooperativa['estado'] . '\')">';

                echo '</td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="3">No se encontraron registros en la tabla</td></tr>';
            }
          } else {
            echo '<tr><td colspan="3">Error al obtener los datos</td></tr>';
          }
          curl_close($ch);
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
