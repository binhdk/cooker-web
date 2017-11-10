<?php require('admin/view/common/header.php'); ?>

<?php require('admin/view/common/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-xs-12 pull-right" id="sidebar" role="navigation">
        <?php require('admin/view/common/sidebar.php'); ?>
      </div>
      <div class="col-sm-9 col-xs-12 pull-left">
        <div class="row">
        <!-- BEGIN CONTENT -->
          <?php require('admin/view/food/table.php'); ?>
          <div class="text-right">
            <?php echo $pagination; ?>
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

        $('#check_all').change(function() {
            $('.table input:checkbox').prop('checked', this.checked);
        });

        $('#action').change(function() {
            $('#food-form').submit();
        });

        $('#search').keyup(function(e) {
            if (e.which == 13) {
              $('#food-form').submit();
            }                
        });

        $('.del').on('click', function () {
            return confirm('Are you sure?');
        });
    });
  </script>
</body>
</html>