<?php

require_once'../conexao/conexao.php';

class LIVRO{


public static function salvar($titulo,$autor,$categoria,$estado,$file,$ano,$prateleira,$editora):int{

	$ligar=conectar();

	$q="insert into livros(titulo,autor,categoria,estado,file,ano_lancamento,prateleira,editora) values(:t,:a,:c,:e,:f,:an,:p,:ed)";
	$insert=$ligar->prepare($q);
	$insert->bindValue(':t',$titulo);
	$insert->bindValue(':a',$autor);
	$insert->bindValue(':c',$categoria);
	$insert->bindValue(':e',$estado);
	$insert->bindValue(':f',$file);
	$insert->bindValue(':an',$ano);
	$insert->bindValue(':p',$prateleira);
	$insert->bindValue(':ed',$editora);
	return $insert->execute() ? 1:0;
}

public static function editar($titulo,$autor,$categoria,$estado,$file,$ano,$prateleira,$editora):int{

	$ligar=conectar();

	$q="update  livros set titulo=:t,autor=:a,categoria=:c,estado=:e,file=:f,ano_lancamento=:an,prateleira=:p,editora=:ed where IDLivro=:id";
	$insert=$ligar->prepare($q);
	$insert->bindValue(':t',$titulo);
	$insert->bindValue(':a',$autor);
	$insert->bindValue(':c',$categoria);
	$insert->bindValue(':e',$estado);
	$insert->bindValue(':f',$file);
	$insert->bindValue(':an',$ano);
	$insert->bindValue(':p',$prateleira);
	$insert->bindValue(':ed',$editora);
	$insert->bindValue(':id',$id);
	return $insert->execute() ? 1:0;
}


public static function eliminar($id){

	$ligar=conectar();

	$q="delete from livros where IDLivro=:id";
	$insert=$ligar->prepare($q);
	$insert->bindValue(':id',$id);
	return $insert->execute() ? 1:0;

}


}