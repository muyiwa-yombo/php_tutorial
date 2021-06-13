<?php
require_once "header.php"
?>

<?php
$id = $_GET['id'] ?? null;

if (!$id) {

    header('Location: index.php');
    exit;
}
$pdo = new PDO("mysql:host=localhost; port=3306; dbname=products_crud", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <?php
            foreach ($errors as $error) { ?>
                <div>
                <?php
                echo $error;
            }
                ?>
                </div>

            <?php } ?>

        </div>

        <a href="index.php" class="btn btn-secondary">go back to products</a>
        <h1>Update Product <b><?php echo $product['title']; ?></b></h1>

        <?php if ($product['image']) { ?>

            <img src="<?php echo $product['image']; ?>" width="100px" alt="no product image">

        <?php } ?>
        <div class="mb-3">


            <input type="file" id="image" aria-describedby="emailHelp" name="image" id="image">
        </div>
        <div class="mb-3">

            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="<?php echo $product['title']; ?>">
        </div>




        <div class="mb-3">

            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description"><?php echo $product['description']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=".01" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="<?php echo $product['price']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</form>