<?php

session_start();// iniciamos a sessão para passar informações entre paginas
require_once'../conexao/conexao.php';
require_once'../modelo/modelo_funcionario.php';

$pdo=conectar();


if(isset($_GET['url']) && $_GET['url']!=null){//verifica se existe um url 

    $url=$_GET['url'];// caso existir ela captura
    
if($url=="cadastrar"){ 

    $nome=$_POST['nome'];
    $nivel=$_POST['nivel'];
    $senha=$_POST['senha'];
    $usuario=$_POST['usuario'];
    $email=$_POST['email'];
    $senha=password_hash($senha, PASSWORD_DEFAULT);// criptografando a senha com a cifra Passoword hash
      
    $extensao=strrchr($_FILES['file']['name'], ".");
  
    $foto="user".date("Y").date("m").date("d").date("s").$extensao;
    

    $q=" select * from Funcionarios where Usuario='$usuario' or Email='$email'";// verifica se esse usuário já existe na base de dados
    $busca=$pdo->prepare($q);
    $busca->execute();

    $contador=$busca->rowCount();
    if($contador <=0){// se não existir nenhum usuario ele vai cadastrar

    $cadastrar=FUNCIONARIO::salvar($nome,$nivel,$senha,$usuario,$foto,$email);//recebe o valor da função cadastrar 

    if($cadastrar==1){
    move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

    $_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  ..'.$nome.'. cadastrado com sucesso
                </div>';

    header("location:../back-stage/?url=cad_usuario");

    }else{
    $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao cadastrar.'.$nome.'.
                </div> ';
    header("location:../back-stage/?url=cad_usuario");
      }

  }else{

    $_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  Já existe usuário .'.$nome.'.
                </div>';
  header("location:../back-stage/?url=cad_usuario");
  }
}




if($url=="editar"){ 


$id=$_POST['id'];
$nome=$_POST['nome'];
$nivel=$_POST['nivel'];

$usuario=$_POST['usuario'];
$email=$_POST['email'];

    
$f=$_POST['foto'];

if($_FILES['file']['error']>0){

$foto=$f;

}else{

$extensao=strrchr($_FILES['file']['name'], ".");

$foto="user".date("Y").date("m").date("d").date("s").$extensao;

}

$editar=FUNCIONARIO::editar($nome,$nivel,$usuario,$email,$id);

if($editar==1){

move_uploaded_file($_FILES['file']['tmp_name'], "../img/".$foto);

$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Alerta</h5>
..'.$nome.'. Editado com sucesso
</div>';
header("location:../back-stage/?url=ver_usuario");  

}else{
$_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-ban"></i> Alerta</h5>
Erro ao editar.'.$nome.'.
</div> ';
header("location:../back-stage/?url=ver_usuario");  
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
  header("location:../back-stage/?url=ver_usuario");  

}else{
  
  $_SESSION['alerta']=' <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alerta</h5>
                 Erro ao eliminar.
                </div> ';
  header("location:../back-stage/?url=ver_usuario");   

}

}




}



