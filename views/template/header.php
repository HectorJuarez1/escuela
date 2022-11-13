<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/assets/images/icono.png" type="image/x-icon">
   
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?php echo constant('URL'); ?>public/assets/images/logo.png" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu ">
                        <li class='sidebar-title '>Menú principal</li>
                        <li class="sidebar-item ">
                            <a href="<?php echo constant('URL'); ?>admin" class='sidebar-link'>
                            <i data-feather="home" width="20"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file-text" width="20"></i>
                                <span>Administracion</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="<?php echo constant('URL'); ?>NewUsuario">Usuarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL'); ?>alumnos">Alumnos</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL'); ?>tutor">Padre / Tutor</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL'); ?>maestros">Maestros</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?php echo constant('URL'); ?>profesormateria" class='sidebar-link'>
                                <i data-feather="edit-2" width="20"></i>
                                <span>Materias Profesor</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="<?php echo constant('URL'); ?>profesoralumnos" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Profesor Alumnos</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo constant('URL'); ?>grados" class='sidebar-link'>
                                <i data-feather="bar-chart-2" width="20"></i>
                                <span>Grados</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo constant('URL'); ?>aulas" class='sidebar-link'>
                                <i data-feather="plus-square" width="20"></i>
                                <span>Aulas</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo constant('URL'); ?>materias" class='sidebar-link'>
                                <i data-feather="book-open" width="20"></i>
                                <span>Materias</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo constant('URL'); ?>periodos" class='sidebar-link'>
                                <i data-feather="calendar" width="20"></i>
                                <span>Periodos</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?php echo constant('URL'); ?>actividad" class='sidebar-link'>
                                <i data-feather="plus-circle" width="20"></i>
                                <span>Actividad</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-2">
                                    <img src="<?php echo constant('URL'); ?>public/assets/images/avatar/avatar-s-5.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">hector.coyotl</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>logout"><i data-feather="log-out"></i>Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="main-content container-fluid">
                <div class="page-title">