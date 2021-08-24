<?php
require '../../banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $enderecoErro = null;
    $telefoneErro = null;
    $emailErro = null;
    $sexoErro = null;
    $nomepetErro = null;
    $senhaErro= null;
    $cpfErro= null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        } else {
           //$nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }


        if (!empty($_POST['endereco'])) {
            $endereco = $_POST['endereco'];
        } else {
           // $enderecoErro = 'Por favor digite o seu endereço!';
            $validacao = False;
        }


        if (!empty($_POST['telefone'])) {
            $telefone = $_POST['telefone'];
        } else {
           // $telefoneErro = 'Por favor digite o número do telefone!';
            $validacao = False;
        }
    
    
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
               // $emailErro = 'Por favor digite um endereço de email válido!';
                $validacao = False;
            }
        } else {
           // $emailErro = 'Por favor digite um endereço de email!';
            $validacao = False;
        }
    
    
    if (!empty($_POST['nomepet'])) {
            $nomepet = $_POST['nomepet'];
        } else {
           // $nomepetErro = 'Por favor digite o nome do mascote!';
            $validacao = False;
        }


        if (!empty($_POST['sexo'])) {
            $sexo = $_POST['sexo'];
        } else {
          // $sexoErro = 'Por favor seleccione um campo!';
            $validacao = False;
        }
    

        if (!empty($_POST['senha'])) {
            $senha = $_POST['senha'];
        } else {
           // $senhaErro = 'Por favor digite a sua senha!';
            $validacao = False;
        }
      
      
        if (!empty($_POST['cpf'])) {
            $cpf = $_POST['cpf'];
        } else {
           // $cpfErro = 'Por favor digite a sua senha!';
            $validacao = False;
        }
    }

//Inserindo no Banco:
   /* if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuario ( nome,nomepet,idadepet,telefone,cpf,email,senha) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array( $nome, $nomepet, $idadepet,$telefone,$cpf, $email, $senha));
        Banco::desconectar();
        header("Location: index.php");
    }*/
}
/*$nome = $_POST['nome'];
$nomepet = $_POST['nomepet'];
$dsn ='mysql:dbname=tabelapet;host=127.0.0.1';
$user ='root';
$password='';
try{
    $dbh= new PDO($dsn, $user, $password);
}
catch(PDOException $e){
    echo 'Connection failed'. $e->getMessage();
}
$sql ="insert into usuario(nome,nomepet)
values ('$nome','$nomepet')";
$count = $dbh->exec($sql);
*/

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../CS/consultaadm.css">
    <title>Saúde pet</title>
	
	
	
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>-->

	
	<script type="text/javascript">
$(document).ready(function()
{
 // Activate tooltip
 $('[data-toggle="tooltip"]').tooltip();
 
 // Select/Deselect checkboxes
 var checkbox = $('table tbody input[type="checkbox"]');
 $("#selectAll").click(function()
 {
  if(this.checked){
   checkbox.each(function()
   {
    this.checked = true;                        
   });
  }
  else
  {
   checkbox.each(function()
   {
    this.checked = false;                        
   });
  } 
 });
 checkbox.click(function()
 {
  if(!this.checked)
  {
   $("#selectAll").prop("checked", false);
  }
 });
});

/*$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );*/
</script>
	
	
	
	
	
	
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2><b>Saúde Pet</b></h2>
     </div>
     <a href="../../pagina/menu/menuadm.php" class="btn btn-success" data-toggle="modal"> <span>Voltar</span></a>
                </div>
            </div>
            <table id="minhaTabela" class="table table-striped table-hover">
                <thead>
                    <tr>
     <!-- <th>
       <span class="custom-checkbox">
        <input type="checkbox" id="selectAll">
        <label for="selectAll"></label>
       </span>
      </th>-->

                        <th>ID</th>
                        <th>Name do Mascote</th>
                        <th>Raça do Mascote</th>
                        <th>Nome do Responsavel</th>
                        
                        <th>Ações</th>
                    </tr>
                </thead>
                 <tbody>
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
                        
                        $sql = 'SELECT * FROM usuario u inner join pet p
                         on u.id = p.id_usuario 
                         ORDER BY u.id asc';
                        foreach($dbh->query($sql)as $row)
                        {
                         
                          
                            echo '<tr>';
                          
			                      echo '<td scope="row">'. $row['id_pet'] . '</td>'; 
                            
                            echo '<td>'. $row['nomepet'] . '</td>';
                            echo '<td>'. $row['racapet'] . '</td>';
                            echo '<td>'. $row['nome'] . '</td>';
                           
                            echo '<td width=250>';
                            echo '<a href="../../crud/pet/petinfo.php?id_pet='.$row['id_pet'].'" class="info" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Info">&#xe853;</i></a>';
                            echo ' ';
                            
                             echo '<a href="../../crud/pet/petupdate.php?id_pet='.$row['id_pet'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Atualizar Pet">&#xE254;</i></a>';
                            echo ' ';
                            echo '<a href="../../crud/pet/petdeletar.php?id_pet='. $row['id_pet'] .'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';

                            echo '</td>';
                            echo '</tr>';
                            
                        }
                        
                        ?>
                   </tbody>
            </table>
          
   
        </div>
    </div>
 

  <!-- Adicionar/editar pet HTML -->
 <div id="editpetEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action=<?php echo' ../crud/pet/petinserir.php?id='. $row['id'] .';'?> method="POST">
      
     <div class="modal-header">      
      <h4 class="modal-title">Adicionar Pet</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
      
     <div class="modal-body">     
   
      
      <div class="form-group">
       <label>Nome do Mascote</label>
       <input type="text" class="form-control" name="nomepet" value="" >
      </div>

      <div class="form-group">
       <label>Idade do Mascote </label>
       <input type="text" class="form-control" value="" name="idadepet">
      </div>

      <div class="form-group">
       <label>Peso do Mascote </label>
       <input type="text" class="form-control" value="" name="pesopet">
      </div>

      <div class="form-group">
       <label>Raça do Mascote </label>
       <input type="text" class="form-control" value="" name="racapet">
      </div>
         <div class="form-group">
       <label>Observação</label>
       <textarea class="form-control" name="obs"></textarea>
      </div>
     </div>

     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
      <input type="submit" class="btn btn-success" value="Adicionar">
      
    </div>
    </form>
   </div>
  </div>
 </div>
 <!-- Atualizar usuario HTML -->
 
 <div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action=<?php echo '../crud/usuario/usuupdate.php?id='. $row['id'] .';'?> method="POST">
     <div class="modal-header">      
      <h4 class="modal-title">Editar Usuário</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <div class="form-group">
       <label>Nome </label>
       <input type="text" class="form-control" value="" name="nome" >
      </div>
      <div class="form-group">
       <label>CPF </label>
       <input type="text" class="form-control" value="" name="cpf">
      </div>
      <div class="form-group">
       <label>Telefone </label>
       <input type="text" class="form-control"value="" name="telefone">
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" value="" name="email">
      </div>
      <div class="form-group">
       <label>Senha </label>
       <input type="text" class="form-control" value="" name="senha">
      </div>
      <div class="form-group">
       <label>Observação</label>
       <textarea class="form-control" ></textarea>
      </div>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-info" value="Save">
     </div>
    </form>
   </div>
  </div>
 </div>
 
</body>

</html>
