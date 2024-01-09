<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        img {
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <center>
            <img src="data:image/jpeg;base64,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"
                alt="">

            <h5 class="mb-4">Inicio de Sesión</h5>
        </center>
        <form method="post">
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>

            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="6LcCMUYmAAAAAOx1Iv0iyIDlEw1R1uLoCh9jTXco"
                    data-callback="submitForm"></div>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>

            <a href="register.php">Registrarte</a>
        </form>
    </div>
    <!-- Agrega el enlace al archivo JS de Bootstrap y a jQuery (necesario para Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6LcCMUYmAAAAAJJULM-wg8dXIx8NnqQH39U5X8YC';

    $errors = array();

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$ip}");

    $atributos = json_decode($response, TRUE);

    if (!$atributos['success']) {
        $errors[] = 'Verifica el captcha';
        header("location:login.html?mensaje=Verifica el captcha");
        exit();
    }

    // Si el reCAPTCHA es válido, procede con la autenticación del usuario
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = $pdo->prepare('SELECT * from usuarios WHERE email=:email AND contrasena=:contrasena');
    $sql->bindParam(':email', $email);
    $sql->bindParam(':contrasena', $contrasena);
    $sql->execute();
    $count = $sql->rowCount();

    if ($count === 1) {
        $query = $pdo->prepare('SELECT * from usuarios WHERE email=:email');
        $query->bindParam(':email', $email);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $rol = $row['rol'];
        $id_usuario = $row['id'];
        $nombre = $row['nombre'];

        if ($rol == "contratador") {
            $_SESSION['id'] = $id_usuario;
            $_SESSION['roles'] = $rol;
            $_SESSION['nombre'] = $nombre;
            echo "<script>window.location='contratador_home.php'</script>";


            $ip = $_SERVER["REMOTE_ADDR"];
            $captcha = $_POST['g-recaptcha-response'];
            $secretKey = '6LcCMUYmAAAAAJJULM-wg8dXIx8NnqQH39U5X8YC';

            $errors = array();

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$ip}");

            $atributos = json_decode($response, TRUE);

            if (!$atributos['success']) {
                $errors[] = 'Verifica el captcha';
            } else {
                header("Location: login.php");
                exit();
            }
        } else if ($rol == "empleado") {
            $_SESSION['id'] = $id_usuario;
            $_SESSION['roles'] = $rol;
            $_SESSION['nombre'] = $nombre;
            echo "<script>window.location='epleado_home.php'</script>";
        }
        exit;
    } else {

        header("location:login.php?mensaje=Correo o contraseña incorrectos");
    }
}

?>

<?php ob_start(); ?>
<?php ob_end_flush(); ?>