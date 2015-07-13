<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
        <meta property="og:title" content="<?php echo ($this->_pageTitle) ? $this->_pageTitle : "Japanese Business Q and A | JapanWorks"; ?>" >
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo current_url() ?>">
        <meta property="og:description" content="JapanWorks là một sản phẩm của VietnamWorks tổng hợp việc làm cho ứng viên biết tiếng Nhật hoặc các ứng viên mong muốn làm cho các công ty Nhật Bản">

        <!-- cfp -->
        <link href="<?php echo base_url("static/cfp/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/style.css"); ?>" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="<?php echo base_url("static/css/jquery.fancybox.css?2014241300"); ?>" type="text/css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/default.css?201406241331"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_cfp.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_grid.css?2014241300"); ?>">

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

                <?php echo render_partial('/header'); ?>
                <div class="wrapper wrapper-content">
                    <div class="container" id="section2">

                        <div class="row main">

                            <!-- PAGE CONTENT -->
                            <div class="col-sm-12">
                                <div class="qa-forum">
                                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form>
                                            <div class="modal-dialog">
                                                <input type="hidden" name="email" class="check-login" value="<?php
                                                if (isset($this->_userInfo->email)) {
                                                    if (strtolower(trim($this->_userInfo->email)) == EMAIL_OF_USER) {
                                                        echo 1;
                                                    }
                                                } else {
                                                    echo 0;
                                                }
                                                ?>" size="30" />
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <textarea class="form-control q-title" placeholder="Tiêu đề" rows="1"></textarea>
                                                        </div>
                                                        <div class="form-group">

                                                            <select class="form-control  q-cate">
                                                                <option value="1">Câu hỏi của bạn về chủ đề gì?</option>
                                                                <?php foreach ($listCate as $cate) { ?>
                                                                    <option value="<?php echo $cate['id'] ?>"><?php echo $cate['title'] ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control q-text" placeholder="Những thông tin chi tiết về câu hỏi" rows="3"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer row">
                                                        <div class="form-group col-xs-7">
                                                            <input type="text" class="form-control q-uname" placeholder="Tên người đặt câu hỏi">
                                                        </div>
                                                        <button type="button" class="btn btn-orange btn_submit" onclick="validPost()">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="topic-qa">
                                        <span class="ico_qa chat-icon"></span>Hãy hỏi tôi về Nhật Bản
                                        <div class="fb-like" data-href="<?php echo base_url('qa') ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

                                    </div>
                                    <div class="top-qa clearfix">
                                        <div class="top">
                                            <div class="invi"></div>
                                            <div class="info-qa">Chia sẻ câu hỏi của bạn về doanh nghiệp Nhật Bản <br>Cuộc họp, phỏng vấn, tiếng Nhật trong kinh doanh... <br>Tôi sẽ trả lời các câu hỏi của bạn</div>
                                        </div>
                                        <div class="ad-qa clearfix">
                                            <img alt="Morio Nakatsuka" src="<?php echo base_url('static/img/morio-avatar1.png') ?>">
                                            <p>Quản lý dự án JapanWorks <br>Morio Nakatsuka</p>
                                        </div>
                                    </div>
                                    <div class="title-block clearfix">
                                        <div class="see-qa">Xem câu hỏi</div>
                                        <div class="post-qa" data-toggle="modal" data-target="#exampleModal">Nhập câu hỏi </div>
                                    </div>
                                    <div class="sec-comts">
                                        <?php
                                        if (isset($listQuest)) {

                                            foreach ($listQuest as $quest) {
                                                ?>


                                                <div class="ask-ans clearfix" id="<?php echo $quest['quest_id'] ?>">
                                                    <div class="left-qa">

                                                        <div class="count-comt">
                                                            <span class="count-num total-cm"><?php echo $quest['total_comment'] ?></span>
                                                            <span class="comt">Bình luận</span>
                                                        </div>
                                                    </div>
                                                    <div class="right-qa">
                                                        <div class="title-question"><?php echo $quest['title'] ?></div>
                                                        <div class="title-topic"><?php echo $quest['cate_title'] ?></div>
                                                        <div class="txt-comt expander"><?php echo $quest['description'] ?></div>
                                                        <div class="sub-qa">
                                                            <div class="sec-comt benefit"><a href=""><span class="ico_qa ico-comt"></span>Bình luận</a>
                                                            </div>

                                                            <div class = "sec-date"><?php echo $quest['date'] ?></div>
                                                        </div>
                                                        <div class = "comments" >
                                                            <ul>
                                                                <li>
                                                                    <span class = "ava_user"><img src = "<?php echo base_url('static/img/defaultAva.png') ?>" alt = ""></span>
                                                                    <div class = "txt-comments">
                                                                        <input type = "text" placeholder = "Tên" class = "form-control c-author">
                                                                        <textarea class = "form-control c-answer" rows = "3"></textarea>
                                                                        <button type = "button" class = "btn btn-orange btn_submit btn-sm">Nhập</button>
                                                                    </div>
                                                                </li>
                                                                <?php if ($quest['total_comment'] > 0) {
                                                                    ?>
                                                                    <?php foreach ($quest['comments'] as $comment) { ?>
                                                                        <li>
                                                                            <span class="ava_user">
                                                                                <?php if ($comment['check'] == 1) { ?>
                                                                                    <img src="<?php echo base_url('static/img/mrMorio.png') ?>" alt="">
                                                                                <?php } else { ?>
                                                                                    <img src="<?php echo base_url('static/img/defaultAva.png') ?>" alt="">
                                                                                <?php } ?>
                                                                            </span>
                                                                            <div class="txt-comments">
                                                                                <div class="name"><?php echo $comment['author'] ?></div>
                                                                                <div class="txt-comts">
                                                                                    <p><?php echo $comment['text'] ?></p>
                                                                                    <div class="sub-qa">


                                                                                        <div class="sec-date"><?php echo $comment['date'] ?></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                        }
                                        ?>


                                    </div>
                                    <div class="pagination-block" align="center">
                                        <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong số <strong><?php echo isset($totalQuestion) ? $totalQuestion : 0; ?></strong> câu hỏi.</p>
                                        <ul class="pagination">
                                            <?php echo $this->pagination->create_links(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end PAGE CONTENT -->

                        </div>
                    </div>
                </div>
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



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/functions.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.expander.js"></script>
        <script>
                                                            $(document).ready(function () {
                                                                var opts = {collapseTimer: 4000};
                                                                $('div.expander').expander();
                                                            });

        </script>
    </body>
</html>
<script>
    function validPost() {

        var qtitle = $('.q-title').val();
        var quname = $('.q-uname').val();
        var qtext = $('.q-text').val();
        var qcate = $('.q-cate').val();
        var catename = $('.q-cate').find('option:selected').text();
        //$('.close').trigger('click');
        if (qtitle == "" || quname == "" || qtext == "" || qcate == 0) {
            alert("Vui lòng điền đầy đủ thông tin");
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('/qa/postQuestion'); ?>",
                data: {"title": qtitle, "uname": quname, "text": qtext, "cate": qcate, "catename": catename},
                success: function (result) {
                    if (result == 'true') {
                        window.location = "<?php echo base_url('qa'); ?>";
                        $('.close').trigger('click');
                    }
                }
            });
        }
    }

    $('.comments').find(".btn_submit").click(function () {
        var licm = ($(this).closest('li'));
        var lucm = ($(this).closest('ul'));
        var questid = $(this).closest('.ask-ans').attr('id');

        var countcm = $(this).closest('.ask-ans').find('.total-cm');

        var cauthor = $(this).closest('.ask-ans').find('.c-author');
        var canswer = $(this).closest('.ask-ans').find('.c-answer');
        var check = $('.check-login').val();
        if (cauthor.val().trim() == "" || canswer.val().trim() == "") {
        }
        else {
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "<?php echo base_url('/qa/insertComment'); ?>",
                data: {"id": questid, "author": cauthor.val(), "comment": canswer.val(), "check": check},
                success: function (result) {
                    licm.find('.c-author').val('');
                    licm.find('.c-answer').val('');
                    lucm.append(result);
                    //$(result).insertAfter(licm).append();
                    countcm.html(+countcm.html() + 1);
                }
            });
        }
    });
</script>