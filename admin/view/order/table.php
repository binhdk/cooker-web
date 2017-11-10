<style type="text/css">
	.table th, .table td {
		text-align: center;
	}
	.table th:nth-child(3), 
	.table td:nth-child(3) {
		text-align: left;
	}
</style>

<form id="order-form" method="post" action="admin.php?controller=order" role="form">

<div class="col-xs-12">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><input id="check_all" type="checkbox"/></th>
				<th>ID</th>
				<th>Khách hàng</th>
				<th>Thời gian</th>
				<th>Tình trạng</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($ds_donhang as $donhang): ?>
			<tr>
				<td><input name="id[]" type="checkbox" value="<?php echo $donhang['id_donhang'];?>"/></td>
				<td><?php echo $donhang['id_donhang'];?></td>
				<td><a href="admin.php?controller=order&action=chitiet&id=<?php echo  $donhang['id_donhang'];?>">
				<?php 
				    $khack=UserDao::timUser($donhang['id_user']);
				   echo $khack['tenkhachhang'];?>
				   </a></td>
				<td><?php echo $donhang['ngaydat'];?></td>
				<td><?php echo $donhang['trangthai']==0?"Chưa xử lý":"Đã xử lý";?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<div class="text-right">
		
	</div>	
</div>

</form>