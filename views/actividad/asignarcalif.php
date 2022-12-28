<?php $profesor = $this->d['profesor']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificar</title>
</head>

<body>
    <?php require 'views/template/headerMaestro.php'; ?>
    <!-- Begin Page Content -->
    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">CALIFICAR ACTIVIDAD</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="<?php echo constant('URL'); ?>actividad/CalificacionAct" method="POST"
                autocomplete="off">
                <input type="hidden" class="form-control" name="txt_Idcalif"
                    value="<?php echo $this->varTodas->vw_ca_calificacion; ?>" readonly>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Calificacion</label>
                            <select class="form-select" name="com_calificacion" required>
                                <option selected>Selección</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="city-column">RETROALIMENTACION</label>
                            <textarea class="form-control" rows="3" name="txt_retroalimentacion"></textarea>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-1">Registrar</button>
                        <button type="reset" class="btn btn-light">Limpiar</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <?php require 'views/template/footerMaestro.php'; ?>
</body>

</html>