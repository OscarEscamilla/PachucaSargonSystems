
<div class="container m-nav">
    <div id="mySidenav" class="sidenav m-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
    <div class="row">
        <div class="col-md-12">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
         
        </div>
    </div>
</div>




<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>