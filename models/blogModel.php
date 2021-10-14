<?php 
class BlogModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $id;
    private $idCategory;
    private $title;
    private $resume;
    private $content;
    private $public;
    private $image;
    private $cover;
    private $slug;


    public function setId($id)                  {$this->id = $id;}
    public function setIdCategory($idCategory)  {$this->idCategory = $idCategory;}
    public function setTitle($title)            {$this->title = $title;}
    public function setResume($resume)          {$this->resume = $resume;}
    public function setContent($content)        {$this->content = $content;}
    public function setPublic($public)          {$this->public = $public;}
    public function setImage($image)            {$this->image = $image;}
    public function setCover($cover)        {$this->cover = $cover;}
    public function setSlug($slug)          {$this->slug = $slug;}


    public function getId()     {return $this->id;}
    public function getIdCategory()     {return $this->idCategory;}
    public function getTitle()  {return $this->title;}
    public function getResume() {return $this->resume;}
    public function getContent(){return $this->content;}
    public function getPublic() {return $this->public;}
    public function getImage()  {return $this->image;}
    public function getCover()  {return $this->cover;}
    public function getSlug()   {return $this->slug;}


    public function save(){
        try {
            $query = $this->prepare('INSERT INTO blog (title, idCategory, resume, content, public, image, cover, slug) VALUES (:title, :idCategory, :resume, :content, :public, :image, :cover, :slug)');
            $query->execute([
                'title' => $this->title,
                'idCategory' => $this->idCategory,
                'resume' => $this->resume,
                'content' => $this->content,
                'public' => $this->public,
                'image' => $this->image,
                'cover' => $this->cover,
                'slug' => $this->slug
            ]);
            if($query->rowCount()) return true;

            return false;
        } catch (PDOException $e) {
            error_log('BLOGMODEL::save->PDOExeption ' . $e);
            return false;
        }
    }

    public function getAll(){
        $items = [];
        try {
            $query = $this->query('SELECT * FROM blog');
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new BlogModel();
                $item->setId($p['id']);
                $item->setIdCategory($p['idCategory']);
                $item->setTitle($p['title']);
                $item->setResume($p['resume']);
                $item->setContent($p['content']);
                $item->setPublic($p['public']);
                $item->setImage($p['image']);
                $item->setCover($p['cover']);
                array_push($items, $item);
                
            }
            return $items;
        } catch (PDOException $e) {
            error_log('BLOGMODEL::getAll->PDOExeption ' . $e);
        }
    }
    public function get($id){
        try {
            $query = $this->query('SELECT * FROM blog  WHERE id = ' . $id .'');
            $blog = $query->fetch(PDO::FETCH_ASSOC);
          
            $this->setId($blog['id']);
            $this->setIdCategory($blog['idCategory']);
            $this->setTitle($blog['title']);
            $this->setResume($blog['resume']);
            $this->setCover($blog['cover']);
            $this->setPublic($blog['public']);
            $this->setContent($blog['content']);
            $this->setImage($blog['image']);
            $this->setSlug($blog['slug']);
    
            return $this;
        } catch (PDOException $e) {
            return ;
            error_log('BLOGMODEL::get-> PDOExeption xd ' . $e);
        }
    }

    public function getBlogSlug($slug){
        try {
            $query = $this->query('SELECT id, title, resume, image, content, slug FROM blog  WHERE slug = ' .  $slug .'');
            $blog = $query->fetch(PDO::FETCH_ASSOC);
            $this->setId($blog['id']);
            $this->setTitle($blog['title']);
            $this->setResume($blog['resume']);
            $this->setContent($blog['content']);
            $this->setImage($blog['image']);
            $this->setSlug($blog['slug']);
            
            return $this;
        } catch (PDOException $e) {
            return ;
            error_log('BLOGMODEL::get-> PDOExeption xd ' . $e);
        }
    }

 
    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM blog WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update($sql){
        try{
            $query = $this->query("$sql");
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function getCoverPost(){
        $items = [];
        try {
            $query = $this->query('SELECT id, title, resume, image, slug FROM blog  WHERE cover = 1 and public = 1');
            //p de pointer, para saver cual es el elemto actual recorrido
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                //ME DEVUELVE UN OBJETO CON CLAVE VALOR
                $item = new BlogModel();
                $item->setId($p['id']);
                $item->setTitle($p['title']);
                $item->setResume($p['resume']);
                $item->setImage($p['image']);
                $item->setSlug($p['slug']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('BLOGMODEL::getCoverPost->PDOExeption ' . $e);
        }
    }

    public function getPostPublic(){
        $items = [];
        try {
            $query = $this->query('SELECT id, title, resume, image, slug  FROM blog  WHERE cover = 0 and public = 1');
            //p de pointer, para saver cual es el elemto actual recorrido
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                //ME DEVUELVE UN OBJETO CON CLAVE VALOR
                $blog = new BlogModel();
                $blog->setId($p['id']);
                $blog->setTitle($p['title']);
                $blog->setResume($p['resume']);
                $blog->setImage($p['image']);
                $blog->setSlug($p['slug']);
                
                array_push($items, $blog);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('BLOGMODEL::getPostPublic->PDOExeption ' . $e);
        }
    }

    public function tableBlog(){
        $items = [];
        try {
            $query = $this->query('SELECT id, title FROM blog  WHERE  public = 1');
            //p de pointer, para saver cual es el elemto actual recorrido
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                //ME DEVUELVE UN OBJETO CON CLAVE VALOR
                $blog = new BlogModel();
                $blog->setId($p['id']);
                $blog->setTitle($p['title']);
                
                array_push($items, $blog);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('BLOGMODEL::getPostPublic->PDOExeption ' . $e);
        }
    }

   

    public function exists($title){
        try{
            $query = $this->prepare('SELECT title FROM blog WHERE title = :title');
            $query->execute( ['title' => $title]);
            
            if($query->rowCount() > 0){
                error_log('BLOGMODEL::exists() => true');
                return true;
            }else{
                error_log('BLOGMODEL::exists() => false');
                return false;
            }
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }
}

?>
