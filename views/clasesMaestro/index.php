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
    <title>Clases</title>
</head>
<body>

<?php require 'views/template/headerMaestro.php'; ?>

<div class="card">
        <div class="card-header">
            <h4 class="card-title">DETALLES</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">MATERIA</th>
                                <th class="text-center">GRADO</th>
                                <th class="text-center">AULA</th>
                                <th class="text-center">DIA SEMANA</th>
                                <th class="text-center">INCIA</th>
                                <th class="text-center">FIN</th>
                                <th class="text-center">HORAS</th>
                                <th class="text-center">ALUMNOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->varTodas as $row) {
                                $Nclases = new varTodas();
                                $Nclases = $row;
                            ?>
                                <tr>
                                    <td><?php echo $Nclases->vw_dfm_nombre_materia; ?></td>
                                    <td><?php echo $Nclases->vw_dfm_nombre_grado; ?></td>
                                    <td><?php echo $Nclases->vw_dfm_nombre_aula; ?></td>
                                    <td><?php echo $Nclases->vw_dfm_dia_semana; ?></td>
                                    <td><?php echo $Nclases->vw_dfm_Hora_Inicio; ?></td>
                                    <td><?php echo $Nclases->vw_dfm_Hora_Fin; ?></td>
                                    <td><?php echo $Nclases->vw_dfm_Horas; ?></td>    
                                    <td> <a href="<?php echo constant('URL') . 'clasesMaestro/verDetalle/' . $Nclases->vw_dfm_proceso_id; ?>" class="btn icon btn-primary"> <i data-feather="user"></i></a></td>                                
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php require 'views/template/footerMaestro.php'; ?>

</body>
</html>