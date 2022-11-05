<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php $this->showMessages(); ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Grupos</h1>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h4><b>Nuevo</b></h4>
                <form class="row p-4" action="<?php echo constant('URL'); ?>grupos/saveGru" method="POST" autocomplete="off">
                    <div class="col-md-6">
                        <label class="form-label">Nombre Grupo</label>
                        <input type="text" class="form-control" name="txt_NomGrupo" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Capacidad</label>
                        <input type="number" class="form-control" name="txt_Capacidad" required>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-1 mb-1">Registrar</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h4><b>Detalles</b></h4><br>
            <table class="table table-striped text-center" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Nombre Grupo</th>
                        <th class="text-center">Capacidad</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->varTodas as $row) {
                        $grupos = new varTodas();
                        $grupos = $row;
                    ?>
                        <tr>
                            <td><?php echo $grupos->NombreGrupo; ?></td>
                            <td><?php echo $grupos->CapacidadGrupo; ?></td>
                            <td class="text-center">
                                <a href="<?php echo constant('URL') . 'grupos/verDetalle/' . $grupos->id_grupo ?>" class="btn btn-warning"><i class='bi bi-pen'></i></a>
                                <a href="<?php echo constant('URL') . 'grupos/eliminarGru/' . $grupos->id_grupo ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>