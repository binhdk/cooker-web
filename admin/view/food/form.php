<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-th-list"></i>Món Ăn</div>
    <div class="panel-body">
        <form id="monan-form" class="form-horizontal" method="post" action="admin.php?controller=food&action=sua" enctype="multipart/form-data" role="form">
            <input name="id_monan" type="hidden" value="<?php echo $monan ? $monan['id_monan'] : '0'; ?>"/>
            <div class="form-group">
                <label for="id_loai" class="col-sm-3 control-label">Loại</label>
                <div class="col-sm-9">
                    <select name="id_loai" class="form-control">
                        <?php foreach ($danhmuc as $dm) {
                            $selected = '';
                            if ($monan && ($monan['id_loai']==$dm['id_loai'])) $selected = 'selected=""';
                            echo '<option value="'.$dm['id_loai'].'" '.$selected.'>'.$dm['tenloai'].'</option>';
                        } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tenmonan" class="col-sm-3 control-label">Tên món ăn</label>
                <div class="col-sm-9">
                    <input name="tenmonan" type="text" value="<?php echo $monan ? $monan['tenmonan'] : ''; ?>" class="form-control" id="tenmonan" placeholder="Tên món ăn" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="thanhphan" class="col-sm-3 control-label">Thành phần</label>
                <div class="col-sm-9">
                   <textarea name="thanhphan" rows=2 class="form-control" id="thanhphan" placeholder="Thành phần" /><?php echo $monan ? $monan['thanhphan'] : ''; ?></textarea>
            </div>
            </div>                       
            <div class="form-group">
                <label for="gia" class="col-sm-3 control-label">Giá</label>
                <div class="col-sm-9">
                    <input name="gia" type="text" value="<?php echo $monan ? number_format($monan['gia'],0,',','.'): 0; ?>" class="form-control" id="gia" placeholder="0" pattern="[0-9\.]+" required=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="hinhanh" class="col-sm-3 control-label">Ảnh</label>
                <div class="col-sm-9">
                    <input name="hinhanh" type="file" class="form-control" id="price" accept="image/*"/>
                    <?php if ($monan && is_file('assets/uploads/'.$monan['hinhanh'])) {
                        echo '<image src="assets/uploads/'.$monan['hinhanh'].'?time='.time().'" style="max-width:200px;" />';
                        }
                    ?>
                </div>
            </div>
             <div class="form-group">    
                <label for="mota" class="col-sm-3 control-label">Mô tả</label>
                <div class="col-sm-9">
                    <textarea name="mota" rows=5 class="form-control" id="mota" placeholder="Mô tả món ăn" /><?php echo $monan ? $monan['mota'] : ''; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary"><?php echo $monan ? 'Cập nhật' : 'Thêm mới' ;?></button>
                    <a class="btn btn-warning" href="admin.php?controller=food">Trở về</a>
                </div>
            </div>
        </form>
    </div>
</div>