
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <title>Administrador</title>

</head>

<body>

    <?php require 'views/template/header.php'; ?>

    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">Estadísticas.</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-center'>
                                <h4 class='card-title'>ALUMNOS</h4>

                            </div>     
                            <div class="d-flex justify-content-center">       <h2 class="text-white">11</h2></div>           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-center'>
                                <h4 class='card-title'>PROFESORES</h4>

                            </div>     
                            <div class="d-flex justify-content-center">       <h2 class="text-white">3</h2></div>          
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
        
    </section>


    <?php require 'views/template/footer.php'; ?>
</body>

</html>