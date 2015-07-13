
<!-- Facebook Like/Share -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=111210405645532";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- /Facebook -->
<?php if (isset($artitleDetail)) { ?>
    <div class="tips-detail">
        <div class="detail-info">
            <h1><?php echo $artitleDetail['title']; ?></h1>

            <div class="fb-like" data-href="<?php echo base_url('tips/detail') . '/' . $artitleDetail['id']; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

            <div class="author-article">
                <img src="<?php echo base_url('static/img/morio-avatar.png') ?>" alt="Morio Nakatsuka">&nbsp;&nbsp;
                <span class="name"><strong>Morio Nakatsuka</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span><?php echo date_format(date_create($artitleDetail['date']), ' d-m-Y'); ?> </span>
            </div>
        </div>

        <div class="article">

            <div class="item">
                <img src="<?php echo base_url('uploads-image') . "/" . $artitleDetail['image'] ?>" alt="article" class="banner">
                <div class="row content">

                    <p class="col-sm-6 vn">

                        <?php echo nl2br($artitleDetail['textVN']); ?>

                    </p>
                    <p class="col-sm-6">

                        <?php echo nl2br($artitleDetail['textJP']); ?>

                    </p>
                </div>

            </div>
            <?php if (isset($artitleDetail['keyword']) && ($artitleDetail['keyword']) != ""): ?>
                <?php if (isset($data->jobs) && !empty($data->jobs)): $i = 0; ?>
                    <div class="couponCont">
                        <p>Việc làm liên quan tới "<?php echo $artitleDetail['tag'] ?>" <a class="see-more" title="" href="<?php echo base_url() . $link ?>">Xem tất cả</a></p>
                        <div class="row">
                            <?php
                            foreach ($data->jobs as $key => $job) {
                                $this->load->view("/tips/_item", array("key" => $key, "job" => $job));
                                if (++$i == 3)
                                    break;
                            }
                            ?>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="author">
            <div class="col-sm-8">
                <img src="<?php echo base_url('static/img/morio-avatar.png') ?>" alt="Morio Nakatsuka">
                <div class="author-info">
                    <h2>
                        <strong>中塚 森生(Morio Nakatsuka) - Japanese career adviser</strong>
                    </h2>
                    <p>
                        Hãy Subscribe tin tức nghề nghiệp tiếng Nhật để nhận được những lời khuyên, chỉ dẫn bổ ích cho sự nghiệp của bạn mỗi tuần.
                    </p>
                </div>
            </div>

            <?php
            if (($this->session->userdata('userInfo'))) {

            } else {
                ?>
                <div class="col-sm-4">
                    <div class="key-register subscribe">
                        <div class="subscribe-border"></div>
                        <div class="subscribe-btns">
                            <p><strong>Subscribe Email</strong></p>
                            <div class="btns">
                                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptoFB');"  href="<?php echo $loginFbUrl; ?>" target="_blank" ><img src="<?php echo base_url('static/img/icon-fb.png') ?>"></a>&nbsp;
                                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptoGP');" href="<?php echo $loginGpUrl; ?>" target="_blank"><img src="<?php echo base_url('static/img/icon-ggplus.png') ?>"></a>&nbsp;
                                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptoLI');" href="<?php echo site_url('social/linkedin'); ?>" target="_blank"><img src="<?php echo base_url('static/img/icon-linkedin.png') ?>"></a>&nbsp;
                                <span class="register-here">
                                    <span class="way">hoặc</span>&nbsp;
                                    <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptoJPW');" href="<?php echo site_url('register') ?>"  class="btn" target="_blank">Đăng ký ở đây</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>



        <?php if (isset($artitleNearest)) { ?>
            <div class="latest-tips">
                <h2><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;Tips gần nhất&nbsp;&nbsp;<span class="glyphicon glyphicon-star"></span></h2>
                <div class="articles row">
                    <?php foreach ($artitleNearest as $article) { ?>
                        <div class="item">
                            <div class="main-content">
                                <a href="<?php echo base_url('tips/detail') . '/' . $article['id']; ?>" target="_blank" class="tip-banner"><img src="<?php echo base_url('uploads-image') . "/" . $article['image'] ?>" alt="article" class="banner"></a>
                                <div class="entry-caption">
                                    <h3>
                                        <strong><?php echo $article['title'] ?></strong>
                                    </h3>
                                    <p>
                                        <?php echo nl2br($article['description']) ?>
                                    </p>
                                </div>
                                <div class="view-more">
                                    <a href="<?php echo base_url('tips/detail') . '/' . $article['id']; ?>">Xem tiếp ></a>
                                </div>
                                <div class="time">
                                    <?php echo date_format(date_create($article['date']), ' d-m-Y'); ?>
                                </div>
                                <div class="fb-like" data-href="<?php echo base_url('tips/detail') . '/' . $article['id']; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <a href="<?php echo base_url('tips') ?>" class="all-tips">Xem tất cả >></a>
            </div>
        <?php } ?>
    </div>

<?php }
?>