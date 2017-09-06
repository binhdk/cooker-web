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
<form id="cart_form" method="post" action=".?view=cart&action=buy" role="form">

<div class="col-xs-12">
	<h2>Giỏ hàng</h2>

	<table  class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="hidden-xs">STT</th>
				<th class="hidden-xs">Ảnh</th>
				<th>Món ăn</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Tác vụ</th>
			</tr>
		</thead>
		<tbody>
		    <?php 
		        $stt = 0;
			    $cart = getCart();
			    if(!empty($cart)){
			    foreach ($cart as $food):
				    $stt++;
			?>
			<tr>
				<td class="hidden-xs"><?php echo $stt;?></td>
				<td class="hidden-xs">
					<?php
					    $image = 'assets/uploads/' . $food['image'];
					    if (is_file($image)) {
                            echo '<img src="' . $image . '" style="max-width:50px; max-height:50px;" />';
                        }
                    ?>
                </td>
				<td>
					<a href="index.php?view=food-detail&id=<?php echo $food['id'];?>">
					    <?php echo $food['name'];?>
					</a>
				</td>
				<td>
					<?php echo number_format($food['price'], 0, ',', '.'); ?>
				</td>
				<td>
					<div class="btn-group">
						<input name="soluong[<?php echo $food['id'];?>" type="text" value="<?php echo $food['quantity'];?> " size="3" class="form-control text-center"/>
					</div>
				</td>
				<td>
					<a href=".?view=cart&action=delete&id=<?php echo $food['id'];?>" class="text-danger"><i class="glyphicon glyphicon-remove"></i></a>
				</td>
			</tr>
			<?php endforeach; }?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6">Thành tiền : <?php echo total();?> VNĐ</th>
			</tr>
		</tfoot>
	</table>
	
	<div class="form-group">
	 <button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Đặt hàng</button>
	</div>	
</div>
</form>
