<?php


var_dump($_POST);

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

//Traer datos necesarios para validacion de login
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$hash_contrasena = hash('sha256', $contrasena);

//Query de consulta de usuario y password
$query = "SELECT * FROM inicio_sesion WHERE usuario = '$usuario'";
$resuldato = mysqli_query($conn, $query);
echo"Hizo query";

if (!$resuldato) {
    echo "Error en la consulta: " . mysqli_error($conn);
}

//Validacion que haya coincidencia de usuario en la base de datos
if (mysqli_num_rows($resuldato)==1) {
    $fila = mysqli_fetch_assoc($resuldato);
    echo"trajo datos";
    //si existe el usuario se valida que la contraseña sea la misma
    if ($fila['contrasena'] == $hash_contrasena) {
        session_start();
        echo "Ha hecho login exitosamente";

        //guardar en una variable superglobal el nombre del usuario para usarlo para mostrarlo en otras paginas
        $_SESSION['username1'] = $fila['nombre'];
        header ("Location: cotizacion.php");        
    }
    else {
        //Contraseña incorrecta
        echo "La contraseña es incorrecta";
        header("Location: menu.php");
    }
}
else {
    //usuario no encontrado
    echo "Usuario no encontrado por favor intente de nuevo o registrese";
    header("Location: Login.php");
}

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <a href="index.php">Ir a menu</a><br>
</body>
</html> -->