<div class="container" id="section1">
    <!--site content in here-->
    <div class="title-key-visual-mobile">
        <h2> <strong>日本語のお仕事情報<span>No.1</span></strong> </h2>
        <h1> Japan<strong>Works</strong> </h1>
    </div>
    <div id="carousel1" class="carousel slide home1" >
        <div class="carousel-inner">

            <div class="item active item1"> <a onclick="ga('send', 'event', 'homepagebanner', 'click', 'vitalify');" href="http://japan.vietnamworks.com/kw/vitalify-asia?utm_source=Test&utm_medium=JAPANWORKSbanner&utm_campaign=Keyvisual" target="_blank" title="HIRING"><img src="<?php echo base_url("static/img/key-visual-2.jpg") ?>" alt="japanWorks" width="1000" height="400"></a>
                <div class="key-hiring">
                    <div>
                        <div class="hiring">Hiring!</div>
                        <span>Vitalify Asia</span> </div>
                </div>
            </div>
            <div class="item item2"> <img src="<?php echo base_url("static/img/key-visual-1.jpg") ?>" alt="japanWorks" width="1000" height="400">

                <div class="title-key-visual">
                    <h2> <strong>日本語のお仕事情報<span>No.1</span></strong> </h2>
                    <h1> Japan<strong>Works</strong> </h1>
                    <?php if (($this->session->userdata('userInfo'))) { ?>
                        <!--sau khi login-->
                        <p class="intro"> JapanWorks là dịch vụ web được phát triển bởi VietnamWorks, hỗ trợ tìm kiếm việc làm tại các công ty Nhật Bản. </p>
                        <p class="intro intro-mobile"> JapanWorks là dịch vụ web được phát triển bởi VietnamWorks, hỗ trợ tìm kiếm việc làm tại các công ty Nhật Bản. </p>
                        <!--//sau khi login-->
                    <?php } ?>

                </div>
            </div>



        </div>

        <a data-slide="prev" href="#carousel1" class="left carousel-control">
            <!--<span class="icon-prev"></span>-->
        </a> <a data-slide="next" href="#carousel1" class="right carousel-control">
            <!--<span class="icon-next"></span>-->
        </a>

        <?php if (!($this->session->userdata('userInfo'))) { ?>
            <!--chua login-->
            <div class="key-register">
                <p> Nhận tin tức và thông tin việc làm tiếng Nhật </p>
                <div class="btns"> <span class="way">Đăng ký bằng</span>&nbsp;
                    <a href="<?php echo $loginFbUrl; ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoFB');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-fb-50.png") ?>" width="38" height="38"></a>
                    &nbsp; <a href="<?php echo $loginGpUrl; ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoGP');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-ggplus-50.png") ?>" width="38" height="38"></a>
                    &nbsp; <a href="<?php echo site_url('social/linkedin'); ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoLI');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-linkedin-50.png") ?>" width="38" height="38"></a>
                    <span class="register-here">
                        <span class="way">&nbsp;hoặc</span>
                        &nbsp; <a onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoJPW');" href="<?php echo site_url('register') ?>" data-original-title="" title="" class="btn">Đăng ký ở đây</a>
                    </span> </div>
            </div>
            <!--//chua login-->
        <?php } ?>


    </div>
</div>

