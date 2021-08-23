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

  ?>
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
<tbody>
  <?php

  $id=$_GET['id'];

   echo' <div id="addpetEmployeeModal" >
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="petinserir.php" method="post">
      
     <div class="modal-header">      
      <h4 class="modal-title">Adicionar Mascote</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
      
     <div class="modal-body">   

      <div class="form-group">
       <label>Nome do Mascote</label>
       <input type="text" class="form-control" name="nomepet">
      </div>

      <div class="form-group">
       <label>Idade do Mascote </label>
       <input type="text" class="form-control" name="idadepet">
      </div>
      
      <div class="form-group">
       <label>Peso</label>
       <input type="text" class="form-control"  name="pesopet">
      </div>
      <div class="form-group">
       <label>Raça</label>
       <input type="text" class="form-control"  name="racapet">
      </div>
      
      <div class="form-group">
       <label>Observação</label>
       <textarea class="form-control" name="obs"></textarea>
      </div>
     </div>

     <div class="modal-footer">
      <button class="btn btn-default"><a href="../../pagina/consulta/usuario.php">Cancelar</a></button>
      <input type="submit" class="btn btn-success" value="Adicionar">
      
    </div>
    <input type="hidden" name="id" value="'.$id.'">
    </form>
   </div>
  </div>
 </div>';


?>
</tbody>
</html>