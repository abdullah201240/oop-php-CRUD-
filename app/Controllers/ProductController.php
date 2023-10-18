<?php 
namespace Ecom\Controllers;
use PDO;
use PDOException;




class ProductController
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

      $query = "SELECT * FROM `products`";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();

    }

    public function store(array $data)
{

  try{

    // validation start
    if(strlen($data['title'])>255){
      $_SESSION['errors']['title']= "Title should not be more than 255 character";
    }

    $allowedImageFormage = ['jpeg','jpg','png'];
    $fileName = $_FILES['image']['name'];
    $exploidFile = explode('.',$fileName);
    $fileExtention = end ($exploidFile);

    if($_FILES['image']['size']>1000000){
      $_SESSION['errors']['image']= "maximul 1MB allowed";
      
    } else if(!in_array($fileExtention,$allowedImageFormage)){
      $_SESSION['errors']['image']= implode('/',$allowedImageFormage);
      
    } 
    
    // validation end
    
    if(isset($_SESSION['errors'])){
      header('location:./create.php');
      die();
      
    }
    
    
    $unicFileName = date('y-m-d').'-'.time().'.'.$fileExtention;
    $tempName = $_FILES['image']['tmp_name'];
    $uploadDir = './../assets/uploads/products/';
    move_uploaded_file($tempName,$uploadDir.$unicFileName);
    
    $sql = "INSERT INTO `products` (`title`,`image`) VALUES (:title,:image)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
       'title' => $data['title'],
       'image' => $unicFileName
    ]);
    $_SESSION['message']= 'created succesfully';
    header('location:./index.php');
  } catch(PDOException $e){
    echo $e->getMessage();
  }
  
}

public function show($id)
{
 $sql = "SELECT * FROM `products` WHERE id = $id";
 $stmt = $this->conn->prepare($sql);
 $stmt->execute();
 return $stmt->fetch();

}


public function update(array $data)
{
  try {
     // validation start
     if(strlen($data['title'])>255){
      $_SESSION['errors']['title']= "Title should not be more than 255 character";
    }

    $allowedImageFormage = ['jpeg','jpg','png'];
    $fileName = $_FILES['image']['name'];
    $exploidFile = explode('.',$fileName);
    $fileExtention = end ($exploidFile);

    if($_FILES['image']['size']>1000000){
      $_SESSION['errors']['image']= "maximul 1MB allowed";
      
    } else if(!in_array($fileExtention,$allowedImageFormage)){
      $_SESSION['errors']['image']= implode('/',$allowedImageFormage);
      
    } 
    
    // validation end
    
    if(isset($_SESSION['errors'])){
      header('location:./create.php');
      die();
      
    }
    
    
    $unicFileName = date('y-m-d').'-'.time().'.'.$fileExtention;
    $tempName = $_FILES['image']['tmp_name'];
    $uploadDir = './../assets/uploads/products/';
    move_uploaded_file($tempName,$uploadDir.$unicFileName);

    $sql = "UPDATE `products` SET `title` = :title, `image` = :image WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
       'title' => $data['title'],
       'image' => $unicFileName,
       'id' => $data['id']
    ]);
    $_SESSION['message'] = 'Updated successfully';
    header('location: ./index.php');
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}


public function destroy( int $id)
{
  
  try {
    $sql = "DELETE FROM products WHERE id=$id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $_SESSION['message'] = 'Deleted successfully';
    header('location:./index.php');
    
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}



}



?>