<?php


$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$dsn ='mysql:dbname=tabelapet;host=127.0.0.1';
$user ='root';
$password='';

try{
    $dbh= new PDO($dsn, $user, $password);
}
catch(PDOException $e){
    echo 'Connection failed'. $e->getMessage();
}

$sql ="insert into usuario(nome,telefone,cpf,email,senha)
values ('$nome','$telefone','$cpf','$email','$senha')";
$count = $dbh->exec($sql);
header("Location: ../../pagina/consulta/usuario.php");

?>