<?php 

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

ini_set("error_log", "php-error.log");
error_log( "----------------Comienzo----------" );

require_once 'libs/connection.php';

require_once 'libs/controller.php';
require_once 'clases/errorsMessages.php';
require_once 'clases/successMessages.php';
require_once 'libs/view.php';
require_once 'libs/model.php';

include_once 'models/loginModel.php';
include_once 'models/categoryBlogModel.php';
include_once 'models/categoryModel.php';
include_once 'models/userModel.php';
include_once 'models/blogModel.php';
require_once 'libs/session.php';
require_once 'libs/sessionController.php';
require_once 'libs/app.php';
require_once 'config/config.php';

$app = new App();
?>