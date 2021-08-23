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
$id_pet=$_GET['id_pet'];

$count = $dbh->exec("delete from pet where id_pet=".$id_pet."");
    
?>

<script>
    window.location ="../../pagina/consulta/pet.php"
</script>