<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '/services/CreditCardService.class.php';
require_once '/services/FoodService.class.php';
require_once '/services/IngrediantsService.class.php';
require_once '/services/OrdersService.class.php';
require_once '/services/TransactionService.class.php';
require_once '/services/UsersService.class.php';

Flight::register('creditCardService', 'CreditCardService');
Flight::register('foodService', 'FoodService');
Flight::register('ingrediantsService', 'IngrediantsService');
Flight::register('ordersService', 'OrdersService');
Flight::register('transactionService', 'TransactionService');
Flight::register('usersService', 'UsersService');


Flight::map('error', function(Exception $ex){
    // Handle error
    Flight::json(['message' => $ex->getMessage()], 500);
});

require_once '/routes/CreditCardService.php';
require_once '/routes/FoodService.php';
require_once '/routes/IngrediantsService.php';
require_once '/routes/OrdersService.php';
require_once '/routes/TransactionService.php';
require_once '/routes/UsersService.php';

Flight::start();
?>
