<?php
require_once'../conexao/conexao.php';

class leitor{




public function cadastrar($nome,$email,$morada,$senha,$sexo){

$ligar=conectar();

$query="insert into leitor (nome,email,senha,genero,morada) values(?,?,?,?,?)";
$insert=$ligar->prepare($query);
$insert->BindParam(1,$nome);
$insert->BindParam(2,$email);
$insert->BindParam(3,$senha);
$insert->BindParam(4,$sexo);
$insert->BindParam(5,$morada);
$retorno=1;
if($insert->execute()){
$retorno=2;
}

return $retorno;

}





public function editar($nome,$email,$morada,$sexo,$id){

$ligar=conectar();

$query="update leitor set nome=?,email=?,genero=?,morada=? where idleitor=?";
$insert=$ligar->prepare($query);
$insert->BindParam(1,$nome);
$insert->BindParam(2,$email);
$insert->BindParam(3,$sexo);
$insert->BindParam(4,$morada);
$insert->BindParam(5,$id);
$retorno=1;
if($insert->execute()){
$retorno=2;
}

return $retorno;

}


public function eliminar($id){

$ligar=conectar();

$query="delete from leitor where idleitor=?";
$insert=$ligar->prepare($query);

$insert->BindParam(1,$id);
$retorno=1;
if($insert->execute()){
$retorno=2;
}

return $retorno;

}



}