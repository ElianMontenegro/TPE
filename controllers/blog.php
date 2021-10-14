<?php 


class Blog extends Controller{

    public function __construct()
    {
        parent::__construct(); 
      
    }

    function render(){
        if($this->existGET(['slug'])){
            $slug = $this->getGet('slug');
        }
        
        $blogModel = new BlogModel();
        $slug = ('"' . $slug . '"' );
        $blog =  $blogModel->getBlogSlug($slug);
        $this->view->render('blog', [
            'blog' => $blog
        ]); 
    }
}



?>