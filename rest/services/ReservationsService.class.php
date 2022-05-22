<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/ReservationDao.class.php';

class ReservationService extends BaseService{

  public function __construct(){
    parent::__construct(new ReservationsDao());
  }

}
?>
