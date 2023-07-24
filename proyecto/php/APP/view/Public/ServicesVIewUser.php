<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paquetes de Servicios</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 20px;
      background-color: #f2f2f2;
    }
  
    .package-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      flex-wrap: wrap;
    }
  
    .package {
      width: 300px;
      height: 200px;
      color: #ffffff;
      background-color: rgba(7, 0, 108, 0.525);
      border-radius: 20px;
      padding: 20px;
      margin: 10px;
      text-align: center;
      transition: transform 0.5s;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      transition: background-color 0.3s, transform 1.0s;

    }
  
    h1 {
      text-align: center;
      color: black;
      text-transform: uppercase;
      font-size: 28px;
      margin-bottom: 40px;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      line-height: 1.6;
    }

    a {
      color: #5e35b1;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  
    .package:hover {
      background-color: #fff;
      cursor: pointer;
      background-image: linear-gradient(to bottom right, #5e35b1, #ff6f00);

      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  
  <div>
    <h1>Servicios Ofrecidos</h1>
    <div class="package-container">
      <a href="?C=PresentsController&M=Pack1C">
        <div class="package">
          <h2>Paquete 1</h2>
          <h2>Publicidad</h2>
          <h2>Costo: $25,000 pesos.</h2>
        </div>
      </a>
    
      <a href="?C=PresentsController&M=Pack2C">
        <div class="package">
          <h2>Paquete 2</h2>
          <h2>Comercio web</h2>
          <h2>Costo: $30,000 pesos.</h2>
        </div>
      </a>
    
      <a href="?C=PresentsController&M=Pack3C">
        <div class="package">
          <h2>Paquete 3</h2>
          <h2>Todo en uno</h2>
          <h2>Costo: $35,000 pesos.</h2>
        </div>
      </a>
    </div>
  </div>
</body>
</html>
