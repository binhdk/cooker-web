<?php 
 if(!empty($_SESSION['customer']))
 	require 'logout-section.php';
 else
 	require 'login-section.php';

?>