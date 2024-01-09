<?php
//valida que el usuario presiono el reCAPTCHA
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6LcCMUYmAAAAAJJULM-wg8dXIx8NnqQH39U5X8YC';

    $errors = array();

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$ip}");

    $atributos = json_decode($response, TRUE);

    if (!$atributos['success']) {
        $errors[] = 'Verifica el captcha';
    } else {
        header("Location: peli.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmHub</title>
    <link rel="icon" href="img/icono.jpg">
    <link rel="stylesheet" href="css/ofertas.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        .modal-dialog {
            max-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 0;
        }

        .modal-content {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }

        .modal-header {
            border-bottom: none;
        }
    </style>
    <script>
        function onSubmit(token) {
            document.getElementById("ver").submit();
        }

        function submitForm() {
            document.querySelector('form').submit();
        }
    </script>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img class="icono" src="img/icono.jpg" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#accion">Acción</a></li>
                                <li><a class="dropdown-item" href="#aven">Aventura</a></li>
                                <li><a class="dropdown-item" href="#beli">Bélico</a></li>
                                <li><a class="dropdown-item" href="#cien">Ciencia Ficción</a></li>
                                <li><a class="dropdown-item" href="#come">Comedia</a></li>
                                <li><a class="dropdown-item" href="#dram">Drama</a></li>
                                <li><a class="dropdown-item" href="#terr">Terror</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>
    </header>


    <section>
        <center>
            <img class="film" src="img/film.png" alt="">
        </center>
    </section>
    <br><br><br><br><br><br><br><br><br>

    <!-- Messenger Plugin de chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin de chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

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


    <!-- modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <!-- reCAPTCHA -->
                <form id="ver" action="" method="post">
                    <div class="modal-body" style="text aling-center">
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LcCMUYmAAAAAOx1Iv0iyIDlEw1R1uLoCh9jTXco"
                                data-callback="submitForm"></div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>