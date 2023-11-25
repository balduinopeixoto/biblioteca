<?php
session_start();
require_once'../controlo/controlo_pedido.php';// chanmando a classe conexao->incluindo a classe e seus metodos
$medelo=new pedido();

if(isset($_GET['url'])){

$url=$_GET['url'];



if($url=="cadastrar")
{


$livro=$_POST['livro'];
$leitor=$_POST['leitor'];
$data=$_POST['data'];
$hora=date('h:s');
$usuario=$_SESSION['idusuario'];
$estado="novo";
$cad=$medelo->cadastrar($usuario,$livro,$data,$hora,$leitor,$estado);

if($cad==2){

	$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  Registrado com sucesso
                </div>';

		header("location:../adm/gestor/?url=cad_pedido");
}else{


$_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  Aconteceu um erro ao registrar pedido
                </div>';

	header("location:../adm/gestor/?url=cad_pedido");

}


}if($url=="editar")
{


$livro=$_POST['livro'];
$leitor=$_POST['leitor'];
$data=$_POST['data'];
$id=$_POST['id'];

$cad=$medelo->editar($livro,$data,$leitor,$id);

if($cad==2){

  $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  Editado com sucesso
                </div>';

    header("location:../adm/gestor/?url=ver_pedido");
}else{


$_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  Aconteceu um erro ao Editar pedido
                </div>';

  header("location:../adm/gestor/?url=ver_pedido");

}


}










}
