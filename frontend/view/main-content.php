<div class="container text-center">  
  <div class="row">
    <?php 
        foreach($foods as $food){
    ?>
    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="panel panel-primary">
                 
      <div class="panel-heading"> 
        <?php
            echo $food->name ;
            echo "<br/>";
            echo $food->price;echo 'đ';
        ?> 
      </div>
     <div class="panel-body">
        <a href="food-detail/<?php echo utils\Help::alias($food->name . ' ' . $food->id) . '.html';?>">
          <img src="assets/uploads/<?php echo $food->image?>" class="img-responsive center-block" alt="Image">
        </a>
      </div>
      <div class="panel-footer">
        <a href="cart/add/<?php echo  $food->id ?>">Mua nguyên liệu</a>
      </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <!-- pagination -->
  <div class="text-right">
    <?php echo $pagination; ?>
  </div>
</div>