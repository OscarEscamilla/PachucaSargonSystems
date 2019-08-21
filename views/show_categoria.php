 <!-- Page Content -->
 <div class="container m-nav">

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3 text-primary text-s text-capitalize"><span class="text-primary">► </span> <?php echo $titulo;?>
  
</h1>

<ol class="breadcrumb">
  <li class="breadcrumb-item text-primary">
    Home
  </li>
  <li class="breadcrumb-item text-primary ">Descubre</li>
  <li class="breadcrumb-item text-dark">
    <a class="text-capitalize" href=""><?php echo $titulo;?></a>
  </li>
</ol>


<div class="row mb-4">
      <div class="col-md-6 mr-0 pr-3 pt-3">
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'):?>
          <form action="<?php echo base_url;?>descubre/banner_update_left" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <p class="text-primary">Banner Izquierda</p>
                <input  type="file" id="myFile" name="banner_left" class="btn btn-dark">
            </div>
            <div class="form-group col-md-6">
             <button class="btn btn-success">Actualizar</button>
            </div>
           
          </form>
        <?php endif;?>
        <img src="<?php echo base_url.$banners[1]['path']; ?>" alt="" id="banner-index">
        
      </div>
      <div class="col-md-6 ml-0 pl-3 pt-3">
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'):?>
          <form action="<?php echo base_url;?>descubre/banner_update_rigth" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <p class="text-primary">Banner Derecho</p>
                <input  type="file" id="myFile" name="banner_rigth" class="btn btn-dark">
            </div>
            <div class="form-group col-md-6">
             <button class="btn btn-success">Actualizar</button>
            </div>
          </form>
        <?php endif;?>
        <img src="<?php echo base_url.$banners[0]['path']; ?>" alt="" id="banner-index">
      </div>
    </div>


<div class="row mb-5">
    <?php foreach($resultados as $row): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
            <div class="card ">
            <a href="<?php echo base_url.$row['portada'];?>"><img class="card-img-top cat" src="<?php echo base_url.$row['portada'];;?>" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                <a href="<?php echo base_url;?>descubre/show_profile&id=<?php echo $row['id'];?>" class="text-info"><?php echo $row['nombre'];?></a>
                </h4>
                <p class="card-text">
                <?php echo 'Calle: '.$row['calle'].'<br>';?>
                <?php echo 'Colonia: '.$row['colonia'].'<br>';?>
                <?php echo 'Telefono: '.$row['telefono'].'<br>';?>
                </p>
                <a href="<?php echo base_url;?>descubre/show_profile&id=<?php echo $row['id'];?>" class="btn btn-primary">Ver mas...</a>
            </div>
            </div>
        </div>
    <?php endforeach;?>
</div>


