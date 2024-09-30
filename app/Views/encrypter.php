<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Encriptador de Texto</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <section class="content-section bg-primary text-white" id="start">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">¡ Bienvenido <?php echo ($user['user']['username']); ?> !</h2>
            <div class="container">
                <div class="form-group">
                    <textarea
                        name="texto"
                        class="form-control sm-2"
                        id="texto"
                        cols="30"
                        rows="10"
                        placeholder="Ingresa el texto aquí"></textarea>

                    <div class="mb-4">
                        <p>Solo letras minúsculas y sin acentos.</p>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-xl btn-light me-4" type="button" onclick="encriptar()">
                            Encriptar
                        </button>
                        <input
                            type="button"
                            class="btn btn-xl btn-dark"
                            value="Desencriptar"
                            onclick="desencriptar()" />
                    </div>
                    <div class="mb-4" id="mensaje-encriptado">
                        <h2 id="titulo-mensaje">Ningún mensaje fue encontrado</h2>
                        <p id="parrafo">
                            Ingresa el texto que deseas encriptar o desencriptar
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="js/index.js"></script>

</html>