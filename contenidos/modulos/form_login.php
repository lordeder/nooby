 <?php  if(isset($_SESSION['userid'])){ ?>
 
 <?php  }else{ 
 


 if(isset($_GET['valor'])){
	 echo ' <div class="row justify-content-md-center">';
 mensaje_error(htmlentities($_GET['valor']),'');
 echo '</div>';
 }
 
 ?>


 <div class="row justify-content-md-center">
<form method="post" action="login.php">
  <div class="form-group">

<input name="id" type="hidden" value="<?php echo $id; ?>" />

    <input name="usuario" type="text" class="form-control" placeholder="Email o usuario" id="user">
  </div>
  <div class="form-group">
    <input name="password" type="password" class="form-control" placeholder="Contraseña" id="pwd">
  </div>


  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>

<?php } ?>

</div>