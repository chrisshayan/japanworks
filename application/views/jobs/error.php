
<div class="container">
    <div class="clearfix mb20">
        <div class="thanku_title">

        </div>
    </div>
    <div class="panel">
        <div class="panel-heading"><h2><i class="glyphicon glyphicon-remove-sign"> </i> Lỗi</h2></div>
        <div class="panel-body">
            <p class="mb10 search_msg" style="font-size:18px"><strong>Hiện tại chúng tôi đang có một rắc rối khi nộp đơn công việc, hãy thử lại vài lần. Xin lỗi vì sự bất tiện này, chúng tôi sẽ giải quyết trong thời gian sớm nhất.</strong></p><br/>Nhấn vào <a href="javascript:history.back()">đây</a> để quay trở lại.<br>    </div>
    </div>

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
    if (typeof (Storage) !== "undefined") {
        var local = JSON.parse(localStorage.jpw);
        if (local.currentEmail !== "undefined") {
            delete local[local.currentEmail];
            delete local.currentEmail;
            localStorage.jpw = JSON.stringify(local);
        }
    }
</script>

</body>
</html>