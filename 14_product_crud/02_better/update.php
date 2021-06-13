

<?php

/**@var $pdo \PDO */
require_once 'database.php';
require_once 'functions.php';
$id = $_GET['id'] ?? null;

if (!$id) {

    header('Location: index.php');
    exit;
}
$statement = $pdo->prepare('select * from products where id =:id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

$price = $product['price'];
$title = $product['title'];
$description = $product['description'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];


    if (!$title) {
        $errors[] = 'title needs to be filled';
    }

    if (!$price) {
        $errors[] = 'price needs to be filled';
    }
    if (!is_dir("images")) {
        mkdir("images");
    }

    

    if (empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagePath = $product['image'];
        if ($image && $image['tmp_name']) {
            if ($product['image']) {
                unlink($product['image']);
            }
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $statement = $pdo->prepare("UPDATE  products SET title=:title,image=:image,description=:description,price=:price where id=:id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':id', $id);        
        $statement->execute();
        header('Location: index.php');
    }
}


?>

<?php include_once 'Views/partials/header.php' ?>
<h1>Update Product <b><?php echo $product['title']; ?></b></h1>
<?php include_once 'Views/products/_form.php'; ?>
