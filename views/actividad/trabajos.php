<?php $profesor = $this->d['profesor']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad</title>
</head>

<body>
    <?php require 'views/template/headerMaestro.php'; ?>
    <?php $this->showMessages(); ?>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary round" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nuevo
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVA ACTIVIDAD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row p-4" action="<?php echo constant('URL'); ?>materias/saveMaterias" method="POST" autocomplete="off">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" class="form-control" name="txt_titulo_act" required>
                            </div>
                        </div>

                        <div class="col-12">
                        <div class="form-group">
                                <label>Descripcion</label>
                            <textarea class="form-control" rows="3" name="txt_descripcion"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Fecha Inicio</label>
                                <input type="date" class="form-control" name="txt_FeNacimiento" required>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label>Fecha Fin</label>
                                <input type="date" class="form-control" name="txt_FeNacimiento" required>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
            
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div><br><br>


    <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($this->varTodas as $row) {
                $NMaterias = new varTodas();
                $NMaterias = $row;
       var_dump($NMaterias);
            ?>
            <?php } ?>
        </div>







    <?php require 'views/template/footerMaestro.php'; ?>
</body>

</html>