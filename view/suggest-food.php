<?php 
$foodDao = $factory->getDao(utils\enum\DaoEnum::FOOD);
  if(isset($_GET['q'])) $number_person=$_GET['q'];

  $tong=0;
  $tong_sang=0;
  $tong_trua1=0;
  $tong_trua2=0;
  $tong_trua3=0;
  $tong_toi1=0;
  $tong_toi2=0;

  $sang = array();
  $trua = array();
  $toi = array();
?>
<div class="suggest">
  <table>
  	<caption style="text-align: center;"><h2>Gợi ý thực đơn trong tuần</h2></caption>
  	  <thead>
  		<tr>
  		  <th></th>
  		  <th>Buổi sáng</th>
  		  <th>Buổi trưa</th>
  		  <th>Buổi tối</th>
  		</tr>
  	  </thead>
  	  <?php 
  		if(isset($_POST['btnchitiet'])){
          header('location:.?view=component&id=1');
        }

  	    $tong_sang;
  	    $tong_trua1;
  	    $tong_trua2;
  	    $tong_trua3;
  	    $tong_toi1;
  	    $tong_toi2;

  	    $ds_sang = $foodDao->getAll(array('where' => "id=1"));
  	    $ds_trua = $foodDao->getAll(array('where' => "id=2"));
  	    $ds_toi = $foodDao->getAll(array('where' => "id=3"));
  	    			
  	    $tam = array();
  	    $tam = array_rand($ds_sang, 5);
  	    			
  	    $tam_trua1 = array();
  	    $tam_trua2 = array();
  	    $tam_trua3 = array();
  	    $tam_trua1 = array_rand($ds_trua, 5);
  	    $tam_trua2 = array_rand($ds_trua, 5);
  	    $tam_trua3 = array_rand($ds_trua, 5);
  	    			
  	    $tam_toi1 = array();
  	    $tam_toi2 = array();
  	    $tam_toi1 = array_rand($ds_toi, 5);
  	    $tam_toi2 = array_rand($ds_toi, 5);
  	    			
  	    for ($i = 0; $i < 5; $i++) {
  					
  	  ?>
  	  <tbody>
  	  <tr>
  	  	<td>Thứ <?php echo $i+2 ?></td>
  	    <!-- lay nhung mon an sang-->
  	  	<td>
  	  	  <a href=".?view=food-detail&id=<?php $sang[$i] =$ds_sang[$tam[$i]] ;
  	  		echo $sang[$i]->id;?>">
  	  		<?php 
  	  		  $sang[$i] = $ds_sang[$tam[$i]] ;
  	  		  $tong_sang+= $sang[$i]->price;
  	  		  echo $sang[$i]->name."<br/>";
  	  		?>
  	  	  </a>
        </td>
        <!-- lay nhung mon an trua-->
        <td>
          <a href=".?view=food-detail&id=<?php $trua[$i] = $ds_trua[$tam_trua1[$i]] ;
		          echo $trua[$i]->id;?>">
            <?php
			          $trua[$i]   = $ds_trua[$tam_trua1[$i]];
			          $tong_trua1+=$trua[$i]->price;
			          echo $trua[$i]->name . "<br/> ";
			      ?>
		      </a>
		      <a href=".?view=food-detail&id=<?php 
		  	    $trua[$i+1] =$ds_trua[$tam_trua2[$i]] ;
		  	    echo $trua[$i+1]->id;?>">
		        <?php 
		   	        $trua[$i+1] = $ds_trua[$tam_trua2[$i]];
		  	        $tong_trua2+=$trua[$i+1]->price;
		          	echo $trua[$i+1]->name . "<br/> ";
		        ?>
		      </a>
		      <a href=".?view=food-detail&id=<?php $trua[$i+2] =$ds_trua[$tam_trua3[$i]] ;
			        echo $trua[$i+2]->id;?>">
			        <?php 
				          $trua[$i+2] = $ds_trua[$tam_trua3[$i]];
				          $tong_trua3+=$trua[$i+2]->price;
				          echo $trua[$i+2]->name . "<br/> ";
			        ?>
			    </a>
        </td><!-- lay nhung mon an toi-->

        <td>
          <a href=".?view=food-detail&id=<?php $toi[$i] =$ds_toi[$tam_toi1[$i]] ;
		          echo $toi[$i]->id;?>">
              <?php
          	      $toi[$i] =$ds_toi[$tam_toi1[$i]];
          	      $tong_toi1+=$toi[$i]->price;
          	      echo $toi[$i]->id . "<br/>";
              ?>
		      </a>
		      <a href=".?view=food-detail&id=<?php $toi[$i+1] =$ds_toi[$tam_toi2[$i]] ;
		          echo $toi[$i+1]->id;?>">
		          <?php 
			            $toi[$i+1] =$ds_toi[$tam_toi2[$i]];
			            $tong_toi2+=$toi[$i+1]->price;
			            echo $toi[$i+1]->name."<br/>"
		         ?>
		      </a>
        </td>
  	  </tr>		
  	  </tbody>
  	  <?php	 } ?>
  	</table>
	<tr>
	  <td>
	    <label id="lbltien">Tổng tiền: </label></td>
		<td>
		  <input type="text" name="" value="<?php 
			$tong+= $tong_sang + $tong_trua1 + $tong_trua2 + $tong_trua3 + $tong_toi1 + $tong_toi2;
			echo $tong * $number_person;?>"><br/>
		</td>
	</tr>
	<tr>
	  <td></td>
	  <td>
		  <input type="submit" value="Gợi ý lại" onclick="window.location.reload()" name="btnlamlai" 
        style="size: 200px;"/>
		  <input method="post"  type="submit" value="Chi tiết" name="btnchitiet" style="size: 200px;"/>
	  </td>
	</tr>
</div>