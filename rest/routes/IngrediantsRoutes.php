<?php

/**
* List all ingrediants
*/
Flight::route('GET /ingrediants', function(){
  Flight::json(Flight::ingrediantsService()->get_all());
});

/**
* List invidiual ingrediants
*/
Flight::route('GET /ingrediants/@id', function($id){
  Flight::json(Flight::ingrediantsService()->get_by_id($id));
});

/**
* add ingrediants
*/
Flight::route('POST /ingrediants', function(){
  Flight::json(Flight::ingrediantsService()->add(Flight::request()->data->getData()));
});

/**
* update ingrediants
*/
Flight::route('PUT /ingrediants/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::ingrediantsService()->update($id, $data));
});

/**
* delete ingrediants
*/
Flight::route('DELETE /ingrediants/@id', function($id){
  Flight::ingrediantsService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
