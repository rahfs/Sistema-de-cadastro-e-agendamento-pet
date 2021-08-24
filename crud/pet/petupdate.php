<html>
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  button a{
    color:black;
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


$id_pet= $_GET['id_pet'];

$sql = "SELECT * FROM pet where id_pet=$id_pet";
 foreach($dbh->query($sql)as $row){
echo'
<div id="editEmployeeModal" >
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="update.php" method="GET">
     <div class="modal-header">      
      <h4 class="modal-title">Editar Mascote</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
      <div class="modal-body">     
   
      
      <div class="form-group">
       <label>Nome do Mascote</label>
       <input type="text" class="form-control" name="nomepet" value="'.$row['nomepet'].'" >
      </div>

      <div class="form-group">
       <label>Idade do Mascote </label>
       <input type="text" class="form-control" name="idadepet" value="'.$row['idadepet'].'">
      </div>

      <div class="form-group">
       <label>Peso do Mascote </label>
       <input type="text" class="form-control" name="pesopet" value="'.$row['pesopet'].'">
      </div>

      <div class="form-group">
       <label>Raça do Mascote </label>
       <input type="text" class="form-control" name="racapet" value="'.$row['racapet'].'">
      </div>
         <div class="form-group">
       <label>Observação</label>
       <textarea class="form-control" name="obs"></textarea>
      </div>
     </div>

     <div class="modal-footer">
      <button class="btn btn-default"><a href="../../pagina/consulta/pet.php">Cancelar</a></button>
      <input type="submit" class="btn btn-info" value="Alterar">
     </div>
      <input type="hidden" name="id_pet" value='.$row['id_pet'].'>
     </form>
   </div>
  </div>
 </div>  ';
}
    ?></body></html>
