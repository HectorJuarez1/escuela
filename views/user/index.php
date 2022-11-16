<?php $user = $this->d['user']; ?>
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
    <?php require 'views/template/headerAlumnos.php'; ?>
    <h1>Vista del alumno --> Dashboard</h1>
    <?php //echo $user->getId() ?>
    <table class="table table-striped text-center" id="table1">
        <thead>
            <tr>
                <th class="text-center">Aulas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->varTodas as $row) {
                $aulas = new varTodas();
                $aulas = $row;
            ?>
                <tr>
                    <td><?php echo $aulas->nombre_aula; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php require 'views/template/footerAlumnos.php'; ?>
</body>

</html>