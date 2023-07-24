<?php

    class UserModel{
        //creamos un atributo para manipular los datos en la bd
        private $UserConnection;

        //definimos el contructor de la clase usermodel
        public function __construct(){
            //requiero la clase dbconnection 
            require_once('APP/config/DBConnection.php');
            //instranciamos userconnection con dbconnection 
            $this->UserConnection=new DBConnection();
        }

        //a partir de esto vienen los metodos logicos de la app

        //metodo para obtener todos los usuarios
        public function getAll()
        {
            // paso 1: Crear la consulta utilizando el procedimiento almacenado
            $sql = "CALL ObtenerUsuarios()";
            // paso 2: Ejecutar la consulta
            $connection = $this->UserConnection->getconnection();
        
            $result = $connection->query($sql);
        
            $users = array();
            while ($user = $result->fetch_assoc()) {
                $users[] = $user;
            }
        
            $this->UserConnection->closeConection();
        
            return $users;
        }

    


// getById: método que extrae un usuario por su RFC (id)
public function getById($id)
{
    // Obtenemos la conexión
    $connection = $this->UserConnection->getConnection();

    // Verificamos que el ID sea válido antes de continuar
    if (strlen($id) !== 13 || !ctype_alnum($id)) {
        // Si el ID no es válido (no tiene 13 caracteres alfanuméricos), retornamos false indicando que no se encontró el usuario
        return false;
    }

    // Preparamos la llamada al procedimiento almacenado
    $stmt = $connection->prepare("CALL ObtenerUsuarioPorRFC(?)");
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


// getCredentials: método para verificar las credenciales de inicio de sesión
public function getCredentials($us, $ps)
{
    // Paso 1: Obtenemos la conexión
    $connection = $this->UserConnection->getConnection();

    // Paso 2: Preparamos la llamada al procedimiento almacenado
    $stmt = $connection->prepare("CALL ObtenerUsuarioPorCredenciales(?, ?)");
    $stmt->bind_param("ss", $us, $ps); // Ligamos los parámetros de entrada

    // Paso 3: Ejecutamos el procedimiento almacenado
    $stmt->execute();

    // Paso 4: Obtenemos el resultado
    $result = $stmt->get_result();

    // Paso 5: Verificamos si se obtuvieron resultados y los almacenamos en una variable
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $user = false;
    }

    // Paso 6: Cerramos la conexión y liberamos recursos
    $stmt->close();
    $connection->close();

    // Paso 7: Retornamos el resultado
    return $user;
}


      // Método para insertar usuarios
public function insertUser($user)
{
    // Paso 1: Conectamos a la base de datos
    $connection = $this->UserConnection->getConnection();

    // Paso 2: Preparamos la llamada al procedimiento almacenado
    $stmt = $connection->prepare("CALL CrearUsuario ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssssssss",
        $user['RFC'],
        $user['Nombre'],
        $user['APaterno'],
        $user['ApMaterno'],
        $user['Usuario'],
        $user['Contraseña'],
        $user['Email'],
        $user['Telefono'],
        $user['Avatar']
    );

    // Paso 3: Ejecutamos el procedimiento almacenado
    $stmt->execute();

    // Paso 4: Obtenemos el resultado
    $result = $stmt->affected_rows > 0;

    // Paso 5: Cerramos la conexión y liberamos recursos
    $stmt->close();
    $connection->close();

    // Paso 6: Retornamos el resultado
    return $result;
}

public function insertUserAdmin($user)
{
    // Paso 1: Conectamos a la base de datos
    $connection = $this->UserConnection->getConnection();

    // Paso 2: Preparamos la llamada al procedimiento almacenado
    $stmt = $connection->prepare("CALL CrearUsuarioAdmin ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssssssss",
        $user['RFC'],
        $user['Nombre'],
        $user['APaterno'],
        $user['ApMaterno'],
        $user['Usuario'],
        $user['Contraseña'],
        $user['Email'],
        $user['Telefono'],
        $user['Avatar']
    );

    // Paso 3: Ejecutamos el procedimiento almacenado
    $stmt->execute();

    // Paso 4: Obtenemos el resultado
    $result = $stmt->affected_rows > 0;

    // Paso 5: Cerramos la conexión y liberamos recursos
    $stmt->close();
    $connection->close();

    // Paso 6: Retornamos el resultado
    return $result;
}

// updateUser: método para editar usuarios
public function updateUser($user)
{
    // Paso 1: Obtener la conexión
    $connection = $this->UserConnection->getConnection();

    // Paso 2: Preparar la llamada al procedimiento almacenado
    $stmt = $connection->prepare("CALL ActualizarUsuario(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", 
    $user['RFC'],
    $user['Usuario'],
    $user['Contraseña'],
    $user['Email'],
    $user['Telefono']
);
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





        //metodo para eliminar usuarios
        //metodo para eliminar un usuario por su ID
        public function delete($id)
{
    // Paso 1: Obtener la conexión
    $connection = $this->UserConnection->getConnection();

    // Paso 2: Preparar la llamada al procedimiento almacenado
    $stmt = $connection->prepare("CALL EliminarUsuario(?)");
    $stmt->bind_param("s", $id);

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