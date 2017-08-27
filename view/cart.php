<style type="text/css">
	.table th, .table td {
		text-align: center;
	}
	.table th:nth-child(3), .table td:nth-child(3)  {
		width: auto;
		text-align: left;
	}
	.table th:nth-child(4), .table td:nth-child(4),
	.table th:nth-child(5), .table td:nth-child(5)  {
	}
	.table td {
		vertical-align: middle!important;
	}
</style>
<form id="cart_form" method="post" action="index.php?action=giohang&task=mua" role="form">

<div class="col-xs-12">
	<h2>Giỏ hàng</h2>

	<table  class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="hidden-xs">STT</th>
				<th class="hidden-xs">Ảnh</th>
				<th>Mon an</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
		     <?php 
		      $stt = 0;
			 $giohang=listdonhang();
			 if(!empty($giohang)){
			  foreach ($giohang as $monan):
				$stt++;
			?>
			<tr>
				<td class="hidden-xs"><?php echo $stt;?></td>
				<td class="hidden-xs">
					<?php
					$image = 'assets/uploads/'.$monan['hinhanh'];
					if (is_file($image)) {
                        echo '<image src="'.$image.'" style="max-width:50px; max-height:50px;" />';
                    }
                    ?>
                </td>
				<td>
					<a href="index.php?action=chitietmonan&id=<?php echo $monan['id_monan'];?>"><?php echo $monan['tenmonan'];?></a>
				</td>
				<td>
					<?php echo number_format($monan['gia'],0,',','.'); ?>
				</td>
				<td>
					<div class="btn-group">
						<input name="soluong[<?php echo $monan['id_monan'];?>" type="text" value="<?php echo $monan['soluong'];?> " size="3" class="form-control text-center"/>
					</div>
				</td>
				<td>
					<a href="index.php?action=giohang&task=xoa&id_xoa=<?php echo $monan['id_monan'];?>" class="text-danger"><i class="glyphicon glyphicon-remove"></i></a>
				</td>
			</tr>
			<?php endforeach; }?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6">Thành tiền : <?php echo tongTien();?> VNĐ</th>
			</tr>
		</tfoot>
	</table>
	
	<div class="form-group">
	 <button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Đặt hàng</button>
	</div>	
</div>
</form>
