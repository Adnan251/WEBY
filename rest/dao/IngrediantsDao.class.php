<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class IngredientsDao extends BaseDao{

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM ingredients WHERE id = :id", ["id"=> $id]);
  }

  public function add_ingredient($){
    $sql = "INSERT INTO ingredients (name, type, amount) VALUES (:name, :type, :amount)";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($ingredient);
    $ingredient['id'] = $this->connection->lastInsertId();
    return $ingredient;
  }

  public function update_type($id, $type){
    return $this->update("UPDATE ingredients SET type=:type WHERE id=:id", ["id"=>$id, "type"=>$type]);
  }

  public function update_name($id, $name){
    return $this->update("UPDATE ingredients SET name=:name WHERE id=:id", ["id"=>$id, "name"=>$name]);
  }

  public function update_number($id, $amount){
    return $this->update("UPDATE ingredients SET amount=:amount WHERE id=:id", ["id"=>$id, "amount"=>$amount]);
  }
}
?>
