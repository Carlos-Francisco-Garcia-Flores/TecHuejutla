<?php
require_once("APP/models/UserModel.php");

class UserController
{
    private $vista;
    private $modelo;
    
    public function Index()
    {
        // en el index vamos a mostrar una tabla con todos los usuarios
        $modelo = new UserModel();
        $datos = $modelo->getAll();
    session_start();
    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
        $vista = "APP/view/Admin/Users/IndexUserView.php";
        include_once("APP/view/Admin/AdmiviewIndex.php");
    } else {
        $vista = "APP/view/Admin/Users/IndexUserView.php";
        include_once("APP/view/Admin/AdmiviewIndex.php");
    }
}

    public function IndexPublic()
    {
        session_start();
        $vista = "APP/view/Public/IndexAdminView.php";
        include_once("APP/view/Public/IndexPublicview.php");

    }

    public function Indexunlogin()
    {
        $vista = "APP/view/Public/IndexAdminView.php";
        include_once("APP/view/Public/PlantillaAdminView.php");

    }


    public function Services()
    {
            $vista = "APP/view/Public/ServicesVIew.php";
            include_once("APP/view/Public/PlantillaAdminView.php");

    }
    public function ServicesUsers()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/ServicesVIewUser.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/ServicesVIewUser.php";
            include_once("APP/view/Public/IndexPublicview.php");
        }
    }

    public function CallFormLogin()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Users/LoginView.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Users/LoginView.php";
            include_once("APP/view/Public/PlantillaAdminView.php");
        }
    }

    public function CallFormAddUser()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Users/AddUserView.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Users/AddUserView.php";
            include_once("APP/view/Public/PlantillaAdminView.php");
        }
    }
    
    public function CallFormAddUsAdmin()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista ="APP/view/Admin/Users/AddUSAD.php";
            include_once("APP/view/Admin/AdmiviewIndex.php");
        } else {
            $vista ="APP/view/Admin/Users/AddUSAD.php";
            include_once("APP/view/Admin/AdmiviewIndex.php");
        }
    }

    



    public function Login()
    {
        session_start();
        $modelo = new UserModel();
        $usuario = $modelo->getCredentials($_POST['user'], $_POST['password']);

        if ($usuario == false) {
            // Llamar a una pantalla de error
            $vista = "APP/view/Public/ErrorAdminView.php";
        } else {
            // Agregamos variables de sesión
            $_SESSION['RFC'] = $usuario['RFC'];

            // Obtener el valor de FK_TipoUsuario
            $FK_TipoUsuario = $usuario['FK_TipoUsuario'];

            // Redirigir según el valor de FK_TipoUsuario
            if ($FK_TipoUsuario == 1) {
                $vista = "APP/view/Public/IndexAdminView.php";
                include_once("APP/view/Public/IndexPublicview.php");
            } elseif ($FK_TipoUsuario == 2) {
                $vista = "APP/view/Admin/AdminViewInfo.php";
                include_once("APP/view/Admin/AdmiviewIndex.php");
            } else {
                // En caso de que el valor no sea 1 ni 2, puedes hacer otra redirección o mostrar un error adecuado.
                // Por ejemplo:
                $vista = "APP/view/Public/ErrorAdminView.php";
            }
        }

        // Finalmente, incluimos la vista seleccionada
        include_once($vista);
    }



    //creamos el metodo para agregar un usuario
    public function Add()
    {
        // Verificamos si el método de envío de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'RFC' => $_POST['rfc'],
                'Nombre' => $_POST['nombre'],
                'APaterno' => $_POST['apaterno'],
                'ApMaterno' => $_POST['amaterno'],
                'Usuario' => $_POST['user'],
                'Contraseña' => $_POST['password'],
                'Email' => $_POST['email'],
                'Telefono' => $_POST['tel']
            );

            // Comenzamos a procesar la imagen 
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                // Obtenemos la información necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['avatar']['name'];
                $tipoArchivo = $_FILES['avatar']['type'];
                $tamanoArchivo = $_FILES['avatar']['size'];
                $rutaTemporal = $_FILES['avatar']['tmp_name'];

                // Validamos que tipo de imagen podemos subir
                $extensiones = array('jpg', 'jpeg', 'png');
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extension, $extensiones)) {
                    echo "Formato de archivo no válido";
                    exit;
                }

                // Validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "El tamaño ha excedido el tamaño máximo";
                    exit;
                }

                // Generamos el nombre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extension;
                $rutaDestino = "APP/src/Img/avatars/" . $nombreArchivo;

                // Copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }

                // Leemos el contenido del archivo como BLOB
                $contenidoArchivo = file_get_contents($rutaDestino);
                $datos['Avatar'] = $contenidoArchivo;
            }

            // Llamamos al método del modelo que agrega al usuario a la base de datos
            $modelo = new UserModel();
            $res = $modelo->insertUser($datos);

            // Redireccionamos al index de usuarios
            header("Location: ?C=UserController&M=Indexunlogin");
        }
    }

    public function AddAdmin()
    {
        session_start();

        // Verificamos si el método de envío de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'RFC' => $_POST['rfc'],
                'Nombre' => $_POST['nombre'],
                'APaterno' => $_POST['apaterno'],
                'ApMaterno' => $_POST['amaterno'],
                'Usuario' => $_POST['user'],
                'Contraseña' => $_POST['password'],
                'Email' => $_POST['email'],
                'Telefono' => $_POST['tel']
            );

            // Comenzamos a procesar la imagen 
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                // Obtenemos la información necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['avatar']['name'];
                $tipoArchivo = $_FILES['avatar']['type'];
                $tamanoArchivo = $_FILES['avatar']['size'];
                $rutaTemporal = $_FILES['avatar']['tmp_name'];

                // Validamos que tipo de imagen podemos subir
                $extensiones = array('jpg', 'jpeg', 'png');
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extension, $extensiones)) {
                    echo "Formato de archivo no válido";
                    exit;
                }

                // Validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "El tamaño ha excedido el tamaño máximo";
                    exit;
                }

                // Generamos el nombre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extension;
                $rutaDestino = "APP/src/img/avatars/" . $nombreArchivo;

                // Copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }

                // Leemos el contenido del archivo como BLOB
                $contenidoArchivo = file_get_contents($rutaDestino);
                $datos['Avatar'] = $contenidoArchivo;
            }

            // Llamamos al método del modelo que agrega al usuario a la base de datos
            $modelo = new UserModel();
            $res = $modelo->insertUserAdmin($datos);

            // Redireccionamos al index de usuarios
            header("Location: ?C=UserController&M=Index");
        }
    }

    //Creamos el metodo para llamar a la vista de editar usuario
    public function CallFormEdit()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a editar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que obtiene los datos del usuario a editar
            $modelo = new UserModel();
            $datos = $modelo->getById($id);
            //llamamos a la vista de editar usuario
            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $vista ="APP/view/Admin/Users/EditUserView.php";
            include_once("APP/view/Admin/AdmiviewIndex.php");
            } else {
                $vista ="APP/view/Admin/Users/EditUserView.php";
            include_once("APP/view/Admin/AdmiviewIndex.php");
            }
        }
    }
 
    public function Edit()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $user = array(
            'RFC' =>  $_POST['id'],
            'Usuario' => $_POST['newUser'],
            'Contraseña' => $_POST['newPassword'], 
            'Email' => $_POST['newEmail'],
            'Telefono' => $_POST['newTelefono']
        );

        // Llamar al método del modelo para actualizar los datos

        $modelo = new UserModel();
        $modelo->updateUser($user);

        // Redireccionar al index de usuarios
        header("Location: ?C=UserController&M=index");
    }
}



    //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
    //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript

    
    public function Delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            session_start();

            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            $this->modelo = new UserModel();
            $usuario = $this->modelo->getById($id);
            $modelo = new UserModel();
            $modelo->delete($id);

            // Redireccionamos al índice de usuarios después de la eliminación
            header("Location: ?C=UserController&M=index");

        
            }
         }
         public function CloseUser(){
             // Cerrar la sesión
            session_unset();
            session_destroy();
            header("Location: ?C=UserController&M=Indexunlogin");

         }

         
}


?>