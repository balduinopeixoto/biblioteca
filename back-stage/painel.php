<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Livros</span>
                      
                <span class="info-box-number">
              8
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pedidos</span>
            
        
                <span class="info-box-number">1</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Arquivos</span>
          
                <span class="info-box-number">20</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Membros</span>
                                                 
                <span class="info-box-number">15</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
        
          </div>
    







          <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Leitor</span>
              <?php
          /*$n=$pdo->prepare("select * from leitor");
          $n->execute();
          $c=$n->rowCount();
       */
          ?>
                <span class="info-box-number">28</span>
              </div>
              <!-- /.info-box-content -->
            </div>
           
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fa fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Prateleiras</span>
                     <?php
         /* $n=$pdo->prepare("select * from prateleira");
          $n->execute();
          $c=$n->rowCount();*/
       
          ?>
                <span class="info-box-number">9</span>
              </div>
              <!-- /.info-box-content -->
            </div>
           
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-download"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">163,921</span>
              </div>
          
            </div>
            
            
            <!-- /.card -->
          </div>












          <div class="col-md-6">
            

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Pedidos Efectuadas Resentemente</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                     <?php
         /* $not=$pdo->prepare("select * from pedidos inner join livros on livros_idlivros=idlivros inner join leitor on leitor_idleitor=idleitor where estado_pedido='novo' limit 4");
          $not->execute();
          $cont=$not->rowCount();
          while ($no=$not->fetch(PDO::FETCH_OBJ)) {
           */
          ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="../../img/<?php //echo $no->img;?>"  class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php //echo $no->nome?>
                        <span class="badge badge-warning float-right"></span></a>
                      <span class="product-description">
                        Reservou <?php //echo $no->titulo;?> recentemente.
               
                      </span>
                      <a href="?url=painel&cancelar&cod=<?//=$no->idpedidos;?>"> <span class="badge badge-warning float-right">X</span></a>
                    </div>
                  </li>
               
                <?php
         //   }
        ?>
              
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="?url=ver_pedido" class="uppercase">Ver mais</a>
              </div>
              <!-- /.card-footer -->
            </div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>

    <?php
    if(isset($_GET['cancelar'])){

      $id=$_GET['cod'];

      $atl=$pdo->prepare("update pedidos set estado_pedido='visto' where idpedidos=$id");
      if($atl->execute()){
echo'<script>

window.location.href = "?url=painel";

</script>';

      }else{

       echo'<script>
alert("Erro");
window.location.href = "?url=painel";

</script>';


      }


    }






    ?>

