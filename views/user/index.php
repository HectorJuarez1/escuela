<?php
    $user = $this->d['user'];
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
</body>
</html>