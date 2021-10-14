<?php 

class CategoryBlog extends Controller{

    public function __construct()
    {
        parent::__construct(); 
    }

    function render(){
        if($this->existGET(['id'])){
            $id = $_GET['id'];
            error_log($id . " id");
        }
        $blogModel = new CategoryBlogModel();
        $blogByCategory =  $blogModel->getBlogByCategory($id);
        $categoryModel = new CategoryModel();
        $allCategories = $categoryModel->getAll();
        $this->view->render('categoryBlog', [
            'blogByCategory' => $blogByCategory,
            'allCategories' => $allCategories
        ]); 
        error_log('CategoryBlogModel::render -> Category cargado');
    }
}



?>