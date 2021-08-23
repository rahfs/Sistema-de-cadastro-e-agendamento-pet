<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require "banco.php";

$email=$_POST['email'];
$senha=$_POST['senha'];

$sql=mysqli_query($conectar,"SELECT  * FROM usuario,pet WHERE email='".$email."' AND senha='".$senha."'");

//os dados da consulta são armazenados em linhas
$row=mysqli_num_rows($sql);

if($row==0) { 
    echo' <br/>';
 echo '<script>
        swal({
            title: "Que pena",
            text: "Email/Senha está incorreta.",
            type: "success"
        }).then(function() {
            window.location = "index.html";
        });
</script>';
}

else {
while ($row = $sql->fetch_assoc()) {
$id=$row["id"];
$nome=$row["nome"];
$nomepet=$row['nomepet'];
$id_pet=$row['id_pet'];
$id_usuario=$row['id_usuario'];
$email=$row['email'];
$senha=$row['senha'];
$cpf=$row['cpf'];
$perm=$row['perm'];


//$nome=mysqli_fetch_array($sql);
session_start();


$_SESSION['id'] = $id;
$_SESSION['nome'] = $nome;
$_SESSION['email']= $email;
$_SESSION['senha']= $senha;
$_SESSION['nomepet']=$nomepet;
$_SESSION['id_pet']=$id_pet;
$_SESSION['cpf']=$cpf;

if($perm==2){
	header("Location: pagina/menu/menuadm.php");
}else{
	header("Location: pagina/menu/menuusu.php");
}
}//while
}//
?>