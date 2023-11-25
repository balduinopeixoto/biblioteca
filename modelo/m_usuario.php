<?php
session_start();
require_once'../conexao/conexao.php';
require_once'../controlo/controlo_usuario.php';
$modelo_usuario=new usuario();
$pdo=conectar();


if(isset($_GET['url'])){//verifica se existe um url 
chmod ("../img/", 777);
		$url=$_GET['url'];// caso existir ela captura
		
if($url=="cadastrar"){ 

		$nome=$_POST['nome'];
		$nivel=$_POST['nivel'];
		$senha=$_POST['senha'];
		$usuario=$_POST['usuario'];
		$email=$_POST['email'];
		$senha=md5($senha);// criptografando a senha com a cifra md5
			
		$extensao=strrchr($_FILES['file']['name'], ".");
		$nome2=substr($_FILES['file']['name'], 0,1);
		$foto=rand(0,10000).$nome2.$extensao;
		

		$q=" select * from usuario where nome='$nome' and email='$email'";// verifica se esse usuário já existe na base de dados
		$busca=$pdo->prepare($q);
		$busca->execute();

		$contador=$busca->rowCount();
		if($contador <=0){// se não existir nenhum usuario ele vai cadastrar

		$cadastrar=$modelo_usuario->cadastrar($nome,$usuario,$email,$senha,$foto,$nivel);//recebe o valor da função cadastrar 

		if($cadastrar==2){
		move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$nome.'. cadastrado com sucesso
                </div>';

		header("location:../adm/gestor/?url=cad_usuario");

		}else{
		$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$nome.'.
                </div> ';
		header("location:../adm/gestor/?url=cad_usuario");
			}

	}else{

		$_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe usuário .'.$nome.'.
                </div>';
	header("location:../adm/gestor/?url=cad_usuario");
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
		$extensao=strrchr($_FILES['file']['name'], ".");
		$nome2=substr($_FILES['file']['name'], 0,1);
		$foto=rand(0,1000).$nome2.$extensao;
		
		$f=$_POST['foto'];
		if($_FILES['file']['error']>0){
			$foto=$f;
		}

		$editar=$modelo_usuario->editar($nome,$usuario,$email,$senha,$foto,$id);

		if($editar==2){
				move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);
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

	$_SESSION['alerta']=' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erliminado com sucesso.
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



