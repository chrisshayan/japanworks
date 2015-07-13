<!DOCTYPE html>
<!-- saved from url=(0028)http://www.vietnamworks.com/ -->
<html lang="en" class="js canvas geolocation video audio localstorage sessionstorage texttrackapi track"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>static/img/favicon.ico" type="image/x-icon">
        <title>Lời khuyên nghề nghiệp tiếng Nhật | JapanWorks</title>
        <meta name="Robots" content="index, follow">
        <meta name="Description" content="<?php echo ($this->_metaData) ? $this->_metaData : $this->lang->line("meta_data") ?>">
        <meta name="Keywords" content="<?php echo ($this->_metaKeys) ? $this->_metaKeys : $this->lang->line("meta_keys") ?>">
        <meta name="format-detection" content="telephone=no">
        <link rel="canonical" href="<?php echo current_url() ?>" />

        <meta property="og:image" content="<?php echo ($this->_imageLink) ? $this->_imageLink : base_url() . "static/img/key-visual.jpg"; ?>" >
        <meta property="og:title" content="<?php echo ($this->_pageTitle) ? $this->_pageTitle : "Lời khuyên nghề nghiệp tiếng Nhật | JapanWorks"; ?>" >
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo current_url() ?>">
        <meta property="og:description" content="JapanWorks là một sản phẩm của VietnamWorks tổng hợp việc làm cho ứng viên biết tiếng Nhật hoặc các ứng viên mong muốn làm cho các công ty Nhật Bản">
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


        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/applyFormSuccess.css") ?>">
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
    <body class="top-navigation">

        <div id="wrapper">

            <div id="page-wrapper">
                <!--header-->
                <?php echo render_partial('/header'); ?>
                <!--End header-->
                <div class="wrapper wrapper-content">
                    <div class="container" id="section2">

                        <?php echo $this->ocular->yield(); ?>

                    </div>
                </div>
                <!--footer-->
                <?php echo render_partial('/footer'); ?>

                <!--End footer-->
            </div>
        </div>
        <!-- //wrapper -->
    </body>
</html>