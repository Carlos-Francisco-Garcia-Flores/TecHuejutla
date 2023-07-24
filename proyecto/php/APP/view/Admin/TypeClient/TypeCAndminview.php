
<div>
  <h2>Lista de Tipos de clientes</h2>

  <p>
    <a href="?C=TypeClientController&M=CallAddTypeClient">Agregar un nuevo tipo de cliente</a>
  </p>

  <!--Aqui va una tabla con los usuarios-->
      <table border=1>
    <thead>
                <tr>
      <td>ID</td>
      <td>Tipo de cliente</td>
                </tr>
            </thead>
            <tbody>
              
                <?php               
                foreach($datos as $dato)
                {
                         echo "<tr>";
                         echo "<td>"  . $dato['id_TipoC'] . "</td>";
                         echo "<td>"  . $dato['TipoC'] . "</td>";
                         echo "<td> <button onclick='eliminar(\"".$dato['id_TipoC']."\")'>Eliminar</button> </td>";
                         echo "</tr>";
                }
                ?>
      
                </tbody>
              </table>
            </div>
            <script>
    //creamos la funcion para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id) {
  if (confirm("¿Deseas eliminar este tipo de cliente?")) {
    window.location.href = "http://localhost/proyecto/php/?C=TypeClientController&M=Delete&id=" + id;
  }

    }

  </script>
