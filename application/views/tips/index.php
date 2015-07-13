
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

<div class="tips-top">
    <h1>Lời khuyên nghề nghiệp tiếng Nhật trong 2 phút</h1>

    <div class="fb-like" data-href="<?php echo base_url('tips'); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

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
                            <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptopFB');"  href="<?php echo $loginFbUrl; ?>"  target="_blank"><img src="<?php echo base_url('static/img/icon-fb.png') ?>"></a>&nbsp;
                            <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptopGP');" href="<?php echo $loginGpUrl; ?>" target="_blank"><img src="<?php echo base_url('static/img/icon-ggplus.png') ?>"></a>&nbsp;
                            <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptopLI');" href="<?php echo site_url('social/linkedin'); ?>" target="_blank"><img src="<?php echo base_url('static/img/icon-linkedin.png') ?>"></a>&nbsp;
                            <span class="register-here">
                                <span class="way">hoặc</span>&nbsp;
                                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'tiptopJPW');" href="<?php echo site_url('register') ?>"  class="btn" target="_blank">Đăng ký ở đây</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>



    <div class="row articles">
        <?php
        if (isset($artitles)) {
            foreach ($artitles as $article) {
                ?>


                <div class="item">
                    <div class="main-content">
                        <img src="<?php echo base_url('uploads-image') . "/" . $article['image'] ?>" alt="article" class="banner">
                        <div class="entry-caption">
                            <h3>
                                <a href="<?php echo base_url('tips/detail') . '/' . $article['id']; ?>"><strong><?php echo $article['title']; ?></strong></a>
                            </h3>
                            <p>
                                <?php echo nl2br($article['description']); ?>
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
                <?php
            }
        }
        ?>



    </div>
    <div class="pagination-block" align="center">
        <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong số <strong><?php echo isset($totalArticle) ? $totalArticle : 0; ?></strong> bai viet.</p>
        <ul class="pagination">
            <?php echo $this->pagination->create_links(); ?>
        </ul>
    </div>
</div>