<?php require('admin/view/common/header.php'); ?>

<body>

    <?php require('admin/view/common/navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-12 pull-right" id="sidebar" role="navigation">
                <?php require('admin/view/common/sidebar.php'); ?>
             </div>
            <div class="col-sm-9 col-xs-12 pull-left">
                <div class="row">
                <!-- BEGIN CONTENT -->
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

                  <div class="col-xs-12">
                     <h3>Thông tin đơn hàng</h3>

                      <table id="chitiet_donhang" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                           <th class="hidden-xs">STT</th>
                           <th class="hidden-xs">Ảnh</th>
                            <th>Món ăn</th>
                            <th>Giá</th>
                           <th></th>
                          </tr>
                        </thead>
                         <tbody>
                           <!--  <?php
                                 $stt = 0;
                                 $order_total = 0;
                                 foreach ($order_detail as $product): 
                                 $stt++;
                                 $order_total += $product['price'] * $product['number'];
                             ?>
                              <tr>
                                  <td class="hidden-xs"><?php echo $stt;?></td>
                                  <td class="hidden-xs">
                                    <?php
                                        $image = 'public/upload/product/'.$product['image'];
                                         if (is_file($image)) {
                                            echo '<image src="'.$image.'" style="max-width:50px; max-height:50px;" />';
                                         }
                                     ?>
                                   </td>
                                   <td>
                                      <a href="index.php?controller=product&amp;action=detail&amp;pid=<?php echo $product['id'];?>"><?php echo $product['name'];?></a>
                                   </td>
                                   <td>
                                      <?php echo number_format($product['price'],0,',','.'); ?>
                                    </td>
                                    <td>
                                       <?php echo $product['number'];?>
                                    </td>
                              </tr>
                             <?php endforeach; ?> -->
                         </tbody>
                       <tfoot>
                     <tr>
                        <td colspan="5">
                     <!-- <h4>Thành tiền : <?php echo number_format($order_total,0,',','.'); ?> VNĐ</h4> -->
                        </td>
                    </tr>
                     </tfoot>
                  </table>
              </div>

           <style type="text/css">
              #info td {
                   text-align: left;
            }
           </style>

             <div class="col-xs-12"> 
               <h3>Thông tin khách hàng</h3>
    
                <table id="info" class="table">
                </table>

                 <form id="donhang_form" method="post" action="admin.php?controller=order&action=chitiet" role="form">
                   <div class="form-group">
                      <input name="id_donhang" type="hidden" value="<?php echo $donhang['id_donhang']; ?>"/>
                     <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Xử lý xong</button>
                     <a href="admin.php?controller=order" class="btn btn-warning">Quay lại</a>
                   </div>
                 </form>

                 </div>
                <!-- END CONTENT -->
              </div>
            </div><!--/span-->            
        </div><!--/row-->
    </div><!--/.container-->

    <script type="text/javascript" src="public/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebar .panel-heading').click(function () {
                $('#sidebar .list-group').toggleClass('hidden-xs');
                $('#sidebar .panel-heading b').toggleClass('glyphicon-plus-sign').toggleClass('glyphicon-minus-sign');
            });
        });
    </script>
</body>
</html>