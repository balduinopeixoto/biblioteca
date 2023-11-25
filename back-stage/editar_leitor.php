 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">
<?php
if(isset($_GET['cod'])){
$id=$_GET['cod'];
$l=$pdo->prepare("select * from leitor where idleitor=$id");
$l->execute();
$leitor=$l->fetch(PDO::FETCH_ASSOC);

}

?>

<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Editar dados do Leitor</h3>
              </div>
              <div class="card-body">
              <form action="../../modelo/m_leitor.php?url=editar" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome</label>
                <input type="text" class="form-control" value="<?=$leitor['nome']?>" name="nome" required="">

                </div>
              
                <!-- /.form-group -->
              <!-- /.col -->
            </div>

               <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
            <input type="email" class="form-control" value="<?=$leitor['email']?>" required="" name="email">
          <input type="hidden" class="form-control" value="<?=$leitor['idleitor']?>" required="" name="id">

                </div> 
                </div>

                <div class="col-md-6">
                <div class="form-group">
                  <label>Genero</label>
                <select class="form-control" name="sexo" required="">
                <option value="">Selecione...</option>
                <option>Masculino</option>
                <option>Femenino</option>
                <option>Outros</option>
                  

                </select>

                </div>
              </div>   
              </div>   
               


              <div class="col-md-12">
                <div class="form-group">
                  <label>Morada</label>
                
                <textarea rows="5" name="morada" class="form-control"><?php echo$leitor['morada']?></textarea>

                </div>
               
              </div>

              <center>   
               
               <div class="card-footer">
                  <button type="submit" class="btn btn-dark col-md-8">Registrar</button>
               
                </div>
                </center>
            </div>
          </form>
</section>
</div>

</div>
</section>


      
           
    </section>