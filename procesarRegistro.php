<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <a href="login.php">Ir a login</a><br>
</body>
</html>

<?php

//Datos de conexion a DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pru_productos";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$identificacion = $_POST['identificacion'];
$usuario = $_POST["usuario"];
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];


//Validar que no esten registrados
$query_identificacion = "SELECT * FROM inicio_sesion WHERE identificacion = '$identificacion'";
$result_consulta_ident = mysqli_query($conn, $query_identificacion);

if (mysqli_num_rows($result_consulta_ident)>0) {
    echo "El numero de identificacón ya existe";
}
else{
    //Verificar correo electronico como usuario
    $query_email = "SELECT * FROM inicio_sesion WHERE usuario = '$usuario'";
    $resul_consulta_email = mysqli_query($conn, $query_email);

    if (mysqli_num_rows($resul_consulta_email)>0) {
        echo "El email ya esta registrado";
    }
    else{
       // Inserta los datos en la tabla
        $sql = "INSERT INTO inicio_sesion (identificacion, usuario, nombre, contrasena) VALUES ('$identificacion', '$usuario','$nombre', SHA2 ('$contrasena', 256))";

        if ($conn->query($sql) === TRUE) {
            echo "Datos insertados correctamente";
        } 
        else {
            echo "Error al insertar los datos: " . $conn->error;
        } 
    }
}

$conn->close();

?>


