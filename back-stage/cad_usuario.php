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

<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Cadastrar Bibliotecário</h3>
              </div>
              <div class="card-body">
              <form action="../../modelo/m_usuario.php?url=cadastrar" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nome</label>
                <input type="text" class="form-control" name="nome" required="">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Usuário</label>
                 <input type="text" class="form-control" name="usuario" required="">

                </div>
                <!-- /.form-group -->
              </div>    <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                <input type="email" class="form-control" required="" name="email">

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Senha</label>
                 <input type="password" name="senha" class="form-control" required="">

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
                <input required="" type="file" name="file" class="form-control"/>
                
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