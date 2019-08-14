<div class="container m-nav">

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 'fallido'):?>
            <div class="alert alert-dismissible alert-danger mb-0">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Error!</strong> Correo o Contraseña invalidos...
            </div>
        <?php endif;?>
        <?php Utils::deleteSession('login'); ?>
        <div class="card mb-5 mt-5">
            <div class="card-header">
                <h4 class="text-primary">Log in</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url;?>login/log" method="POST" >
                    <div class="form-group">
                        
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    
                    <div class="form -group">
                        <label for="password ">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                        <br>
                    </div>
                    
                    <div class="form-group">
                        
                        <input type="submit"  class="btn btn-success btn-block" value="Ingresar">
                    </div>
                    <a href="<?php echo base_url;?>registro/index">Registrarme</a>

                </form>
            </div>
        </div>
        
    </div>
    <div class="col-md-4"></div>
</div>