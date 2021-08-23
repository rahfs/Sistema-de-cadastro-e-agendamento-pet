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
    <script>
              function minhalista(){

                var x= document.getElementById("minhaescolha").value;

                document.getElementById("demo").innerHTML = $id;
              }

  // Passando data do banco "AAAA-MM-DD" para "DD/MM/AAAA"   

            function mostraData ($data) {   

            if ($data!='') {   
               return (substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4));   

            }   

           else { return ''; }   

           }   
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
         <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons add_comment">&#xe266;</i> <span>Adicionar consulta</span></a>
            -->
         </div>
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

                            <th>Data</th>
                            <th><i class="material-icons access_alarm">&#xe190;</i>Horário</th>
                            <th>Nome do Responsavel</th>
                            <th>Nome do Mascote</th>
                            <th>Tipo de Consulta</th>
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
                            //$sql = 'SELECT * FROM usuario,pet,atendimento,agenda ORDER BY data asc';

                            $sql='SELECT * FROM usuario u 
                            inner join pet p ON u.id=p.id_usuario 
                            inner JOIN atendimento att on att.id_atendimento_pet = p.id_pet
                            ORDER by att.data';
                            foreach($dbh->query($sql)as $row)
                            {
                              
                                echo '<tr>';
                                
                                echo '<td>'. $row['data'] . '</td>';
    			                      echo '<td>'. $row['horario'] . '</td>';
                                echo '<td>'. $row['nome'] . '</td>';
                                 echo '<td>'. $row['nomepet'] . '</td>';
                                 echo' <td>'.$row['tipo_consulta'].'</td>';
                               /*echo '<td scope="row">'. $row['id'] . '</td>';
                                
                                
                               */
                                
                                echo '<td width=250>';
                                /*echo '
                                <a href="../../crud/agenda/infoconsultas.php" 
                                class="info" data-toggle="modal">
                                
                                <i class="material-icons assignment_late" title="Info Consulta">&#xe85f; </i></a>';*/
                                echo ' ';
                                echo '
                                <a href="../../crud/agenda/editarconsultaadmconsulta.php?id_atendimento='.$row['id_atendimento'].'&data='.$row['data'].'&horario='.$row['horario'].'&nomepet='.$row['nomepet'].'&cpf='.$row['cpf'].'&nome='.$row['nome'].'"
                                 class="editpet" data-toggle="modal">
                                 <i class="material-icons calendar_today" title="Editar Consulta">&#xe935;</i>
                                 </a>';
                                
                                echo ' ';
                                echo '
                                <a href="../../crud/agenda/atendeletar.php?id_atendimento='.$row['id_atendimento'].'" 
                                 class="delete"data-toggle="modal">
                                 <i class="material-icons" data-toggle="tooltip" title="Deletar Consulta">
                                 &#xE872;
                                 </i></a>';

                                echo '</td>';
                                echo '</tr>';
                                
                            }
                            
                            ?>
                       </tbody>
                </table>
              
       
            </div>
        </div>
     <!-- Adicionar horarios HTML -->
     <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
       <div class="modal-content">
        <form action="../../crud/agenda/inseriradm.php" method="POST">
          
         <div class="modal-header">      
          <h4 class="modal-title">Adicionar  Horário</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
          
         <div class="modal-body">     
       
          <div class="form-group " >
            
            <label>Horário </label>
           <input type="time" class="form-control" name="horario" value="">
          </div>

          <div class="form-group">
           <label>Data </label>
           <input type="date" class="form-control" name="data" value="" >
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </body>
  </html>