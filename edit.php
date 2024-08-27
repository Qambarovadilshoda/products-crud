<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h2>Edit Product</h2>
    <?php

require 'database.php';

    $productModel = new ProductModel($db);

    if (isset($_GET['id'])) {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $product = $productModel->show($id);
        
        if ($product) {
            echo '<form action="update.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id" value="' . $product['id'] . '"><br><br>';
            echo '<label for="name">Name:</label>';
            echo '<input type="text" name="name" value="' . $product['name'] . '" required><br><br>';
            echo '<label for="price">Price:</label>';
            echo '<input type="text" name="price" value="' . $product['price'] . '" required><br><br>';
            echo '<label for="photo">Photo:</label>';
            echo '<input type="file" name="photo" value="' . $product['photo'] . '" required><br><br>';
            echo '<button type="submit">Update Product</button><br>';
            echo '</form>';
        } else {
            echo '<p>Mahsulot mavjud emas.</p>';
        }
    } else {
        echo '<p>Noto\'g\'ri so\'rov.</p>';
    }
    ?>
    <a href="index.php">Ortga qaytish</a>
</body>

</html>