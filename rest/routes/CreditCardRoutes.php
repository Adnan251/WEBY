<?php

/**
* List all creditcards
*/
Flight::route('GET /creditcards', function(){
  Flight::json(Flight::creditCardService()->get_all());
});

/**
* List invidiual creditcards
*/
Flight::route('GET /creditcards/@id', function($id){
  Flight::json(Flight::creditCardService()->get_by_id($id));
});

/**
* add creditcards
*/
Flight::route('POST /creditcards', function(){
  Flight::json(Flight::creditCardService()->add(Flight::request()->data->getData()));
});

/**
* update creditcards
*/
Flight::route('PUT /creditcards/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::creditCardService()->update($id, $data));
});

/**
* delete creditcards
*/
Flight::route('DELETE /creditcards/@id', function($id){
  Flight::creditCardService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
