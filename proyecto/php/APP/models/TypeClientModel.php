<?php
class TypeClientModel
{
    //creamos un atributo para manipular los datos en la bd
    private $TypeCConnection;

    //definimos el contructor de la clase TypeClientModel
    public function __construct()
    {
        //requiero la clase dbconnection 
        require_once('APP/config/DBConnection.php');
        //instranciamos TypeCConnection con dbconnection 
        $this->TypeCConnection = new DBConnection();
    }

    //a partir de esto vienen los metodos logicos de la app

    //metodo para obtener todas las solicitudes

    public function getAllTypeClients()
    {
        // paso 1: Crear la consulta utilizando el procedimiento almacenado
        $sql = "CALL ObtenerTiposCliente()";
        // paso 2: Ejecutar la consulta
        $connection = $this->TypeCConnection->getconnection();

        $result = $connection->query($sql);

        $users = array();
        while ($user = $result->fetch_assoc()) {
            $users[] = $user;
        }

        $this->TypeCConnection->closeConection();

        return $users;
    }

    //getById metodo que extrae una solicitud por su id
    public function getById($id)
    {
        // Obtenemos la conexión
        $connection = $this->TypeCConnection->getConnection();

        // Verificamos que el ID sea válido antes de continuar
        if (strlen($id) !== 13 || !ctype_alnum($id)) {
            // Si el ID no es válido (no tiene 13 caracteres alfanuméricos), retornamos false indicando que no se encontró el usuario
            return false;
        }

        // Preparamos la llamada al procedimiento almacenado
        $stmt = $connection->prepare("CALL ObtenerTiposClienteID(?)");
        $stmt->bind_param("s", $id); // Ligamos el parámetro de entrada

        // Ejecutamos el procedimiento almacenado
        if (!$stmt->execute()) {
            // Si hay un error al ejecutar el procedimiento almacenado, retornamos false
            $stmt->close();
            $connection->close();
            return false;
        }

        // Obtenemos el resultado
        $result = $stmt->get_result();

        // Verificamos si se obtuvieron resultados y los almacenamos en una variable
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            $user = false;
        }

        // Cerramos el statement y la conexión
        $stmt->close();
        $connection->close();

        // Retornamos el resultado
        return $user;
    }


    //metodo para insertar Solicitudes
    public function insertTypeC($user)
    {
        // Paso 1: Creamos la consulta con los valores directamente en la cadena
        $sql = "CALL 	InsertarTiposCliente('" . $user['ID_TC'] . "', '" . $user['NuevoCliente'] . "')";

        // Paso 2: Conectamos a la base de datos
        $connection = $this->TypeCConnection->getConnection();

        // Paso 3: Ejecutamos la consulta directamente
        $result = $connection->query($sql);

        // Paso 4: Verificamos si la consulta fue exitosa
        if (!$result) {
            // Si la consulta falla, retornamos false
            return false;
        }

        // Paso 5: Preparamos la respuesta
        $res = ($connection->affected_rows > 0);

        // Paso 6: Cerramos la conexión
        $connection->close();

        // Paso 7: Retornamos el resultado
        return $res;
    }





    //metodo para eliminar una solicitud
    //metodo para eliminar una solicitud por su ID

    public function deleteTypeC($id)
    {
        // Paso 1: Obtener la conexión
        $connection = $this->TypeCConnection->getConnection();

        // Paso 2: Preparar la llamada al procedimiento almacenado
        $stmt = $connection->prepare("CALL EliminarTipoCliente(?)");
        $stmt->bind_param("i", $id);

        // Paso 3: Ejecutar el procedimiento almacenado
        $stmt->execute();

        // Paso 4: Obtener el resultado
        $result = $stmt->affected_rows > 0;

        // Paso 5: Cerrar la conexión y liberar recursos
        $stmt->close();
        $connection->close();

        // Paso 6: Retornar el resultado
        return $result;
    }


}
?>