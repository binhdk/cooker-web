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
                    <?php require('admin/view/food/form.php'); ?>
                <!-- END CONTENT -->
                </div>
            </div><!--/span-->            
        </div><!--/row-->
    </div><!--/.container-->

    <script type="text/javascript" src="public/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
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