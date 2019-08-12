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
                <?php echo 'calle: '.$row['calle'].'<br>';?>
                <?php echo 'colonia: '.$row['colonia'].'<br>';?>
                <?php echo 'telefono: '.$row['telefono'].'<br>';?>
                </p>
                <a href="<?php echo base_url;?>descubre/show_profile&id=<?php echo $row['id'];?>" class="btn btn-primary">Ver mas...</a>
            </div>
            </div>
        </div>
    <?php endforeach;?>
</div>


