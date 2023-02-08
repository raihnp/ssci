<!DOCTYPE HTML>
<html lang="en">
<head>
<title></title>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<style type="text/css">

.sidebar li .submenu{ 
  list-style: none; 
  margin: 0; 
  padding: 0; 
  padding-left: 1rem; 
  padding-right: 1rem;
}
.sidebar ul ul li{
  padding-left: 1.5rem;
}
.sidebar ul ul li a{
  text-decoration: none;
  color: black;
}
.sidebar ul ul li a:hover{
  color: red;
}

.sidebar .nav-link {
    font-weight: 500;
    color: black;
}
.sidebar .nav-link:hover {
    color: red;
}

</style>


<script type="text/javascript">

  document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

      element.addEventListener('click', function (e) {

        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;  

        if(nextEl) {
          e.preventDefault(); 
          let mycollapse = new bootstrap.Collapse(nextEl);

            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
              mycollapse.show();
              // find other submenus with class=show
              var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
              // if it exists, then close all of them
            if(opened_submenu){
              new bootstrap.Collapse(opened_submenu);
            }

            }
          }

      });
    })

  }); 
  // DOMContentLoaded  end
</script>


</head>
<body>
<div class="menu-kiri">
<nav class="sidebar card">
  <div class="card-header text-center">
                Admin
            </div>

<ul class="nav flex-column" id="nav_accordion">
  <li class="nav-item has-submenu">
    <a class="nav-link" href="#">  Database <i class="bi small bi-caret-down-fill"></i> </a>
    <ul class="submenu collapse">
      <li><a href="siswaDb.php">db_Siswa</a></li>
      <li><a href="siswaBaru.php">db_Siswa Baru</a></li>
      <li><a href="tentorDb.php">db_Tentor</a></li>
      <li><a href="email.php">db_email</a></li>
      <li><a href="teman.php">db_Rekomendasi</a></li>
      <li><a href="rating.php">db_Rating</a></li>
      <li><a href="user.php">db_User</a></li>
    </ul>
  </li>
</ul>
</nav>
</div>
</body>
</html>