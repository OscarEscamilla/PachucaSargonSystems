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
        <?php if($_SESSION['usuario'][0]['logo'] != null && $_SESSION['usuario'][0]['logo'] != ''):?>
          <img class="img-fluid rounded" src="<?php echo $_SESSION['usuario'][0]['logo']?> " alt="" id="logo-user">
        <?php else:?>
          <img src="<?php echo base_url;?>/assets/img/icons/user.svg" alt="" id="logo-user"> 

        <?php endif; ?>
   
    <?php echo $_SESSION['usuario'][0]['nombre'];?> <!-- Nombre de la empresa-->
    </h1>

   


    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <?php if($_SESSION['usuario'][0]['portada'] != null):?>
          <img class="img-fluid rounded" src="<?php echo $_SESSION['usuario'][0]['portada']?> " alt="" id="portadas">
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
          <h5 class="card-header text-primary">¿Como llegar?</h5>
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
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="<?php echo base_url;?>user/logout">logout</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
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