<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $enderecoErro = null;
    $telefoneErro = null;
    $emailErro = null;
    $sexoErro = null;
  $nomepetErro = null;
  $idadepetErro = null;
  $senhaErro= null;
  $cpfErro= null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        } else {
           /* $nomeErro = 'Por favor digite o seu nome!';*/
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
    
    if (!empty($_POST['idadepet'])) {
            $idadepet = $_POST['idadepet'];
        } else {
           // $idadepetErro = 'Por favor digite a idade do mascote!';
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
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuario ( nome,nomepet,idadepet,telefone,cpf,email,senha) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array( $nome, $nomepet, $idadepet,$telefone,$cpf, $email, $senha));
        Banco::desconectar();
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="consultaadm.css">
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
     <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar novo usuário</span></a>
      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Deletar</span></a>      
     </div>
                </div>
            </div>
            <table id="example"class="table table-striped table-hover">
                <thead>
                    <tr>
      <th>
       <span class="custom-checkbox">
        <input type="checkbox" id="selectAll">
        <label for="selectAll"></label>
       </span>
      </th>

                        <th>ID</th>
                        <th>Name do Mascote</th>
                        <th>Nome do Responsavel</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                 <tbody>
                        <?php
                        
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM usuario ORDER BY id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            
                            echo '<tr>';
                            echo'<th>
                                      <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                          <label for="checkbox1"></label>
                                          </span>
                                          </th>';
			                      echo '<td scope="row">'. $row['id'] . '</td>';
                            echo '<td>'. $row['nomepet'] . '</td>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['telefone'] . '</td>';
                            echo '<td width=250>';
                            echo '<a href="#editEmployeeModal" class="info" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xe853;</i></a>';
                            echo ' ';
                            echo '<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                            echo ' ';
                            echo '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                   </tbody>
            </table>
          
   <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>100</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
 <!-- Adicionar usuario HTML -->
 <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form action="teste.php" method="post">
     <div class="modal-header">      
      <h4 class="modal-title">Adicionar Usuário</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
      
     <div class="modal-body">     
   
      <div class="form-group <?php echo !empty($nomeErro) ? 'error ' : ''; ?>" >
      
        <label>Nome </label>
       <input type="text" class="form-control" name="nome" value="<?php echo !empty($nome) ? $nome : ''; ?>">

      </div>
      <div class="form-group">
       <label>CPF </label>
       <input type="text" class="form-control" value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
      </div>
      <div class="form-group">
       <label>Idade do Mascote </label>
       <input type="text" class="form-control" value="<?php echo !empty($idadepet) ? $idadepet : ''; ?>">
      </div>
      <div class="form-group">
       <label>Nome do Mascote</label>
       <input type="text" class="form-control" name="nomepet" value="<?php echo !empty($nomepet) ? $nomepet : ''; ?>">
      </div>
      <div class="form-group">
       <label>Telefone </label>
       <input type="text" class="form-control" value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" value="<?php echo !empty($email) ? $email : ''; ?>">
      </div>
      <div class="form-group">
       <label>Senha </label>
       <input type="text" class="form-control" value="<?php echo !empty($senha) ? $senha : ''; ?>">
      </div>
         <div class="form-group">
       <label>Observação</label>
       <textarea class="form-control" ></textarea>
      </div>
     </div>

     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
      <input type="submit" class="btn btn-success" value="Adicionar">
      <button class="btn_logar" type="submit">Cadastrar</button>
    </div>
    </form>
   </div>
  </div>
 </div>
 <!-- Atualizar usuario HTML -->
 
 <div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form>
     <div class="modal-header">      
      <h4 class="modal-title">Editar Usuário</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <div class="form-group">
       <label>Nome </label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>CPF </label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Idade do Mascote </label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Nome do Mascote</label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Telefone </label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Senha </label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Observação</label>
       <textarea class="form-control" required></textarea>
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
 <!-- Delete Modal HTML -->
 <div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form>
     <div class="modal-header">      
      <h4 class="modal-title">Deletar Usuário</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <p>Deseja excluir usuario?</p>
      <p class="text-warning"><small>Está ação não pode ser desfeita.</small></p>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-danger" value="Delete">
     </div>
    </form>
   </div>
  </div>
 </div>
</body>

</html>
