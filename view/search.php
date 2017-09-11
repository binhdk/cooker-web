<div class="container">    
  <div class="row">
    <?php
      foreach($foods as $food){
    ?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
                 
      <div class="panel-heading" style="text-align: center;"> 
        <?php
          echo $food->name;
          echo "<br/>";
          echo $food->price;echo 'đ';
        ?> 
      </div>
      <div class="panel-body">
        <a href="food-detail/<?php echo utils\Help::transformURL($food->name . ' ' . $food->id . '.html');?>">
          <img src="assets/uploads/<?php echo $food->image; ?>" class="img-responsive" style="width:100%" alt="Image">
        </a>
      </div>
      <div class="panel-footer">
        <a href="cart/add/<?php echo  $food->id ?>">Mua nguyên liệu</a>
      </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="text-right">
    <?php echo $pagination; ?>
  </div>
</div>