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

<form id="food-form" method="post" action="admin.php?controller=food" role="form">

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

		<a href="admin.php?controller=food&action=edit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
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
			<?php foreach ($foods as $food): ?>
			<tr>
				<td>
					<input name="id[]" type="checkbox" value="<?php echo $food->id;?>"/>
				</td>
				<td><?php echo $food->id;?></td>
				<td>
					<?php
					$image = 'assets/uploads/' . $food->image;
					if (is_file($image)) {
                        echo '<img src="'. $image .'" style="max-width:50px; max-height:50px;" />';
                    }
                    ?>
                </td>
				<td>
					<a href="admin.php?controller=food&action=edit&id=<?php echo $food->id;?>">
					<?php echo $food->name;?></a>
				</td>
				<td>
					<a class="del" href="admin.php?controller=food&action=delete&id=<?php echo $food->id;?>">
					<i class="glyphicon glyphicon-remove"></i></a>
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