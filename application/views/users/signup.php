<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm p-0 d-flex justify-content-center align-items-center flex-column">

        <h1 class="mt-5">Registrate</h1>
        <div class="p-4 w-75">
            <?php echo form_open(""); ?>

            <div class="form-group">
                <?php
                echo form_label("Name", "name");
                $input = array(
                    "name" => "name",
                    "value" => "$name",
                    "class" => "form-control input-lg",
                );
                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label("Lastname", "lastname");
                $input = array(
                    "name" => "lastname",
                    "value" => "$lastname",
                    "type" => "lastname",
                    "class" => "form-control input-lg",
                );
                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label("Email", "email");
                $input = array(
                    "name" => "email",
                    "value" => "$email",
                    "type" => "email",
                    "class" => "form-control input-lg",
                );
                echo form_input($input);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label("Password", "password");
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
            echo form_submit("submit", "Registrarme", "class='btn btn-primary w-100'");
            ?>
            <?php echo form_close(); ?>
            <p class="mt-2 text-center"> Ya tienes cuenta? <a href="login">Inicia Sesión</a></p>

            <?php if ($message) { ?>
                <div class="alert alert-danger mt-5 font-weight-bold" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php } ?>

            <?php if ($success) { ?>
                <div class="alert alert-success mt-5 font-weight-bold" role="alert">
                    <?php echo $success; ?>
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