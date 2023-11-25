<?php
session_start();
require_once'../controlo/controlo_login.php';
$modelo_login=new autenticacao();



if(isset($_GET['url'])){

	$url=$_GET['url'];
	

	if($url=="login"){

		$nome=$_POST['nome'];
		$senha=$_POST['senha'];
	$senha=md5($senha);

		$login=$modelo_login->logar($nome,$senha);


 	if(empty($login)){

		$_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  nome ou senha errada

                </div>';

          header("location:../visao/login.php");
 	}else{
 	


 		foreach ($login as $dados) {
 			
 			$_SESSION['idusuario']=$login['idusuario'];
 			$_SESSION['nome']=$login['nome'];

 		}
 		header("location:../adm/gestor/?url=painel");

 	}


	}


	if($url=="sair"){

session_destroy();
header("location:../visao/login.php");

	}

}