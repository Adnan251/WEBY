<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class OrdersDao extends BaseDao{

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM orders WHERE id = :id", ["id"=> $id]);
  }

  public function add_orders($order){
    $sql = "INSERT INTO orders (foods_id) VALUES (:foods_id)";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($order);
    $order['id'] = $this->connection->lastInsertId();
    return $order;
  }

  public function update_foods_id($id, $foods_id){
    return $this->update("UPDATE orders SET foods_id=:foods_id WHERE id=:id", ["id"=>$id, "foods_id"=>$foods_id]);
  }

}
?>
