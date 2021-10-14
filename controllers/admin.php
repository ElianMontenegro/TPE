<?php 

class Admin extends SessionController{

    function __construct(){
        parent::__construct();
    }

    
    function render(){
        $categoryModel = new categoryModel();
        $blogModel = new blogModel();
        $blogs = $blogModel->getAll();
        $categories = $categoryModel->getAll();
        $this->view->render('admin/index', [
            "blogs" => $blogs,
            "categories" => $categories
        ]);
    }

    public function deleteBlog() {
        $blogModel = new blogModel();
    
        if($this->existGET(['id'])){
            error_log("existe el get");
            $id = $this->getGet('id');
            $blogModel->delete($id);
            error_log($id);
            $this->redirect('admin');
        }else{
            echo "no se borro bro";
        }
    }
    
    public function updateBlog() {
        error_log('Admin::UpdateBlog()');
        if($this->existPOST(['id','title', 'resume', 'content', 'idCategory','cover','public']))
        {
            $id = $this->getPost('id');
            $title = $this->getPost('title');
            $resume = $this->getPost('resume');
            $content = $this->getPost('content');
            $idCategory = $this->getPost('idCategory');
            $cover = $this->getPost('cover');
            $public = $this->getPost('public');
            
            $blogModel = new blogModel();
            $blog = $blogModel->get($id);

            $sql = "UPDATE blog SET title = '$title', resume = '$resume' , content = '$content', idCategory = '$idCategory', cover = '$cover', public = '$public' WHERE id = '$id'";
            $blogModel->update($sql);
            $this->redirect('admin');
        }else {
            error_log("no existe algun post");
        }
    }

    function modificateImageOrNot($current , $new){
        $nameImageArray = str_split($current);
        $nameArray = [];
        error_log(sizeof($nameImageArray));
        for ($i=5; $i < sizeof($nameImageArray); $i++) { 
            $nameArray[$i] = $nameImageArray[$i] ;
        }
        $name =implode($nameArray);
        if ($name == $new){
            return 1;
        }
        return 0;
    }

    function createBlog(){
        $categoryModel = new categoryModel();
        $categories = $categoryModel->getAll();
        $this->view->render('admin/create-blog', [
            "categories" => $categories
        ]);
    }

   
    
    function newBlog(){
        error_log('Admin::newBlog()');
        if($this->existPOST(['title', 'idCategory', 'resume', 'content', 'public', 'cover'])){
            $title = $this->getPost('title');
            $idCategory = $this->getPost('idCategory');
            $resume = $this->getPost('resume');
            $content = $this->getPost('content');
            $public = $this->getPost('public');
            $cover = $this->getPost('cover');
          
            if (!isset($_FILES['image'])) {
                error_log("BLOGMODEL::setimage -> no existe el parametro iamge");
                return;
            }
            
            $image = $_FILES['image'];

            $imageName = $this->imageSave($image);

            $slug = $this->CreateSlug($title);
            error_log("ADMIN::NEWBLOG -> " . $imageName);
            $blogModel = new blogModel();

            if(!$blogModel->exists($title)){
                $blogModel->setTitle($title);
                $blogModel->setIdCategory($idCategory);
                $blogModel->setResume($resume);
                $blogModel->setContent($content);
                $blogModel->setPublic($public);
                $blogModel->setContent($content);
                $blogModel->setImage($imageName);
                $blogModel->setCover($cover);
                $blogModel->setSlug($slug);
                $blogModel->save();
                error_log('Admin::newBlog() => new blog created');
                $this->redirect('admin');
            }else{
                error_log('Admin::newBlog() => not was created blog, because that title already exist');
                $this->redirect('admin');
            }
        }
    }

    function imageSave($image){
        $target_dir = "static/img/image/";
        $extension = explode('.',$image["name"]);
        $filename = $extension[0];
        $ext = $extension[1];
        $hash = (random_int(10001, 99998) . $filename) . '.' . $ext;
        $target_file = $target_dir . $hash;
        $imageOk = 1;
  
        $check = getimagesize($image["tmp_name"]);
        error_log($image["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $imageOk = 1;
        } else {
            //echo "File is not an image.";
            $imageOk = 0;
        }

        if ($imageOk == 0) {
            error_log("blogModel::setImage -> Sorry, your file was not uploaded.");
        } else {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                error_log("blogModel::setImage ->  your file was uploaded.");
                return $hash;
            } else {
                error_log("blogModel::setImage ->  ni se movio la imagen.");
            }
        }
    }

    public function CreateSlug($title){
        if ($title === ""){
            error_log("ADMIN::CreateSlug  -> no existe title");
            return false;
        }else{
            $title_replace = str_replace(" ","-",$title);
            $title_replace = strtolower($title_replace);
            $fecha = getdate();
            $random = random_int(10, 98);
            $slug = $title_replace . $fecha['seconds'] . $fecha['minutes'] . $fecha['hours'] . $random;
            return $slug;
        }
    }

    function createCategory(){
        $this->view->render('admin/create-category');
    }

    public function newCategory(){
        if($this->existPOST(['name'])){
            $name = $this->getPost('name');
            error_log('Admin::newCategoty() => NAME' . $name);
            $categoryNew = new categoryModel();
            if(!$categoryNew->exists($name)){
                if(!$categoryNew->save($name)){
                    error_log('Admin::newCategoty() => error al crear la categor');
                }
                error_log('Admin::newCategoty() => new category created');
                $this->redirect('admin');
            }else{
                $this->redirect('admin');
                error_log('Admin::newCategoty() => not was created category, because that name already exist');
            }
        }
    }
}


?>