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
$id_atendimento=$_GET['id_atendimento'];
$count = $dbh->exec("delete from atendimento where id_atendimento=".$id_atendimento."");
    
?>

<script>
    window.location ="../../pagina/consulta/agenda.php"
</script>
