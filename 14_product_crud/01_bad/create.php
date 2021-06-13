<?php require_once "header.php" ?>

<?php

$pdo = new PDO('mysql:host =localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$erros = [];
$title = '';
$price = '';
$description = '';


var_dump($_FILES);
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    if (!$title) {
        $erros[] = 'title needs to be filled';
    }

    if (!$price) {
        $erros[] = 'price needs to be filled';
    }
    if(!is_dir("images")){
        mkdir("images");
    }
    
    if(empty($erros)){
        $image =$_FILES['image'] ?? null;
       $imagePath='';
        if($image && $image['tmp_name']){
         
            $imagePath ='images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));
    
            move_uploaded_file($image['tmp_name'],$imagePath);
        }
 
        $statement = $pdo->prepare("insert into products(title,image,description,price,created) values(:title,:image,:description,:price,:date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);   
        $statement->execute();
        header('Location: index.php');
    }

}

function randomString($n){
    $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str='';
    for($i =0;$i <$n;$i++){
        $index =rand(0,strlen($characters)-1);
        $str .=$characters[$index];
    }
    return $str;
} 
?>

<form action="create.php" method="post" enctype="multipart/form-data">
    <?php if (!empty($erros)) { ?>
        <div class="alert alert-danger">
            <?php
            foreach ($erros as $error) { ?>
                <div>
                <?php
                echo $error;
            }
                ?>
                </div>

            <?php } ?>
        </div>
 
        <h1>Create Product</h1>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="<?php $title?>">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description" <?php echo $description ?>></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=".01" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="<?php $price ?>">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
</form>