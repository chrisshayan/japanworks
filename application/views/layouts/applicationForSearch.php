<!DOCTYPE html>
<!-- saved from url=(0028)http://www.vietnamworks.com/ -->
<html lang="en" class="js canvas geolocation video audio localstorage sessionstorage texttrackapi track"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url("static/img/favicon.ico?240720141702"); ?>" type="image/x-icon">
        <title><?php echo ($this->_pageTitle) ? $this->_pageTitle : $this->lang->line("page_title") ?></title>
        <meta name="Robots" content="index, follow">
        <meta name="Description" content="<?php echo ($this->_metaData) ? $this->_metaData : $this->lang->line("meta_data") ?>">
        <meta name="Keywords" content="<?php echo ($this->_metaKeys) ? $this->_metaKeys : $this->lang->line("meta_keys") ?>">
        <meta name="format-detection" content="telephone=no">

        <meta property="og:image" content="<?php echo base_url("static/img/big_photo.ipg"); ?>">
        <meta property="og:title" content="<?php echo ($this->_pageTitle) ? $this->_pageTitle : $this->lang->line("page_title") ?>">
        <meta property="og:url" content="<?php echo current_url() ?>">
        <meta property="og:title_name" content="<?php echo base_url() ?>">
        <meta property="og:description" content="<?php echo ($this->_metaData) ? $this->_metaData : $this->lang->line("meta_data") ?>">
        <link rel="canonical" href="<?php echo($this->_canonicalLink); ?>" />
        <!-- cfp -->
        <link href="<?php echo base_url("static/cfp/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/style.css"); ?>" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <!-- Latest compiled and minified CSS -->


        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/search.css?201406161725"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/default.css?201406241331"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_cfp.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_grid.css?2014241300"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/jquery.fancybox.css?v=2.1.5"); ?>" type="text/css" media="screen" />
        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.carousel.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.theme.css"); ?>">

        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery-1.11.1.min.js"></script>

        <?php if (ENVIRONMENT_REAL) { ?>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-103236-1', 'auto');
                ga('send', 'pageview');

            </script>
        <?php } else { ?>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-56887961-2', 'auto');
                ga('send', 'pageview');

            </script>
        <?php } ?>
    </head>

    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper">
                <!--footer-->
                <?php echo render_partial('/header'); ?>
                <!--End footer-->
                <?php
                if ($this->_showHomeIntro) {
                    echo render_partial("/homeIntro");
                }
                ?>
                <div class="wrapper wrapper-content">
                    <div class="container" id="section2">
                        <?php echo $this->breadcrumb->output(); ?>
                        <div class="row">
                            <div class="col-sm-9 left_side">
                                <!--  comment out banner rakus -->
                                <?php if ($this->_showHomeIntro) : ?>
                                    <div align="center" class="mb20"><a href="<?php echo site_url("/Japanesebeginner") ?>"><img src="<?php echo base_url("/static/img/xalo/intro_xalolead.png") ?>" width="100%"  alt=""/></a></div>
                                <?php endif; ?>

                                <?php echo $this->ocular->yield(); ?>
                            </div>

                            <!-- PAGE RIGHT SIDE -->
                            <div class="col-sm-3 right_side">
                                <?php
                                if (($this->session->userdata('userInfo'))) {

                                } else {
                                    ?>
                                    <!-- register FB, GL, IN-->
                                    <div class="panel register-right">
                                        <img src="<?php echo base_url("/static/img/register-right-bg.jpg") ?>" alt="Register" class="register-bg">
                                        <div class="btns">
                                            <p><strong>Đăng ký bằng</strong></p>
                                            <a href="<?php echo $loginFbUrl; ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoFB');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-fb-50.png") ?>"></a>&nbsp;&nbsp;
                                            <a href="<?php echo $loginGpUrl; ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoGP');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-ggplus-50.png") ?>"></a>&nbsp;&nbsp;
                                            <a href="<?php echo site_url('social/linkedin'); ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoLI');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-linkedin-50.png") ?>"></a><br>
                                            <a onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoJPW');" href="<?php echo site_url('register') ?>" class="btn">Hoặc đăng ký ở đây</a>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php
                                /*
                                  if ($this->_showQa) {
                                  echo render_partial("/homeQa");
                                  }
                                 */
                                ?>  <!-- Registration banner -->

                                <?php $this->load->view("/search/_featureJob"); ?>
                                <?php
                                foreach ($this->_rightSideBars as $sideBar) {
                                    render_partial($sideBar);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--footer-->
                <?php echo render_partial('/footerNew'); ?>
                <!--End footer-->
            </div></div>
        <!-- //wrapper -->
    </body>
</html>
