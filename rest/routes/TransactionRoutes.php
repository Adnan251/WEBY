<?php

/**
* List all transactions
*/
Flight::route('GET /transactions', function(){
  Flight::json(Flight::transactionService()->get_all());
});

/**
* List invidiual users
*/
Flight::route('GET /transactions/@id', function($id){
  Flight::json(Flight::transactionService()->get_by_id($id));
});

/**
* add todo
*/
Flight::route('POST /transactions', function(){
  Flight::json(Flight::transactionService()->add(Flight::request()->data->getData()));
});

/**
* update todo
*/
Flight::route('PUT /transactions/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::transactionService()->update($id, $data));
});

/**
* delete todo
*/
Flight::route('DELETE /transactions/@id', function($id){
  Flight::transactionService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
