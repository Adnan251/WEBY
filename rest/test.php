<?php

require_once dirname(__FILE__)."/dao/UsersDao.class.php";

$user_dao = new UsersDao();

//$user = $user_dao->get_user_by_email("'adnan.dzindo@stu.ibu.edu.ba'");

$user = [
  "user_name" => "Kenan Bektas",
  "password" => "WhyMe251",
  "email" => "keno@gmail.com",
  "birthday" => "2000-03-21",
  "creditcard_id" => "4",
];
$user_dao->add_user($user);

//print_r($user);
echo jason_encode($user, JSON_PRETTY_PRINT);
?>
