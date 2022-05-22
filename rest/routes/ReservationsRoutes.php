<?php

/**
* List all reservations
*/
Flight::route('GET /reservations', function(){
  Flight::json(Flight::reservationsService()->get_all());
});

/**
* List invidiual reservations
*/
Flight::route('GET /reservations/@id', function($id){
  Flight::json(Flight::reservationsService()->get_by_id($id));
});

/**
* add reservations
*/
Flight::route('POST /reservations', function(){
  Flight::json(Flight::reservationsService()->add(Flight::request()->data->getData()));
});

/**
* update reservations
*/
Flight::route('PUT /reservations/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::reservationsService()->update($id, $data));
});

/**
* delete reservations
*/
Flight::route('DELETE /reservations/@id', function($id){
  Flight::reservationsService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
