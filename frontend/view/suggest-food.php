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
<div class="suggest container">
  <table class="table table-hover table-bordered">
  	<caption class="text-center"><h2>Gợi ý thực đơn trong tuần</h2></caption>
  	  <thead>
  		<tr>
  		  <th></th>
  		  <th>Buổi sáng</th>
  		  <th>Buổi trưa</th>
  		  <th>Buổi tối</th>
  		</tr>
  	  </thead>
  	  <?php 
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
  	  	  <a href="food-detail/<?php $sang[$i] = $ds_sang[$tam[$i]] ;
  	  		  echo utils\Help::alias($sang[$i]->name . ' ' . $sang[$i]->id) . '.html';?>">
  	  		<?php 
  	  		  $sang[$i] = $ds_sang[$tam[$i]] ;
  	  		  $tong_sang+= $sang[$i]->price;
  	  		  echo $sang[$i]->name."<br/>";
  	  		?>
  	  	  </a>
        </td>
        <!-- lay nhung mon an trua-->
        <td>
          <a href="food-detail/<?php $trua[$i] = $ds_trua[$tam_trua1[$i]] ;
		          echo utils\Help::alias($trua[$i]->name . ' ' . $trua[$i]->id) . '.html';?>">
            <?php
			          $trua[$i]   = $ds_trua[$tam_trua1[$i]];
			          $tong_trua1+=$trua[$i]->price;
			          echo $trua[$i]->name . "<br/> ";
			      ?>
		      </a>
		      <a href="food-detail/<?php 
		  	    $trua[$i+1] =$ds_trua[$tam_trua2[$i]] ;
		  	    echo utils\Help::alias($trua[$i+1]->name . ' ' . $trua[$i+1]->id) . '.html';?>">
		        <?php 
		   	        $trua[$i+1] = $ds_trua[$tam_trua2[$i]];
		  	        $tong_trua2+=$trua[$i+1]->price;
		          	echo $trua[$i+1]->name . "<br/> ";
		        ?>
		      </a>
		      <a href="food-detail/<?php $trua[$i+2] =$ds_trua[$tam_trua3[$i]] ;
			        echo $trua[$i+2]->id;?>">
			        <?php 
				          $trua[$i+2] = $ds_trua[$tam_trua3[$i]];
				          $tong_trua3+=$trua[$i+2]->price;
				          echo $trua[$i+2]->name . "<br/> ";
			        ?>
			    </a>
        </td><!-- lay nhung mon an toi-->

        <td>
          <a href="food-detail/<?php $toi[$i] =$ds_toi[$tam_toi1[$i]] ;
		          echo utils\Help::alias($toi[$i]->name . ' ' . $toi[$i]->id) . '.html';?>">
              <?php
          	      $toi[$i] =$ds_toi[$tam_toi1[$i]];
          	      $tong_toi1+=$toi[$i]->price;
          	      echo $toi[$i]->id . "<br/>";
              ?>
		      </a>
		      <a href="food-detail/<?php $toi[$i+1] =$ds_toi[$tam_toi2[$i]] ;
		          echo utils\Help::alias($toi[$i+1]->name . ' ' . $toi[$i+1]->id) . '.html';?>">
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
	    <label for="sum" id="lbltien">Tổng tiền: </label></td>
		<td>
		  <input type="text" name="sum" value="<?php 
			$tong+= $tong_sang + $tong_trua1 + $tong_trua2 + $tong_trua3 + $tong_toi1 + $tong_toi2;
			echo $tong * $number_person;?>"><br/>
		</td>
	</tr>
	<tr>
	  <td></td>
	  <td>
		  <button class="btn btn-primary" type="submit" onclick="window.location.reload()">
        Gợi ý lại
      </button>
		  <button class="btn btn-primary" method="post" type="submit" name="btnchitiet">
        Chi tiết
      </button>
	  </td>
	</tr>
</div>