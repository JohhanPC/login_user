<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>Pagina para login</h1>

    <form action="procLogUser.php" method="post">
        <div>
            <label for="usuario">Correo electrónico:</label>
            <input type="email" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>
        <button type="submit">Iniciar sesión</button>
    </form>

    <div>
        <a href="menu.php"><h4>Volver a menu de registro</h4></a>
    </div>
</body>


</html>