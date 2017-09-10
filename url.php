<?php 
$url = explode('/', 'http://www.brightknowledge.org/knowledge-bank/media/studying-media/student-media/image_rhcol_thin');
array_pop($url);
echo implode('/', $url); 

 ?>