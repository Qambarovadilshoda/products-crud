<?php

require 'database.php';

$productModel = new ProductModel($db);
$products = $productModel->index();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>

<body>
    <h2>Product List</h2>
    <?php foreach ($products as $product) : ?>
        • Name: <?php echo htmlspecialchars($product['name']); ?><br><br>
        • Price: <?php echo $product['price']; ?><br><br>
        <?php if (!empty($product['photo'])): ?>
        • Photo: <img src="<?php  echo htmlspecialchars($product['photo']); ?>"width="100px" height="90px"alt="Product photo"> <br><br>
        <?php else: ?>
            <p>Rasm mavjud emas</p>
            <?php endif; ?>
        <a href="edit.php?id= <?php echo $product['id'] ?>">Edit</a>
        <a href='delete.php?id= <?php echo $product['id'] ?>'>Delete</a><br><br><br><br>

    <?php endforeach; ?>
</body>

</html>