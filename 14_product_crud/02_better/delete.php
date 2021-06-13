<?php 

/**@var $pdo \PDO */
require_once 'database.php';

$id=$_POST['id'] ?? null;
$statement = $pdo->prepare('delete from products where id=:id');

$statement ->bindValue(":id",$id);



if(!$id){
    header("Location: index.php");

}
$statement ->execute();
header("Location: index.php")

?>