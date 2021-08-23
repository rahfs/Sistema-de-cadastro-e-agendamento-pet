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

$count = $dbh->exec("UPDATE atendimento SET  id_atendimento_pet = NULL, tipo_consulta = NULL WHERE id_atendimento ='$id_atendimento'");
    
?>

<script>
    window.location ="../../pagina/consulta/consultas.php"
</script>