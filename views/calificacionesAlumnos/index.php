<?php $user = $this->d['user']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificacione</title>
</head>

<body>
    <?php require 'views/template/headerAlumnos.php'; ?>

    <div class="card">
        <div class="card-header">
            CALIFICACIONES
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Materia</th>
                        <th class="text-center">Actividad</th>
                        <th class="text-center">Calificacion</th>
                        <th class="text-center">Retroalimentación</th>
                        <th class="text-center">Estatus</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->varTodas as $row) {
                        $Ncalif = new varTodas();
                        $Ncalif = $row;
                    ?>
                        <tr class="text-center">
                            <td><?php echo $Ncalif->vw_ca_nombre_materia; ?></td>
                            <td><?php echo $Ncalif->vw_ca_nombre_actividad; ?></td>
                            <td><?php echo $Ncalif->vw_ca_calificacion_actividad; ?></td>
                            <td><?php echo $Ncalif->vw_ca_comentario; ?></td>
                            <td><?php
                                if ($Ncalif->vw_ca_id_estatus == 112) {
                                    echo '  <span class="badge bg-success">Calificado</span>';
                                }
                                ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>