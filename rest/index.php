<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '/services/FoodService.class.php';
require_once '/services/IngrediantsService.class.php';
require_once '/services/ReservationService.class.php';

Flight::register('foodService', 'FoodService');
Flight::register('ingrediantsService', 'IngrediantsService');
Flight::register('reservationService','ReservationService')

Flight::map('error', function(Exception $ex){
    // Handle error
    Flight::json(['message' => $ex->getMessage()], 500);
});

require_once '/routes/FoodRoutes.php';
require_once '/routes/IngrediantsRoutes.php';
require_once '/routes/ReservationRoutes.class.php';

Flight::start();
?>
