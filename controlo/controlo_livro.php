<?php

require_once'../conexao/conexao.php';// chanmando a classe conexao->incluindo a classe e seus metodos


class livros{ // delcarando a classe usuário 
	
  public function cadastrar($titulo,$editora,$autor,$ano,$foto,$edicao,$prate){

$ligar=conectar();// recebendo o metodo da conexao;

$q="insert into livros (titulo,editora,autor,ano_lancamento,img,edicao,prateleira_idprateleira) values(?,?,?,?,?,?,?)";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$titulo);// substitui os parametros que são passados por pontor de interrogação
$insert->bindParam(2,$editora);
$insert->bindParam(3,$autor);
$insert->bindParam(4,$ano);
$insert->bindParam(5,$foto);
$insert->bindParam(6,$edicao);
$insert->bindParam(7,$prate);
$valor=1;
if($insert->execute()){// se executar, altera o valor da variavel valor e retorna a mesma variavel
	$valor=2;
}
 return $valor;

  }


//função editar 
  public function editar($titulo,$editora,$autor,$ano,$foto,$edicao,$id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="update livros set titulo=?,editora=?,autor=?,ano_lancamento=?,img=?,edicao=? where idlivros=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$titulo);
$insert->bindParam(2,$editora);
$insert->bindParam(3,$autor);
$insert->bindParam(4,$ano);
$insert->bindParam(5,$foto);
$insert->bindParam(6,$edicao);
$insert->bindParam(7,$id);
$valor=1;
if($insert->execute()){
	$valor=2;
}
 return $valor;

  }





//função editar 
  public function eliminar($id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="delete from livros where idlivros=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$id);

if($insert->execute()){
	$valor=2;
}
 return $valor;

  }



}
