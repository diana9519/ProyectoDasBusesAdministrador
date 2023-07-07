<head>
  <script>
    function editarFrecuencia(id_frecuencia, origen_frecuencia, destino_frecuencia, costo_frecuencia, duracion_frecuencia) {
      var encodedId = encodeURIComponent(id_frecuencia);
      var encodedOrigen = encodeURIComponent(origen_frecuencia);
      var encodedDestino = encodeURIComponent(destino_frecuencia);
      var encodedCosto = encodeURIComponent(costo_frecuencia);
      var encodedDuracion = encodeURIComponent(duracion_frecuencia);
      var redirectUrl = 'redireccionadmin.php?action=frecuenciasform&id_frecuencia=' + encodedId +
        '&origen_frecuencia=' + encodedOrigen +
        '&destino_frecuencia=' + encodedDestino +
        '&costo_frecuencia=' + encodedCosto +
        '&duracion_frecuencia=' + encodedDuracion;

      window.location.href = redirectUrl;
    }
  </script>

</head>

<body>
  <div class="indexStyleTitulo">
    <br><br><br>
    <div style="padding-left: 30px; padding-right: 30px; padding-top: 15px;">
      <h3 style="font-size: 20px;">
        <span style="display: inline-block; vertical-align: middle;">Nueva Frecuencia</span>
        <a href="redireccionadmin.php?action=frecuenciasform">
          <img class="iconos" src="img/mas.png">
        </a>
      </h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Costo</th>
            <th scope="col">Duración</th>
            <th scope="col">Acciones </th>
          </tr>
        </thead>
        <tbody>
          //servicio par listar las frecuencias
          <?php
          
          $url = 'https://nilotic-quart.000webhostapp.com/listarFrecuencias.php';
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $response = curl_exec($ch);

          if ($response !== false) {
            $data = json_decode($response, true);

            if (!empty($data)) {
              echo '<script>
                                    var cityMap = {
                                      1: "Cuenca",
                                      2: "Guaranda",
                                      3: "Azogues",
                                      4: "Tulcán",
                                      5: "Riobamba",
                                      6: "Latacunga",
                                      7: "Machala",
                                      8: "Esmeraldas",
                                      9: "Guayaquil",
                                      10: "Ibarra",
                                      11: "Loja",
                                      12: "Babahoyo",
                                      13: "Portoviejo",
                                      14: "Macas",
                                      15: "Tena",
                                      16: "Orellana",
                                      17: "Puyo",
                                      18: "Quito",
                                      19: "Santa Elena",
                                      20: "Santo Domingo",
                                      21: "Nueva Loja",
                                      22: "Ambato",
                                      23: "Zamora",
                                      24: "Salcedo",
                                      25: "La Maná"
                                    };

                                    $(document).ready(function() {
                                      var cities = $(".city");

                                      cities.each(function() {
                                        var cityId = $(this).data("id");
                                        var cityName = cityMap[cityId];
                                        $(this).text(cityName);
                                      });

                        
                                    });
                                </script>';

              foreach ($data as $frecuencia) {
                echo '<tr>';
                echo '<td class="city" data-id="' . $frecuencia['origen_frecuencia'] . '"></td>';
                echo '<td class="city" data-id="' . $frecuencia['destino_frecuencia'] . '"></td>';
                echo '<td>' . $frecuencia['costo_frecuencia'] . '</td>';
                echo '<td>' . $frecuencia['duracion_frecuencia'] . '</td>';
                echo '<td>';
                echo '<img class="iconos" src="img/editar.png" onclick="editarFrecuencia(\'' . $frecuencia['id_frecuencia'] . '\', \'' . $frecuencia['origen_frecuencia'] . '\', \'' . $frecuencia['destino_frecuencia'] . '\', \'' . $frecuencia['costo_frecuencia'] . '\',\'' . $frecuencia['duracion_frecuencia'] . '\')">';
                echo '</td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="5">No se encontraron registros en la tabla</td></tr>';
            }
          } else {
            echo '<tr><td colspan="5">Error al obtener los datos</td></tr>';
          }
          curl_close($ch);
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>