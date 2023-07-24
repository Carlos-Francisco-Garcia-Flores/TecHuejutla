<?php

require_once("APP/models/RequestModel.php");
require_once("APP/models/TypeClientModel.php");

class PresentsController
{
    private $vista;
    private $modelo;

    public function index()
    {
        session_start();
        $vista = "APP/view/Public/Presents/IndexRequestView.php";
        include_once("APP/view/Public/IndexPublicview.php");

    }
    public function IndexAdmin()
    {
        // en el index vamos a mostrar una tabla con todos los usuarios
        $modelo = new RequestModel();
        $datos = $modelo->getAllSolicitudes();
    session_start();
    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
        $vista = "APP/view/Admin/Request/RequestAdminView.php";
        include_once("APP/view/Admin/AdmiviewIndex.php");
    } else {
        $vista = "APP/view/Admin/Request/RequestAdminView.php";
        include_once("APP/view/Admin/AdmiviewIndex.php");
    }
}
    public function Solicitud()
    {
        $modelo = new TypeClientModel();
        $tiposClientes = $modelo->getAllTypeClients();
        session_start();
        $vista = "APP/view/Public/Presents/RequestView.php";
        include_once("APP/view/Public/IndexPublicview.php");

    }
    public function Pack1()
    {

        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Pack1.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Pack1.php";
            include_once("APP/view/Public/PlantillaAdminView.php");        }


    }
    public function Pack2()
    {

        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Pack2.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Pack2.php";
            include_once("APP/view/Public/PlantillaAdminView.php");        }


    }
    public function Pack3()
    {

        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Pack3.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Pack3.php";
            include_once("APP/view/Public/PlantillaAdminView.php");        }


    }
    public function Pack1C()
    {

        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Pack1.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Pack1.php";
            include_once("APP/view/Public/IndexPublicview.php");


    }
}
    public function Pack2C()
    {

        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Pack2.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Pack2.php";
            include_once("APP/view/Public/IndexPublicview.php");


    }
}
    public function Pack3C()
    {

        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "APP/view/Public/Pack3.php";
            include_once("APP/view/Public/IndexPublicview.php");
        } else {
            $vista = "APP/view/Public/Pack3.php";
            include_once("APP/view/Public/IndexPublicview.php");


    }
}

    public function CallFormAddRequestAdmin()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista ="APP/view/Admin/Users/RequestAdminView.php";
            include_once("APP/view/Admin/AdmiviewIndex.php");
        } else {
            $vista ="APP/view/Admin/Users/RequestAdminView.php";
            include_once("APP/view/Admin/AdmiviewIndex.php");
        }
    }

    public function AddSolicitud()
    {

        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            session_start();
            $RFC = $_SESSION['RFC'];
            $datos = array(
                'Solicitud' => $_POST['solicitud'],
                'TipoCliente' => $_POST['tipocliente'],
                'TipoPaquete' => $_POST['tipoPaquete'],
                'MetodoPago' => $_POST['metodoPago'],
                'Financiamiento' => $_POST['financiamiento'],
                'Usuario' => $RFC // Usar el RFC del usuario logueado en el arreglo
            );

            //llamamos al metodo del modelo que agrega la solicitud a la base de datos
            $modelo = new RequestModel();
            $res = $modelo->insertRequest($datos);
            //redireccionamos al index de usuarios
            header("Location:?C=UserController&M=IndexPublic");
        }
    }

    public function Delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            session_start();

            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            $this->modelo = new RequestModel();
            $usuario = $this->modelo->getById($id);
            $modelo = new RequestModel();
            $modelo->deleteRequest($id);

            // Redireccionamos al índice de usuarios después de la eliminación
            header("Location: ?C=PresentsController&M=IndexAdmin");

        
            }
         }
}
?>
