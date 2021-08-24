<?php
$dsn ='mysql:dbname=tabelapet;host=127.0.0.1';
$user ='root';
$password='';
try{
    $dbh= new PDO($dsn, $user, $password);
}
catch(PDOException $e){
    echo 'Connection failed'. $e->getMessage();
}

session_start();
$_SESSION['id'];


$nomepet = $_GET['nomepet'];
$idadepet = $_GET['idadepet'];
$pesopet = $_GET['pesopet'];
$racapet = $_GET['racapet'];
//$sexopet = $_POST['sexopet'];
$id_usuario = $_SESSION['id'];
$sql ="insert into pet(nomepet,idadepet,pesopet,racapet,id_usuario) values ('$nomepet','$idadepet','$pesopet','$racapet',$id_usuario)";
$count = $dbh->exec($sql);
?>

<script>
    window.location ="../../pagina/menu/menuusu.php"
</script>
