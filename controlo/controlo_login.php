<?php
require_once'../conexao/conexao.php';

class autenticacao{


public function logar($nome,$senha){

	$pdo=conectar();

	$sql="select * from usuario where usuario=? and senha=?";
	$busca=$pdo->prepare($sql);
	$busca->bindParam(1,$nome);
	$busca->bindParam(2,$senha);
	$busca->execute();

	$resultado=$busca->fetch(PDO::FETCH_ASSOC);
	return $resultado; 


}




}
