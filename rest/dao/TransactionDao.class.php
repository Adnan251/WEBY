<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class TransactionDao extends BaseDao{

  public function __construct(){
    parent::__construct("transactions");
  }

  public function update_type($id, $payment_type){
    return $this->update("UPDATE transactions SET payment_type=:payment_type WHERE id=:id", ["id"=>$id, "payment_type"=>$payment_type]);
  }

}
?>
