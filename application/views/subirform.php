<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Subir imagen de bus </h1>


                     <?php
                          echo form_open_multipart('flota/subir');
                          ?>
                          <input type="hidden" name="idbuses" value="<?php echo $idimagen; ?>">
                          <input type="file" name="userfile">
                          <button type="submit" class="btn btn-primary btn-xs">Subir</button>
                          <?php
                          echo form_close();
                          ?>
          
          
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     
  </div>