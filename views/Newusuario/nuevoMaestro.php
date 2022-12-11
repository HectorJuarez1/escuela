<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewMaestro</title>
</head>

<body>
    <?php require 'views/template/header.php'; ?>

    <?php $this->showMessages(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">MAESTRO</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-md-5 col-12">
                <form class="p-3 d-flex" action="verDetalleM" method="POST">
                    <input class="form-control me-2" type="text" name="txt_buscarM" placeholder="No Maestro" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
            <?php
            $a = "";
            $b = "";
            $c = "";
            if (isset($_POST['txt_buscarM'])) {
                foreach ($this->DatosMaestro as $row) {
                    $Dmaestros = new varTodas();
                    $Dmaestros = $row;
                    $a = $Dmaestros->vw_m_NumProfesores;
                    $b = $Dmaestros->vw_m_username;
                    $c = $Dmaestros->vw_m_Nombre_Completo;
                }
            }
            ?>
            <form class="row p-3" action="saveUsMa" method="POST">
                <div class="row">
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <label>No Maestro</label>
                            <input type="text" class="form-control" name="txt_no_maestro" value="<?php echo $a; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" name="txt_usuario" value="<?php echo $b; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="form-group">
                            <label>Nombre Completo</label>
                            <input type="text" class="form-control" name="txt_Nom_Completo" value="<?php echo $c; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="Password" class="form-control" name="txt_passw" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-1">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>