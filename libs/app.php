<?php
require_once 'controllers/errores.php';
class App {
    public function __construct()
    {
        
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');

        $url = explode('/' , $url);
        // si n la posicion 0 (Controllador) esta vacio
        if(empty($url[0])){
            $archivoController = 'controllers/home.php';
            require_once $archivoController;
            $controller = new Home();
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;
            

            $controller = new $url[0];
            error_log($url[0]);
            // $controller->loadModel($url[0]); // para seleccionar un modelo

            if(isset($url[1])){
                if (method_exists($controller, $url[1])) {
                    if(isset($url[2])){
                        $numparam = sizeof($url) - 2; // descontamos el controlador y el metodo con el (- 2) ej : barrio/casa/?numParsms
                        $params = [];
                        for($i = 0; $i < $numparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }
                        //pasarlos al metodo   
                        $controller->{$url[1]}($params);
                    }else{
                        $controller->{$url[1]}();  
                    }
                }else{
                    error_log("APP:: -> error no existe ese metedo");
                    $controller = new Errores();
                }
            }else{
                $controller->render();
                error_log("APP:: -> no hay metodo a cargar,se carga el defailt");
            }
        }else{
            error_log("APP:: -> no existe ese metodo");
            $controller = new Errores();
        }
    }    
}
