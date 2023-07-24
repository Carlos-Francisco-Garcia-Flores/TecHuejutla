<div class="containerForm1">
    
        <fieldset>
        <h2>Añadir usuario</h2>
        <div>
  <h2>Agregar nuevo usuario</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <link rel="stylesheet" href="APP/view/Public/Users/Formularios.css" />
  
  <div class="containerForm1">
    
        <fieldset>
        <h2>Añadir usuario</h2>
        <form 
  action="?C=UserController&M=Add" 
  method="post"
  enctype="multipart/form-data">

  <p>
                <label for="rfc">RFC : </label><br />
                <input type="text" name="rfc" id="rfc" placeholder="RFC" required pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}"  />
            </p>

            <p>
                <label for="nombre">Nombre : </label><br />
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required pattern="[A-Za-z ]*"/>
            </p>

            <p>
                <label for="apaterno">Apellido Paterno : </label><br />
                <input type="text" name="apaterno" id="apaterno" placeholder="Apellido Paterno" required pattern="[A-Za-z ]*"/>
            </p>

            <p>
                <label for="amaterno">Apellido Materno : </label><br />
                <input type="text" name="amaterno" id="amaterno" placeholder="Apellido Materno" required pattern="[A-Za-z ]*"/>
            </p>

            <p>
                <label for="user">Usuario : </label><br />
                <input type="text" name="user" id="user" placeholder="Usuario" required minlength="6" maxlength="12" pattern="[A-Za-z0-9]*">
            </p>

            <p>
                <label for="password">Password : </label><br>
                <input type="password" name="password" id="password" placeholder="Password" required minlength="8" maxlength="16" pattern="[A-Za-z0-9]*"/>
            </p>

            <p>
                <label for="Email">Email : </label><br>
                <input type="email" name="email" id="email"  placeholder="Email"/>
            </p>

            <p>
                <label for="Email">Numero de telefono : </label><br>
                <input type="text" name="tel" id="tel"  placeholder="Telefono" required  minlength="10" maxlength="10" pattern="[0-9]*"/>
            </p>

            <p>
                <label for="avatar">Imagen de perfil de usuario : </label><br>
                <input type="file" name="avatar" id="avatar" accept="image/*">
            </p>

            <p>
                <input type="submit" value="Crear usuario" id="button" class= "BTN">
            </p>
        </form>
    </fieldset>
</div>