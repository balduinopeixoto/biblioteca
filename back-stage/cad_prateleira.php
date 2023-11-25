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
                <h3 class="card-title">Cadastrar Prateleiras</h3>
              </div>
              <div class="card-body">
                <form action="../../modelo/m_prateleira.php?url=cadastrar" method="post">
                <div class="form-group">
                  <label>Numero</label>
                  <input type="text" required="" name="numero" class="form-control">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                  <label>Corredor</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" required="" name="corredor">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

            
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