<div class="col-xs-12">
  <?php  
  $i=0;
  if($chitiet==null) echo "<h3>Bạn chưa có đơn hàng nào</h3>";
  else {
    foreach ($chitiet as $item) {
      if(isset($ds_donhang[$ds_iddonhang[$i]['id_donhang']])){
        echo "-Đơn hàng: ".$ds_iddonhang[$i]['id_donhang']."<br/>";
        echo "Ngày đặt: ".$ds_iddonhang[$i]['ngaydat']."<br/>";
        echo ($trangthai=$ds_iddonhang[$i]['trangthai'])==1? 'Đã giao hàng': 'Chờ xử lý';         
?>
  <table class="table-donhang table-bordered table-hover">
	<thead>
	  <tr>
	    <th class="hidden-xs">STT</th>
	    <th class="hidden-xs">Ảnh</th>
	    <th>Món ăn</th>
	    <th>Giá</th>
	    <th>Số lượng</th>
	  </tr>
	</thead>
	<tbody>
	  <?php 
		$stt = 0;
		$tongtien=0;
		foreach ($item as $monan) $tongtien+=$soluong[$monan['id_monan']]*$monan['gia'];
		foreach ($item as $monan): 
          $stt++;
	  ?>
	  <tr>
		<td class="hidden-xs"><?php echo $stt;?></td>
		<td>
		  <?php
			$hinhanh = 'assets/uploads/'.$monan['hinhanh'];
			if (is_file($hinhanh)) {
              echo '<image src="'.$hinhanh.'" style="max-width:60px; max-height:60px;" />';
            }
          ?>
        </td>
		<td><a href="index.php?action=chitietmonan&id=<?php echo $monan['id_monan'];?>"><?php echo $monan['tenmonan'];?></a>
		</td>
		<td><?php echo $monan['gia'];?></td>
		<td><?php echo $soluong[$monan['id_monan']];?></td> 

	  </tr>
	  <?php endforeach;?>
   	  <tr>
   	    <td>
   	      <?php echo "Tổng tiền:".$tongtien;?>
   	    </td>
   	  </tr>
	</tbody>
  </table>
  <?php
    } 
    else{
      continue;
    } 
    $i++;
  }?>
<div class="text-right">
		
</div>	
</div>
<?php }?>