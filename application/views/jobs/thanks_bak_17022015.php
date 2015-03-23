
<div class="container">
    <div class="clearfix mb20">
        <div class="thanku_title">
            <?php echo $textValue1; ?>
        </div>
    </div>

    <div align="center" class="mb20">
        <h3 class="txtGray"><?php echo $textValue2; ?><br>
            <?php echo $textValue3; ?></h3></div>
    <br>
    <br>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <?php if ($link['active'] == 1): ?>
                    <div class="col-sm-3 mt10" ><a href="<?php echo base_url() . $link['url']; ?>" class="btn btn-red btn-lg">Quay lại trang tìm kiếm</a></div>
                <?php else: ?>
                    <div class="col-sm-3 mt10" ><a href="<?php echo $link['url']; ?>" class="btn btn-red btn-lg">Quay về trang chủ</a></div>
                <?php endif; ?>

                <div class="col-sm-9" align="right">
                    <img src="<?php echo base_url("static/img/logo.jpg") ?>" width="313" style="margin-right: 10px;" alt="">
                    <img src="<?php echo base_url("static/img/vnw_logo.png") ?>" width="100%" style="max-width:200px" alt="">
                </div>
            </div>


        </div>
    </div>






</div>

<script>
    function showTab(id) {
        $('#myTab a[href="' + id + '"]').tab('show')
    }

</script>

</body>
</html>