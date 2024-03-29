<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#3771ce"/>
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pachuca</title>
  <link rel="icon" type="icon" href="<?php echo base_url;?>assets/img/logo.gif">
  <!-- Icons css -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url;?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Asap|Cabin+Condensed|Roboto+Condensed&display=swap" rel="stylesheet"> 

  
 

  <link href="<?php echo base_url;?>assets/css/style.css" rel="stylesheet">

</head>

<body id="body">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-secondary  p-0">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="<?php echo base_url;?>assets/img/logo.gif" alt="" id="logo"></a>
      <button class="navbar-toggler navbar-toggler-right mr-2 bg-primary" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mr-3" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url;?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url;?>descubre/index">Descubre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url;?>turismo/index">Turismo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url;?>noticias/index">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url;?>contacto/index">Contacto</a>
          </li>
          <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'user'):?>
              <div class="btn-group ml-3">
              <button type="button" class="btn btn-primary"> 
              <?php if($_SESSION['usuario'][0]['logo'] != null):?>
              <img src="<?php echo  base_url.$_SESSION['usuario'][0]['logo']; ?>" alt="" id="logo-user-nav">
              <?php else:?>
                <img src="<?php echo base_url;?>/assets/img/icons/user.svg" alt="" id="logo-user-nav"> 
              <?php endif; ?>
                
                <?php echo $_SESSION['usuario'][0]['nombre']; ?>
              </button>
              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo base_url;?>user/index">Mi perfil</a>
                <a class="dropdown-item" href="<?php echo base_url;?>user/config">Configuracion</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url;?>user/logout">Cerrar Sesion<img src="<?php echo base_url;?>assets/img/icons/logout.svg" alt="" id="logout-icon"></a>
              </div>
            </div>
          <?php elseif(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
            <div class="btn-group ml-3">
              <button type="button" class="btn btn-primary"><img src="<?php echo base_url;?>/assets/img/icons/user.svg" alt="" id="logo-user-nav">   Admin</button>
              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url;?>admin/index">Gestion</a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url;?>user/logout">Cerrar Session<img src="<?php echo base_url;?>assets/img/icons/logout.svg" alt="" id="logout-icon"></a>
              </div>
            </div>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>

  