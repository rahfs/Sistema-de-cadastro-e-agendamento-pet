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


$nomepet = $_GET['nomepet'];
$idadepet = $_GET['idadepet'];
$pesopet = $_GET['pesopet'];
$racapet = $_GET['racapet'];
//$sexopet = $_POST['sexopet'];
$obs= $_GET['obs'];

$id_pet = $_GET['id_pet'];
$count = $dbh->exec("update pet set nomepet='$nomepet',idadepet='$idadepet',pesopet='$pesopet',racapet='$racapet',obs='$obs' where id_pet=$id_pet");
?>

<script>
    window.location ="../../pagina/consulta/pet.php"
</script>