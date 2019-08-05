<header class="mt-5">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade mt-carousel" data-ride="carousel" id="header">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo base_url;?>assets/img/reloj.jpg" class="d-block  img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-shadow">Monumental Reloj de Pachuca</h5>
            <p class="text-shadow">Ubicado en el centro de Pachuca Hidalgo</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url;?>assets/img/mural-pachuca.jpg" class="d-block img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-shadow">Mural Peatonal</h5>
            <p class="text-shadow">Probablemente no lo sepas, pero el mural peatonal más grande del mundo está en Pachuca. Conoce más sobre esta atracción que bien merece un viaje a la capital hidalguense.

              La monumental obra es autoría del artista Byron Gálvez, oriundo de Mixquiahuala, Hidalgo, y se encuentra en el Parque Ben Gurión al sur de Pachuca, frente al Salón de la Fama del Futbol, la Biblioteca Central y el Auditorio Gota de Plata.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url;?>assets/img/Pachuca_panoramio.jpg" class="d-block img-carousel" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-shadow">Third slide label</h5>
            <p  class="text-shadow">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container mt-5">

    

    <!-- Features Section -->
    <div class="row">
     
      <div class="col-md-6">
        <h2 class="text-primary"><span class="text-primary">► </span>Historia</h2>
        <p class="text-info">¡Pachuca Hidalgo novia del viento, cuna del futbol mexicano!</p>
        <p class="text-justify">El Reloj Monumental de Pachuca se localiza en el Jardín Independencia en el centro de la ciudad de Pachuca capital del Estado de Hidalgo.Su diseño y construcción: La construcción del proyecto estuvo a cargo de los ingenieros Francisco Hernández (Foto) y Luis Carreón sobre el diseño del arquitecto Tomás Cordero y Osio.
          Su Maquinaria: La maquinaria es idéntica a la del Big Ben en Londres pues fue construida por la misma fabrica en Austria.
          Sus Campanas: Cuenta con ocho campanas que suenan en clave de ‘Do Mayor’ igual que el famosísimo Big Ben de Londres que suenan cada 15 minutos; y a las 6:00 de la tarde se pretendía que entonaran el Himno Nacional Mexicano.
          El paste (del córnico “pasti” y en inglés “pasty”) es un alimento de origen británico introducido a la gastronomía hidalguense. Hoy en día es un platillo típico de las ciudades de Real del Monte (Oficialmente Mineral del Monte), y Pachuca en el estado mexicano de Hidalgo.
          El paste fue introducido a Hidalgo junto con la minería y el futbol por los ingenieros y las contratistas del Cornwall, Inglaterra que trabajaron en las minas hidalguenses en el siglo XIX.</p>
      </div>
      <div class="col-md-6">
        <img class="img-fluid rounded h-45 pt-5" src="<?php echo base_url;?>assets/img/reloj.jpg" alt="">
      </div>
    </div>
    <!-- /.row -->
    <hr>
    
    <div class="row">
      <div class="col-md-6 mr-0 pr-1">
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'):?>
          <form action="<?php echo base_url;?>admin/banner_update_left" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <p class="text-primary">Banner Izquierda</p>
                <input  type="file" id="myFile" name="banner_left" class="btn btn-dark">
            </div>
            <div class="form-group col-md-6">
             <button class="btn btn-success">Actualizar</button>
            </div>
           
          </form>
        <?php endif;?>
        <img src="<?php echo $banners[1]['path']; ?>" alt="" id="banner-index">
        
      </div>
      <div class="col-md-6 ml-0 pl-1">
        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'):?>
          <form action="<?php echo base_url;?>admin/banner_update_rigth" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <p class="text-primary">Banner Derecho</p>
                <input  type="file" id="myFile" name="banner_rigth" class="btn btn-dark">
            </div>
            <div class="form-group col-md-6">
             <button class="btn btn-success">Actualizar</button>
            </div>
          </form>
        <?php endif;?>
        <img src="<?php echo $banners[0]['path']; ?>" alt="" id="banner-index">
      </div>
    </div>

    <hr>
  <br>

  
  
  <br>
  


    <!-- Portfolio Section -->
    <h2 class="text-primary"><span class="text-primary">► </span>10 datos que no sabias del estado de Hidalgo</h2>
  <br>
    <div class="row">
     <div class="col-md-12">
      <p><span class="text-info">■ </span>El primer gobernador del estado fue Juan Crisóstomo Doria</p>
      <p><span class="text-info">■ </span>El primer mapa del estado de Hidalgo fue realizado en 1869 por Ramón Almaraz por encargo de Juan C. Doria y constaba de 12 distritos.</p>
      <p><span class="text-info">■ </span>Fueron necesarios tres intentos para que el estado lograra erigirse como tal. En su segundo intento (1855) se llamó estado de Iturbide e incluso se mandó a hacer un mapa de éste.</p>
      <p><span class="text-info">■ </span>La capacidad económica de las zonas pulqueras y mineras fueron lo que permitieron su erección</p>
      <p><span class="text-info">■ </span>En 1895 se realizó el primer censo de población arrojando una población de 558 mil 769 hidalguenses.</p>  
      <p><span class="text-info">■ </span>En la Encuesta Intercensal del año 2015 registró una población de 2 millones 858 mil 359 habitantes. En la mitad de este 2018 se contempla llegue a 2 millones 980 mil 532 hidalguenses.</p> 
      <p><span class="text-info">■ </span>Es el sexto estado menos extenso —por delante de Querétaro, Colima, Aguascalientes, Morelos y Tlaxcala.</p> 
      <p><span class="text-info">■ </span>Los pueblos indígenas con mayor presencia dentro del estado son los otomíes, nahuas y tepehuas</p> 
      <p><span class="text-info">■ </span>A la ciudad de Pachuca, le fue agregada la denominación «de Soto» en reconocimiento de Manuel Fernando Soto, originario de la ciudad de Tulancingo y quien es considerado el más importante impulsor en la creación del estado.</p>  
      <p><span class="text-info">■ </span>El escudo oficial del Estado Libre y Soberano de Hidalgo fue diseñado por Diego Rivera e ideado por José Vasconcelos en el año de 1922.</p>
     </div>
     <br>
     <br>
     <br>
     <br>
    </div>
    <!-- /.row -->
    