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
    <title>Alumnos</title>
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
                        <th class="text-center">No Alumno</th>
                        <th class="text-center">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->varTodas as $row) {
                        $Alasignados = new varTodas();
                        $Alasignados = $row;
                    ?>
                    <tr>
                        <td><?php echo $Alasignados->vw_daa_No_Alumno; ?></td>
                        <td><?php echo $Alasignados->vw_daa_NombreAlumno; ?></td>

                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require 'views/template/footerMaestro.php'; ?>
</body>
</html>