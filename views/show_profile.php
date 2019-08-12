  <!-- Page Content -->
  <?php foreach ($result as $row):?> 
      
      <?php endforeach; ?>
  <div class="container m-nav">

    <!-- Page Heading/Breadcrumbs -->
    <!--evaluamos si el registro se comleto y mostramos alerta -->
    
    <div class="row">
      <div class="col-md-3">

        <div class="card">
          <div class="card-header">
            <h4 class="">
            <p id="nombre-perfil" class>
            <?php if($row['logo'] != null && $row['logo'] != ''):?>
              <img class="img-fluid rounded" src="<?php echo base_url.$row['logo']?> " alt="" id="logo-user">
            <?php else:?>
              <img src="<?php echo base_url;?>/assets/img/icons/user.svg" alt="" id="logo-user"> 

            <?php endif; ?>
            
            <?php echo $row['nombre'];?> <!-- Nombre de la empresa--></p>
            </h4>
            
          </div>
          <div class="card-body">
            <p class="text-capitalize">Calle: <?php echo $row['calle']?></p>
            <p class="text-capitalize">Colonia: <?php echo $row['colonia']?></p>
            <p>Numero: #<?php echo $row['numero']?> </p>
            <p class="text-capitalize">Municipio: <?php echo $row['municipio']?></p>
            <?php if($row['maps_url'] != ''):?>
              <a target="_blank" href="<?php echo $row['maps_url']?>">Ir a la Ubicacion</a>
            <?php endif; ?>
          </div>
        </div>
          
        <div class="card mt-3">
          <div class="card-header">
            ¿Como llegar?<img src="<?php echo base_url;?>assets/img/icons/map.svg" alt="" id="maps_logo">
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                  <li>
                    <p><img src="<?php echo base_url;?>assets/img/icons/phone.svg" class="mr-3" alt=""><span class="text-primary">Telefono:</span>  <?php echo $row['telefono']?></p>
                  </li>
                  <li>
                    <p><img src="<?php echo base_url;?>assets/img/icons/email.svg" class="mr-3" alt=""><span class="text-primary">Correo:</span> <?php echo $row['correo']?></p>
                  </li>
                  <li>
                    <p><img src="<?php echo base_url;?>assets/img/icons/global.svg" class="mr-3" id="global" alt=""><span class="text-primary">Sitio Web:</span> <a target="_blank" href="<?php echo $row['sitio_web']?>"><?php echo $row['sitio_web']?></a></p> 
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
         <!-- Preview Image -->
         <?php if($row['portada'] != null):?>
          <img class="img-fluid rounded" src="<?php echo base_url.$row['portada']?>" alt="" id="portadas">
        <?php else:?>
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <?php endif; ?>

        <br>
        <p class="text-justify mt-4">
        <?php echo $row['descripcion'] ?>
        </p>
       
      </div>
    </div>
    
   