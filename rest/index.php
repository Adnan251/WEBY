<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'dao/BaseDao.class.php';


Flight::route('GET /users', function(){
  echo 'helo';
});


Flight::route('GET /users', function(){
  $dao = new UsersDao();
  $users = $dao->get_all(0,10);
  Flight::json($users);
});

Flight::route('GET /users/@id', function($id){
  $dao = new UsersDao();
  $users = $dao->get_by_id($id);
  Flight::json($users);
});

Flight::route('POST /users', function(){
  $request = Flight::request();
  $data = $request->data->getdata();
  $dao = new UsersDao();
  $user = $dao->add($data);
  print_r($data);
  Flight::json($users);
});

Flight::route('PUT /users/@id', function($id){
  $dao = new UsersDao();
  $users = $dao->get_by_id(0,10);
  print_r($users);
  $dao->update($id, $data);
  $request = Flight::request();
  Flight::json($users);
});

Flight::start();
?>
