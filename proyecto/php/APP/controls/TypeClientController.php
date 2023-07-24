<?php

require_once("APP/models/TypeClientModel.php");
class TypeClientController
{
    private $vista;
    private $modelo;

    public function indexTC()
    {
        // en el index vamos a mostrar una tabla con todos los usuarios
        $modelo = new TypeClientModel();
        $datos = $modelo->getAllTypeClients();
    session_start();
    if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
        $vista = "APP/view/Admin/TypeClient/TypeCAndminview.php";
        include_once("APP/view/Admin/AdmiviewIndex.php");
    } else {
        $vista = "APP/view/Admin/TypeClient/TypeCAndminview.php";
        include_once("APP/view/Admin/AdmiviewIndex.php");
    }
}
public function CallAddTypeClient()
{
    session_start();
    $vista = "APP/view/Admin/TypeClient/TypeCAdd.php";
    include_once("APP/view/Admin/AdmiviewIndex.php");

}
    public function AddTC()
    {

        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            session_start();
            $datos = array(
                'ID_TC' => $_POST['Id_TC'],
                'NuevoCliente' => $_POST['TipoC']
            );

            //llamamos al metodo del modelo que agrega la solicitud a la base de datos
            $modelo = new TypeClientModel();
            $res = $modelo->insertTypeC($datos);
            //redireccionamos al index de usuarios
            header("Location:?C=TypeClientController&M=indexTC");
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
            $this->modelo = new TypeClientModel();
            $usuario = $this->modelo->getById($id);
            $modelo = new TypeClientModel();
            $modelo->deleteTypeC($id);

            // Redireccionamos al índice de usuarios después de la eliminación
            header("Location:?C=TypeClientController&M=indexTC");

        
            }
         }

         
}
?>
