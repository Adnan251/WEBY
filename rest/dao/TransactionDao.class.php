<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class TransactionDao extends BaseDao{

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM transactions WHERE id = :id", ["id"=> $id]);
  }

  public function add_ingredient($){
    $sql = "INSERT INTO transactions (payment_type) VALUES (:payment_type)";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($ingredient);
    $transactions['id'] = $this->connection->lastInsertId();
    return $transactions;
  }

  public function update_type($id, $payment_type){
    return $this->update("UPDATE transactions SET payment_type=:payment_type WHERE id=:id", ["id"=>$id, "payment_type"=>$payment_type]);
  }

}
?>
