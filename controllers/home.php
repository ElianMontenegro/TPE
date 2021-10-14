<?php 


class Home extends Controller{

    public function __construct()
    {
        parent::__construct(); 
    }


    function render(){

        $blogModel = new BlogModel();
        $blogs =  $blogModel->getPostPublic();
        $cover =  $blogModel->getCoverPost();
 
        error_log('HOME::RENDER -> ');
        $this->view->render('home', [
            'blogs' => $blogs,
            'cover' => $cover
        ]); //pasamos la ruta para acceder a la views/login/index.php
        error_log('Home::render -> home cargado');
    }
}



?>