<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#3771ce"/>
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pachuca</title>
  <!-- Icons css -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url;?>assets/css/bootstrap_litera.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url;?>assets/css/modern-business.css" rel="stylesheet">

  <link href="<?php echo base_url;?>assets/css/style.css" rel="stylesheet">

</head>

<body id="body">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-secondary  p-0">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img src="<?php echo base_url;?>assets/img/logo.gif" alt="" id="logo"></a>
      <button class="navbar-toggler navbar-toggler-right mr-2 bg-primary  " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url;?>contacto/index">Contacto</a>
          </li>
          <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'user'):?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  <?php echo $_SESSION['usuario'][0][1] ?>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?php echo base_url;?>user/index">Perfil</a>
                  <a class="dropdown-item" href="<?php echo base_url;?>user/config">Configuracion</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url;?>user/logout">Cerrar Session</a>
                </div>
              </li>
          <?php elseif(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
            <div class="btn-group ml-3">
              <button type="button" class="btn btn-primary">Admin</button>
              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url;?>admin/index">Gestion</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url;?>user/logout">Cerrar Session</a>
              </div>
            </div>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>

  