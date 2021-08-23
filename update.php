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


$id_atendimento=$_POST['id_atendimento'];


$id_pet=$_POST['id_pet'];

$tipo_consulta = $_POST['tipo_consulta'];


var_dump($id_pet,$tipo_consulta); 

$count = $dbh->exec("update atendimento set id_atendimento_pet ='$id_pet', tipo_consulta='$tipo_consulta' where id_atendimento='$id_atendimento'");
        header("Location: ../../pagina/consulta/agenda.php");
   

?>

<!--<script>
    window.location ="teste.php"
</script>