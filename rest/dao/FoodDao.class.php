<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class FoodDao extends BaseDao{

  public function __construct(){
    parent::__construct("foods");
  }

  public function get_by_name($name){
    $name=strtolower($name);
    $stmt = $this->conn->prepare("SELECT * FROM foods WHERE LOWER(name) LIKE '%".$name."%'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
?>
