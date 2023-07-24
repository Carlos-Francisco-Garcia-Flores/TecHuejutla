<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenidos a TecHuejutla</title>
    <link rel="stylesheet" href="APP/view/Style.css" />
  </head>
  <body>

  
    <header class="header">
    <nav class="navegation_bar">
    <ul>

    <li><a href="?C=UserController&M=Indexunlogin" class = "A">Inicio</a></li>
    <li><a href="?C=UserController&M=Services" class = "A"> Quienes somos</a></li>
    <li><a href="?C=UserController&M=CallFormLogin" class = "A">Iniciar sesion</a></li>
    <li><a href="?C=UserController&M=CallFormAddUser" class = "A"> Crear usuario</a></li>
        </ul>

      </nav>

      <h1>    <img src="APP/view/TecHuejutla.png" alt = "ok" class="imgh"></a></h1>

    </header>
    <section class="content">
      <?php include_once($vista); ?>
    </section>

  </body>
</html>