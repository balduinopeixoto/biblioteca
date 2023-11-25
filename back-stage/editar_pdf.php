 <section class="content">
      <div class="container-fluid">
      <div class="row">
      <section class="col-lg-12 connectedSortable">

<?php
if(isset($_SESSION['alerta'])){
  print($_SESSION['alerta']);
  unset($_SESSION['alerta']);
}

@$id=$_GET['cod'];
$l=$pdo->prepare("select *from arquivos inner join livros on (livros_idlivros=idlivros) where idarquivos=$id");
$l->execute();
$livro=$l->fetch(PDO::FETCH_ASSOC);





?>
<div class="card card-info">
              <div class="card-header" style="background-color: #4b545c;">
                <h3 class="card-title">Carregar PDF</h3>
              </div>
              <div class="card-body">
                <form action="?url=editarpdf&f=upload" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Titulo</label>
<input class="form-control" name="livro" required="" value="<?php echo$livro['titulo'];?>">
<input type="hidden" name="id" required="" value="<?php echo$livro['idarquivos'];?>">
                    
                </div>
                
             

 <div class="form-group">
                    <label for="exampleInputFile">Arquivo PDF</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" required="" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Procurar</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Procurar</span>
                      </div>
                    </div>
                  </div>
             <div class="card-footer">
                  <button type="submit" class="btn btn-info">Carregar</button>
               
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
if(isset($_GET['f'])){
//chmod('../../arquivos/', 777);
  $f=$_GET['f'];

  if($f=="upload"){

$livro=$_POST['livro'];
$id=$_POST['id'];
   $extensao=strrchr($_FILES['file']['name'], ".");
   $nome2=substr($_FILES['file']['name'], 0,1);
   $upload=rand(0,10000).$nome2.$extensao;
   
      
$q="update arquivos set arquivo=? where idarquivos=?";
$insert=$pdo->prepare($q);
$insert->bindParam(1,$upload);
$insert->bindParam(2,$id);

if($insert->execute()){

  move_uploaded_file($_FILES['file']['tmp_name'], "../../arquivos/".$upload);

$_SESSION['alerta']='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  Ficheiro editado com sucesso

                </div>';

               echo'<SCRIPT language="JavaScript">
                window.location.href = "?url=ver_pdf";
                </SCRIPT>';

}else{

$_SESSION['alerta']='<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alerta</h5>
                  Erro ao Editar

                </div>';
              
 echo'<SCRIPT language="JavaScript">
window.location.href = "?url=ver_pdf";

</SCRIPT>';

}

  }
}















    ?>