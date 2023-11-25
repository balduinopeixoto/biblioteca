 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">
<?php
if(isset($_GET['cod'])){
$id=$_GET['cod'];
$l=$pdo->prepare("select *from usuario where idusuario=$id");
$l->execute();
$us=$l->fetch(PDO::FETCH_ASSOC);

}

?>

<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Editar Usuário</h3>
              </div>
              <div class="card-body">
              <form action="../../modelo/m_usuario.php?url=editar" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome</label>
                <input type="text" class="form-control"value="<?=$us['nome']?>" name="nome" required="">

                </div>
                <!-- /.form-group -->
              
                <!-- /.form-group -->
              </div>   
  <div class="form-group col-md-12">
                  <label>Usuário</label>
                 <input type="text" class="form-control" name="usuario" value="<?=$us['usuario']?>" required="">

                </div>


               <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                <input type="email" class="form-control" value="<?=$us['email']?>" required="" name="email">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                 
                 <input type="hidden" name="id" class="form-control" value="<?=$us['idusuario']?>" required="">
                 <input type="hidden" name="foto" class="form-control" value="<?=$us['foto']?>" required="">

                </div>
                <!-- /.form-group -->
              </div>   
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nivel</label>
                <select required="" name="nivel" class="form-control">
                  <option value="">Selecione...</option>
                  <option >Bibliotecario</option>
                  <option >Gerente</option>
                </select>
                </div>
                <!-- /.form-group -->
             
                <!-- /.form-group -->
              </div> 
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Foto</label>
                <input  type="file" name="file" class="form-control"/>
                
                </div>
                <!-- /.form-group -->
             
                <!-- /.form-group -->
              </div> 


          
              </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-info">Registrar</button>
               
                </div>
            </div>
          </form>
</section>
</div>

</div>
</section>


      
           
    </section>