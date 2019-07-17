  <!-- Page Content -->
  <div class="container m-nav">

    <!-- Page Heading/Breadcrumbs -->
    <!--evaluamos si el registro se comleto y mostramos alerta -->
    <?php if(isset($_SESSION['update']) && $_SESSION['update'] == true):?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Datos Actualizados!</a> 
            </div>
        <?php Utils::deleteSession('update');?>
    <?php endif;?>
    
    <h1 class="mt-4 mb-3 text-primary">
        <!-- Preview Image -->
        <p id="nombre-perfil" class>
        <?php if($_SESSION['usuario'][0]['logo'] != null && $_SESSION['usuario'][0]['logo'] != ''):?>
          <img class="img-fluid rounded" src="<?php echo base_url.$_SESSION['usuario'][0]['logo']?> " alt="" id="logo-user">
        <?php else:?>
          <img src="<?php echo base_url;?>/assets/img/icons/user.svg" alt="" id="logo-user"> 

        <?php endif; ?>
   
         <?php echo $_SESSION['usuario'][0]['nombre'];?> <!-- Nombre de la empresa--></p>
    </h1>

   


    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <?php if($_SESSION['usuario'][0]['portada'] != null):?>
          <img class="img-fluid rounded" src="<?php echo base_url.$_SESSION['usuario'][0]['portada']?>" alt="" id="portadas">
        <?php else:?>
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <?php endif; ?>

        
        
        <hr>
        <!-- Descripcion -->
        <p class="text-justify"><?php echo $_SESSION['usuario'][0]['descripcion'];?></p>

        <hr>


        

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header text-primary">¿Como llegar?<img src="<?php echo base_url;?>assets/img/icons/map.svg" alt="" id="maps_logo"></h5>
          <div class="card-body">
            <p class="text-capitalize">Calle: <?php echo $_SESSION['usuario'][0]['calle']?></p>
            <p class="text-capitalize">Colonia: <?php echo $_SESSION['usuario'][0]['colonia']?></p>
            <p>Numero: #<?php echo $_SESSION['usuario'][0]['numero']?> </p>
            <p class="text-capitalize">Municipio: <?php echo $_SESSION['usuario'][0]['municipio']?></p>
            <?php if($_SESSION['usuario'][0]['maps_url'] != ''):?>
              <a target="_blank" href="<?php echo $_SESSION['usuario'][0]['maps_url']?>">Ir a la Ubicacion</a>
            <?php endif; ?>
           
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header text-primary">Contacto</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                  <li>
                    <p><img src="<?php echo base_url;?>assets/img/icons/phone.svg" class="mr-3" alt=""><span class="text-primary">Telefono:</span>  <?php echo $_SESSION['usuario'][0]['telefono']?></p>
                  </li>
                  <li>
                    <p><img src="<?php echo base_url;?>assets/img/icons/email.svg" class="mr-3" alt=""><span class="text-primary">Correo:</span> <?php echo $_SESSION['usuario'][0]['correo']?></p>
                  </li>
                  <li>
                    <p><img src="<?php echo base_url;?>assets/img/icons/global.svg" class="mr-3" id="global" alt=""><span class="text-primary">Sitio Web:</span> <a target="_blank" href="<?php echo $_SESSION['usuario'][0]['sitio_web']?>"><?php echo $_SESSION['usuario'][0]['sitio_web']?></a></p> 
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->