<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  button a {
    color: black;
  }

  button a:hover{
    text-decoration: none;
  }
  </style>
</head>
<body>
  <?php
$dsn ='mysql:dbname=tabelapet;host=127.0.0.1';
$user ='root';
$password='';

try{
    $dbh= new PDO($dsn, $user, $password);
} catch(PDOException $e){
    echo 'Connection failed'. $e->getMessage();
}
$id= $_GET['id'];

$sql = "SELECT * FROM usuario where id=$id";
 foreach($dbh->query($sql)as $row){
echo'
<div id="editEmployeeModal" >
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="usuupdate.php" method="GET">
     <div class="modal-header">      
      <h4 class="modal-title">Editar Usuário</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">
      <div class="form-group">
       <label>Nome </label>
       <input type="text" class="form-control" name="nome" size="30" value="'.$row['nome'].'" >
      </div>
      <div class="form-group">
       <label>Telefone </label>
       <input type="text" class="form-control" minlength="10" maxlength="11" name="telefone" value="'.$row['telefone'].'" >
      </div>
      <div class="form-group">
       <label>CPF </label>
       <input type="text" class="form-control" minlength="11" maxlength="11" name="cpf" value="'.$row['cpf'].'" >
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" minlength="10"name="email" size="50" value="'.$row['email'].'" >
      </div>
      <div class="form-group">
       <label>Senha </label>
       <input type="password" class="form-control" minlength="8" maxlength="15" name="senha" value="'.$row['senha'].'" >
      </div>
     </div>
     <div class="modal-footer">
      <button class="btn btn-default"><a href="../../pagina/consulta/usuario.php">Cancelar</a></button>
      <input type="submit" class="btn btn-info" value="Alterar">
     </div>
      <input type="hidden" name="id" value="'.$row['id'].'">
     </form>
   </div>
  </div>
 </div>  ';
}
    ?></body></html>