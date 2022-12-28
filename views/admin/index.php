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
                    <div class="card-body p-0 mb-2">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-center'>
                                <h4 class='card-title'>ALUMNOS</h4>

                            </div>
                            <div class="d-flex justify-content-center">
                                <h2 class="text-white">
                                    <?php foreach ($this->TotalAlumnos as $row) {
                                        $Talumnos = new varTodas();
                                        $Talumnos = $row;
                                        echo $Talumnos->vw_a_NumAlumnos;
                                    } ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0 mb-2">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-center'>
                                <h4 class='card-title'>PROFESORES</h4>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h2 class="text-white">
                                    <?php foreach ($this->TotalProfesores as $row) {
                                        $Tprofesores = new varTodas();
                                        $Tprofesores = $row;
                                        echo $Tprofesores->vw_m_NumProfesores;
                                    } ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0 mb-2">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-center'>
                                <h4 class='card-title'>PAGOS</h4>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h2 class="text-white">
                                    <?php foreach ($this->TotalPagos as $row) {
                                        $Tpagos = new varPagos();
                                        $Tpagos = $row;
                                        if ($Tpagos->vw_pg_TotalPagos == "") {
                                            echo "$" . number_format($Tpagos->vw_pg_TotalPagos = 0, 1, '.', ',');
                                        } else {
                                            echo "$" . number_format($Tpagos->vw_pg_TotalPagos, 1, '.', ',');
                                        }
                                    } ?>

                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0 mb-2">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-center'>
                                <h4 class='card-title'>MATERIAS</h4>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h2 class="text-white">
                                    <?php foreach ($this->TotalMaterias as $row) {
                                        $Tmaterias = new varTodas();
                                        $Tmaterias = $row;
                                        echo $Tmaterias->vw_mat_NumMaterias;
                                    } ?>

                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="columnchart_material" style="width: 450px; height: 350px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Concepto', 'Pagos'],
                <?php foreach ($this->DatosGraficaP as $row) {
                    $Dgrafica = new varPagos();
                    $Dgrafica = $row;
                ?>['<?php echo $Dgrafica->Concepto;  ?> <?php echo  $Dgrafica->TotalPagos;  ?>',
                        <?php echo  $Dgrafica->TotalPagos; ?>],
                <?php } ?>
            ]);
            var options = {
                chart: {
                    title: 'PAGOS DEL MES',
                }
            };
            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <?php require 'views/template/footer.php'; ?>
</body>

</html>