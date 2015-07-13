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

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/search.css?201406161725"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/default.css?201406241331"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_cfp.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_grid.css?2014241300"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/jquery.fancybox.css?v=2.1.5"); ?>" type="text/css" media="screen" />
        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.carousel.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.theme.css"); ?>">
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery-1.11.1.min.js"></script>
        <script type='text/javascript' src='https://api.stackexchange.com/js/2.0/all.js'></script>





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
                                <?php /* comment out banner rakus
                                  <?php  if ($this->_showHomeIntro) : ?>
                                  <div align="center" class="mb20"><a href="<?php echo site_url("/apply/rakus") ?>"><img src="<?php echo base_url("/static/img/homepage_newjob_banner.png") ?>" width="100%"  alt=""/></a></div>
                                  <?php endif; ?>
                                 */ ?>
                                <?php echo $this->ocular->yield(); ?>
                            </div>

                            <!-- PAGE RIGHT SIDE -->
                            <div class="col-sm-3 right_side">
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


                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/modernizr.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/ui.plugins.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/owl.carousel.min.js"  ></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.fancybox.pack.js" ></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/home.js" ></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/isotope.pkgd.js" ></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/imagesloaded.pkgd.min.js" ></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>static/js/functions.js"></script>

                <?php
                if (!isset($search)) {
                    $search = new MySearch();
                    if ($this->session->userdata("VNW_SEARCH_DETAIL"))
                        $search = $this->session->userdata("VNW_SEARCH_DETAIL");
                }

                $cats = "";
                $locs = "";
                $jobLevel = "";
                if (is_array($search->job_category)) {
                    foreach ($search->job_category as $cat) {
                        if (isset($this->_categories[$cat]))
                            $cats .= "<li class='search-choice multi-3'><span>{$this->_categories[$cat][$this->_langdb]}</span><input type='hidden' name='job_category[]' value='{$cat}'/><a class='search-choice-close' data-option-array-index='{$cat}'></a></li>";
                    }
                }

                if (is_array($search->job_location)) {
                    foreach ($search->job_location as $loc) {
                        if (isset($this->_locations[$loc]))
                            $locs .= "<li class='search-choice multi-3'><span>{$this->_locations[$loc][$this->_langdb]}</span><input type='hidden' name='job_location[]' value='{$loc}'/><a class='search-choice-close' data-option-array-index='{$loc}'></a></li>";
                    }
                }

                if (isset($this->_jobLevels[$search->job_level])) {
                    $jobLevel = "<span>{$this->_jobLevels[$search->job_level][$this->_langdb]}<input type='hidden' name='job_level' value='{$search->job_level}' /></span>";
                }

                $catsJson = json_encode($cats);
                $locsJson = json_encode($locs);
                $jobLevelJson = json_encode($jobLevel);
                $keywords = json_encode(trim(str_replace(strtolower(KEYWORD_DEDAULT), '', $search->job_title)));
                ?>
                <script>
            var keywords = <?php echo $keywords; ?>;
            $("#keywordMainSearch").val(keywords);
            var catSelectted = <?php echo $catsJson; ?>

            if (catSelectted) {
                var lis = $(catSelectted);
                var cateSelect = $('#cateListMainSearch');
                lis.each(function () {
                    cateSelect.find("option:contains(" + $(this).find('span').html() + ")").attr('selected', 'selected');
                });
                cateSelect.trigger('chosen:updated');
            }
            var locSelectted = <?php echo $locsJson ?>;
            if (locSelectted) {
                var los = $(locSelectted);
                var locSelect = $('#locationMainSearch');
                los.each(function () {
                    locSelect.find("option:contains(" + $(this).find('span').html() + ")").attr('selected', 'selected');
                });
                locSelect.trigger('chosen:updated');

            }
            var jobLevel = <?php echo $jobLevelJson ?>;
            if (jobLevel) {
                $("#jobLevelMainSearch_chosen .chosen-single").html(jobLevel);
            }

            $(".search-choice-close").click(function () {
                $(this).parent().remove();
                return false;
            });
                </script>
                <script>
                    function scrollToAnchor(aid) {
                        var aTag = $("a[name='" + aid + "']");
                        $('html,body').animate({scrollTop: aTag.offset().top}, 300);
                    }
                    $(function () {
                    });
                </script>

                <script>
                    $('.carousel').carousel({
                        interval: 3000
                    });
                </script>

                <!--End footer-->
            </div>
        </div>
        <!-- //wrapper -->
    </body>
</html>
