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

$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
$cpf = $_GET['cpf'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$id=$_GET['id'];
$count = $dbh->exec("update usuario set nome='$nome', 
   telefone='$telefone',cpf='$cpf',email='$email',senha='$senha' where id=$id");
?>



<script>
    window.location ="../../pagina/consulta/usuario.php"
</script>