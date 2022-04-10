<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class UsersDao extends BaseDao{

  public function get_by_email($email){
    return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email"=> $email]);
  }

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id"=> $id]);
  }

  public function get_by_username($user_name){
    return $this->query_unique("SELECT * FROM users WHERE user_name = :user_name", ["user_name"=> $user_name]);
  }

  public function add_user($user){
    $sql = "INSERT INTO users (user_name, password, email, birthday, creditcard_id) VALUES (:user_name, :password, :email, :birthday, :creditcard_id))";
    $stmt= $this->connection->prepare($sql);
    $stmt->execute($user);
    $user['id'] = $this->connection->lastInsertId();
    return $user;
  }

  public function update_user_name($id, $user_name){
    return $this->update("UPDATE users SET user_name=:user_name WHERE id=:id", ["id"=>$id, "user_name"=>$user_name]);
  }
  
  public function update_email($id, $email){
    return $this->update("UPDATE users SET email=:email WHERE id=:id", ["id"=>$id, "email"=>$email]);
  }

  public function update_birthday($id, $birthday){
    return $this->update("UPDATE users SET birthday=:birthday WHERE id=:id", ["id"=>$id, "birthday"=>$birthday]);
  }

}

 ?>
