
<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php 

include './../vendor/autoload.php';

use Ecom\Controllers\ProductController;

$productController = new ProductController;

$productController->store($_POST);

?>