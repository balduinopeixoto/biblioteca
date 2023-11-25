

    <!-- Conteúdo Principal-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Imagem do Perfil -->
            <div class="card card-primary card-outline">
                <form action="?url=perfil&cc=foto" method="post" enctype="multipart/form-data">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../img/<?php echo $dados['foto'];?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $dados['nome'];?></h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Estado</b> <a class="float-right"><?php echo $dados['estado'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nivel</b> <a class="float-right"><?php echo $dados['acesso'];?></a>
                  </li>
                  <div class="list-group-item">
                    <input type="hidden" name="id"  value="<?php echo $dados['idusuario'];?>">
                       <input name="t" type="file" class="form-control" required="" />
                  </div>
                </ul>

                <button type="submit" class="btn btn-primary btn-block">Editar</button> 
              </div>
              </form>
            </div>
            <!-- /.cartão -->

            <!-- Sobre mim-->
            
         
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Dados</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"></a></li>
                  <li class="nav-item"><a class="nav-link " href="#" data-toggle="tab"></a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  
                  
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" name="nome" class="form-control" id="inputName" value="<?php echo $dados['nome'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo $dados['email'];?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Usuário</label>
                        <div class="col-sm-10">
                          <input type="text" name="usuario" class="form-control" id="inputName2" value="<?php echo $dados['usuario'];?>">
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                          <input type="text" name="senha" class="form-control" id="inputSkills" value="<?php echo $dados['senha'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Editar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




<!--Função responsável por alterar a foto do perfil-->
    <?php
    if(isset($_GET['cc'])){
chmod ("../../img/", 777);
$id=$_POST['id'];
$extensao=strrchr($_FILES['t']['name'], ".");
$nome2=substr($_FILES['t']['name'], 0,1);
$foto=rand(0,10000).$nome2.$extensao;

     

      $atl=$pdo->prepare("update usuario set foto='$foto' where idusuario=$id");
      if($atl->execute()){
move_uploaded_file($_FILES['t']['tmp_name'], "../../img/".$foto);
echo'<script>

window.location.href = "index.php?url=perfil";

</script>';
echo$foto;
      }else{
        echo'<script>
alert("Erro");
window.location.href = "index.php?url=perfil";

</script>';
      }


    }






    ?>
