<div class="m-nav">
<div class="container">

<div class="row">
    <div class="col-md-12">
        <h1 class=" mb-3 text-primary"><span class="text-primary">► </span>Gestion
        <small>de empresas registradas</small>
        </h1>
      

        <div class="tab mb-3">
        <button class="tablinks btn " onclick="openCity(event, 'all_users')">Todas</button>
        <button class="tablinks btn " onclick="openCity(event, 'on_users')">Activas</button>
        <button class="tablinks btn " onclick="openCity(event, 'off_users')">Inactivas</button>
        <button class="tablinks btn " onclick="openCity(event, 'Museos')"></button>
        </div>
        <?php if(isset($_SESSION['on_off'])):?>
            <div class="alert alert-dismissible <?php echo $_SESSION['on_off'];?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $_SESSION['flash'];?>
            </div>
        <?php endif; ?>
        <?php Utils::deleteSession('on_off');?>
        <?php Utils::deleteSession('flash');?>

        

          <!-- Todas las empresas -->

        <div id="all_users" class="tabcontent">

           

            <input id="myInput" type="text" class="form-control form-control-sm" onkeyup="myFunction()" placeholder="Search.." autofocus>
            <br>
            <div class="table-responsive-md">
            
                <table class="table table-bordered table-hover " id="myTable">
                
                        <tr >
                            <th class="text-primary">Nombre</th>
                            <th class="text-primary">Categoria</th>
                            <th class="text-primary">Telefono</th>
                            <th class="text-primary">Email</th>
                            <th class="text-primary">Acciones</th>
                        </tr>
                
                        <?php foreach ($all_users as $row_all ): ?>
                            <tr>
                                <td><?php echo $row_all['nombre']?></td>
                                <td class="text-capitalize"><?php echo $row_all['categoria']?></td>
                                <td><?php echo $row_all['telefono']?></td>
                                <td><?php echo $row_all['correo']?></td>
                                <td>
                                  <?php if($row_all['estado'] == '1'): ?>
                                    <a class="btn-warning btn-sm mb-1" href="<?php echo base_url.'admin/off_estado&id='.$row_all['id'];?>">Desactivar</a>
                                    
                                  <?php elseif($row_all['estado'] == '0'):?>
                                    <a class="btn-info btn-sm mb-1" href="<?php echo base_url.'admin/on_estado&id='.$row_all['id'];?>">  Activar  </a>
                                    
                                  <?php endif; ?>
                                    
                                  <a class="btn-danger btn-sm" id="delete" href="<?php echo base_url.'admin/deleteuser&id='.$row_all['id'];?>">Delete</a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                
                </table>
            </div>
     
            
        </div>

        <!-- Empresas activadas -->
        <div id="on_users" class="tabcontent">
             <!-- Blog Post -->
             
            
             
            
            <div class="table-responsive-md mt-3">
            
                <table class="table table-bordered table-hover " id="myTable">
                
                        <tr >
                            <th class="text-primary">Nombre</th>
                            <th class="text-primary">Categoria</th>
                            <th class="text-primary">Telefono</th>
                            <th class="text-primary">Email</th>
                            <th class="text-primary">Acciones</th>
                        </tr>
                
                        <?php foreach ($on_users as $row_all ): ?>
                            <tr>
                                <td><?php echo $row_all['nombre']?></td>
                                <td class="text-capitalize"><?php echo $row_all['categoria']?></td>
                                <td><?php echo $row_all['telefono']?></td>
                                <td><?php echo $row_all['correo']?></td>
                                <td>
                                  <?php if($row_all['estado'] == '1'): ?>
                                    <a class="btn-warning btn-sm mb-1" href="<?php echo base_url.'admin/off_estado&id='.$row_all['id'];?>">Desactivar</a>
                                    
                                  <?php elseif($row_all['estado'] == '0'):?>
                                    <a class="btn-info btn-sm mb-1" href="<?php echo base_url.'admin/on_estado&id='.$row_all['id'];?>">  Activar  </a>
                                    
                                  <?php endif; ?>
                                    
                                  <a class="btn-danger btn-sm" id="delete" href="<?php echo base_url.'admin/deleteuser&id='.$row_all['id'];?>">Delete</a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                
                </table>
            </div>
        </div>

         <!-- Empresas Descativadas -->
        <div id="off_users" class="tabcontent">
            
        
            <div class="table-responsive-md mt-3">
            
                <table class="table table-bordered table-hover " id="myTable">
                
                        <tr >
                            <th class="text-primary">Nombre</th>
                            <th class="text-primary">Categoria</th>
                            <th class="text-primary">Telefono</th>
                            <th class="text-primary">Email</th>
                            <th class="text-primary">Acciones</th>
                        </tr>
                
                        <?php foreach ($off_users as $row_all ): ?>
                            <tr>
                                <td><?php echo $row_all['nombre']?></td>
                                <td class="text-capitalize"><?php echo $row_all['categoria']?></td>
                                <td><?php echo $row_all['telefono']?></td>
                                <td><?php echo $row_all['correo']?></td>
                                <td>
                                  <?php if($row_all['estado'] == '1'): ?>
                                    <a class="btn-warning btn-sm mb-1" href="<?php echo base_url.'admin/off_estado&id='.$row_all['id'];?>">Desactivar</a>
                                    
                                  <?php elseif($row_all['estado'] == '0'):?>
                                    <a class="btn-info btn-sm mb-1" href="<?php echo base_url.'admin/on_estado&id='.$row_all['id'];?>">  Activar  </a>
                                    
                                  <?php endif; ?>
                                    
                                  <a class="btn-danger btn-sm" id="delete" href="<?php echo base_url.'admin/deleteuser&id='.$row_all['id'];?>">Delete</a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                
                </table>
            </div>

        </div>


        <!-- MUSEOS -->
        <div id="Museos" class="tabcontent">
            
        </div>
        <!--termina seccion de tabcontent -->
    </div>
    
</div>
<div class="row">
  <div class="col-md-12">
    
       <img src="<?php echo base_url;?>assets/img/losargon2.png" class="img-fluid  mt-3 mb-3" id="sargon-img">
    
    
  </div>
</div>



<script>
    // CAMBIO DE SECCIONES
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    //FILTRO PARA MOSTAR LO QUE E INGRESE EN EL CAMPO SEARCH

    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

      
  // EVENTO CLICK ON DELETE

  /*document.get('delete').addEventListener('click', function(e) {
      
      var conf = confirm('¿Realmente desea eliminar esta empresa?');

      if (conf == true) {
          window.location="http://www.pachuca.com.mx";
      }

  });*/
</script>