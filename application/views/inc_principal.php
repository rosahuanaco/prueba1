<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Viajes</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Viajes</li>
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
                <h3 class="card-title">Lista de Viajes</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Bus</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Fecha de Viaje</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($publicaciones as $publicacion):?> 
                      <tr>               
                        <td><?=$publicacion->origen?></td>
                        <td><?=$publicacion->destino?></td>
                        <td><?=$publicacion->bus?></td>
                        <td><?=$publicacion->precio?></td>
                        <td><?=$publicacion->estado?></td>
                        <td><?=$publicacion->fecha_salida?></td>
                        
                        <td> 
                            <a class="edit" href="<?=site_url('publicacion/editar')?>/<?=$publicacion->id?>" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="deletePublicacion" data-id="<?=$publicacion->id?>" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>                        
                        </td>
                      </tr>
                    <?php endforeach;?>                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Bus</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Fecha de Viaje</th>
                    <th>Accion</th>
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