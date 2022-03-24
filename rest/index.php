<?php

require_once '../vendor/autoload.php';
require_once 'dao/WEBYDao.class.php';

Flight::register('webDao', 'WEBYDao');

Flight::route('/', function(){
  echo 'test';
});

Flight::route('GET /users', function(){
  Flight::json(Flight::webDao()->get());
});

Flight::start();
?>
