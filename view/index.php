
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo isset($title) ? $title : 'Web nấu ăn ngon'; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="//php:8888/cooker/" />
  <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
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
<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script src="public/js/angular.min.js"></script>
<script src="public/js/script.js"></script>
</body>
</html>
