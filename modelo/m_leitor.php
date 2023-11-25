<?php
session_start();
require_once'../conexao/conexao.php';
require_once'../controlo/controlo_leitor.php';
$modelo_leitor=new leitor();
$pdo=conectar();


if(isset($_GET['url'])){//verifica se existe um url 

		$url=$_GET['url'];// caso existir ela captura
		
if($url=="cadastrar"){ 

		$nome=$_POST['nome'];
		$sexo=$_POST['sexo'];
		$senha=$_POST['senha'];
		$morada=$_POST['morada'];
		$email=$_POST['email'];
		$senha=md5($senha);// criptografando a senha com a cifra md5
		$rand=rand(0,100);// criando uma sequencia randomica entre o valor 0 e 100
		
		$q=" select * from leitor where nome='$nome' and email='$email'";// verifica se esse usuário já existe na base de dados
		$busca=$pdo->prepare($q);
		$busca->execute();

		$contador=$busca->rowCount();
		if($contador <=0){// se não existir nenhum usuario ele vai cadastrar

		$cadastrar=$modelo_leitor->cadastrar($nome,$email,$morada,$senha,$sexo);//recebe o valor da função cadastrar 

		if($cadastrar==2){
		
		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$nome.'. cadastrado com sucesso
                </div>';

		header("location:../adm/gestor/?url=cad_leitor");

		}else{
		$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$nome.'.
                </div> ';
		header("location:../adm/gestor/?url=cad_leitor");
			}

	}else{

		$_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe usuário .'.$nome.'.
                </div>';
	header("location:../adm/gestor/?url=cad_leitor");
	}
}




if($url=="cadastro"){ 

		$nome=$_POST['nome'];
		$sexo=$_POST['sexo'];
		$senha=$_POST['senha'];
		$morada=$_POST['morada'];
		$email=$_POST['email'];
		$senha=md5($senha);// criptografando a senha com a cifra md5
		$rand=rand(0,100);// criando uma sequencia randomica entre o valor 0 e 100
		
		$q=" select * from leitor where nome='$nome' and email='$email'";// verifica se esse usuário já existe na base de dados
		$busca=$pdo->prepare($q);
		$busca->execute();

		$contador=$busca->rowCount();
		if($contador <=0){// se não existir nenhum usuario ele vai cadastrar

		$cadastrar=$modelo_leitor->cadastrar($nome,$email,$morada,$senha,$sexo);//recebe o valor da função cadastrar 

		if($cadastrar==2){
		
		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  '.$nome.'. cadastrado com sucesso
                </div>';

		header("location:../index.php");

		}else{
		$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$nome.'.
                </div> ';
	header("location:../index.php");
			}

	}else{

		$_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe usuário .'.$nome.'.
                </div>';
	header("location:../visao/registrar.php");
	}
}




if($url=="editar"){ 
$id=$_POST['id'];
	$nome=$_POST['nome'];
		$sexo=$_POST['sexo'];
	
		$morada=$_POST['morada'];
		$email=$_POST['email'];
		$senha=md5($senha);// criptografando a senha com a cifra md5
		$rand=rand(0,100);// criando uma sequencia randomica entre o valor 0 e 100
		$foto=$rand.$_FILES['file']['name'];
		$f=$_POST['foto'];
		if($_FILES['file']['error']>0){
			$foto=$f;
		}

		$editar=$modelo_leitor->editar($nome,$email,$morada,$sexo,$id);

		if($editar==2){
		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$nome.'. Editado com sucesso
                </div>';
	header("location:../adm/gestor/?url=ver_leitor");	

		}else{
				$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao editar.'.$nome.'.
                </div> ';
	header("location:../adm/gestor/?url=ver_leitor");	
		}
}




if($url=="eliminar"){

$id=$_GET['cod'];

$eliminar=$modelo_leitor->eliminar($id);
if($eliminar==2){

$_SESSION['alerta']=' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Eliminado com sucesso.
                </div> ';
	header("location:../adm/gestor/?url=ver_leitor");	

}else{
	
	$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao eliminar.
                </div> ';
	header("location:../adm/gestor/?url=ver_leitor");	 

}

}




}



