<?php
/**
* List all emails
*/
Flight::route('GET /email', function(){
  Flight::json(Flight::emailsService()->get_all());
});

/**
* List invidiual emails
*/
Flight::route('GET /email/@id', function($id){
  Flight::json(Flight::emailsService()->get_by_id($id));
});

/**
* add emails
*/
Flight::route('POST /email', function(){
  Flight::json(Flight::emailsService()->add(Flight::request()->data->getData()));
});

/**
* delete emails
*/
Flight::route('DELETE /emails/@id', function($id){
  Flight::emailsService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
