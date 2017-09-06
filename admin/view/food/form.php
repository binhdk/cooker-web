<div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i>Món Ăn</div>
  <div class="panel-body">
    <form id="food-form" class="form-horizontal" method="post" action="admin.php?controller=food&action=edit" enctype="multipart/form-data" role="form">
      <input name="id" type="hidden" value="<?php echo $food ? $food->id : '0'; ?>"/>
      <div class="form-group">
        <label for="category_id" class="col-sm-3 control-label">Loại</label>
        <div class="col-sm-9">
          <select name="category_id" class="form-control">
            <?php foreach ($categories as $category) {
                $selected = '';
                if ($food && ($food->category_id == $category->id)) $selected = 'selected=""';
                echo '<option value="' . $category->id . '" ' . $selected . '>' . $category->id . '</option>';
            } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Tên món ăn</label>
        <div class="col-sm-9">
          <input name="name" type="text" value="<?php echo $food ? $food->name : ''; ?>" class="form-control" id="name" placeholder="Tên món ăn" required=""/>
        </div>
      </div>
      <div class="form-group">
        <label for="component" class="col-sm-3 control-label">Thành phần</label>
        <div class="col-sm-9">
          <textarea name="component" rows=2 class="form-control" id="component" placeholder="Thành phần" /><?php echo $food ? $food->component : ''; ?></textarea>
      </div>
      </div>                       
      <div class="form-group">
        <label for="price" class="col-sm-3 control-label">Giá</label>
        <div class="col-sm-9">
          <input name="price" type="text" value="<?php echo $food ? number_format($food->price,0,',','.'): 0; ?>" class="form-control" id="price" placeholder="0" pattern="[0-9\.]+" required=""/>
        </div>
      </div>
      <div class="form-group">
        <label for="image" class="col-sm-3 control-label">Ảnh</label>
        <div class="col-sm-9">
          <input name="image" type="file" class="form-control" id="image" accept="image/*"/>
            <?php 
                if ($food && is_file('assets/uploads/' . $food->image)) {
                    echo '<img src="assets/uploads/' . $food->image . '?time='.time().'" style="max-width:200px;" />';
                }
            ?>
        </div>
      </div>
      <div class="form-group">    
        <label for="detail" class="col-sm-3 control-label">Mô tả</label>
        <div class="col-sm-9">
          <textarea name="detail" rows=5 class="form-control" id="detail" placeholder="Mô tả món ăn" />
            <?php echo $food ? $food->detail : ''; ?>
          </textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-primary"><?php echo $food ? 'Cập nhật' : 'Thêm mới' ;?>
              
          </button>
          <a class="btn btn-warning" href="admin.php?controller=food">Trở về</a>
        </div>
      </div>
    </form>
  </div>
</div>