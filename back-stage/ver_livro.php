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
                <form action="?url=ver_livro" method="post">
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
                      <th>Foto</th>
                      <th>Titulo</th>
                      <th>Autor/a</th>
                      <th>Editora</th>
                      <th>Prateleira</th>
                    </tr>
                  </thead>
                  <tbody>
                       <?php 



$pagina=(isset($_GET['pag']))? $_GET['pag']:1;
$q="select * from livros";
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
 $e="select * from livros inner join prateleira on prateleira_idprateleira=idprateleira where titulo like '%$nome%'  limit {$inicio},".$quantidade_pag;
                    $q=$pdo->prepare($e);
                    $q->execute();
                    while ($dados=$q->fetch(PDO::FETCH_OBJ)) {
                   
                    ?> 
                    <tr>
                      <td><?php echo$i=$i+1;?></td>
                      <td> <img src="../../img/<?php echo$dados->img;?>" width="80px"></td>
                      <td><?php echo $dados->titulo;?></td>
                      <td><?php echo $dados->autor;?></td>
                      <td><span class="tag tag-success"><?php echo $dados->editora;?></span></td>
                      <td><?php echo $dados->numero;?></td>

                       <td><a href="?url=editarlivro&cod=<?=$dados->idlivros?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button> </a></td>
                      <td><a href="../../modelo/m_livro.php?url=eliminar&cod=<?=$dados->idlivros?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button> </a></td>

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

<a class="page-link" href=" index.php?url=ver_livro&pag=<?php echo$pag_anterior;?>">&laquo;</a>
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


<li class=" page-item active"><a class="page-link" href="index.php?url=ver_livro&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }else{?>
<li class="page-item"><a class="page-link" href="index.php?url=ver_livro&pag=<?php echo$i;?>" ><?php echo$i; ?></a></li>
<?php }}?>
<li class="page-item">
<?php  if($pag_posterior<=$numpag){?>
<a class="page-link" href="?url=ver_livro&pag=<?php echo$pag_posterior;?>">&raquo;</a>
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
    