<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once __DIR__. './services/FoodService.class.php';
require_once __DIR__. './services/IngrediantsService.class.php';
require_once __DIR__. './services/ReservationsService.class.php';
require_once __DIR__. './services/EmailsService.class.php';

Flight::register('foodService', 'FoodService');
Flight::register('ingrediantsService', 'IngrediantsService');
Flight::register('reservationsService','ReservationsService');
Flight::register('emailsService','EmailsService');


/*Flight::map('error', function(Exception $ex){
    // Handle error
    Flight::json(['message' => $ex->getMessage()], 500);
});*/

require_once __DIR__. '/routes/FoodRoutes.php';
require_once __DIR__. '/routes/IngrediantsRoutes.php';
require_once __DIR__. '/routes/ReservationsRoutes.php';
require_once __DIR__. '/routes/EmailRoutes.php';

Flight::start();
?>
