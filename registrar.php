<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <h3>Registro de usuario</h3>

    <a href="menu.php">Volver a menu</a>

    <form method="post" action="procesarRegistro.php"><br>
        <label>Numero de identificacion:</label>
        <input type="number" name="identificacion"><br>
        <label>Nombre:</label>
        <input type="text" name="nombre"><br>
        <label>correo_electronico:</label>
        <input type="email" name="usuario"><br>
        <label>Password:</label>
        <input type="password" name="contrasena"><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>