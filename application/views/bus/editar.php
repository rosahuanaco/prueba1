<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FLOTAS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Flotas</a></li>
              <li class="breadcrumb-item active">Crear</li>
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
                <h3 class="card-title">EDITAR FLOTA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div style="color:red;" id="mensaje"></div>
                <form id="frmflotaeditar" action="<?=site_url('flota/guardar')?>">
                  <input type="hidden" name="id" value="<?=$flota->id?>">
                  <div class="form-group row">
                    <label for="origen" class="col-sm-2 col-form-label">Chofer:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="chofer" name="chofer">
                        <?php foreach($choferes as $chofer):?> 
                            <option value="<?=$chofer->id?>" <?=$chofer->id==$flota->chofer?"selected":""?>><?=$chofer->nombre_completo?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="destino" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="tipo" name="tipo">
                      <?php foreach($tipos as $tipo):?> 
                            <option value="<?=$tipo->id?>" <?=$tipo->id==$flota->tipo?"selected":""?>><?=$tipo->nombre?></option>
                        <?php endforeach;?>
                      </select>
                    </div>                    
                  </div>

                  <div class="form-group row">
                    <label for="placa" class="col-sm-2 col-form-label">Placa</label>
                    <div class="col-sm-10">
                      <input name="placa" type="text" value="<?=$flota->placa?>" class="form-control" placeholder="Placa" id="placa" required>                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="comodidad" class="col-sm-2 col-form-label">Comodidad</label>
                    <div class="col-sm-10">
                      <input name="comodidad" type="text" value="<?=$flota->comodidad?>" class="form-control" placeholder="Caracteristicas especiales" id="comodidad" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad de Asientos</label>
                    <div class="col-sm-10">
                      <input name="cantidad" type="number" value="<?=$flota->cantidad?>" class="form-control" placeholder="Cantidad" id="cantidad" min="0" data-bind="value:cantidad" required>
                    </div>
                  </div>

                  
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Modificar</button>
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