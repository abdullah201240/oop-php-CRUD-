<?php

include './../vendor/autoload.php';

use Ecom\Controllers\ProductController;

$productController = new ProductController;

$product = $productController->show($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="./index.php" class="btn btn-secondary mb-3">List</a>
        <form action="./update.php" method="post" enctype="multipart/form-data" class="border p-3" style="max-width: 500px; margin: 0 auto;">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <div class="form-group">
                <label for="title">Product Name:</label>
                <input type="text" name="title" class="form-control" value="<?= $product['title'] ?>">
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" name="image" class="form-control-file">
                <img src="./../assets/uploads/products/<?= $product['image'] ?>" alt="Product Image" class="mt-2 img-thumbnail" style="max-width: 200px;">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
