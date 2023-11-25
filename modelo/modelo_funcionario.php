<?php
require_once'../conexao/conexao.php';

class FUNCIONARIO{


	public static function salvar($nome,$cargo,$senha,$usuario,$foto,$email):int
	{
		$ligar=conectar();// recebendo o metodo da conexao;

		$q="insert into Funcionarios (Nome,Usuario,Email,Senha,Foto,Cargo) values(:n,:u,:e,:s,:f,:c)";

		$insert=$ligar->prepare($q);
		$insert->bindParam(":n",$nome);
		$insert->bindParam(":u",$usuario);
		$insert->bindParam(":e",$email);
		$insert->bindParam("s",$senha);
		$insert->bindParam("f",$foto);
		$insert->bindParam("c",$cargo);

		return $insert->execute() ? 1: 0;
	}

	public static function editar($nome,$cargo,$usuario,$email,$id):int
	{
		$ligar=conectar();// recebendo o metodo da conexao;

		$q="update Funcionarios set Nome=:n,Usuario=:u,Email=:e,Cargo=:c where IDFuncionario=:id";

		$insert=$ligar->prepare($q);
		$insert->bindParam(":n",$nome);
		$insert->bindParam(":u",$usuario);
		$insert->bindParam(":e",$email);
	    $insert->bindParam("c",$cargo);
	    $insert->bindParam("id",$id);
	    return $insert->execute() ? 1: 0;
	}


	public function eliminar($id){

	$ligar=conectar();// recebendo o metodo da conexao;

	$q="delete from Funcionarios where IDFuncionario=?";
	$insert=$ligar->prepare($q);
	$insert->bindParam(1,$id);
	 return $insert->execute() ? 1: 0;

	}



}