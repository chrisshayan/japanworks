<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Công việc tiếng Nhật cho ứng viên cấp độ N1- JapanWorks</title>

        <link rel="shortcut icon" href="<?php echo base_url("static/img/favicon.ico?240720141702"); ?>" type="image/x-icon">
        <meta name="keywords" content=" Tiếng Nhật, việc làm Nhật Bản, tìm công việc ở Nhật, sơ cấp tiếng Nhật, công việc sơ cấp tiếng Nhật, công ty Nhật Bản, học tiếng Nhật, nghiên cứu tiếng Nhật, làm việc tại Nhật Bản">
        <meta name="description" content="Việc làm tại Nhật dành cho người nói tiếng Nhật sơ cấp. JanpanWorks là trang tuyển dụng lớn nhất Việt Nam dành cho việc làm tại Nhật Bản.">

        <meta name="Robots" content="index, follow">
        <meta name="format-detection" content="telephone=no">

        <!-- cfp -->
        <link href="<?php echo base_url("static/cfp/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/style.css"); ?>" rel="stylesheet">

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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/font-awesome.min.css") ?>">
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
                ga('send', 'pageview');</script>
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
                ga('send', 'pageview');</script>
        <?php } ?>



    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper">
                <!--footer-->
                <?php $this->load->view("/layouts/_header"); ?>
                <!--End head-->
                <div class="container" id="section2">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                        <li><a href="<?php echo base_url('kw/'); ?>">Công việc tiếng Nhật</a></li>
                        <li>Công việc tiếng Nhật cho ứng viên cấp độ N1</li>
                    </ol>

                    <div class="row">
                        <div class="col-sm-12 big_photo">
                            <div><img src="<?php echo base_url("static/img/n1-level-banner.jpg"); ?>" width="100%" class="img-responsive" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper wrapper-content">
                    <div class="container" id="section2">
                        <div class="row">
                            <div class="col-sm-9 left_side">

                                <!--best jobs -->
                                <div class="panel" id="content">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h2><span class="glyphicon glyphicon-thumbs-up"></span> Việc làm</h2>
                                        </div>
                                    </div>
                                    <div class="panel-body" id="results">

                                        <?php if (isset($data->jobs) && !empty($data->jobs)): ?>
                                            <p class="mb10 search_msg"><strong>Tuyển dụng <span class="txtRed total"><?php echo $data->total; ?></span> Công việc tiếng Nhật cho ứng viên cấp độ N1.</strong></p>
                                            <?php
                                            foreach ($data->jobs as $key => $job) {
                                                $this->load->view("/japanese/_item", array("key" => $key, "job" => $job));
                                            }
                                            ?>

                                            <div class="pagination-block" align="center">
                                                <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong số <strong><?php echo $data->total; ?></strong> việc làm.</p>
                                                <ul class="pagination">
                                                    <?php echo $this->pagination->create_links(); ?>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <p class="mb10 search_msg"><strong><?php echo $this->lang->line("no_result"); ?></strong></p>
                                        <?php endif; ?>

                                    </div>
                                </div>

                            </div>

                            <!-- PAGE RIGHT SIDE -->
                            <div class="col-sm-3 right_side">



                                <!-- Event -->
                                <?php $this->load->view("/layouts/_eventFb"); ?>

                                <!-- end Event -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--footer-->

                <div class="footer">
                    <div class="pright">
                        <a href="<?php echo base_url(); ?>">Về JapanWorks</a>&nbsp;&nbsp;&nbsp;
                        <a target='_blank' href="<?php echo(MAIN_SITE); ?>/lien-he">Liên hệ</a>&nbsp;&nbsp;&nbsp;
                        <a target='_blank' href="http://advice.vietnamworks.com/">Tin tức</a>&nbsp;&nbsp;&nbsp;
                        <a target='_blank' href="<?php echo(MAIN_SITE); ?>/tro-giup/viec-lam">Trợ giúp</a>&nbsp;&nbsp;&nbsp;
                        <br class="newline">
                        <a href="<?php echo site_url("about/term"); ?>">Thỏa thuận sử dụng</a>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo site_url("about/privacy"); ?>">Quy định bảo mật</a> <br>
                        <br>
                    </div>

                    <div><strong>Copyright</strong> © Công Ty Cổ Phần JapanWorks.</div>
                </div>

            </div>
        </div>
    </body>
    <!-- //wrapper -->
    <script type="text/javascript" src="<?php echo base_url("static/js/bootstrap.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/modernizr.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/ui.plugins.js") ?>"></script>
    <script src="<?php echo base_url("static/js/jquery.mousewheel.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/owl.carousel.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/jquery.fancybox.pack.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/home.js") ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("static/js/functions.js") ?>"></script>

    <script>
            function scrollToAnchor(aid) {
                var aTag = $("a[name='" + aid + "']");
                $('html,body').animate({
                    scrollTop: aTag.offset().top
                }, 300);
            }
            $(function () {
            });
    </script>
    <!--End footer-->




</html>
