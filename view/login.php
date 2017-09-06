
<!-- call view -->
<ul class="nav navbar-nav navbar-right">
  <?php
    if(isset($_SESSION['customer']))
      include 'logout.php';
    else
      include 'login-section.php';
  ?>
</ul>
      

