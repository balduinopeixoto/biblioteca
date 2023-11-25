<?php
session_start();
require'../conexao/conexao.php';
$pdo=conectar();
/*
if(!isset($_SESSION['idusuario']) or !isset($_SESSION['nome'])){

    $_SESSION['alerta']='<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  É necessário efectuar o login 

                </div>';
                header("location:../../visao/login.php");
}

$idusuario=$_SESSION['idusuario'];
$qs="select * from usuario where idusuario=$idusuario";
$sq=$pdo->prepare($qs);
$sq->execute();
$dados=$sq->fetch(PDO::FETCH_ASSOC);

*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Biblioteca</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">SISTEMA DE GESTÃO DE BIBLIOTECA</a>
      </li>
     
    </ul>

  
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
                                              <?php
         /* $no=$pdo->prepare("select * from pedidos inner join leitor on leitor_idleitor=idleitor
            inner join livros on livros_idlivros=idlivros limit 6");
          $no->execute();
          $con=$no->rowCount();*/
       
          ?>
          <span class="badge badge-warning navbar-badge">8</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"></span>
         
          <div class="dropdown-divider"></div>
          <?php /*
while ($not=$no->fetch(PDO::FETCH_OBJ)) {


          ?>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?php echo $not->nome;?> solicitou <?php echo'<br>'; echo substr($not->titulo, 0,10).'...';?>
            <span class="float-right text-muted text-sm badge-info"><?php

            $diferenca=strtotime(date('Y-m-d'))-strtotime($not->data_pedido);
            $d=(60*60*24);
            $dias=floor($diferenca/$d);
            switch ($dias) {
              case 0:
               echo'feita hoje';
                break;
              case '1':
                echo'a cerca de um dia';
                break;
              default:
                   echo' a cerca de '.$dias.' dias atrás';
                break;
            }*/

 ?></span>
          </a>

        <?php //}?>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"></a>
        </div>
      </li>
      <li class="nav-item">
         <a href="../../modelo/m_login.php?url=sair" onclick="return confirm('tem certeza que deseja sair?')" class="dropdown-item dropdown-footer">Terminar Sessão</a>
      </li>
      <li class="">
        <a class="nav-link" data-widget="#" data-slide="true" href="?url=perfil" style="color:red">
       Perfil
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SGB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../img/<?php //echo $dados['foto'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php// echo $dados['nome'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="?url=painel" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Painel Administrativo
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Livros e catálogos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?url=cad_livro" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?url=ver_livro" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
          
            </ul>
          </li>     <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Contéudo PDF
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?url=cad_pdf" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Carregar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?url=ver_pdf" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
          
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuários
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?url=cad_usuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?url=ver_usuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Pedidos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?url=cad_pedido" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?url=ver_pedido" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <?php 
                 /* $dt=date('Y-m-d');
                  $q="select * from pedidos where data_pedido='$dt'";
                  $novo=$pdo->prepare($q);
                  $novo->execute();*/

                  ?>
                  <span class="badge badge-success right"><?php //echo $novo->rowCount()?></span>
                  <p>Novos</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="?url=ver_pedido" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <?php 
                  /*$dt=date('Y-m-d');
                  $q="select * from pedidos where data_pedido <'$dt' and estado_pedido='novo'";
                  $novo=$pdo->prepare($q);
                  $novo->execute();
*/
                  ?>
                  <span class="badge badge-info right"><?php //echo $novo->rowCount()?></span>
                  <p>Devoluções Pendentes</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Prateleiras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?url=cad_prateleira" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?url=ver_prateleira" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Leitor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?url=cad_leitor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?url=ver_leitor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Painel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
<?php

if(isset($_GET['url'])){

$url=$_GET['url'];

if($url=="cad_livro"){
  include'cad_livro.php';
}if($url=="ver_livro"){
  include'ver_livro.php';
}if($url=="editarlivro"){
  include'editar_livro.php';
}

if($url=="cad_usuario"){
  include'cad_usuario.php';
}if($url=="ver_usuario"){
  include'ver_usuario.php';
}if($url=="editarusuario"){
  include'editar_usuario.php';
}

if($url=="cad_prateleira"){
  include("./cad_prateleira.php");
}if($url=="ver_prateleira"){
  include('./ver_prateleira.php');
}if($url=="editar_prateleira"){
  include('./editar_prateleira.php');
}



if($url=="ver_leitor"){
  include('./ver_leitor.php');
}if($url=="cad_leitor"){
  include('./cad_leitor.php');
}if($url=="editar_leitor"){
  include('./editar_leitor.php');
}

if($url=="editar_pedido"){
  include('./editar_pedido.php');
}if($url=="cad_pedido"){
  include('./cad_pedido.php');
}if($url=="ver_pedido"){
  include('./ver_pedidos.php');
}


if($url=="ver_pdf"){
  include('./ver_pdf.php');
}if($url=="cad_pdf"){
  include('./cad_pdf.php');
}if($url=="editarpdf"){
  include('./editar_pdf.php');
}

if($url=="painel"){
  include('./painel.php');
}
if($url=="perfil"){
  include('./perfil.php');
}


}













?>




























   
  
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="http://adminlte.io">Sistema de Biblioteca</a>.</strong>
    todos os direitos reservados.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
