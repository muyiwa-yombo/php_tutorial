<?php
require_once "header.php"
?>

<?php

$pdo = new PDO('mysql:host =localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search =$_GET['search'] ?? '';
if($search){
    $statement = $pdo->prepare('select * from products where title like :title order by created DESC');
    $statement -> bindValue(':title',"%$search%");
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
}
else{
$statement = $pdo->prepare('select * from products order by created DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>



<body>
    <h1>Products Crud</h1>
    <p>
    <a href="create.php" class="btn btn-bg btn-success ">Create</a>
    </p>
    <form >
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="search for a product" name="search" value="<?php echo $search ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">image</th>
                <th scope="col">Description</th>
                <th scope="col">price</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $i => $product) { ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $product['title'] ?></td>
                    <td><img src="<?php echo $product['image'] ?>" width="50px" class="thumb-image"></td>
                    <td><?php echo $product['description'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['created'] ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $product['id']; ?>" type="button" class="btn btn-sm btn-primary">Edit</a>
                        <form style="display: inline-block;" action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</a>
                        </form>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

</body>

</html>