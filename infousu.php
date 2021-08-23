<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <form action="../../pagina/consulta/usuario.php" method="GET">
     <div class="modal-header">      
      <h4 class="modal-title">Informação do Usuário</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">

      <div class="form-group">
       <label>Nome </label>
       <input type="text" class="form-control"  
       name="nome" value="'.$row['nome'].'" disabled>
      </div>

      <div class="form-group">
       <label>Telefone </label>
       <input type="text" class="form-control"
        name="telefone" value="'.$row['telefone'].'" disabled>
      </div>

      <div class="form-group">
       <label>CPF </label>
       <input type="text" class="form-control" 
       name="cpf" value="'.$row['cpf'].'" disabled>
      </div>
      
      <div class="form-group">
       <label>Email</label>
       <input type="text" class="form-control" 
       name="email" value="'.$row['email'].'" disabled>
      </div>
      <div class="form-group">
       <label>Senha </label>
       <input type="text" class="form-control" 
       name="senha" value="'.$row['senha'].'" disabled>
      </div>
      
     </div>

     <div class="modal-footer">
      
      <input type="submit" class="btn btn-info" value="Voltar">
     </div>
      <input type="hidden" name="id" value='.$row['id'].'>
     </form>
   </div>
  </div>
 </div>  ';
}
    ?></body></html>