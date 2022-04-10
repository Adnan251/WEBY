<?php
require_once dirname(__FILE__)."/../config.php";

class BaseDao {
  protected $connection;

  public function __construct(){

    try {
      $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DB_USERNAME, Config::DB_PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      throw $e;
    }
  }


  public function query($query, $parameter){
    $stmt = $this->connection->prepare($query);
    $stmt->execute($parameter);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function query_unique($query, $paramiter){
    $results = $this->query($query, $paramiter);
    return reset($results);
  }

  public function add($todo){
    $stmt = $this->connection->prepare("INSERT INTO users () VALUES (:user_name, :password, :email, :birthday, :creditcard_id)");
    $stmt->execute($todo);
    $todo['id'] = $this->connection->lastInsertId();
    return $todo;
  }

  public function update($todo){
    $stmt = $this->connection->prepare("UPDATE users SET user_name=:user_name, password=:password, email=:email, birthday=:birthday WHERE id=:id");
    $stmt->execute($todo);
    return $todo;
  }
}

 ?>
