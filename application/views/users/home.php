<?php
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm pt-4 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="">Bienvenid@ <?= $name ?></h1>
            <a href="logOut" class="">Cerrar Sesión</a>
        </div>
        <div id="form-view">
            <form id="create-form" class="d-flex flex-column w-100 mt-3 mb-3">
                <input type="text" id="content" placeholder="Ingresa una nueva nota" class="w-100 mb-2 pt-4 pb-4 pr-3 pl-3 form-control" required>
                <div class="d-flex">
                    <input type="date" id="creation-date" class="w-75 mr-2 pt-4 pb-4 pr-3 pl-3 form-control" required>
                    <button class="btn btn-primary w-25">Crear</button>
                </div>
            </form>
        </div>
        <div id="message-success" class="alert alert-success mt-5 mb-5 font-weight-bold d-none" role="alert"></div>
        <div id="message-error" class="alert alert-warning mt-5 mb-5 font-weight-bold d-none" role="alert"></div>
        <div id="notes">
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="<?= base_url("assets/js/main.js") ?>"></script>
    </div>
</body>

</html>