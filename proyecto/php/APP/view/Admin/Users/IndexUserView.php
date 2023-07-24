<div>
  <h2>Lista de usuarios</h2>
  

  <p>
    <a href="?C=UserController&M=CallFormAddUsAdmin">Agregar nuevo usuario</a>
  </p>
  <!--Aqui va una tabla con los usuarios-->
      <table border=1>
    <thead>
                <tr>
                    <td>RFC Primaria</td>
                    <td>Nombre</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Materno</td>
                    <td>Usuario</td>
                    <td>Contraseña</td>
                    <td>Email</td>
                    <td>Teléfono</td>
                    <td>Tipo de Usuario</td>
                    <td>Avatar</td>
                </tr>
            </thead>
            <tbody>
              
                <?php               
                foreach($datos as $dato)
                {
                         echo "<tr>";
                         echo "<td>"  . $dato['RFC'] . "</td>";
                         echo "<td>"  . $dato['Nombre'] . "</td>";
                         echo "<td>"  . $dato['Apaterno'] . "</td>";
                         echo "<td>"  . $dato['ApMaterno'] . "</td>";
                         echo "<td>"  . $dato['Usuario'] . "</td>";
                         echo "<td>"  . $dato['Contraseña'] . "</td>";
                         echo"<td>"   . $dato['U_Email'] . "</td>";
                         echo "<td>"  . $dato['U_Telefono'] . "</td>";
                         echo "<td>"  . $dato['TipoUsuario'] . "</td>";
                         echo "<td>"  . $dato['Avatar'] . "</td>";
                         echo "<td> 
                          <button onclick='editar(\"".$dato['RFC']."\")'>Editar</button><br>
                          <button onclick='eliminar(\"".$dato['RFC']."\")'>Eliminar</button> </td>";
                         echo "</tr>";
                }
                ?>
      
                </tbody>
              </table>
            </div>
            <script>
    //creamos la funcion para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id) {
  if (confirm("¿Desea eliminar el usuario?")) {
    window.location.href = "?C=UserController&M=Delete&id=" + id;
  }

    }
    //creamos la funcion para editar un usuario por medio de su id
    function editar(id){
      if (confirm("¿Desea Actualizar el usuario?")) {

        window.location.href = "?C=UserController&M=CallFormEdit&id=" + id;
    }
    }
  </script>
