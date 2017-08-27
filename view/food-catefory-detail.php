<div class="container">
  <div class="row">
    <?php
      foreach($monan as $m){
    ?>
    <div class="col-sm-4">
      <div class="panel panel-primary" accesskey="chitiet">
        <div class="panel-heading">
          <?php
            echo $m['tenmonan'] ;
            echo "<br/>";
            echo $m['gia'];echo 'đ';
          ?>                                 
        </div>
        <div  class="panel-body"><a href="index.php?action=chitietmonan&id=<?php echo $m['id_monan']?>"><img src="assets/uploads/<?php echo $m['hinhanh']?>" class="img-responsive" style="width:100%" alt="Image">
          </a>
        </div>
        <div class="panel-footer">
          <a href="index.php?action=giohang&id=<?php echo  $m['id_monan'] ?>">Mua nguyên liệu</a>
        </div>
      </div>    
    </div>
    <?php } ?>
  </div>
  <div class="text-right">
    <?php echo $pagination; ?>
  </div>
</div>