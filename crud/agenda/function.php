<?php
include_once("../../banco.php");

function returna($nomepet, $conectar){

	$result_pet = "SELECT * FROM pet,usuario where id_usuario=id ";
	$resultado_pet = mysqli_query($conectar,$result_pet);

	if($resultado_pet->num_rows){
		$row_nome = mysqli_fetch_assoc($resultado_pet);
		$valores=['nome'] = $row_nome['nome'];

	}else{
		$valores['nome']= 'nome nao encontrado';
	}
	return json_encode($valores);
}
if(isset($_GET['nomepet'])){
	echo retorn($_GET['nomepet'],$conectar);
}
?>
