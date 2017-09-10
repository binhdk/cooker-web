
<!-- call view -->
  <?php
    if(isset($_SESSION['customer']))
      include 'logout.php';
    else
      include 'login-section.php';
  ?>
      

