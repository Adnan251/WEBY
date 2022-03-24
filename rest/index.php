<?php

require_once '../vendor/autoload.php';
require_once 'dao/WEBYDao.class.php';

$dao=new WEBYDao();
print_r($dao->get_all());
/*Flight::register('webDao', 'WEBYDao');

Flight::route('/', function(){
  echo 'test';
});

Flight::route('GET /users', function(){
  Flight::json(Flight::webDao()->get());
});

Flight::start();
*/
?>
