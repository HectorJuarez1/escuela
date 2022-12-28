<?php $user = $this->d['user']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
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
                            <tr>
                                <th class="text-center">CONCEPTO</th>
                                <th class="text-center">MONTO</th>
                                <th class="text-center">FECHE DE REGISTRO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->varPagos as $row) {
                                $Alpagos = new varPagos();
                                $Alpagos = $row;
                            ?>
                                <tr>
                                    <td><?php echo $Alpagos->vw_pg_Concepto; ?></td>
                                    <td><?php echo $Alpagos->vw_pg_Pago; ?></td>
                                    <td><?php echo $Alpagos->vw_pg_Fecha_creacion; ?></td>
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