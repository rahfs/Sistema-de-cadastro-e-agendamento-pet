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
$id=$_GET['id'];
$count = $dbh->exec("delete from usuario where id=".$id."");
    
?>

<script>
    window.location ="../../pagina/consulta/usuario.php"
</script>