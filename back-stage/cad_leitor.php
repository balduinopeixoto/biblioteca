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
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Registrar Leitor</h3>
              </div>
              <div class="card-body">
              <form action="../../modelo/m_leitor.php?url=cadastrar" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome</label>
                <input type="text" class="form-control" name="nome" required="">

                </div>
              
                <!-- /.form-group -->
              <!-- /.col -->
            </div>
              </div>   

               <div class="col-md-12">
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


              <div class="col-md-12">
                <div class="form-group">
                  <label>Morada</label>
                
                <textarea rows="5" name="morada" class="form-control"></textarea>

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