
<!-- jumbotron section start -->
<div class="jumbotron">
  <div class="container text-center">
    <h1>Web Nấu Ăn Ngon</h1>      
    <p>Nhanh chóng, dễ dàng, thuận tiện</p>
  </div>
</div>
<!-- jumboton end -->

<!-- navbar start -->
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="." style="color:#FFF">
                    Trang chủ 
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle=
          "dropdown" style="color:#FFF">
                    Thực đơn <span class="caret"></span></a>
          <ul class="dropdown-menu"  role="menu">
            <?php
                $categories = $factory->getDao(
                    utils\enum\DaoEnum::CATEGORY)->getCategories(array('where' => "status=1"));
                foreach($categories as $category){
                ?>
            <li>
              <a href="food-category-detail/<?php echo $category->id;?>">
                <?php echo $category->name;?>
              </a>
            </li>
              <?php  } ?>
         </ul>
        </li>
        <li class="dropdown" style="width:100px">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF">
            Gợi ý <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="suggest-food/2">2 người ăn</a> </li>
            <li><a href="suggest-food/3">3 người ăn</a> </li>
            <li><a href="suggest-food/4">4 người ăn</a> </li>
            <li><a href="#">khác...</a> </li>
          </ul>
          </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF">
            Sức khỏe <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="health-news/2">Ăn Kiêng</a> </li>
            <li><a href="health-news/3">Thực Phẩm An Toàn</a> </li>
            <li><a href="health-news/4">Thực Đơn Giảm Cân</a> </li>
          </ul>
        </li>
      </ul>
      
      <!-- search form start -->
      <form class="navbar-form navbar-left"  method="get"  action="search/">
        <div class="input-group">
          <input type="text" name="s" id="search" class="form-control" placeholder="Tìm kiếm">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
         </div>
      </form>
      <!-- search form end -->

      <!-- login component start -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="cart">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            Giỏ hàng
          </a>
        </li>
        <li>
          <?php require('view/login.php');?>
        </li>
      </ul>
      <!-- login component end -->
    </div>
  </div>
</nav>
<!-- navbar end -->