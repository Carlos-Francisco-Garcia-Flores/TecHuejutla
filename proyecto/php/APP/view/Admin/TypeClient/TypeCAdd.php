<div class="containerForm1">
    
        <fieldset>
        <h2></h2>
        <div>
  <h2></h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <link rel="stylesheet" href="APP/view/Public/Users/Formularios.css" />
  
  <div class="containerForm1">
    
        <fieldset>
        <h2>Añadir Un nuevo tipo de cliente</h2>
        <form 
  action="?C=TypeClientController&M=AddTC" 
  method="post"
  enctype="multipart/form-data">

  <p>
                <label for="nombre">Id del negocio : </label><br />
                <input type="text" name="Id_TC" id="Id_TC" placeholder="Ingresa un nuevo tipo de cliente" required maxlength="5" pattern="[A-Za-z]*";/>
            </p>
            <p>
                <label for="nombre">Tipo de cliente : </label><br />
                <input type="text" name="TipoC" id="TipoC" placeholder="Ingresa un nuevo tipo de cliente" required pattern="[A-Za-z]*";/>
            </p>



            <p>
                <input type="submit" value="Añadir un nuevo tipo de cliente" id="button" class= "BTN">
            </p>
        </form>
    </fieldset>
</div>