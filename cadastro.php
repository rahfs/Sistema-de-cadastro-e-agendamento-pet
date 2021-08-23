
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Tela de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../CS/cad.css">
    
</head>

<body>
    
    <div class="divLogin">
        <div class=logo>
            <img src="../img/cat_icon_25.png" width="169" height="151">
        <div class=fontlogo>Saúde Pet</div>
            </div>
    <form action="usuario/incluir.php" method="POST">
        
        <div id="inputs">
                <input type="text" name="nome" size="30" placeholder="Digite do Responsavel" >
        </div>
        
        <div id="inputs">
                <input type="text" name="cpf" minlength="11" maxlength="11" placeholder="Digite seu CPF" >
        </div>
            
        <div id="inputs">
                <input type="text" name="telefone" minlength="10" maxlength="11" placeholder="Digite seu telefone" >
        </div>
        
        <div id="inputs">
                <input type="email" name="email" minlength="11" size="50"placeholder="Digite seu e-mail" >             
        </div>
        
        <div id="inputs">
                <input type="password" name="senha" minlength="8" maxlength="15" placeholder="Digite sua senha" >
        </div>
        
        
        

        <div id="botao">
        <button class="btn_logar" type="submit">Cadastrar</button>
        <button class="btn_logar" ><a href="../index.html">Voltar</a></button>
        </div>

            </form>
</div>
    
</body>
</html>