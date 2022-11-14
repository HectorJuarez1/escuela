<?php
$user = $this->d['user'];
$iduser = $this->d['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Vista del alumno --> Dashboard</h1>
    <a href="<?php echo constant('URL'); ?>logout">Logout</a>
    <h2>Bienvenido <?php echo $user->getName() ?></h2>











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




</body>

</html>