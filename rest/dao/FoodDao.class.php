<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class FoodDao extends BaseDao{

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM foods WHERE id = :id", ["id"=> $id]);
  }

  public function add_food($food){
    $sql = "INSERT INTO foods (name, type, price, description) VALUES (:name, :type, :price, :description)";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($food);
    $food['id'] = $this->connection->lastInsertId();
    return $food;
  }

  public function update_type($id, $type){
    return $this->update("UPDATE foods SET type=:type WHERE id=:id", ["id"=>$id, "type"=>$type]);
  }

  public function update_name($id, $name){
    return $this->update("UPDATE foods SET name=:name WHERE id=:id", ["id"=>$id, "name"=>$name]);
  }

  public function update_number($id, $price){
    return $this->update("UPDATE foods SET price=:price WHERE id=:id", ["id"=>$id, "price"=>$price]);
  }

  public function update_type($id, $description){
    return $this->update("UPDATE foods SET description=:description WHERE id=:id", ["id"=>$id, "description"=>$description]);
  }
}
?>
