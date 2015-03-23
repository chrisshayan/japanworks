<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Media Max Vietnam | Featured job from VietnamWorks</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url("static/css/bootstrap.min.css") ?>" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/font-awesome.min.css") ?>">
        <link href="<?php echo base_url("static/css/xalolead.css") ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

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
    <body>

        <a name="top" id="top"></a>

        <div id="topApply"></div>


        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-2"></div>
                            <div class="col-xs-10"><h3></h3></div>
                        </div>
                    </div>
                    <div class="col-xs-3" align="right"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url("static/img/mmaxv2/jpw_logo.png") ?>"  alt="" class="img-responsive"/></a></div>
                </div>
            </div>
        </div>




        <div id="main_photo" class="mb40">
            <div align="center">
                <div id="theForm">
                    <p align="center" class="fsLarge"><strong>Start learning Today</strong></p>

                    <form class="form-horizontal" role="form" method="post" id="mmax" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputFullName" class="col-sm-3 control-label">Fullname</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputFullName" name="inputFullName" placeholder="Họ Ten" style="margin-bottom:0px;">
                                <div class="has-error"><span><?php echo form_error('inputFullName'); ?></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail">
                                <div class="has-error"><span><?php echo form_error('inputEmail'); ?></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="col-sm-3 control-label">Số điện thoại</label>
                            <div class="col-sm-6">
                                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Số điện thoại">
                                <div class="has-error"><span><?php echo form_error('inputPhone'); ?></span></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Location</label>
                            <div class="col-sm-8">
                                <label class="radio-inline">
                                    <input type="radio" name="inputLocation" id="inputLocation" value=0 checked>
                                    Ho Chi Minh </label>
                                <label class="radio-inline" style="margin-left:0;">
                                    <input type="radio" name="inputLocation" id="inputLocation" value=1>
                                    Ha Noi </label>
                                <label class="radio-inline" style="margin-left:0;">
                                    <input type="radio" name="inputLocation" id="inputLocation" value=2>
                                    Other </label>
                                <div class="has-error"><span><?php echo form_error('inputLocation'); ?></span></div>
                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="hidden" id="isSent" name="isSent" value="OK" />
                                <button type="submit" class="btn btn-red btn-lg" id="btnApply">Gửi đi</button>
                            </div>
                        </div>

                    </form>

                </div> <!-- /theForm -->
                <br>
                <br>

            </div>


        </div> <!-- /main photo -->

        <div class="container">
            <div class = "panel-body" id="results">
                <?php if (isset($data->jobs) && !empty($data->jobs)): ?>
                    <p class="mb10 search_msg"><strong>Tìm thấy <span class="txtRed total"><?php echo $data->total; ?></span> việc làm</strong></p>
                    <?php
                    foreach ($data->jobs as $key => $job) {
                        $this->load->view("/welcome/_item", array("key" => $key, "job" => $job));
                    }
                    ?>

                    <div style="margin: auto; text-align: center;">
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





        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url("static/js/jquery-2.1.1.min.js") ?>" ></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url("static/js/bootstrap.min.js"); ?>"></script>

        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>

        <script type="text/javascript">

                //custom validation rule

                $.validator.addMethod("customemail",
                        function (value, element) {
                            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                        },
                        "Địa chỉ email không hợp lệ."
                        );
                $.validator.addMethod("customephone",
                        function (value, element) {
                            return /^[0-9().-]+$/.test(value);
                        },
                        "Số điện thoại không hợp lệ."
                        );


                jQuery.extend(jQuery.validator.messages, {
                    email: "Địa chỉ email không hợp lệ."
                });

                $("#mmax").validate({
                    rules: {
                        inputFullName: {
                            required: true
                        },
                        inputEmail: {
                            required: true,
                            customemail: true
                        },
                        inputPhone: {
                            required: true,
                            customephone: true
                        }
                    },
                    messages: {
                        inputFullName: {
                            required: "Vui lòng nhập Họ Tên."
                        },
                        inputEmail: {
                            required: "Vui lòng nhập email."
                        },
                        inputPhone: {
                            required: "Vui lòng nhập số điện thoại."
                        }
                    },
                    errorClass: "has-error",
                    errorElement: "span",
                    errorPlacement: function (error, element) {
                        element.parent().find(".has-error").append(error);
                    }

                });
                $(document).ready(function () {
                    $('.check-option').val("false");
                });

        </script>


    </body>
</html>