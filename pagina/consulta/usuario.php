    <?php
    require '../../banco.php';
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
          <a href="../../pagina/menu/menuadm.php" class="btn btn-success" data-toggle="modal"> <span>Voltar</span></a>
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar novo usuário</span></a> 
         </div>
                    </div>
                </div>
                <table id="minhaTabela" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
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
                            //$sql = 'SELECT * FROM pet p inner join usuario u on u.id = p.idusu ORDER BY idpet ASC';
                            $sql = 'SELECT * FROM usuario u where (select count(id_usuario) from pet where id_usuario = u.id) = 0 ORDER BY id asc';
                            foreach($dbh->query($sql)as $row)
                            {
                              
                                echo '<tr>';
    			                      echo '<td scope="row">'. $row['id'] . '</td>';
                                echo '<td>'. $row['nome'] . '</td>';
                                echo '<td>'. $row['cpf'] . '</td>';
                                echo '<td width=250>';
                                echo '<a href="../../crud/usuario/infousu.php?id='.$row['id'].'" class="info" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Info">&#xe853;</i></a>';
                                echo ' ';
                                echo '<a href="../../crud/usuario/atualizaradusu.php?id='.$row['id'].'" class="editpet" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Atualizar Usuario">&#xE254;</i></a>';
                                echo ' ';
                                 echo '<a href="../../crud/pet/cadpetadm.php?id='.$row['id'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Adicionar Pet">&#xE254;</i></a>';
                                echo ' ';
                                echo '<a href="../../crud/usuario/deletar.php?id='. $row['id'] .'" class="delete"data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                                echo '</td>';
                                echo '</tr>';  
                            }
                            ?>
                       </tbody>
                </table>
              </div>
        </div>
     <!-- Adicionar usuario HTML -->
     <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
       <div class="modal-content">
        <form action="../../crud/usuario/incluiradm.php" method="POST">
          
         <div class="modal-header">      
          <h4 class="modal-title">Adicionar Usuário</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
            <div class="modal-body">     
            <div class="form-group " >
            <label>Nome </label>
           <input type="text" class="form-control" size="30"name="nome" value="">
          </div>
          <div class="form-group">
           <label>CPF </label>
           <input type="text" class="form-control" minlength="11" maxlength="11" value="" name="cpf">
          </div>
          <div class="form-group">
           <label>Telefone </label>
           <input type="text" class="form-control"  minlength="10"maxlength="11" value="" name="telefone">
          </div>
          <div class="form-group">
           <label>Email</label>
           <input type="email" class="form-control" minlength="10"size="50"value="" name="email">
          </div>
          <div class="form-group">
           <label>Senha </label>
           <input type="password" class="form-control" minlength="8" maxlength="15"value="" name="senha">
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
    </body>
    </html>
