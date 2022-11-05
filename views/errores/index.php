<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/endors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pages/error.css">
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-6 col-12 offset-md-3">
                <img class="img-error" src="public/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">Página no encontrada</h1>
                    <a href="<?php echo constant('URL'); ?>admin" class="btn btn-lg btn-outline-primary mt-3">Volver al inicio</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>