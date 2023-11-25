<?php
session_start();
require_once'../conexao/conexao.php';
require_once'../controlo/c_prateleira.php';
$modelo_prateleira=new prateleira();
$pdo=conectar();


if(isset($_GET['url'])){//verifica se existe um url 

		$url=$_GET['url'];// caso existir ela captura
		
if($url=="cadastrar"){ 

		$numero=$_POST['numero'];
		$corredor=$_POST['corredor'];
	

		$cadastrar=$modelo_prateleira->cadastrar($numero,$corredor);//recebe o valor da função cadastrar 

		if($cadastrar==2){
	
	$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$numero.'. cadastrado com sucesso
                </div>';

		header("location:../adm/gestor/?url=cad_prateleira");

		}else{
		$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.
                </div> ';
			}

	
}




if($url=="editar"){ 
$id=$_POST['id'];
$nome=$_POST['nome'];
		$nivel=$_POST['nivel'];
		$senha=$_POST['senha'];
		$usuario=$_POST['usuario'];
		$email=$_POST['email'];
		$senha=md5($senha);// criptografando a senha com a cifra md5
		$rand=rand(0,100);// criando uma sequencia randomica entre o valor 0 e 100
		$foto=$rand.$_FILES['file']['name'];
		$f=$_POST['foto'];
		if($_FILES['file']['error']>0){
			$foto=$f;
		}

		$editar=$modelo_usuario->editar($nome,$usuario,$email,$senha,$foto,$id);

		if($editar==2){
		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$nome.'. Editado com sucesso
                </div>';
	header("location:../adm/gestor/?url=ver_usuario");	

		}else{
				$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao editar.'.$nome.'.
                </div> ';
	header("location:../adm/gestor/?url=ver_usuario");	
		}
}




if($url=="eliminar"){

$id=$_GET['cod'];

$eliminar=$modelo_usuario->eliminar($id);
if($eliminar==2){

	$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Eliminado com sucesso.
                </div> ';
	header("location:../adm/gestor/?url=ver_usuario");	

}else{
	
	$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao eliminar.
                </div> ';
	header("location:../adm/gestor/?url=ver_usuario");	 

}

}




}



