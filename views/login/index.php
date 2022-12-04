<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/css/bootstrap.css">

    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/css/app.css">
</head>

<body>

    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?php echo constant('URL'); ?>public/assets/images/Logo-Instituto-Cuauhtemoc.png" width="40%" class='mb-4'>
                                <h2>Bienvenido...</h2>
                            </div>
                            <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST" autocomplete="off">

                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">NOMBRE DE USUARIO</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative mb-4">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Inicia sesión</button>
                                </div><br>
                                <?php $this->showMessages(); ?>
                                <?php (isset($this->errorMessage)) ?  $this->errorMessage : '' ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        //Autoclose
        window.setTimeout(function() {
            $(".alert").fadeTo(2000, 0).slideDown(1500, function() {
                $(this).remove();
            });
        }, 1500); //1 segundos y desaparece
    </script>
    <script src="<?php echo constant('URL'); ?>public/assets/js/feather-icons/feather.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/assets/js/app.js"></script>
    <script src="<?php echo constant('URL'); ?>public/assets/js/main.js"></script>
</body>

</html>