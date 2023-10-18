<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php 
    include './vendor/autoload.php';
    use Ecom\Controllers\ProductController;
    $productController = new ProductController;

    $products = $productController->index();
    ?>

    <?php include_once './navbar.html'; ?>

    <main>
        <div  class="container">
            <div  class="row">
                <?php foreach($products as $product){ ?>
                    <div  class="col-md-4 mb-4">
                        <div  class="card">
                            <img style="height: 300px;" src="./assets/uploads/products/<?=$product['image']?>" class="card-img-top" alt="<?=$product['title']?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=$product['title']?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Price</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
