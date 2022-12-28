<?php $user = $this->d['user']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad</title>
</head>

<body>
    <?php require 'views/template/headerAlumnos.php'; ?>
    <?php $this->showMessages(); ?>
    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="<?php echo constant('URL'); ?>actividadAlumnos/saveActEstatus" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="city-column">Actividad realizada</label>
                            <textarea class="form-control" rows="5" name="txt_actividad_realizada"></textarea>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="form-group">
                            <label>Subir Archivos</label>
                            <input type="file" class="form-control" name="filename" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-1">Enviar</button>
                        <button type="reset" class="btn btn-light">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>