<?php
class WEBYDao{

  private $conn;



  $servername = "sql.freedb.tech";
  $username = "freedb_WhyMeGod";
  $password = "Rbh6?2HQh@Qz&S@";
  $schema = "freedb_Web-nesta";

  try {
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM Users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  public function add($todo){
    $stmt = $this->conn->prepare("INSERT INTO Users (description, created) VALUES (:description, :created)");
    $stmt->execute($todo);
    $todo['id'] = $this->conn->lastInsertId();
    return $todo;
  }

  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM Users WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function update($todo){
    $stmt = $this->conn->prepare("UPDATE Users SET first_name=:first_name, last_name=:last_name WHERE id=:id");
    $stmt->execute($todo);
    return $todo;
  }
}

 ?>
