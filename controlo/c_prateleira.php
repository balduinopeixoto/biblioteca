<?php

require_once'../conexao/conexao.php';// chanmando a classe conexao->incluindo a classe e seus metodos


class prateleira{ // delcarando a classe usuário 
	
  public function cadastrar($numero,$corredor){

$ligar=conectar();// recebendo o metodo da conexao;

$q="insert into prateleira(numero,corredor) values(?,?)";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$numero);
$insert->bindParam(2,$corredor);

$valor=1;
if($insert->execute()){
	$valor=2;
}
 return $valor;

  }


//função editar 
  public function editar($numero,$corredor,$id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="update prateleira set numero=?,corredor=? where idprateleira=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$numero);
$insert->bindParam(2,$corredor);

$insert->bindParam(3,$id);
$valor=1;
if($insert->execute()){
	$valor=2;
}
 return $valor;

  }





//função editar 
  public function eliminar($id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="delete from prateleira where iprateleira=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$id);

if($insert->execute()){
	$valor=2;
}
 return $valor;

  }



}
