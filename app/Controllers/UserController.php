<?php 
namespace Ecom\Controllers;
use PDO;
use PDOException;


class UserController
{

  private $conn;
    public function __construct()
    {
       

try {
  session_start();
  $this->conn = new PDO("mysql:host=localhost;dbname=ecom", 'root', '');
  // set the PDO error mode to exception
  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully"."<br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
    }

    public function index()
    {

      $query = "SELECT * FROM `users`";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();

    }

    public function store(array $data)
{

  try{

    
    $sql = "INSERT INTO `users` (`name`,`password`) VALUES (:name,:password)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
       'name' => $data['name'],
       'password' => $data['password']
      
    ]);
    $_SESSION['message']= 'created succesfully';
   header('location:./login.php');
  } catch(PDOException $e){
    echo $e->getMessage();
  }
  
}

public function authenticate($username, $password)
{
    $query = "SELECT * FROM `users` WHERE `name` = :name AND `password` = :password";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([
        'name' => $username,
        'password' => $password,
    ]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}








}



?>