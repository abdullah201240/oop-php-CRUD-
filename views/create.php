<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once './../navbar.html' ?>
    <div class="container mt-5">
        <a href="./index.php" class="btn btn-primary mb-3">Product List</a>
        <form action="./store.php" method="post" enctype="multipart/form-data" class="border p-3" style="max-width: 500px; margin: 0 auto;">
            <div class="form-group">
                <h1>Insert New Product</h1>
                <label for="title">Product Name:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Product Title">
                <?php
                if(isset($_SESSION['errors'])){
                    echo '<small class="text-danger">'.$_SESSION['errors']['title'].'</small>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <?php
                if(isset($_SESSION['errors'])){
                    echo '<small class="text-danger">'.$_SESSION['errors']['image'].'</small>';
                    unset($_SESSION['errors']);
                }
                ?>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
