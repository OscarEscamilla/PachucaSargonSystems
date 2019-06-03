<div class="container m-nav">

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <!--evaluamos si el registro se comleto y mostramos alerta -->
        <?php if(isset($_SESSION['registro']) && $_SESSION['config'] == 'completado'):?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Registro Exitoso!</strong> <a href="<?php echo base_url;?>login/index" class="alert-link">iniciar session</a> 
            </div>
        <?php elseif(isset($_SESSION['registro']) && $_SESSION['config'] == 'fallido'): ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
            </div>

        <?php endif; ?>
        <?php Utils::deleteSession('registro');?>

        <div class="card mb-5">
            <div class="card-header">
                <h4 class="text-primary">Configuracion</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url;?>user/update" method="POST">
                    <div class="form-group">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $_SESSION['usuario'][0]['nombre'];?>" class="form-control form-control-sm" id="inputAddress" placeholder="Nombre de la empresa">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" value="<?php echo $_SESSION['usuario'][0]['correo'];?>" name="correo" class="form-control form-control-sm" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telefono</label>
                            <input type="text" value="<?php echo $_SESSION['usuario'][0]['telefono1'];?>" name="telefono1" class="form-control form-control-sm" id="inputPassword4" placeholder="Telefono">
                        </div>
                    </div>
                    <h6>Direccion</h6>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Calle</label>
                            <input type="text" value="<?php echo $_SESSION['usuario'][0]['calle'];?>" name="calle" class="form-control form-control-sm" id="inputCity" placeholder="Calle">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">Colonia</label>
                            <input type="text"  value="<?php echo $_SESSION['usuario'][0]['colonia'];?>"name="colonia" class="form-control form-control-sm" id="inputCity" placeholder="Colonia">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputZip">Numero</label>
                        <input type="text" name="numero" value="<?php echo $_SESSION['usuario'][0]['numero'];?>" class="form-control form-control-sm" id="inputZip" placeholder="Numero">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Ubicacion <span class="text-info">GoogleMaps Url</span></label>
                            <input type="text" name="text" class="form-control form-control-sm" id="inputCity" placeholder="Password">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Contraseña</label>
                            <input type="text" name="password" class="form-control form-control-sm" id="inputCity" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Descripcion</label>
                        <textarea name="descripcion" value="<?php echo $_SESSION['usuario'][0]['categoria'];?>" id="" cols="30" rows="5" class="form-control" placeholder="Añanada una descripcion de su empresa y servicios que ofrece"></textarea>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Categoria</label>
                                <select  class="form-control form-control-sm" name="categoria">
                                    <option value="restaurantes">Restaurantes</option>
                                    <option value="hoteles">Hoteles</option>
                                    <option selected value="entretenimiento">Entretenimiento</option>
                                    <option value="transportes">Transportes</option>
                                    <option value="escuelas">Escuelas</option>
                                    <option value="profesionales">Profesionistas</option>
                                    <option value="comercio">Comercio</option>
                                </select>
                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Contraseña</label>
                                <input type="text" name="password" class="form-control form-control-sm" id="inputCity" placeholder="Password">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">Contraseña</label>
                                <input type="text" name="password" class="form-control form-control-sm" id="inputCity" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group p-3">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <div class="col-md-1"></div>
</div>