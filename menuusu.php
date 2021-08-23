
<html>
<head>
<meta charset="utf-8">

<title>Menu do Administrador</title>
<style>
	body{
			    height: 100vh;
			    display:flex;
			    align-items: center;
			    justify-content: center;
			    font-family: 'verdana';    
}


.divLogin{
			    width: 500px;
			    height: 480px;
			    background: #2B836A	;
			    border: 0;
			    border-radius: 10px;
				
			}
.logo img{
	
	padding-left: 35px;
	padding-top: 10px;
	position: absolute;

}
.fontlogo{
	color: aliceblue;
	font-size: 35px;
	padding-left: 32%;
	padding-top: 14%;
	position: relative;
	padding-bottom: 60px;
	
	
}



.btn_logar{
			    background:#73D5B9;
			    margin: 20px;
			    width: 180px;
			    color: #fff;    
			    border: 0px;
			    border-radius: 15px;
			    height: 30px;
	
			}

#botao{
    padding-left: 28%;
}

	</style>
<?php 
session_start();

?>
	<script>
		function pet(){window.location="../../crud/pet/cadpet.php";}
		function agenda(){window.location="../../crud/agenda/agendarusuario.php";}
		function consulta(){window.location="../consulta/consultasusuario.php";}
		function avaliar(){window.location="../../logout.php"}
		
	</script>
</head>

<body>
<div class="divLogin">
		<div class=logo>
		  <img src="../../img/cat_icon_25.png" width="169" height="151">
		  <div class=fontlogo>Saúde Pet</div>
			</div>
			
				<div id=botao>
                <button class="btn_logar" name="cadpet" onclick="pet()" >Cadastrar Pet</button>
                <button class="btn_logar" name="conagenda" onclick="agenda()">Agendar Consulta</button>
                <button class="btn_logar" name="conagenda" onclick="consulta()">Consultar Agenda</button>
                <button class="btn_logar" name="avaliar"  onclick="avaliar()">Sair</button>
            </div>
                
                    

	</div></body>
</body>
</html>