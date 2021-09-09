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
              <li class="breadcrumb-item"><a href="#">Publicacion</a></li>
              <li class="breadcrumb-item active">Viajes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">                
                <h3 class="card-title">FORMULARIO DE NUEVO VIAJE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmpublicacion" action="<?=site_url('publicacion/guardar')?>">
                  <input type="hidden" name="id" value="">
                  <div class="form-group row">
                    <label for="origen" class="col-sm-2 col-form-label">Seleccionar Origen:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="origen" name="origen">
                        <?php foreach($lugares as $lugar):?> 
                            <option value="<?=$lugar->id?>"><?=$lugar->ciudad?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="destino" class="col-sm-2 col-form-label">Seleccionar Destino:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="destino" name="destino">
                      <?php foreach($lugares as $lugar):?> 
                            <option value="<?=$lugar->id?>"><?=$lugar->ciudad?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="bus" class="col-sm-2 col-form-label">Seleccionar Bus:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="bus" name="bus">
                      <?php foreach($flotas as $flota):?> 
                            <option value="<?=$flota->id?>"><?=$flota->placa?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                    <div class="col-sm-10">
                      <input name="precio" type="number" class="form-control" placeholder="Precio" id="precio" min="0" data-bind="value:precio" required>                      
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                      <input name="fecha" type="text" class="form-control" placeholder="Fecha(<?=date('Y/m/d H:i:s')?>)" id="fecha" min="0" data-bind="value:fecha" required>
                    </div>
                  </div>

                  
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                  </div>
                </form>
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