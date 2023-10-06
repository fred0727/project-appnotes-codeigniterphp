<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm p-0">
        <div class="w-100"><img src="<?php echo base_url() . 'assets/images/portada.webp' ?>" alt="" class="w-100 pb-4"></div>
        <div class="container-sm p-4">
            <?php echo form_open(""); ?>

            <div class="form-group">
                <?php
                echo form_label("Email", "email");
                $input = array(
                    "name" => "email",
                    "value" => "$email",
                    "class" => "form-control input-lg",
                );
                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label("Password", "Password");
                $input = array(
                    "name" => "password",
                    "value" => "$password",
                    "type" => "password",
                    "class" => "form-control input-lg",
                );
                echo form_input($input);
                ?>
            </div>
            <?php
            echo form_submit("submit", "Iniciar Sesion", "class='btn btn-primary w-100'");
            ?>
            <?php echo form_close(); ?>

            <div class="mt-2">
                <span>¿No tienes cuenta?</span>
                <a href="signup">Registrate</a>
            </div>

            <?php if ($message) { ?>
                <div class="alert alert-warning mt-5 font-weight-bold" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php } ?>

            <?php if (validation_errors() != "") : ?>
                <div class="alert alert-warning mt-5 font-weight-bold" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>

</html>