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



$id = $_POST['id'];
$id_usuario = $id;

$nomepet = $_POST['nomepet'];
$idadepet = $_POST['idadepet'];
$pesopet = $_POST['pesopet'];
$racapet = $_POST['racapet'];
$obs = $_POST['obs'];










$sql ="insert into pet(nomepet,idadepet,pesopet,racapet,obs,id_usuario)
values ('$nomepet','$idadepet','$pesopet','$racapet','$obs','$id_usuario')";
$count = $dbh->exec($sql);
        header("Location: ../../pagina/consulta/usuario.php");
    

?>

<!--<script>
    window.location ="teste.php"
</script>
