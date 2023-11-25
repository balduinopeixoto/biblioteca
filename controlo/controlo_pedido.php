<?php

require_once'../conexao/conexao.php';// chanmando a classe conexao->incluindo a classe e seus metodos


class pedido{ // delcarando a classe usuário 
	
  public function cadastrar($usuario,$livro,$data,$hora,$leitor,$estado){

$ligar=conectar();// recebendo o metodo da conexao;

$q="insert into pedidos(data_pedido,hora,leitor_idleitor,livros_idlivros,usuario_idusuario,estado_pedido
) values(?,?,?,?,?,?)";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$data);
$insert->bindParam(2,$hora);
$insert->bindParam(3,$leitor);
$insert->bindParam(4,$livro);
$insert->bindParam(5,$usuario);
$insert->bindParam(6,$estado);

$valor=1;
if($insert->execute()){
	$valor=2;
}

 return $valor;

  }


//função editar 
  public function editar($livro,$data,$leitor,$id){

$ligar=conectar();// recebendo o metodo da conexao;

$q="update pedidos set livros_idlivros=?,data_pedido=?,leitor_idleitor=? where idpedidos=?";
$insert=$ligar->prepare($q);
$insert->bindParam(1,$livro);
$insert->bindParam(2,$data);
$insert->bindParam(3,$leitor);
$insert->bindParam(4,$id);

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
