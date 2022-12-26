<?php $profesor = $this->d['profesor']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar</title>
</head>
<body>
<?php require 'views/template/headerMaestro.php'; ?>

    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="<?php echo constant('URL'); ?>actividad/ActualizarAct" method="POST">
                <div class="row">
                <input type="hidden" class="form-control" name="txt_IdActividad" value="<?php echo $this->varTodas->actividad_id; ?>" readonly>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="txt_titulo_act"  value="<?php echo $this->varTodas->titulo; ?>"required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="city-column">Descripcion</label>
                            <textarea class="form-control" rows="3"  name="txt_descripcion"> <?php echo $this->varTodas->descripcion; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Fecha Inicio</label>
                            <input type="date" class="form-control" name="date_FInicio"   value="<?php echo $this->varTodas->Activida_fecha_inicio; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Fecha Fin</label>
                            <input type="date" class="form-control" name="date_FFin"   value="<?php echo $this->varTodas->Activida_fecha_fin; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-warning me-1 mb-1">Actualizar</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
    <?php require 'views/template/footerMaestro.php'; ?>
</body>

</html>