<?php
  require('admin/view/common/header.php');
  require('admin/view/common/navbar.php');
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3 col-xs-12 pull-right" id="sidebar" role="navigation">
      <?php require('admin/view/common/sidebar.php'); ?>
    </div>
    <div class="col-sm-9 col-xs-12 pull-left">
      <div class="row">
      <!-- BEGIN CONTENT -->
        <div class="panel panel-default">
          <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i> Danh mục sản phẩm</div>
            <div class="panel-body">
              <form id="category-form" class="form-horizontal" method="post"
              action="admin.php?controller=category&action=edit" enctype="multipart/form-data" role="form">
              <input name="id" type="hidden" value="<?php echo $category ? $category->id : '0'; ?>"/>
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">Tên danh mục</label>
                  <div class="col-sm-9">
                    <input name="name" type="text" value="<?php echo $category ? $category->name : ''; ?>" class="form-control" id="name" placeholder="Tên danh mục" required=""/>
                  </div>
                  <label for="status" class="col-sm-3 control-label">Trạng thái</label>
                  <div class="col-sm-1">
                    <input type="hidden" name="status" value="0" />
                    <input name="status" type="checkbox" value="1" class="form-control" id="status" <?php
                        if (!empty($category))
                          echo $category->status == 1 ? "checked" : null;
                      ?>
                    />
                  </div>
                </div>                   
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?php echo $category ? 'Cập nhật' : 'Thêm mới' ;?></button>
                    <a class="btn btn-warning" href="admin.php?controller=category">Trở về</a>
                    </div>
                </div>
              </form>
            </div>
          </div>
      <!-- END CONTENT -->
      </div>
    </div><!--/span-->            
  </div><!--/row-->
</div><!--/.container-->

<!-- javascript section -->
<script type="text/javascript" src="public/js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebar .panel-heading').click(function () {
            $('#sidebar .list-group').toggleClass('hidden-xs');
            $('#sidebar .panel-heading b').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
        });
    });
</script>