 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">



<?php
if (isset($_SESSION['alerta'])) {
 print($_SESSION['alerta']);
 unset($_SESSION['alerta']);
}

?>


<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pedidos Efectuados </h3>
                <div class="card-tools">
                <form action="?url=ver_pedido" method="post">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="nome" class="form-control float-right" placeholder="procurar">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-warning"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
              </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Leitor</th>
                      <th>Livro</th>
                      <th>Data de Entrega </th>
                      <th>Hora</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

@$nome=$_POST['nome'];

$pagina=(isset($_GET['pag']))? $_GET['pag']:1;
$q="select * from pedidos";
$sel=$pdo->prepare($q);
$sel->execute();
//contar o total de produtos
$total_resisto=$sel->rowCount();
//quantidade de produto por paginas
$quantidade_pag=10;
$numpag=ceil($total_resisto/$quantidade_pag);
//calcuclando o inicio da visualização
$inicio=($quantidade_pag*$pagina)-$quantidade_pag;





                    $i=0;
                    $e="select * from pedidos inner join leitor on leitor_idleitor=idleitor inner join livros on livros_idlivros=idlivros where nome like '%$nome%' limit {$inicio},".$quantidade_pag;
                    $q=$pdo->prepare($e);
                    $q->execute();
                    while ($dados=$q->fetch(PDO::FETCH_OBJ)) {
                   
                    ?>
                    <tr>
                      <td><?php echo$i=$i+1; ?></td>
                      
                      <td><?php echo $dados->nome;?></td>
                      <td><span class="tag tag-success"><?php echo $dados->titulo;?></span></td>
                      <td><?php echo date('d-m-Y',strtotime($dados->data_pedido));?></td>
                      <td><?php echo $dados->hora;?></td>
                      <td><a href="?url=editar_pedido&cod=<?=$dados->idpedidos?>"> <button onclick="return confirm('Deseja realmente editar ?')"  class="btn btn-primary"><i class="fa fa-edit"></i></button> </a></td>
                      <td><a href="?url=ver_pedido&cod=<?=$dados->idpedidos?>&sv=eli"> <button onclick="return confirm('Deseja realmente eliminar ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button> </a></td>
                    </tr>
                   <?php
                 }
                   ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->


 <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php 
//pagina anterior e posterior 
$pag_anterior=$pagina-1;
$pag_posterior=$pagina+1;

?>
<li  class="page-item">
<?php  if($pag_anterior!=0){?>

<a class="page-link" href=" index.php?url=ver_pedido&pag=<?php echo$pag_anterior;?>">&laquo;</a>
<?php  }else{?>
<a class="page-link" href="#">&laquo;</a>
<?php } ?>
</li>



<?php
//paginação
for($i=1; $i<$numpag+1; $i++){ 
if(isset($_GET['pag'])){
  $val=$_GET['pag'];
}else{$val=1;}
if($i==$val){
  ?>


<li class=" page-item active"><a class="page-link" href="index.php?url=ver_pedido&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }else{?>
<li class="page-item"><a class="page-link" href="index.php?url=ver_pedido&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }}?>
<li class="page-item">
<?php  if($pag_posterior<=$numpag){?>
<a class="page-link" href="?url=ver_pedido&pag=<?php echo$pag_posterior;?>">&raquo;</a>
<?php  }else{?>
<a class="page-link" href="#">&raquo;</a>
<?php } ?>



  </li>





                </ul>
              </div>



            </div>
            <!-- /.card -->
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
    <?php
if(isset($_GET['sv'])){

$id=$_GET['cod'];
$sv=$_GET['sv'];
if($sv=="eli"){
      
$q="delete from  pedidos where idpedidos=?";
$insert=$pdo->prepare($q);
$insert->bindParam(1,$id);


if($insert->execute()){


$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Alerta</h5>
Eliminado

</div>';

echo'<SCRIPT language="JavaScript">
window.location.href = "?url=ver_pedido";
</SCRIPT>';



}else{

$_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Alerta</h5>
erro ao eliminar

</div>';

echo'<SCRIPT language="JavaScript">
window.location.href = "?url=ver_pedido";

</SCRIPT>';

}




}
}
 ?>