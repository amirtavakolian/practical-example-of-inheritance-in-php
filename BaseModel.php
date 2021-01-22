
<?php 

class BaseModel{
  
  protected $db;
  protected $primaryKey = "id";
  protected $table; 
  protected $createdAt = true;

  public function __construct()
  {
    try{
      $this->db = new PDO("mysql:host=localhost;dbname=iran", "root", "");
    }catch(Exception $e){
      echo "Error... ".  $e->getMessage();
    } 
  }

  public function find($id = "")
  {
    $where = "";
    
    if (!empty($id)){
      $where = "WHERE {$this->primaryKey} = :id";
    }
    $query = "SELECT * FROM {$this->table} $where";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete($id)
  {
    $query = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id ";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  }

  public function insert($values)
  {
    if(is_array($values) && !empty($values)){
      $key = DbUtilities::getKeys($values);
      $values = DbUtilities::makeQuery($values);
      $query = "INSERT INTO {$this->table}({$key}) values({$values}) ";
      $this->db->query($query);
    }
  }

}