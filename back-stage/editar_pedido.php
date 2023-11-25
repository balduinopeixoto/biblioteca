 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
if(isset($_GET['cod'])){
$id=$_GET['cod'];
$l=$pdo->prepare("select *from pedidos inner join leitor on(leitor_idleitor=idleitor) inner join livros on (livros_idlivros=idlivros) where idpedidos=$id");
$l->execute();
$livros=$l->fetch(PDO::FETCH_ASSOC);

}

?>
<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Editar Pedido</h3>
              </div>
              <div class="card-body">
                <form action="../../modelo/m_pedido.php?url=editar" method="post">
                <div class="form-group">
                  <label>Leitor</label>
                  <select class="form-control" name="leitor" required="">
                    

                  <option value="<?=$livros['idleitor'];?>"><?php echo $livros['nome']?></option>
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
                    

                  <option value="<?=$livros['idlivros'];?>"><?php echo $livros['titulo'];?></option>
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
<input type="date" class="form-control" required="" min="<?php echo date("d/m/Y");?>" name="data" value="<?= $livros['data_pedido']?>">
<input type="hidden" class="form-control" required="" name="id" value="<?= $livros['idpedidos']?>">
</div>

</div>
</div>

</div>

<div class="row">


</div>



            
             <div class="card-footer">
  <center>
                  <button type="submit" class="btn btn-dark col-lg-8">Gravar</button>
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