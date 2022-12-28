<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewAlumnos</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>

    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">NUEVO USUARIO</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-5 g-4">
        <div class="col">
            <div class="card">
            <a href="<?php echo constant('URL'); ?>Newusuario/new">
                <img src="<?php echo constant('URL'); ?>public/assets/images/avatar/colegial.png" class="card-img-top p-4" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Alumnos</h5>
                </div>
                </a>
            </div>
        </div>

        <div class="col">
            <div class="card">
            <a href="<?php echo constant('URL'); ?>Newusuario/newM"> 
                <img src="<?php echo constant('URL'); ?>public/assets/images/avatar/maestro.png" class="card-img-top p-4" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Maestro</h5>
                </div>
                </a>
            </div>
        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>