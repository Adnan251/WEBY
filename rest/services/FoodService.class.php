<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/FoodDao.class.php';

class FoodService extends BaseService{

  public function __construct(){
    parent::__construct(new FoodDao());
  }

  public function get_by_name($name){
    return $this->dao->get_by_name($name);
  }

}
?>
