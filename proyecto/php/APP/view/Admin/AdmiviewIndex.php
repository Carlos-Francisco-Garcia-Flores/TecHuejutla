<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHUEJUTLA-ADMIN</title>
    <link rel="stylesheet" href="APP/view/Style.css" />
  </head>
  <body>

  
    <header class="header">
    <nav class="navegation_bar">
    <ul>
          <li><a href="?C=UserController&M=Index" class = "A">Usuarios</a></li>
          <li><a href="?C=PresentsController&M=IndexAdmin" class = "A">solicitudes</a></li>
          <li><a href="?C=TypeClientController&M=indexTC" class = "A">Tipos Clientes</a></li>
          <li><a href="?C=UserController&M=CloseUser" class = "A">Cerrar sesion</a></li>

          
        </ul>

      </nav>

      <h1>TECHUEJUTLA</h1>
      <h1>ADMIN</h1>

    </header>
    <section class="content">
      <?php include_once($vista); ?>
    </section>

  </body>
</html>
