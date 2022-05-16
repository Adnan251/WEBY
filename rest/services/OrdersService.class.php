<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/OrdersDao.class.php';

class OrdersService extends BaseService{

  public function __construct(){
    parent::__construct(new OrdersDao());
  }

}
?>
