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
        <!--job alert -->
        <link href="<?php echo base_url("static/cfp/css/plugins/chosen/chosen.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/plugins/toastr/toastr.min.css"); ?>" rel="stylesheet">
        <!-- job alert -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/search.css?201406161725"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/default.css?201406241331"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_cfp.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_grid.css?2014241300"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/jquery.fancybox.css?v=2.1.5"); ?>" type="text/css" media="screen" />
        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.carousel.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.theme.css"); ?>">

    </head>

    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper">
                <!--footer-->
                <?php echo render_partial('/header'); ?>
                <!--End footer-->

                <div class="wrapper wrapper-content">
                    <?php
                    if ($this->_showHomeIntro) {
                        echo render_partial("/homeIntro");
                    }
                    ?>

                    <div class="container " id="section2">
                        <?php echo $this->breadcrumb->output(); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <!--  comment out banner rakus -->
                                <?php if ($this->_showHomeIntro) : ?>

                                    <?php /*  <div align="center" class="mb20"><a href="<?php echo site_url("/Japanesebeginner") ?>"><img src="<?php echo base_url("/static/img/xalo/intro_xalolead.png") ?>" width="100%"  alt=""/></a></div> */ ?>
                                    <?php /*
                                      <div class="benefit-search">
                                      <h2>Tìm kiếm theo Phúc lợi/Quyền lợi (BETA)</h2>
                                      <ul>
                                      <li>
                                      <a href="<?php echo site_url('benefit/WorkInJapan'); ?>">
                                      <span class="glyphicon glyphicon-gift"></span>
                                      <strong>Cơ hội làm việc tại Nhật Bản</strong>
                                      </a>
                                      </li>
                                      <li>
                                      <a href="<?php echo site_url('benefit/JapaneseClass'); ?>">
                                      <span class="glyphicon glyphicon-gift"></span>
                                      <strong>Cơ hội được rèn luyện tiếng Nhật</strong>
                                      </a>
                                      </li>
                                      <li>
                                      <a href="<?php echo site_url('benefit/Over1000'); ?>">
                                      <span class="glyphicon glyphicon-gift"></span>
                                      <strong>Mức lương trên $1000</strong>
                                      </a>
                                      </li>
                                      </ul>
                                      </div>
                                     */ ?>
                                <?php endif; ?>

                                <?php echo $this->ocular->yield(); ?>
                            </div>

                            <!-- PAGE RIGHT SIDE -->

                        </div>
                    </div>
                </div>
                <!--footer-->
                <?php echo render_partial('/footerNew'); ?>
                <!--End footer-->
            </div>
        </div>
        <!-- //wrapper -->
    </body>
</html>
