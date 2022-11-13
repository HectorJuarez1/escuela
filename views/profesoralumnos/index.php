<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesor Alumnos</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>
    <?php $this->showMessages(); ?>
    <div class="card">
        <div class="card-header">
            PROFESOR ALUMNOS
        </div>
        <div class="card-body">
            <table class="table table-striped text-center" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Profesor</th>
                        <th class="text-center">Alumnos</th>
                        <th class="text-center">Grado</th>
                        <th class="text-center">Materia</th>
                        <th class="text-center">Aula</th>
                        <th class="text-center">Perido</th>
                        <th class="text-center">Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->varTodas as $row) {
                        $DalumnosAsig = new varTodas();
                        $DalumnosAsig = $row;
                    ?>
                        <tr>
                            <td><?php echo $DalumnosAsig->vw_as_Nombre_Profesor; ?></td>
                            <td><?php echo $DalumnosAsig->vw_as_NombreAlumno; ?></td>
                            <td><?php echo $DalumnosAsig->vw_as_nombre_grado; ?></td>
                            <td><?php echo $DalumnosAsig->vw_as_nombre_materia; ?></td>
                            <td><?php echo $DalumnosAsig->vw_as_nombre_aula; ?></td>
                            <td><?php echo $DalumnosAsig->vw_as_nombre_periodo; ?></td>
                            <td><?php echo $DalumnosAsig->vw_as_Estatus; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php require 'views/template/footer.php'; ?>
</body>

</html>