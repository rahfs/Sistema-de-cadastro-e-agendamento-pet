  <html>
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.min.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
   <script type="text/javascript">


   </script>
  
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
    <script type="text/javascript">
      $(document).ready(function(){
        $("input[name='nomepet']").blur(function(){
          var $nome = $("input[name='nome']");
          $.getJSON('function.php',{
            nomepet:$(this).val()
          },function(json){
              $nome.val(json.nome);
            });
        });
      });
</script>


    <?php
  $dsn ='mysql:dbname=tabelapet;host=127.0.0.1';
  $user ='root';
  $password='';

  try{
      $dbh= new PDO($dsn, $user, $password);
  } catch(PDOException $e){
      echo 'Connection failed'. $e->getMessage();
  }


  $id_atendimento= $_GET['id_atendimento'];
  $horario= $_GET['horario'];
  $data=$_GET['data'];
 

  
  echo'<div class="modal-dialog">';
     echo'<div class="modal-content">';
      echo'<form action="update.php" method="POST">';
       echo'<div class="modal-header">     '; 
        echo'<h4 class="modal-title">Agendar Consulta</h4>';
        echo'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
       echo'</div>';
       
       
        echo'<div class="modal-body">';  


        echo'<div class="form-group " >';
         echo'<label>Horário </label>';
         echo'<input type="time" class="form-control" name="horario" value="'
         .$horario.'" disabled>';
         
         echo' </div>';
     

        echo'<div class="form-group">';
         echo'<label>Data </label>';
         echo'<input type="date" class="form-control" name="data" value="'.$data.'"disabled >';
          echo'</div>';

         

            echo'<div class="form-group " >';
            echo'<label>Nome do Mascote </label>';
          echo' <select class="form-control" id="id_pet" name="id_pet">';
             echo' <option value=""></option>';
             $sqlpet='SELECT * FROM pet p inner join usuario u WHERE p.id_usuario=u.id ';
            foreach($dbh->query($sqlpet)as $row)
            {
               $id_pet = $row['id_pet'];
                      echo'<option    value="'.$id_pet.'">'.$row['nomepet'].' / Nome do Responsavel : '.$row['nome'].' </option>';

          
            }
            echo'</select>';
            echo'</div>';

          echo'<!-- tipo de consulta div-->';
      echo' <div class="control-group">
            <label class="control-label">Tipo de Consulta</label>
                    <div class="controls">
                    <div class="form-check">
                                <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="tipo_consulta" id="sexo"
                                           value="Castração" > Castração
                    </div></p>
                    <div class="form-check">
                    <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="tipo_consulta" id="sexo"
                                       value="Tosa" > Tosa
                                       </p>
                    </div>
                    <div class="form-check">
                    <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="tipo_consulta" id="sexo"
                                       value="Banho" > Banho
                                       </p>
                    </div>
                    <div class="form-check">
                    <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="tipo_consulta" id="sexo"
                                       value="Exame de sangue" > Exame de sangue
                                       </p>
                    </div>
                            
                    
                    </div>';
           echo'</div><!-- fim tipo de consulta div-->';
        echo'</div>';
       echo'<div class="modal-footer">';
       echo'<button class="btn btn-default"><a href="../../pagina/consulta/agenda.php">Cancelar</a></button>';
        
       echo'<input type="submit" class="btn btn-info" value="Save">';
       echo'</div>';
       
       
         
      echo'<input type="hidden" name="id_atendimento" value='.$id_atendimento.'>';
      echo'</form>'; 
        
     echo'</div>';
    echo'</div>';
  
  
      ?>
      </body></html>
