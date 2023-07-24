<div class="containerForm1">
<div>
<link rel="stylesheet" href="APP/view/Public/Users/Formularios.css" />

  <fieldset>
   <h2>Actualizacion de datos de usuario</h2>

  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="?C=UserController&M=Edit" method="post" enctype="multipart/form-data">
    <p>
      <label for="newUser">Usuario : </label><br />
      <input type="text" name="newUser" id="newUser" placeholder="Usuario" value="<?= $datos['Usuario'] ?>" />
    </p>
    <p>
      <label for="newPassword">Password : </label><br />
      <input type="password" name="newPassword" id="newPassword" placeholder="Password" value="<?= $datos['Contraseña'] ?>" />
    </p>
    <p>
      <label for="newEmail">Email : </label><br />
      <input type="newEmail"  name="newEmail"  id="newEmail"   placeholder="Email" value="<?= $datos['U_Email'] ?>">
        
    </p>
    <p>
      <label for= "newTelefono">Numero de telefono : </label><br />
      <input type="text"  name="newTelefono"  id="newTelefono" placeholder="Telefono" value="<?= $datos['U_Telefono'] ?>">
    </p>
    <p>
      <input type="text" name="id" id="id" placeholder="Usuario" value="<?= $datos['RFC'] ?>" hidden/>
    </p>
    <p><input type="submit" value="Editar" /></p>

  </form>
  </fieldset>

</div>
  </div>