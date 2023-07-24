<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TECHUEJUTLA-CLIENTE</title>
    <link rel="stylesheet" href="APP/view/Style.css" />
</head>

<body>

    <header class="header">
        <nav class="navegation_bar">
            <ul>
                <li><a href="?C=UserController&M=IndexPublic" class="A">Inicio</a></li>
                <li><a href="?C=UserController&M=ServicesUsers" class = "A"> Servicios</a></li>
                <li><a href="?C=PresentsController&M=Index" class="A">solicitudes</a></li>
                <li><a href="?C=UserController&M=CloseUser" class="A">Cerrar sesión</a></li>
            </ul>
        </nav>

        <h1><img src="APP/view/TecHuejutla.png" alt="ok" class="imgh"></h1>

        <?php
        $file = "APP/models/UserModel.php";
        if (file_exists($file)) {
            require_once($file);
        } else {
            echo "Error: El archivo UserModel.php no se encontró en la ruta especificada.";
            exit;
        }

        // Aquí debes obtener el nombre del usuario de tu base de datos y almacenarlo en la variable $nombreUsuario
        if (isset($_SESSION['RFC'])) {
            $rfcSesion = $_SESSION['RFC'];
            // Aquí deberías tener un modelo y una función para obtener el nombre del usuario por el RFC
            $modelo = new UserModel();
            $user = $modelo->getById($rfcSesion);
            $nombreUsuario = ($user !== false) ? $user['Nombre'] : null;
            $Usuario = ($user !== false) ? $user['Usuario'] : null;

        } else {
            $nombreUsuario = null;
            $RFC = null;
        }

        // Mostrar el nombre del usuario si está definido, de lo contrario, mostrar la opción de inicio de sesión
        if (isset($nombreUsuario)) {
            echo '<p>¡Hola, ' . $nombreUsuario . '!</p>';
            echo '<p>Usuario: ' . $Usuario . '</p>';

        } else {
            echo '<li><a href="/?C=UserController&M=CallFormLogin">Iniciar sesión</a></li>';
        }
        ?>

    </header>

    <section class="content">
        <?php include_once($vista); ?>
    </section>

</body>

</html>