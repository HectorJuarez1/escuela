<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Maestro</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php $this->showMessages(); ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ASIGNAR MAESTROS</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($this->varTodas as $row) {
                $grados = new varTodas();
                $grados = $row;
            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Grado</h5>
                            <p class="card-text"><?php echo $grados->nombre_grado; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <?php
                                    if ($grados->estatus_grados_id == 100) {
                                        echo '  <span class="badge bg-success">Activo</span>';
                                    } elseif ($grados->estatus_grados_id == 103) {
                                        echo '<span class="badge bg-danger">Inactivo</span>';
                                    }
                                    ?>
                            </div>
                            <a href="<?php echo constant('URL') . 'profesormateria/AgregarM/' . $grados->grado_id ?>" class="btn icon btn-primary"><i data-feather="plus"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php require 'views/template/footer.php'; ?>
</body>

</html>