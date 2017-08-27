<style type="text/css">
	.table th, .table td {
		text-align: center;
		width: 5em;
	}
	.table th:nth-child(4), .table td:nth-child(4) {
		text-align: left;
		width: auto;
	}
	.table td {
		vertical-align: middle!important;
	}
</style>

<form id="monan_form" method="post" action="admin.php?controller=food" role="form">

<div class="col-xs-12">
	
	<div class="form-group">
		<!-- Single button -->
		<div class="btn-group">
			<select id="action" name="action" class="form-control">
				<option>Tác vụ</option>
				<option value="delete">Xóa</option>
			</select>
		</div>

		<div class="btn-group">
			<input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm"/>
		</div>

		<a href="admin.php?controller=food&action=sua" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
	</div>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><input id="check_all" type="checkbox"/></th>
				<th>ID</th>
				<th>Ảnh</th>
				<th>Món ăn</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($monan as $item): ?>
			<tr>
				<td>
					<input name="id[]" type="checkbox" value="<?php echo $item['id_monan'];?>"/>
				</td>
				<td><?php echo $item['id_monan'];?></td>
				<td>
					<?php
					$hinhanh = 'assets/uploads/'.$item['hinhanh'];
					if (is_file($hinhanh)) {
                        echo '<image src="'.$hinhanh.'" style="max-width:50px; max-height:50px;" />';
                    }
                    ?>
                </td>
				<td>
					<a href="admin.php?controller=food&action=sua&id=<?php echo $item['id_monan'];?>"><?php echo $item['tenmonan'];?></a>
				</td>
				<td>
					<a class="del" href="admin.php?controller=food&action=xoa&id=<?php echo $item['id_monan'];?>"><i class="glyphicon glyphicon-remove"></i></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<div class="text-right">
		<?php ?>
	</div>	
</div>

</form>
<script>
 var elems = document.getElementsByClassName('del');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
 // $('.confirmation').on('click', function () {
 //        return confirm('Are you sure?');
 //    });
</script>						