<?php 

class CategoryModel extends Model {

    public function __construct()
    {
        parent::__construct();
        error_log("holEEEEEEEEEEEEEEEEEEEEEEE");
    }

    private $id;
    private $name;

    public function setId($id)      {$this->id = $id;}
    public function setName($name)  {$this->name = $name;}
    public function getId()     {return $this->id;}
    public function getName()   {return $this->name;}

    public function getAll(){
        $items = [];
        try {
            $query = $this->query('SELECT * FROM category');
            while ($p = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new CategoryModel();
                $item->setId($p['id']);
                $item->setName($p['name']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('CategoryModel::getAll->PDOExeption ' . $e);
        }
    }

    public function save($name){
        error_log('CategoriesModel::save() => NAME' . $name);
        try {
            $query =  $this->prepare('INSERT INTO category (name) VALUES (:name)');
            $query->execute( ['name' => $name]);
            if($query->rowCount()) return true;
            return false;
        } catch (PDOException $e) {
            error_log('CategoriesModel::save->PDOExeption ' . $e);
            return false;
        }
    }

    public function exists($name){
        try{
            $query = $this->prepare('SELECT name FROM category WHERE name = :name');
            $query->execute( ['name' => $name]);
            if($query->rowCount() > 0){
                return true;
            }
            return false;
        }catch(PDOException $e){
            error_log($e);
            return false;
        }
    }

}
