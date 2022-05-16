<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/CreditCardDao.class.php';

class CreditCardService extends BaseService{

  public function __construct(){
    parent::__construct(new CreditCardDao());
  }

}
?>
