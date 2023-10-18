<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include './../vendor/autoload.php';
    use Ecom\Controllers\ProductController;
    $productController = new ProductController;

    $products = $productController->index();
    ?>

    <div class="container mt-5">
        <a href="./create.php" class="btn btn-primary mb-3">Add New</a>

        <?php 
        if(isset($_SESSION['message'])){
            echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
            unset($_SESSION['message']);
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <!-- <th>ID</th> -->
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sl = 0;
                foreach($products as $product){ 
                ?>
                <tr>
                    <td class="text-center"><?= ++$sl ?></td>
                    <!-- <td><?= $product['id'] ?></td> -->
                    <td class="text-center"><?= $product['title'] ?></td>
                    <td class="text-center">
                        <img src="./../assets/uploads/products/<?= $product['image'] ?>" alt="" style="max-height: 100px; max-width: 100px;">
                    </td>
                    <td class="text-center">
                        <a href="./show.php?id=<?= $product['id'] ?>" class="btn btn-info btn-sm">Show</a>
                        <a href="./edit.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="./delete.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts (at the end of the body) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
