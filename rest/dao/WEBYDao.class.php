<?php
class WEBYDao{

  private $conn;

  public function __construct(){
    $servername = "WEBY_SQL";
    $username = "AdnanDzindo@localhost";
    $password = "SQLAdnan251";
    $schema = "weby_db";

    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      throw $e
    }
  }

  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM user");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  public function add($todo){
    $stmt = $this->conn->prepare("INSERT INTO user () VALUES (:description, :created)");
    $stmt->execute($todo);
    $todo['id'] = $this->conn->lastInsertId();
    return $todo;
  }

  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM user WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function update($todo){
    $stmt = $this->conn->prepare("UPDATE user SET first_name=:first_name, last_name=:last_name WHERE id=:id");
    $stmt->execute($todo);
    return $todo;
  }
}

 ?>
