 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
if(isset($_SESSION['alerta'])){
  print($_SESSION['alerta']);
  unset($_SESSION['alerta']);
}

?>
<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Cadastrar Livros</h3>
              </div>
              <div class="card-body">
                <form action="../../modelo/m_livro.php?url=cadastrar" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Titulo</label>
                  <input type="text" required="" name="titulo" class="form-control">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>Autor</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" required="" name="autor">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ano de Lancamento</label>
                <input type="date" class="form-control" name="ano" required="">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Editora</label>
                 <input type="text" class="form-control" name="editora" required="">

                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Edição</label>
               <input type="text" class="form-control" name="edicao" required="">

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
                        <input type="file" name="file" required="" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Selecione</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Arquivo</span>
                      </div>
                    </div>
                  </div>
             <div class="card-footer">
                  <button type="submit" class="btn btn-info">Registrar</button>
               
                </div>
                </form>
              </div>
            </div>
</section>
</div>
</div>
</section>


      
           
    </section>