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
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-gray-800">ACTUALIZAR DATOS</h1>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <form class="form" action="<?php echo constant('URL'); ?>maestros/ActMaestro" method="POST">
                <div class="row">
                <input type="hidden" class="form-control" name="txt_idprofesor" value="<?php echo $this->varTodas->vw_m_profesor_id; ?>" readonly>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Cedula</label>
                            <input type="text" class="form-control" name="txt_cedula" value="<?php echo $this->varTodas->vw_m_Cedula; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="txt_nombre" value="<?php echo $this->varTodas->vw_m_Nombre; ?>"required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="city-column">Apellido Paterno</label>
                            <input type="text" class="form-control" name="txt_ApPaterno" value="<?php echo $this->varTodas->vw_m_Apellido_paterno; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="txt_ApMaterno" value="<?php echo $this->varTodas->vw_m_Apellido_Materno; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="form-group">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="txt_direccion" value="<?php echo $this->varTodas->vw_m_Direccion; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="number" class="form-control" name="txt_telefono" value="<?php echo $this->varTodas->vw_m_Telefono; ?>"  required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="txt_FeNacimiento" value="<?php echo $this->varTodas->vw_m_Fecha_nacimiento; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label>Sexo</label>
                                <select class="form-select" name="txt_sexo">
                                    <option> <?php echo $this->varTodas->vw_m_Sexo; ?></option>
                                    <?php
                                    if ($this->varTodas->vw_m_Sexo == 'Femenino') {
                                        echo "<option>Maculino</option>";
                                    } else {
                                        echo "<option>Femenino</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select class="form-select" name="com_estatus">
                                    <option value="100">Activo</option>
                                    <option value="101">Baja</option>
                                    <option value="102">Baja Temporal</option>
                                </select>
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
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>