<?php

require_once'../conexao/conexao.php';// chanmando a classe conexao->incluindo a classe e seus metodos


class usuario{ // delcarando a classe usuário 
	
  public function cadastrar($nome,$usuario,$email,$senha,$foto,$acesso){

$ligar=conectar();// recebendo o metodo da conexao;

$q="insert into usuario(nome,usuario,email,senha,foto,acesso) values(?,?,?,?,?,?)";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$nome);
$insert->bindParam(2,$usuario);
$insert->bindParam(3,$email);
$insert->bindParam(4,$senha);
$insert->bindParam(5,$foto);
$insert->bindParam(6,$acesso);
$valor=1;
if($insert->execute()){
	$valor=2;
}
 return $valor;

  }


//função editar 
  public function editar($nome,$usuario,$email,$senha,$foto,$id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="update usuario set nome=?,usuario=?,email=?,senha=?,foto=? where idusuario=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$nome);
$insert->bindParam(2,$usuario);
$insert->bindParam(3,$email);
$insert->bindParam(4,$senha);
$insert->bindParam(5,$foto);
$insert->bindParam(6,$id);
$valor=1;
if($insert->execute()){
	$valor=2;
}
 return $valor;

  }





//função editar 
  public function eliminar($id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="delete from usuario where idusuario=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$id);

if($insert->execute()){
	$valor=2;
}
 return $valor;

  }



}
