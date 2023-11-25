<?php
session_start();
require_once'../conexao/conexao.php';
require_once'../controlo/controlo_livro.php';
$modelo_livro=new livros();
$pdo=conectar();


if(isset($_GET['url'])){//verifica se existe um url 
//chmod ("../img/", 777);

		$url=$_GET['url'];// caso existir ela captura
		
		
if($url=="cadastrar"){ 

		$titulo=$_POST['titulo'];
		$autor=$_POST['autor'];
		$ano=$_POST['ano'];
		$edicao=$_POST['edicao'];
		$editora=$_POST['editora'];
		$prate=$_POST['prateleira'];
		
		$extensao=strrchr($_FILES['file']['name'], ".");
		$nome2=substr($_FILES['file']['name'], 0,1);
		$foto=rand(0,10000).$nome2.$extensao;
		

		$q=" select * from livros where titulo='$titulo' and edicao='$edicao'";// verifica se esse usuário já existe na base de dados
		$busca=$pdo->prepare($q);
		$busca->execute();

		$contador=$busca->rowCount();
		if($contador <=0){// se não existir nenhum usuario ele vai cadastrar

		$cadastrar=$modelo_livro->cadastrar($titulo,$editora,$autor,$ano,$foto,$edicao,$prate);//recebe o valor da função cadastrar 

		if($cadastrar==2){
		move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$titulo.'. cadastrado com sucesso
                </div>';

		header("location:../adm/gestor/?url=cad_livro");

		}else{
		$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$titulo.'.
                </div> ';
		header("location:../adm/gestor/?url=cad_livro");
			}

	}else{

		$_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe Livro.'.$titulo.'. cadastrado no sistema
                </div>';
	header("location:../adm/gestor/?url=cad_livro");
	}
}
















if($url=="editar"){ 
$id=$_POST['id'];
		$titulo=$_POST['titulo'];
		$autor=$_POST['autor'];
		$ano=$_POST['ano'];
		$edicao=$_POST['edicao'];
		$editora=$_POST['editora'];
		$prate=$_POST['prateleira'];
		$rand=rand(0,100);// criando uma sequencia randomica entre o valor 0 e 100
			$extensao=strrchr($_FILES['file']['name'], ".");
		$nome2=substr($_FILES['file']['name'], 0,1);
		$foto=rand(0,10000).$nome2.$extensao;
		

		$f=$_POST['foto'];
		if($_FILES['file']['error']>0){
			$foto=$f;
		}

		$editar=$modelo_livro->editar($titulo,$editora,$autor,$ano,$foto,$edicao,$id);
	move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

		if($editar==2){
		$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$titulo.'. Editado com sucesso
                </div>';
	header("location:../adm/gestor/?url=ver_livro");	

		}else{
				$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao editar.'.$titulo.'.
                </div> ';
	header("location:../adm/gestor/?url=ver_livro");	
		}
}

























if($url=="eliminar"){

$id=$_GET['cod'];

$eliminar=$modelo_livro->eliminar($id);
if($eliminar==2){

$_SESSION['alerta']=' <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Livro Eliminado com sucesso.
                </div> ';
	header("location:../adm/gestor/?url=ver_livro");	

}else{
	
	$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao eliminar Livro.
                </div> ';
	header("location:../adm/gestor/?url=ver_livro");	 

}

}




}



