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
                <h3 class="card-title">Livros Cadastrados </h3>
                <div class="card-tools">
                <form action="?url=ver_pdf" method="post">
                  <div class="input-group input-group-sm" style="width: 300px;">
                    <input type="text" name="nome" class="form-control float-right" placeholder="procurar">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                      <th>Arquivo</th>
                      <th>Titulo</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                       <?php 



$pagina=(isset($_GET['pag']))? $_GET['pag']:1;
$q="select * from arquivos";
$sel=$pdo->prepare($q);
$sel->execute();
//contar o total de produtos
$total_resisto=$sel->rowCount();
//quantidade de produto por paginas
$quantidade_pag=10;
$numpag=ceil($total_resisto/$quantidade_pag);
//calcuclando o inicio da visualização
$inicio=($quantidade_pag*$pagina)-$quantidade_pag;

@$nome=$_POST['nome'];

                    $i=0;
 $e="select * from arquivos inner join livros on livros_idlivros=idlivros limit {$inicio},".$quantidade_pag;
                    $q=$pdo->prepare($e);
                    $q->execute();
                    while ($dados=$q->fetch(PDO::FETCH_OBJ)) {
                   
                    ?> 
                    <tr>
                      <td><?php echo$i=$i+1;?></td>
                      <td> <img src="../../img/<?php echo$dados->img;?>" width="80px"></td>
                      <td><?php echo $dados->titulo;?></td>
                     
 <td><a > <button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $dados->idarquivos;?>"><i class="fa fa-eye"></i></button> <a/></td>

                       <td><a href="?url=editarpdf&cod=<?=$dados->idarquivos?>"> <button  onclick="return confirm('Deseja realmente editar ?')" class="btn btn-warning"><i class="fa fa-edit"></i></button> </a></td>



 <td><a href="?url=ver_pdf&cod=<?=$dados->idarquivos?>&sv=eli"> <button onclick="return confirm('Deseja realmente eliminar ?')"  class="btn btn-danger"><i class="fa fa-trash"></i></button> </a></td>

                    </tr>




<div id="myModal<?php echo $dados->idarquivos;?>" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Arquivos Anexados</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
      <iframe src="../../arquivos/<?php echo$dados->arquivo;?>" style="width:100%;height:300px"></iframe>
       
      </div> 


     

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
      </div>
    </div>

  </div>
</div>













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

<a class="page-link" href=" index.php?url=ver_pdf&pag=<?php echo$pag_anterior;?>">&laquo;</a>
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


<li class=" page-item active"><a class="page-link" href="index.php?url=ver_pdf&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }else{?>
<li class="page-item"><a class="page-link" href="index.php?url=ver_pdf&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }}?>
<li class="page-item">
<?php  if($pag_posterior<=$numpag){?>
<a class="page-link" href="?url=ver_pdf&pag=<?php echo$pag_posterior;?>">&raquo;</a>
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
    <script type="text/javascript">
  function abrirPdf(){
 var valor=document.getElementById('t').value
document.getElementById("id_do_iframe").style="visibility:true;height:500px";
// alert(valor);
   document.getElementById("id_do_iframe").src =valor; 
  }
</script> 



<?php
if(isset($_GET['sv'])){

$id=$_GET['cod'];
$sv=$_GET['sv'];
if($sv=="eli"){
      
$q="delete from  arquivos where idarquivos=?";
$insert=$pdo->prepare($q);
$insert->bindParam(1,$id);


if($insert->execute()){


$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Alerta</h5>
Eliminado

</div>';

echo'<SCRIPT language="JavaScript">
window.location.href = "?url=ver_pdf";
</SCRIPT>';



}else{

$_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i> Alerta</h5>
erro ao eliminar

</div>';

echo'<SCRIPT language="JavaScript">
window.location.href = "?url=ver_pdf";

</SCRIPT>';

}




}
}
 ?>