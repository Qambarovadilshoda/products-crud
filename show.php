<?php
require 'database.php';


$id = isset($_GET['id']) ? $_GET['id'] : null;

$productModel = new ProductModel($db);
$product = $productModel->show($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read one list</title>
</head>
<body>
    <h2>Mahsulotni ko'rish uchun id sini kiriting</h2>
    <form action="show.php" method="get">
        Id product's:<input type="number" name="id"><br><br>
        <button type="submit">Submit</button>
    </form>

    <h2>Product List</h2>
    <?php if ($product) : ?>
        • Name: <?php echo htmlspecialchars($product['name']); ?><br><br>
        • Price: <?php echo isset($product['price']) ? $product['price'] : 'Narx mavjud emas'; ?><br><br>
        • Photo: <img src="<?php echo  htmlspecialchars($product['photo']); ?>" alt="Product Photo" style="max-width: 100px;"><br><br>
    <?php endif; ?>
</body>
</html>