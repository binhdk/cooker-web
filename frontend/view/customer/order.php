<div class="container">
  <div class="row"> 
    <div class="col-sm-12">
      <?php 
          if(empty($order_details)) {
      	      echo "<h3>Bạn chưa có đơn hàng nào</h3>";
          } else {
      	      foreach ($order_details as $key => $value):
      		      $increase = 1;
                    foreach ($value as $item):
            	        echo "- Mã đơn hàng: " . $key;
      ?>
        <table class="table table-bordered table-hover">
      	<thead>
      	  <tr>
      	    <th class="hidden-xs">STT</th>
      	    <th class="hidden-xs">Hình</th>
      	    <th>Item</th>
      	    <th>Giá</th>
      	    <th>Số lượng</th>
      	  </tr>
      	</thead>
      	<tbody>
      	  <tr>
      		<td class="hidden-xs col-sm-1">
      		  <?php echo $increase++; ?>
      		</td>
      		<td class="hidden-xs col-sm-2">
      		  <?php
      		  	  $image = 'assets/uploads/' . $item->image;
      		  	  if (is_file($image)) {
      		          echo '<img src="'. $image . '" style="max-width:50px; max-height:50px;" />';
      		      }
      		  ?>
              </td>
      		<td class="col-sm-2">
      		  <a href="food-detail/<?php echo utils\Help::alias($item->name . ' ' . $item->id) . '.html'; ?>">
      		  	<?php echo $item->name; ?>
      		  </a>
      		</td>
      		<td class="col-sm-1">
      		  <?php echo $item->price; ?>
      		</td>
      		<td class="col-sm-1">
      		  <?php echo $item->quantity; ?>
      		</td>
      	  </tr>
         	  <tr>
         	    <td>
         	      <?php echo "Tổng tiền:" ?>
         	    </td>
         	  </tr>
      	</tbody>
        </table>
      <?php 
            endforeach;
          endforeach;
         }
      ?>	
    </div>
  </div>
</div>