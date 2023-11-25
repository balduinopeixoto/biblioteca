 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
if(isset($_GET['cod'])){
$id=$_GET['cod'];
$l=$pdo->prepare("select *from livros where idlivros=$id");
$l->execute();
$livro=$l->fetch(PDO::FETCH_ASSOC);

}

?>
<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Editar Livro</h3>
              </div>
              <div class="card-body">
                <form action="../../modelo/m_livro.php?url=editar" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Titulo</label>
                  <input type="text" required="" value="<?=$livro['titulo']?>" name="titulo" class="form-control">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>Autor</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" value="<?=$livro['autor']?>" required="" name="autor">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ano de Lancamento</label>
                <input type="date" class="form-control" value="<?=$livro['ano_lancamento']?>"  name="ano" required="">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Editora</label>
                 <input type="text" class="form-control" value="<?=$livro['editora']?>" name="editora" required="">

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Edição</label>
      <input type="text" class="form-control" value="<?=$livro['edicao']?>" name="edicao" required="">
      <input type="hidden" class="form-control" value="<?=$livro['idlivros']?>" name="id" required="">
      <input type="hidden" class="form-control" value="<?=$livro['img']?>" name="foto" required="">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Prateleira</label>
                 <select class="form-control" name="prateleira" required="">
                   <option value="">Selecione...</option>
                   <?php
                   $q=$pdo->prepare("select * from prateleira");
                   $q->execute();
                   while ($dados=$q->fetch(PDO::FETCH_OBJ)) {?>
                    <option value="<?=$dados->idprateleira;?>"><?php echo $dados->numero?></option>
                  <?php }?>
                 </select> 

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>

             <div class="form-group">
                    <label for="exampleInputFile">Imagem</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file"  class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Selecione</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Arquivo</span>
                      </div>
                    </div>
                  </div> 
                  <center>

             <div class="card-footer ">
                  <button type="submit" class="btn btn-dark col-md-6">Gravar</button>
               
                </div></center>
                </form>
              </div>
            </div>
</section>
</div>
</div>
</section>


      
           
    </section>