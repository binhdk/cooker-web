<div class="container">    
  <div class="row">
    <?php
      foreach($foods as $food){
    ?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
                 
      <div class="panel-heading" style="text-align: center;"> 
        <?php
          echo $food->id;
          echo "<br/>";
          echo $food->price;echo 'đ';
        ?> 
      </div>
      <div class="panel-body">
        <a href="index.php?view=food-detail&id=<?php echo $food->id;?>">
          <img src="assets/uploads/<?php echo $food->image; ?>" class="img-responsive" style="width:100%" alt="Image">
        </a>
      </div>
      <div class="panel-footer">
        <a href="index.php?view=cart&id=<?php echo  $food->id ?>">Mua nguyên liệu</a>
      </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="text-right">
    <?php echo $pagination; ?>
  </div>
</div>