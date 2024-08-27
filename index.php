<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
</head>

<body>
    <h2>Products</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="name"><br><br>
        Price:<input type="text" name="price"><br><br>
        <input type="file" name="photo"><br><br>
        <button type="submit">Submit</button><br><br>
    </form>

    <form action="read.php">
        <button type="submit">Read All</button>
    </form>
    <a href="show.php">Read one</a>
</body>

</html>