<div class="food-detail container">
  <h1 class="text-center">Thông Tin Món Ăn</h1>
  <div class="row">
    <div class="col-sm-10">
       <img class="img-responsive" height="400" width="400" src="assets/uploads/<?php echo $food->image?>">
       <h2><?php echo $food->name ?></h2>
    </div>
    <div class="col-sm-2">
      <a href="cart/add/<?php echo  $food->id ?>">
        <img class="img-responsive" src="public/img/buynowbutton.png" width="145" height="150" />
      </a>
    </div> 
  </div>
  <div class="cachnau">
    <?php
        $information='assets/food-details/'.$food->name.'.html';
        if (is_file($information)) {
            require($information);
        } else {
            echo "<h2>Thành Phần</h2>
                <p>Nguyên liệu cần có cho món ăn này</p>

                <h4>'+ Khổ qua: 500g<br/>
                + Thịt heo: 300g<br/>
                + Nấm rơm: 100g<br/>
                + Xương heo đã róc thịt: 500g<br/>
                + Hành lá, rau mùi: 100g<br/>
                + Trứng gà: 1 quả<br/>
                + Gia vị<br/>'
                </h4>";
        }
    ?>
  </div>
</div>

