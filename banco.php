
<?php
// Conecta-se com o MySQL
$local= "localhost";
$user="root";
$pass= "";
$db="tabelapet";
$conectar = mysqli_connect($local,$user,$pass,$db) or die("Erro ao conectar a base de dados");

// Seleciona banco de dados
//$db=mysqli_select_db($conectar) or die("Erro na seleção da base de dados");

class Banco
{
    private static $dbNome = 'tabelapet';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';
    
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}

?>
