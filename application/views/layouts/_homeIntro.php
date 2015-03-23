<div class="container" id="section1">
    <div class="row">
        <div class="col-sm-9 big_photo">
            <div><img src="<?php echo base_url() ?>static/img/big_photo.jpg" width="100%" class="img-responsive"  alt=""/></div>
            <?php /*<div class="top_total"><?php echo $this->lang->line('job_today'); ?></div> */?>
        </div>

        <div class="col-sm-3 right_side">
            <div class="mt10 mb10"><img src="<?php echo base_url("static/img/index_vnw_groupacc.png") ?>"  alt="" width="100%" style="max-width:234px;" /></div>

            <div id="owl-demo" class="owl-carousel">
                <?php foreach ($xmlAds->datas->company as $child) : ?>
                <div class="item"><a href="<?php echo $child->link; ?>"><img src="<?php echo base_url("static".$child->files);?>" width="100%"  alt=""/></a></div>
                <?php endforeach; ?>
            </div>

            <div class="mt15"><a href="<?php echo site_url('register'); ?>" class="btn btn-lg btn-orange w100p">Đăng Ký Ngay</a></div>
        </div>
    </div>
</div>