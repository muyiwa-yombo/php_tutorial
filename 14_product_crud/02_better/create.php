
<?php

/**@var $pdo \PDO */
require_once 'database.php';
require_once 'functions.php';
$erros = [];
$title = '';
$price = '';
$description = '';
$product =[
    'image' => ''
];


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

 
?>

<?php include_once 'Views/partials/header.php'?>
<h1>Create Product</h1>
<?php include_once 'Views/products/_form.php'; ?>
