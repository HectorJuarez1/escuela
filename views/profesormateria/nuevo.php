<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Maestros</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>
    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">ASIGNAR MAESTROS</h1>
    </div>


    <div class="card">
        <div class="card-body">
            <form class="row p-3" action="<?php echo constant('URL'); ?>profesormateria/saveProfesorMateria" method="POST">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <h6>Maestros</h6>
                        <select class="form-select" name="com_profesor" id="inputGroupSelect01">
                            <option selected>Elegir Maestros</option>
                            <?php foreach ($this->ProfesorCom as $row) {
                                $maestros = new varTodas();
                                $maestros = $row; ?>
                                <option value="<?php echo $maestros->vw_m_profesor_id; ?>">
                                    <?php echo $maestros->vw_m_Nombre_Completo; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h6>Aulas</h6>
                        <select class="form-select" name="com_aulas" id="inputGroupSelect01">
                            <option selected>Elige la aulas</option>
                            <?php foreach ($this->ComboAulas as $row) {
                                $aulas = new varTodas();
                                $aulas = $row; ?>
                                <option value="<?php echo $aulas->aula_id; ?>">
                                    <?php echo $aulas->nombre_aula; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h6>Materias</h6>
                        <select class="form-select" name="com_materias" id="inputGroupSelect01">
                            <option selected>Elige la materias</option>
                            <?php foreach ($this->ComboMaterias as $row) {
                                $materias = new varTodas();
                                $materias = $row; ?>
                                <option value="<?php echo $materias->vw_mat_materia_id; ?>">
                                    <?php echo $materias->vw_mat_nombre_materia; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h6>Periodos</h6>
                        <select class="form-select" name="com_periodos" id="inputGroupSelect01">
                            <option selected>Elige la periodos</option>
                            <?php foreach ($this->ComboPeriodos as $row) {
                                $periodos = new varTodas();
                                $periodos = $row; ?>
                                <option value="<?php echo $periodos->periodo_id; ?>">
                                    <?php echo $periodos->nombre_periodo; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-1">Registrar</button>
                        <button type="reset" class="btn btn-light">Limpiar</button>
                    </div>
                </div>
            </form>



        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>