<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background: linear-gradient(to right, white 50%, paleturquoise 50%);
        }

        .container {
            margin: auto;
            max-width: 400px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Usuarios</h2>

        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="contratador">Contratador</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>

            <button name="seleccionar" class="btn btn-primary">Guardar</button>
            <a href="login.php">
                Inicia sesión
            </a>
        </form>
    </div>

    <?php
    if (isset($_POST['seleccionar'])) {
        // Recuperar los valores del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];

        // Aquí debes realizar la inserción en la base de datos con los valores obtenidos
    
        // Redireccionar a la página correspondiente
        if ($rol == 'empleado') {
            header("Location: register_empleado.php?nombre=$nombre&email=$email&contrasena=$contrasena&rol=$rol");
            exit();
        } elseif ($rol == 'contratador') {
            header("Location: register_contratador.php?nombre=$nombre&email=$email&contrasena=$contrasena&rol=$rol");
            exit();
        }
    }
    ?>


    <!-- Incluye los scripts de Bootstrap al final del documento -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>