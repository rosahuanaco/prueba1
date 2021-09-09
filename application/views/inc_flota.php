<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content visible" id="ltpublicacion">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Flotas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Chofer</th>
                    <th>Placa</th>
                    <th>tipo</th>
                    <th>Comodidad</th>
                    <th>Filas</th>
                    <th>Pisos</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Foto</th>
                    <th>Subir</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($flotas as $flota):?> 
                      <tr>               
                        <td><?=$flota->chofer?></td>
                        <td><?=$flota->placa?></td>
                        <td><?=$flota->tipo?></td>
                        <td><?=$flota->comodidad?></td>
                        <td><?=$flota->filas?></td>
                        <td><?=$flota->pisos?></td>
                        <td><?=$flota->cantidad?></td>
                        <td><?=$flota->estado?></td> 
                        <td>
                        <?php
                        $foto=$flota->imagen;

                        if($foto=="")
                        {
                          //mostrar una una imagen por defecto
                          ?>
                          <img width="100" src="<?php echo base_url(); ?>uploads/buses/perfil.jpg">
                          <?php
                        }
                        else
                        {
                          //mostrar la fot del usuario
                          ?>
                          <img width="100" src="<?php echo base_url(); ?>uploads/buses/<?php echo $foto; ?>">
                          <?php
                        }
                          

                        ?>

                        </td> 
                        <td>
                          <?php
                          echo form_open_multipart('flota/subirimagen');
                          ?>
                          <input type="hidden" name="idbuses" value="<?php echo $flota->id; ?>">
                          <button type="submit" class="btn btn-primary btn-xs">Subir</button>
                          <?php
                          echo form_close();
                          ?>
                        </td>

                        <td> 
                            <a class="edit" href="<?=site_url('flota/editar')?>/<?=$flota->id?>" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="deleteFlota" data-id="<?=$flota->id?>" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>                        
                        </td>
                      </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Chofer</th>
                    <th>Placa</th>
                    <th>tipo</th>
                    <th>Comodidad</th>
                    <th>Filas</th>
                    <th>Pisos</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Foto</th>
                    <th>Subir</th>
                    <td>Accion</td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->    
  </div>