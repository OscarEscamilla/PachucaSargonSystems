<div class="m-nav">
<div class="container">

<div class="row">
    <div class="col-md-12">
        <h1 class=" mb-3 text-primary"><span class="text-primary">► </span>Gestion
        <small>de empresas registradas</small>
        </h1>
      

        <div class="tab mb-3">
        <button class="tablinks btn " onclick="openCity(event, 'Ecoturismo')">Todas</button>
        <button class="tablinks btn " onclick="openCity(event, 'Pueblos Magicos')">Activas</button>
        <button class="tablinks btn " onclick="openCity(event, 'Haciendas')">Inactivas</button>
        <button class="tablinks btn " onclick="openCity(event, 'Museos')">Museos</button>
        </div>

        

          <!-- ECOTURISMO -->

        <div id="Ecoturismo" class="tabcontent">

            <input id="myInput" type="text" class="form-control form-control-sm" onkeyup="myFunction()" placeholder="Search..">
            <br>
            <div class="table-responsive-md">
            
                <table class="table table-bordered table-hover " id="myTable">
                
                        <tr >
                            <th class="text-primary">Nombre</th>
                            <th class="text-primary">Telefono</th>
                            <th class="text-primary">Email</th>
                            <th class="text-primary">Acciones</th>
                        </tr>
                
                        <?php foreach ($all_users as $row_all ): ?>
                            <tr>
                                <td><?php echo $row_all['nombre']?></td>
                                <td><?php echo $row_all['telefono']?></td>
                                <td><?php echo $row_all['correo']?></td>
                                <td>
                                    <a class="btn-info btn-sm" href=" ">Update</a>
                                    <a class="btn-danger btn-sm" href="<?php echo base_url.'admin/deleteuser&user='.$row_all['id'];?>">Delete</a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                
                </table>
            </div>
     
            
        </div>

        <!-- PUEBLOS MAGICOS -->
        <div id="Pueblos Magicos" class="tabcontent">
             <!-- Blog Post -->
             
            
        </div>

         <!-- HACIENDAS -->
        <div id="Haciendas" class="tabcontent">
            
            

        </div>


        <!-- MUSEOS -->
        <div id="Museos" class="tabcontent">
            
        </div>
        <!--termina seccion de tabcontent -->
    </div>
</div>


<script>
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
</script>

<script>
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
</script>