<div>
  <h2>Administrasion de solicitudes</h2>
  <p>
    En este apartado se permitira agregar los usuarios las solicitudes de Productos
  </p>
  <p>
    <a href="?C=PresentsController&M=Solicitud">Agregar una Solicitud</a>
  </p>

</div>
<div>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f2f2f2;
    }
  
    .package-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }
  
    .package {
      width: 300px;
      height: 200px;
      background-color: rgba(7, 0, 108, 0.525);
      color: #fff;
      border-radius: 20px;
      padding: 20px;
      margin: 10px;
      text-align: center;
      transition: background-color 0.3s, color 0.3s, transform 1.0s;
    }

    h1{
    text-align: center;
    }
  
    .package:hover {
      background-color: #fff;
      background-image: linear-gradient(to bottom right, #5e35b1, #ff6f00);
      cursor: pointer;
      transform: scale(1.2);


    }
  </style>

  <h1>Paquetes</h1>
  
  <div class="package-container">
    <div class="package">
      <h2>Paquete 1</h2>
      <p>Costo: $25,000 pesos.</p>
      <p>Contenido: Este paquete incluye como maximo 5 paginas orientadas unicamente a publicitar el negocio o empresa solicitante</p>
    </div>
  
    <div class="package">
      <h2>Paquete 2</h2>
      <p>Costo: $30,000 pesos.</p>
      <p>Contenido: Este paquete incluye como maximo  6  paginas orientadas  a comercializar productos en linea</p>
    </div>
  
    <div class="package">
      <h2>Paquete 3</h2>
      <p>Costo: $35,000 pesos.</p>
      <p>Contenido: Este paquete incluye como maximo 15   paginas orientadas a los servicios de publicidad y comercio electronico</p>
    </div>
  </div>
