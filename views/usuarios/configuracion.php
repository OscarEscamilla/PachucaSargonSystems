<div class="container m-nav">

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <!--evaluamos si el registro se comleto y mostramos alerta -->
        <?php if(isset($_SESSION['update']) && $_SESSION['update'] == true):?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Datos Actualizados!</a> 
            </div>
        <?php elseif(isset($_SESSION['update']) && $_SESSION['config'] != true): ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['update']?></strong> 
            </div>

        <?php endif; ?>
        
        <?php Utils::deleteSession('update');?>

        <div class="card mb-5">
            <div class="card-header">
                <h4 class="text-primary">Configuracion</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url;?>user/update" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" required="" name="nombre" value="<?php echo $_SESSION['usuario'][0]['nombre'];?>" class="form-control form-control-sm" id="inputAddress" placeholder="Nombre de la empresa">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" required="" value="<?php echo $_SESSION['usuario'][0]['correo'];?>" name="correo" class="form-control form-control-sm" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telefono</label>
                            <input type="text" required="" value="<?php echo $_SESSION['usuario'][0]['telefono'];?>" name="telefono" class="form-control form-control-sm" id="inputPassword4" placeholder="Telefono">
                        </div>
                    </div>
                    <hr class="bg-primary">
                    <h6>Direccion</h6>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Calle</label>
                            <input type="text" required="" value="<?php echo $_SESSION['usuario'][0]['calle'];?>" name="calle" class="form-control form-control-sm"  placeholder="Calle">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">Colonia</label>
                            <input type="text" required="" value="<?php echo $_SESSION['usuario'][0]['colonia'];?>"name="colonia" class="form-control form-control-sm"  placeholder="Colonia">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputZip">Numero</label>
                        <input type="text" required="" name="numero" value="<?php echo $_SESSION['usuario'][0]['numero'];?>" class="form-control form-control-sm"  placeholder="Añada la url de su sitio web">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="inputState">Municipio</label>
                            <input type="text" required="" value="<?php echo $_SESSION['usuario'][0]['municipio'];?>"name="municipio" class="form-control form-control-sm"  placeholder="Añada la url de su ubicacion en Google Maps">
                        </div>
    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Url <span class="text-info"><a href="https://www.google.com.mx/maps">Goole Maps</a></span></label>
                            <input type="text" required="" value="<?php echo $_SESSION['usuario'][0]['maps_url'];?>"name="maps_url" class="form-control form-control-sm"  placeholder="Añada la url de su ubicacion en Google Maps">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Url <span class="text-info">Sitio Web</span></label>
                            <input type="text"  value="<?php echo $_SESSION['usuario'][0]['sitio_web'];?>" name="sitio_web" class="form-control form-control-sm"  placeholder="Añada la url de su sitio web">
                        </div>
                    </div>
                    <hr class="bg-primary">
                    <div class="form-group">
                        <label for="inputAddress2">Descripcion</label>
                       <textarea name="descripcion" required="" class="form-control" cols="30" rows="5"><?php echo $_SESSION['usuario'][0]['descripcion'];?></textarea>
                    </div>
                    <hr>
                    <h6>Imagenes</h6>
                    <div class="form-row">
                            <div class="form-group col-md-6">

                                <p>Logotipo</p>
                                <input required="" type="file" id="myFile" name="logo" class="btn btn-dark">
                            
                            </div>
                                
                    
                            <div class="form-group col-md-6">
                                
                                <p>Portada</p>
                                <input required="" type="file" id="myFile" name="portada" class="btn btn-dark">
                            </div>
                           
                        </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="contraseña" class="form-control form-control-sm" required="true">
                    </div>
                    <div class="form-row">
                        <div class="form-group p-3">
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    
                    </div>

                    </div>
                    
                    
                </form>
            </div>
        </div>
        
    </div>
    <div class="col-md-1"></div>
</div>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>