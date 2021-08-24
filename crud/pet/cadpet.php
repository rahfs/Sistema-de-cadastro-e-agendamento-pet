<?php
require '../../banco.php';
//Acompanha os erros de validação
session_start();
if($_SESSION['id']==null){
header("Location: ../../index.html");}
// Processar so quando tenha uma chamada post

//Inserindo no Banco:
    


    
?>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Tela de Cadastro</title>
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
                height: 500px;
                background: #2B836A ;
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
form #inputs input{
                margin: 0px 10px;
                width: calc(70% - 40px);
                padding: 7px 15px;
                border: 0px;
                border-radius: 15px;
    
            }
textarea{
                margin: 0px 10px;
                width: calc(70% - 40px);
                padding: 7px 15px;
                border: 0px;
                border-radius: 15px;
                padding-bottom: 13px;
    
    
            }
#inputs{
    padding-bottom: 13px;
    padding-left: 24%;
    color: #fff;
}
#botao{
    padding-left: 21%;
}
 .btn_logar{
                background:#73D5B9;
                margin: 20px;
                width: 100px;
                color: #fff;    
                border: 0px;
                border-radius: 15px;
                height: 30px;
               text-decoration: none;

}

    </style>
    <script>
        function voltar(){window.location="../../pagina/menu/menuusu.php";}
       
    </script>
</head>

<body>
    
    <div class="divLogin">
        <div class=logo>
            <img src="../../img/cat_icon_25.png" width="169" height="151">
        <div class=fontlogo>Saúde Pet</div>
            </div>
    <form action="updateusu.php" method="get">
        
        <div id="inputs">
                <input type="text" name="nomepet" placeholder="Digite do mascote" >
        </div>
        
        <div id="inputs">
                <input type="text" name="idadepet" placeholder="Digite idade do mascote" >
        </div>
            
        <div id="inputs">
                <input type="text" name="pesopet" placeholder="Digite o peso do mascote" >
        </div>
        
        <div id="inputs">
                <input type="text" name="racapet" placeholder="Digite a raça do mascote" >             
        </div>
        <div id="inputs">
             <textarea  name="obs" placeholder ="Digite uma Observação"></textarea>
        </div>
     

        <div id="botao">
        <button class="btn_logar" type="submit">Cadastrar</button>
      <input type="button"class="btn_logar" value="Voltar" onclick="voltar()"> 
        </div>


        </form>
        
</div>
    
</body>
</html>
