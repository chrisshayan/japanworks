<div class="container" id="section1">
    <div id="myCarousel" class="carousel slide events home logged-in" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active key-visual">
                <div class="title-key-visual">
                    <h2>
                        <strong>日本語のお仕事情報<span>No.1</span></strong>
                    </h2>
                    <h1>
                        Japan<strong>Works</strong>
                    </h1>
                </div>

                <?php if (($this->session->userdata('userInfo'))) { ?>
                    <p class="intro">
                        JapanWorks là dịch vụ web được phát triển bởi VietnamWorks, hỗ trợ tìm kiếm việc làm tại các công ty Nhật Bản.
                    </p>
                <?php }
                ?>

                <img src="<?php echo base_url("static/img/key-visual-1.jpg") ?>" alt="japanWorks">
            </div>

            <div class="item">
                <a onclick="ga('send', 'event', 'homepagebanner', 'click', 'vnws');" href="http://japan.vietnamworks.com/job/558903-sales-executive-japanese-business-unit" class="key-hiring" target="_blank" title="HIRING">
                    <div>
                        <div class="hiring">Hiring!</div>
                        <span>VietnamWorks Japan Team</span>
                    </div>
                </a>
                <img src="<?php echo base_url("static/img/key-visual-3.jpg") ?>" alt="vietnamworks">
            </div>

            <div class="item">
                <a onclick="ga('send', 'event', 'homepagebanner', 'click', 'vitalify');" href="http://japan.vietnamworks.com/job/558591-php-developer" class="key-hiring" target="_blank" title="HIRING">
                    <div>
                        <div class="hiring">Hiring!</div>
                        <span>Vitalify Asia</span>
                    </div>
                </a>
                <img src="<?php echo base_url("static/img/key-visual-2.jpg") ?>" alt="vitalify">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="col-md-6 col-sm-8 key-title <?php
    if (($this->session->userdata('userInfo')))
        echo "logged-in";
    ?>">
        <div class="key-register">
            <p>
                Nhận tin tức và thông tin việc làm tiếng Nhật
            </p>
            <div class="btns">
                <span class="way">Đăng ký bằng</span>&nbsp;
                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'hometoFB');"  href="<?php echo $loginFbUrl; ?>" target="_blank"><img src="<?php echo base_url("static/img/icon-fb.png") ?>"></a>&nbsp;
                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'hometoGP');" href="<?php echo $loginGpUrl; ?>" target="_blank"><img src="<?php echo base_url("static/img/icon-ggplus.png") ?>"></a>&nbsp;
                <a onclick="ga('send', 'event', 'registrationlink', 'click', 'hometoLI');" href="<?php echo site_url('social/linkedin'); ?>"  target="_blank"><img src="<?php echo base_url("static/img/icon-linkedin.png") ?>"></a>
                <span class="register-here">
                    <span class="way">&nbsp;hoặc</span>&nbsp;
                    <a onclick="ga('send', 'event', 'registrationlink', 'click', 'hometoJPW');" href="<?php echo site_url('register') ?>" class="btn">Đăng ký ở đây</a>
                </span>
            </div>
        </div>
    </div>
</div>
