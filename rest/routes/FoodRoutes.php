<?php

/**
* List all foods
*/
Flight::route('GET /foods', function(){
  Flight::json(Flight::foodService()->get_all());
});

/**
* List invidiual foods
*/
Flight::route('GET /foods/@id', function($id){
  Flight::json(Flight::foodService()->get_by_id($id));
});

/**
* add foods
*/
Flight::route('POST /foods', function(){
  Flight::json(Flight::foodService()->add(Flight::request()->data->getData()));
});

/**
* update foods
*/
Flight::route('PUT /foods/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::foodService()->update($id, $data));
});

/**
* delete foods
*/
Flight::route('DELETE /foods/@id', function($id){
  Flight::foodService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
