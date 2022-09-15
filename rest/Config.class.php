<?php

class Config {

  public static function DB_HOST(){
    return Config::get_env("DB_HOST", "eu-cdbr-west-03.cleardb.net");
  }
  public static function DB_USERNAME(){
    return Config::get_env("DB_USERNAME", "bdd1717f590982");
  }
  public static function DB_PASSWORD(){
    return Config::get_env("DB_PASSWORD", "7f7b4e6e");
  }
  public static function DB_SCHEME(){
    return Config::get_env("DB_SCHEME", "heroku_671e02bc8690d67");
  }
  public static function DB_PORT(){
    return Config::get_env("DB_PORT", "3306");
  }
  public static function JWT_SECRET(){
    return Config::get_env("JWT_SECRET", "4XVZkOJmP2");
  }

  public static function get_env($name, $default){
   return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }
}

?>
