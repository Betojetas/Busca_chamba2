<?php require_once 'master_page.php'; ?>
<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Ofertas de Trabajo</title>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105574405890239");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


    <div class="container">
        <h1 class="mt-4 mb-4">Ofertas de Trabajo</h1>

        <!-- Lista de ofertas de trabajo -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Desarrollador Web</h5>
                <p class="card-text">Empresa zens busca un desarrollador web con experiencia en HTML, CSS y JavaScript.
                </p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ingeniero de Software</h5>
                <p class="card-text">Empresa TrcSoft busca un ingeniero de software con habilidades en Python y Django.
                </p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Desarrollador Frontend</h5>
                <p class="card-text">Empresa GSGH busca un desarrollador frontend con experiencia en React y Angular.
                </p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>
        <!-- Oferta para Desarrollador Full Stack -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Desarrollador Full Stack</h5>
                <p class="card-text">Startup STPM busca un desarrollador full stack con conocimientos en Node.js,
                    Express
                    y MongoDB.</p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>

        <!-- Oferta para Ingeniero de Machine Learning -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Ingeniero de Machine Learning</h5>
                <p class="card-text">Compañía de Inteligencia Artificial busca un ingeniero de machine learning con
                    experiencia en TensorFlow y Python.</p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>

        <!-- Oferta para Especialista en Seguridad Informática -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Especialista en Seguridad Informática</h5>
                <p class="card-text">Empresa de ciberseguridad busca un experto en seguridad informática con experiencia
                    en hacking ético.</p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>

        <!-- Oferta para Analista de Datos -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Analista de Datos</h5>
                <p class="card-text">Corporativo XYZ busca un analista de datos con habilidades en SQL y visualización
                    de datos.</p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>

        <!-- Oferta para Desarrollador de Entornos Virtuales -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Desarrollador de Entornos Virtuales</h5>
                <p class="card-text">Empresa de tecnologías emergentes busca un desarrollador con experiencia en
                    entornos virtuales y realidad aumentada.</p>
                <a href="#" class="btn btn-primary">Aplicar</a>
            </div>
        </div>



        <!-- Scripts de Bootstrap y jQuery (asegúrate de incluir jQuery antes de Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>