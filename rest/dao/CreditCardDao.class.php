<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class UsersDao extends BaseDao{

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM creditcard WHERE id = :id", ["id"=> $id]);
  }

  public function add_card($card){
    $sql = "INSERT INTO creditcard (type, bank, card_number) VALUES (:type, :bank, :card_number)";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($card);
    $card['id'] = $this->connection->lastInsertId();
    return $card;
  }

  public function update_type($id, $type){
    return $this->update("UPDATE creditcard SET type=:type WHERE id=:id", ["id"=>$id, "type"=>$type]);
  }

  public function update_bank($id, $bank){
    return $this->update("UPDATE creditcard SET bank=:bank WHERE id=:id", ["id"=>$id, "bank"=>$bank]);
  }

  public function update_number($id, $card_number){
    return $this->update("UPDATE creditcard SET card_number=:card_number WHERE id=:id", ["id"=>$id, "card_number"=>$card_number]);
  }
  
}
?>
