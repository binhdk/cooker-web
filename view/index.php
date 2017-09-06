
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web Nấu Ăn Ngon</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

<?php 
  //  header section
  include('view/header.php'); 
?>

<!--Center content -->
<div class="center"> 
  <?php
  // call controller handling
    include_once('controller/route.php');
  ?>
</div>

<!-- footer section -->
<footer class="container-fluid text-center" style="clear:both;">
  <?php include 'view/footer.php';?>
</footer>

<!-- include javascript file -->
<script src="public/js/jquery-3.2.0.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/angular.min.js"></script>
<script src="public/js/script.js"></script>
</body>
</html>
