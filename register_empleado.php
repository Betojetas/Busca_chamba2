<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empleadores</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Empleadores</h2>

        <form method="post">

            <div class="form-group">
                <label for="nombre_empresa">Nombre de la Empresa:</label>
                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
            </div>

            <div class="form-group">
                <label for="industria">Industria:</label>
                <input type="text" class="form-control" id="industria" name="industria">
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
            </div>

            <button type="submit" name="registrar" class="btn btn-primary">Enviar</button>
        </form>
    </div>


    <?php
    // Tu código de conexión a la base de datos aquí
    require_once('conexion.php');
    if (isset($_POST["registrar"])) {
        // Obtener los datos del formulario
        $nombreEmpresa = $_POST['nombre_empresa'];
        $industria = $_POST['industria'];
        $ubicacion = $_POST['ubicacion'];
        $descripcion = $_POST['descripcion'];
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];
        $contrasena = $_GET['contrasena'];
        $rol = $_GET['rol'];

        try {
            // Iniciar una transacción para asegurar la consistencia de los datos en ambas tablas
            $pdo->beginTransaction();

            // Insertar en la tabla Usuarios
            $stmtUsuarios = $pdo->prepare("INSERT INTO Usuarios (nombre, email, contrasena, rol) VALUES (?, ?, ?, ?)");
            $stmtUsuarios->execute([$nombre, $email, $contrasena, $rol]);

            // Obtener el ID recién insertado
            $idUsuario = $pdo->lastInsertId();

            // Insertar en la tabla Empleadores
            $stmtEmpleadores = $pdo->prepare("INSERT INTO Empleadores (id, nombre_empresa, industria, ubicacion, descripcion) VALUES (?, ?, ?, ?, ?)");
            $stmtEmpleadores->execute([$idUsuario, $nombreEmpresa, $industria, $ubicacion, $descripcion]);

            // Confirmar la transacción
            $pdo->commit();

            header("location:index.php");
        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $pdo->rollBack();
            echo "Error en el registro: " . $e->getMessage();
        }
    }
    ?>


    <!-- Agrega el enlace al archivo JS de Bootstrap y a jQuery (necesario para Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>