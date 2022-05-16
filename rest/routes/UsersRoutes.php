<?php

/**
* List all users
*/
Flight::route('GET /users', function(){
  Flight::json(Flight::usersService()->get_all());
});

/**
* List invidiual users
*/
Flight::route('GET /users/@id', function($id){
  Flight::json(Flight::usersService()->get_by_id($id));
});

/**
* add users
*/
Flight::route('POST /users', function(){
  Flight::json(Flight::usersService()->add(Flight::request()->data->getData()));
});

/**
* update users
*/
Flight::route('PUT /users/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::usersService()->update($id, $data));
});

/**
* delete users
*/
Flight::route('DELETE /users/@id', function($id){
  Flight::usersService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
