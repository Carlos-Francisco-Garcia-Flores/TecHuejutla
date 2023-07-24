<div>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f2f2f2;
    }
  
    h1 {
      text-align: center;
      font-size: 30px;

    }
  
    .form-container {
      max-width: 1000px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
  
    .form-container label {
      font-weight: bold;
      display: block;
      margin-bottom: 10px;
    }
  
    .form-container textarea {
      width: 90%;
      height: 200px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 30px;
      resize: none;
      box-sizing: border-box;
      margin-bottom: 10px;
      font-size: 20px;
      font-family: Arial Narrow Bold;
    }
  
    .form-container .letter-count {
      color: gray;
      font-size: 12px;
    }

    .form-container .submit-button {
      margin-top: 10px;
      text-align: center;


    }
    .BTN{
      border-radius: 10px;
      transition: background-color 0.3s, transform 0.3s;

    }
    .BTN:hover {
      color: white;
      background-color: #000;
      transform: scale(1.1);
      
    }
  </style>

  <script>
    function limitCharacters() {
      var textarea = document.getElementById('solicitud');
      var text = textarea.value;

      if (text.length > 10000) {
        textarea.value = text.slice(0, 10000);
      }
    }

    function countWords() {
      var text = document.getElementById('solicitud').value;
      // Eliminamos los espacios en blanco al principio y al final del texto para evitar contar espacios adicionales al inicio o al final.
      var trimmedText = text.trim();
      // Dividimos el texto en palabras utilizando los espacios como separadores.
      var wordsArray = trimmedText.split(/\s+/);
      var wordCount = wordsArray.length;

      document.getElementById('wordCount').textContent = wordCount;
    }
  </script>


<h1>Formulario de Solicitud</h1>


  <div class="form-container">
    
    <form   
  action="?C=PresentsController&M=AddSolicitud"
  method="post"
  enctype="multipart/form-data">

      <label for="solicitud">Ingrese la solicitud:</label>
      <label>Por favor escriba en esta apartado de lo que desea.Ingrese datos del negocio o empresa como el nombre, la ubicación, a que se dedica, los productos o servicios que ofrece. etc. (máximo 10000 palabras):</label>
      <textarea id="solicitud" name="solicitud" oninput="limitCharacters(); countWords();" maxlength="10000" required placeholder= "Escriba aqui su solicitud"></textarea>
      <span id="wordCount" class="wordCount">0</span>


      <label for="tipocliente">Seleccione qué tipo de cliente es:</label>
<select id="tipocliente" name="tipocliente" required>
  <?php
    // Suponiendo que tienes una instancia del modelo que obtiene los tipos de cliente
    // llamada $tipoClienteModel
    
    // Generar opciones dinámicamente desde los datos obtenidos de la base de datos
    foreach ($tiposClientes as $tipoCliente) {
      $id = $tipoCliente['id_TipoC'];
      $nombre = $tipoCliente['TipoC'];
      echo "<option value=\"$id\">$nombre</option>";
    }
  ?>
</select>

      <label for="tipoPaquete">Seleccione el tipo de paquete:</label>
      <select id="tipoPaquete" name="tipoPaquete" required>
        <option value="1">Paquete 1</option>
        <option value="2">Paquete 2</option>
        <option value="3">Paquete 3</option>
      </select>

      <label for="metodoPago">Seleccione el método de pago:</label>
      <select id="metodoPago" name="metodoPago" required>
        <option value="1">En efectivo</option>
        <option value="2">Transferencia</option>
        <option value="3">Por tarjeta de debito</option>
      </select>

      <label for="financiamiento">¿Desea que su solicitud sea financiada?</label>
      <select id="financiamiento" name="financiamiento" required>
        <option value="3">No</option>
        <option value="1">A un año (alpica comision del 8% del precio del servicio al precio final)</option>
        <option value="2">A 2 años (alpica comision del 12% del precio del servicio al precio final)</option>
        
        </select>

  <label for="archivoDescarga">Archivo para descargar:</label>
<!-- Enlace para descargar el archivo -->
<a href="APP/src/Files/Request_Format/FormularioSolicitud.docx" download>Descargar Archivo</a>

  <label for="archivoSubida">Subir archivo:</label>
  <input type="file" id="archivoSubida" name="archivoSubida">

        <p><input type="submit" value="Subir Solicitud" id = "button" class = "BTN"></p>

      </div>
    </form>
  </div>

</div>
