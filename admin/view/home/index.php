<?php require('admin/view/common/header.php'); ?>

<?php require('admin/view/common/navbar.php'); ?>
<!-- content section -->
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-xs-12 pull-right" id="sidebar" role="navigation">
        <?php require('admin/view/common/sidebar.php'); ?>
      </div>
      <div class="col-sm-9 col-xs-12 pull-left">
       <div class="row">
          <div id="menu">
            <a href="." class="col-6 col-sm-4 col-lg-3">
               <i class="glyphicon glyphicon-home"></i> Trang chủ
            </a>
             <a href="admin.php?controller=category" class="col-6 col-sm-4 col-lg-3">
               <i class="glyphicon glyphicon-th-list"></i> Danh mục
             </a>
             <a href="admin.php?controller=food" class="col-6 col-sm-4 col-lg-3">
                <i class="glyphicon glyphicon-list-alt"></i>Món ăn
             </a>
             <a href="admin.php?controller=order" class="col-6 col-sm-4 col-lg-3">
               <i class="glyphicon glyphicon-usd"></i> Đơn hàng
              </a>
          </div>
        </div>
      </div>           
    </div>
  </div>

<!-- javascript section -->
  <script type="text/javascript" src="public/js/jquery-3.2.0.min.js"></script>
  <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          $('#sidebar .panel-heading').click(function () {
              $('#sidebar .list-group').toggleClass('hidden-xs');
              $('#sidebar .panel-heading b').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
          });
      });
  </script>
</body>
</html>