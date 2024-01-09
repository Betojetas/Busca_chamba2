<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Candidatos</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Candidatos</h2>

        <form method="post">
            <div class="form-group">
                <label for="experiencia_laboral">Experiencia Laboral:</label>
                <textarea class="form-control" id="experiencia_laboral" name="experiencia_laboral" rows="4"
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="educacion">Educación:</label>
                <textarea class="form-control" id="educacion" name="educacion" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="habilidades">Habilidades:</label>
                <textarea class="form-control" id="habilidades" name="habilidades" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="resumen">Resumen:</label>
                <textarea class="form-control" id="resumen" name="resumen" rows="4" required></textarea>
            </div>

            <button type="submit" name="registrar" class="btn btn-primary">Enviar</button>
        </form>
    </div>


    <?php
    // Tu código de conexión a la base de datos aquí
    require_once('conexion.php');
    if (isset($_POST["registrar"])) {
        // Obtener los datos del formulario
        $experienciaLaboral = $_POST['experiencia_laboral'];
        $educacion = $_POST['educacion'];
        $habilidades = $_POST['habilidades'];
        $resumen = $_POST['resumen'];
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

            // Insertar en la tabla Candidatos
            $stmtCandidatos = $pdo->prepare("INSERT INTO Candidatos (id, experiencia_laboral, educacion, habilidades, resumen) VALUES (?, ?, ?, ?, ?)");
            $stmtCandidatos->execute([$idUsuario, $experienciaLaboral, $educacion, $habilidades, $resumen]);

            // Confirmar la transacción
            $pdo->commit();


            header("location:login.php");
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