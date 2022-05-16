<?php

/**
* List all oreders
*/
Flight::route('GET /oreders', function(){
  Flight::json(Flight::ordersService()->get_all());
});

/**
* List invidiual oreders
*/
Flight::route('GET /oreders/@id', function($id){
  Flight::json(Flight::ordersService()->get_by_id($id));
});

/**
* add oreders
*/
Flight::route('POST /oreders', function(){
  Flight::json(Flight::ordersService()->add(Flight::request()->data->getData()));
});

/**
* update oreders
*/
Flight::route('PUT /oreders/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::ordersService()->update($id, $data));
});

/**
* delete oreders
*/
Flight::route('DELETE /oreders/@id', function($id){
  Flight::ordersService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
