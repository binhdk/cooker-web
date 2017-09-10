<div class="container">
  <form id="cart_form" method="post" action="cart/buy" role="form">
  <div class="col-xs-12">
	<h2>Giỏ hàng</h2>

	<table  class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="hidden-xs">STT</th>
				<th class="hidden-xs">Hình ảnh</th>
				<th>Thực phẩm</th>
				<th>Giá cả</th>
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
					<a href="food-detail/<?php echo $food['id'];?>">
					    <?php echo $food['name'];?>
					</a>
				</td>
				<td>
					<?php echo number_format($food['price'], 0, ',', '.'); ?>
				</td>
				<td>
					<div class="btn-group">
						<input name="quantity[<?php echo $food['id'];?>" type="text" value="<?php echo $food['quantity'];?> " size="3" class="form-control text-center"/>
					</div>
				</td>
				<td>
					<a href="cart/delete/<?php echo $food['id'];?>" class="text-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
</div>
