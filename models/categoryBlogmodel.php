
<?php 
class CategoryBlogModel extends Model  {
    
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

    public function getId()     {return $this->id;}
    public function getIdCategory()     {return $this->idCategory;}
    public function getTitle()  {return $this->title;}
    public function getResume() {return $this->resume;}
    public function getContent(){return $this->content;}
    public function getPublic() {return $this->public;}
    public function getImage()  {return $this->image;}
    public function getCover()  {return $this->cover;}
    public function getSlug()   {return $this->slug;}

    public function getBlogByCategory($id){
        $items = [];
        try {
            $query = $this->query('SELECT title, resume, slug, image , idCategory FROM blog WHERE idCategory = ' . $id);
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $blog = new CategoryBlogModel();
                $blog->from($p);
                array_push($items, $blog);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('BlogModel::getBlogByCategory->PDOExeption ' . $e);
        }
    }

    public function from($array){
        $this->id = $array['id'];
        $this->title = $array['title'];
        $this->idCategory = $array['idCategory'];
        $this->resume = $array['resume'];
        $this->content = $array['content'];
        $this->public = $array['public'];
        $this->image = $array['image'];
        $this->cover = $array['cover'];
        $this->slug = $array['slug'];
    }
}

?>