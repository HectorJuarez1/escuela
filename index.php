<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set("error_log", "C:/xampp/htdocs/escuela/php-error.log");
//error_log( "Inicio de aplicacion" );

//tail -f /tmp/php-error.log
require_once 'libs/database.php';
require_once 'libs/messages.php';

require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';


require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'classes/errors.php';
require_once 'classes/success.php';


require_once 'config/config.php';

include_once 'models/usermodel.php';





$app = new App();

?>