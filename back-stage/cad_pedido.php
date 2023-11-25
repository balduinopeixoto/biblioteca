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
                <h3 class="card-title">Registar Pedidos</h3>
              </div>
              <div class="card-body">
                <form action="../../modelo/m_pedido.php?url=cadastrar" method="post">
                <div class="form-group">
                  <label>Leitor</label>
                  <select class="form-control" name="leitor" required="">
                    

                  <option value="">selecione...</option>
                   <?php  
                   $le=$pdo->prepare(" select * from leitor");
                   $le->execute();
                   while ($leitor=$le->fetch(PDO::FETCH_OBJ)) {
                     # code...
                 

                   ?>

                  <option value="<?=$leitor->idleitor;?>"><?php echo$leitor->nome;?></option>
                <?php  
                
                   }

                   ?>
                  </select>
                </div>
                
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Livro</label>

<div class="input-group my-colorpicker2">
  <select class="form-control" name="livro" required="">
                    

                  <option value="">selecione...</option>
                   <?php  
                   $le=$pdo->prepare(" select * from livros");
                   $le->execute();
                   while ($leitor=$le->fetch(PDO::FETCH_OBJ)) {
                     # code...
                 

                   ?>

                  <option value="<?=$leitor->idlivros;?>"><?php echo$leitor->titulo;?></option>
                <?php  
                
                   }

                   ?>
                  </select>
</div>

</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Data</label>

<div class="input-group my-colorpicker2">
<input type="date" class="form-control" required="" min="<?php echo date("d/m/Y");?>" name="data">
</div>

</div>
</div>

</div>

<div class="row">


</div>



            
             <div class="card-footer">
  <center>
                  <button type="submit" class="btn btn-dark col-lg-8">Registrar</button>
               </center>
                </div>
                </form>
              </div>
            </div>
</section>
</div>
</div>
</section>


      
           
    </section>

    <?php


?>