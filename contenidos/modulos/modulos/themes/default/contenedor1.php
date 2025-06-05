<?php if(!isset($col_xl)){
$col_xl=6;
}
if(!isset($col_lg)){
$col_lg=8;
}
?>
<div class="col-xl-<?php echo $col_xl; ?> col-lg-<?php echo $col_lg; ?>">

    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"><?php echo $titlulo_contenedor; ?></h6>
                    </div>
                    <div class="card-body">
              
                   
    <?php include ($archivo_contenedor); ?>
    
     </div>
                  </div>
                  
            
</div>      