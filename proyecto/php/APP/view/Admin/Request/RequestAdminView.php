
<div>
  <h2>Lista de usuarios</h2>
  

  <!--Aqui va una tabla con los usuarios-->
      <table border=1>
    <thead>
                <tr>
      <td>Id de la solicitud</td>
      <td>Fecha de la solicitud</td>
      <td>Solicitud</td>
      <td>Tipo de paquete</td>
      <td>Tipo de usuario</td>
      <td>Usuario solicitante</td>
      <td>Metodo de pago</td>
      <td>Financiamiento</td>
                </tr>
            </thead>
            <tbody>
              
                <?php               
                foreach($datos as $dato)
                {
                         echo "<tr>";
                         echo "<td>"  . $dato['id_Solicitudud'] . "</td>";
                         echo "<td>"  . $dato['Fecha_Solicitud'] . "</td>";
                         echo "<td>"  . $dato['DescripcionSolicitud'] . "</td>";
                         echo "<td>"  . $dato['TipoPaquete'] . "</td>";
                         echo "<td>"  . $dato['TipoCliente'] . "</td>";
                         echo "<td>"  . $dato['RFC'] . "</td>";
                         echo "<td>"  . $dato['MetodoPago'] . "</td>";
                         echo "<td>"  . $dato['Financiamiento'] . "</td>";

                         echo "<td> <button onclick='eliminar(\"".$dato['id_Solicitudud']."\")'>Eliminar</button> </td>";
                         echo "</tr>";
                }
                ?>
      
                </tbody>
              </table>
            </div>
            <script>
    //creamos la funcion para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id) {
  if (confirm("¿Desea eliminar el esta solicitud (no pordras recuperarla despues de esto?")) {
    window.location.href = "?C=PresentsController&M=Delete&id=" + id;
  }

    }

  </script>
