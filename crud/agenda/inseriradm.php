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

$data = date('Y-m-d', strtotime($_POST["data"]));
$horario =  date("h:i:sa", strtotime($_POST["horario"]));

$sql ="insert into atendimento(data,horario) values ('$data','$horario')";
$count = $dbh->exec($sql);
//echo'<a href="../../pagina/consulta/agenda.php"> voltar</a>';
       header("Location: ../../pagina/consulta/agenda.php");
?>
