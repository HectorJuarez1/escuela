<?php
$profesor = $this->d['profesor'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencias</title>
</head>
<body>
    <?php require 'views/template/headerMaestro.php'; ?>
    <?php $this->showMessages(); ?>
    <div class="card">
        <div class="card-header">
            DETALLES
        </div>
        <div class="card-body">
            <table class="table table-striped text-center" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Materia</th>
                        <th class="text-center">Asistencias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->varTodas as $row) {
                        $MateriaAs = new varTodas();
                        $MateriaAs = $row;
                    ?>
                        <tr>
                            <td><?php echo $MateriaAs->vw_dfm_nombre_materia; ?></td>
                            <td class="text-center">
                                <a href="<?php echo constant('URL') . 'asistencias/verDetalle/' . $MateriaAs->vw_dfm_proceso_id; ?>" class="btn icon btn-primary"> <i data-feather="user"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




    <?php require 'views/template/footerMaestro.php'; ?>

</body>

</html>