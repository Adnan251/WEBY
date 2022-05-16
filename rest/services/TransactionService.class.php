<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/TransactionDao.class.php';

class TransactionService extends BaseService{

  public function __construct(){
    parent::__construct(new TransactionDao());
  }

}
?>
