<?php $user = $this->d['user']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
</head>

<body>
    <?php require 'views/template/headerAlumnos.php'; ?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">DETALLES</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr">
                                <th class="text-center">PROFESOR</th>
                                <th class="text-center">AULA</th>
                                <th class="text-center">MATERIA</th>
                                <th class="text-center">DIA SEMANA</th>
                                <th class="text-center">INICIA</th>
                                <th class="text-center">FIN</th>
                                <th class="text-center">HORAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->varTodas as $row) {
                                $materiasalumno = new varTodas();
                                $materiasalumno = $row;
                            ?>
                                <tr>
                                    <td><?php echo $materiasalumno->vw_daa_Nombre_Profesor; ?></td>
                                    <td><?php echo $materiasalumno->vw_daa_nombre_aula; ?></td>
                                    <td><?php echo $materiasalumno->vw_daa_nombre_materia; ?></td>
                                    <td><?php echo $materiasalumno->vw_daa_dia_semana; ?></td>
                                    <td><?php echo $materiasalumno->vw_daa_Hora_Inicio; ?></td>
                                    <td><?php echo $materiasalumno->vw_daa_Hora_Fin; ?></td>
                                    <td><?php echo $materiasalumno->vw_daa_Horas; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>