<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/IngrediantsDao.class.php';

class IngrediantsService extends BaseService{

  public function __construct(){
    parent::__construct(new ingrediantsDao());
  }

}
?>
