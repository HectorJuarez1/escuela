<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <?php require 'views/template/header.php'; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php $this->showMessages(); ?>
        <div class="card mt-3">
            <div class="card-body">
                <h4><b>ACTUALIZAR</b></h4>
                <form class="row p-4" action="<?php echo constant('URL'); ?>grupos/ActG" method="POST" autocomplete="off">
                    <input type="hidden" class="form-control" name="txt_IdGrupo" value="<?php echo $this->varTodas->id_grupo; ?>" readonly>
                    <div class="col-md-6">
                        <label class="form-label">Nombre Grupo</label>
                        <input type="text" class="form-control" name="txt_NomGrupo" value="<?php echo $this->varTodas->NombreGrupo; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Capacidad</label>
                        <input type="number" class="form-control" name="txt_Capacidad" value="<?php echo $this->varTodas->CapacidadGrupo; ?>" required>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-warning me-1 mb-1">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>