<?php
$profesor = $this->d['profesor'];

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
<h1>Vista del profesor --> Dashboard</h1>
<?php echo $profesor->getUsername() ?><br>
<?php echo $profesor->getId() ?>
<a href="<?php echo constant('URL'); ?>logout">Logout</a>
</body>
</html>