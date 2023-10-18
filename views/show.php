<?php

include './../vendor/autoload.php';

use Ecom\Controllers\ProductController;

$productController = new ProductController;

$product = $productController->show($_GET['id']);


?>

<h1>Id: <?= $product['id'] ?></h1> 
<h1>Title: <?= $product['title'] ?></h1> <br>

 <img style="width:250px;height:250px" src="./../assets/uploads/products/<?= $product['image'] ?>" alt=""> 


<a href="./index.php">List</a>
