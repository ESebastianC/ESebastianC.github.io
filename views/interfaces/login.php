<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="login.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inciosesion</title>
</head>
<body>
<form action="../Models/controlador.php" method="post">
<h2>Iniciar Sesión</h2>

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required> <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required> <br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>