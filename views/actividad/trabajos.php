<?php $profesor = $this->d['profesor']; ?>
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
    <?php require 'views/template/headerMaestro.php'; ?>
    <?php $this->showMessages(); ?>
    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="<?php echo constant('URL'); ?>actividad/saveActividad" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre de la actividad</label>
                            <input type="text" class="form-control" name="txt_nombre_act" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Tema</label>
                            <input type="text" class="form-control" name="txt_titulo_act" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="city-column">Descripcion</label>
                            <textarea class="form-control" rows="3" name="txt_descripcion"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Fecha Inicio</label>
                            <input type="date" class="form-control" name="date_FInicio" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Fecha Fin</label>
                            <input type="date" class="form-control" name="date_FFin" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-1">Registrar</button>
                        <button type="reset" class="btn btn-light">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require 'views/template/footerMaestro.php'; ?>
</body>

</html>