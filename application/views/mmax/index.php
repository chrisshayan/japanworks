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
        <link href="<?php echo base_url("static/css/mediamax2.css") ?>" rel="stylesheet">

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
                            <div class="col-xs-2"><img src="<?php echo base_url("static/img/mmaxv2/logo_mediamax.gif") ?>"  alt=""/></div>
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
                    <p align="center" class="fsLarge"><strong>Ứng tuyển ngay! Chỉ 30 giây</strong></p>

                    <form class="form-horizontal" role="form" method="post" id="mmax" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputFName" class="col-sm-3 control-label">Họ Tên</label>
                            <div class="col-sm-3 txtFirstName" style="padding-right:3px;">
                                <input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="Họ" style="margin-bottom:0px;">
                                <div class="has-error"><span><?php echo form_error('inputFName'); ?></span></div>
                            </div>
                            <div class="col-sm-3 txtLastName" style="padding-left:3px;">
                                <input type="text" class="form-control" id="inputLName" name="inputLName" placeholder="Tên">
                                <div class="has-error"><span><?php echo form_error('inputLName'); ?></span></div>
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

                        <div class="form-group" id="attachCV">
                            <label for="inputFile" class="col-sm-3 control-label">CV của bạn</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE ?>" />
                                <input type="file" id="inputFile" name="inputFile" placeholder="Your resume" style="margin-top:5px;">
                                <span class="small">(định dạng .doc, .docx, .pdf nhỏ hơn 3MB)</span>
                                <div class="has-error"><span><?php echo form_error('inputFile'); ?></span></div>
                                <div class="mb10"><a href="javascript:toggleCVform(1)" style="text-decoration:underline">Không có CV?</a></div>
                            </div>
                        </div>

                        <input type="hidden" name="checkOption" class="check-option" value="false" />
                        <div id="noCV" style="display:none">

                            <div class="form-group">
                                <label for="inputPosition" class="col-sm-2 control-label">Năm sinh</label>
                                <div class="col-sm-7">
                                    <select name="yearBirth" class="form-control" id="inputPosition">
                                        <?php for ($i = 1965; $i <= 1995; $i++) { ?>
                                            <option value="<?php echo $i; ?> " <?php echo set_select('yearBirth', $i, TRUE); ?> ><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>


                                    <div class="has-error"><?php echo form_error('yearBirth'); ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPosition" class="col-sm-2 control-label">Kinh nghiệm lập trình web</label>
                                <div class="col-sm-7">

                                    <select name="expJob" class="form-control" id="inputPosition" >
                                        <option value="0 year" <?php echo set_select('expJob', '0 year', TRUE); ?> >0 year</option>
                                        <option value="0-1 year" <?php echo set_select('expJob', '0-1 year'); ?> >0-1 year</option>
                                        <option value="more than 1 years" <?php echo set_select('expJob', 'more than 1 years'); ?> >more than 1 years</option>
                                        <option value="more than 2 years" <?php echo set_select('expJob', 'more than 2 years'); ?> >more than 2 years</option>
                                        <option value="more than 3 years" <?php echo set_select('expJob', 'more than 3 years'); ?> >more than 3 years</option>
                                        <option value="more than 5 years" <?php echo set_select('expJob', 'more than 5 years'); ?> >more than 5 years</option>
                                    </select>

                                    <div class="has-error"><?php echo form_error('expJob'); ?></div>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPosition" class="col-sm-2 control-label">Trình độ Tiếng Anh</label>
                                <div class="col-sm-7">
                                    <select name="enLevel" class="form-control" id="inputPosition">
                                        <option value="0" <?php echo set_select('enLevel', '0', TRUE); ?> >Beginner</option>
                                        <option value="1" <?php echo set_select('enLevel', '1'); ?> >Intermediate</option>
                                        <option value="2" <?php echo set_select('enLevel', '2'); ?> >Advanced</option>
                                        <option value="3" <?php echo set_select('enLevel', '3'); ?> >Fluent</option>

                                    </select>
                                    <div class="has-error"><?php echo form_error('enLevel'); ?></div>
                                </div>

                            </div>

                            <input type="hidden" name="checkOption" class="check-option" value="false" />
                            <input id="jobId" type="hidden" name="checkJob" class="check-job" value="11" />


                            <br>
                            <div align="center" class="mb10"><a href="javascript:toggleCVform(0)" id="cancel_btn">Đính kèm hồ sơ</a></div>


                        </div>  <!-- /noCV -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="hidden" id="isSent" name="isSent" value="OK" />
                                <button type="submit" class="btn btn-red btn-lg" id="btnApply">NỘP ĐƠN</button>
                            </div>
                        </div>

                    </form>

                </div> <!-- /theForm -->
                <br>
                <br>

            </div>


        </div> <!-- /main photo -->

        <div class="container">

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Mô tả công việc</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                Địa điểm làm việc: Hà Nội <br>
                                Mức lương: lên tới 1000$
                            </p>
                            <ul>
                                <li>Phát triển ứng dụng cho dịch vụ của công ty hoặc khách hàng tại Nhật </li>
                                <li>Phát triển các kiểu hệ thống cho các của hàng từ B2C online tới hệ thống doành nghiệp B2B. Vì vậy bạn sẽ có nhiều kinh nghiệm với nhiều công nghệ khác nhau. </li>
                                <li>Công ty xây dựng phầm mềm dựa trên mô hình scrum/agile</li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mmaxv2/mediamax_img_01.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Mr. Tasaki, CEO người Nhật</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mmaxv2/mediamax_img_02.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Đội ngũ chúng tôi</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Môi trường lý tưởng để toàn diện bản thân</h3>
                    <div class="row mb10">
                        <div class="col-sm-6">
                            <strong>Đào tạo hàng ngày bởi các chuyên gia người Nhật</strong>
                            <p>- Đào tạo chuyên sâu 01 tháng cho nhân viên mới, tương đương với chương trình đào tạo tại Nhật về kĩ năng lập trình, đặc biệt là Ruby on Rails <br>
                                - Nhận xét hàng ngày từ chuyên gia Nhật Bản và các đồng nghiệp nhiều kinh nghiệm khác về cách bạn tạo code thông qua 1 ứng dụng chia sẻ trực tuyến.
                            </p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="left">
                            <div><img src="<?php echo base_url("static/img/mmaxv2/mediamax_img_03.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Cách chúng tôi góp ý về code bạn viết</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="left">
                            <div><img src="<?php echo base_url("static/img/mmaxv2/mediamax_img_04.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Chuyên gia người Nhật tại văn phòng</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Đào tạo các kĩ năng mềm cần có khi đi làm</strong>
                            <p>
                                Ngoài việc đào tạo về kĩ năng chuyên ngành, chúng tôi cung cấp cho bạn các khóa học kĩ năng mềm quan trọng như <br>
                                -        Tính chuyên nghiệp: sự chân thành, đúng giờ,… <br>
                                -       Cách thức tận dụng tối đa khả năng của não bộ: Suy luận logic, Phân tích, Phỏng đoán, Giải quyết vấn đề, Thuyết trình,… <br>
                                -       Quản lý dự án: Lên kế hoạch, theo dõi tiến độ, thiết lập mục tiêu,… <br>
                                -       Kĩ năng giao tiếp: Kĩ năng lãnh đạo, kĩ năng hướng dẫn, quan tâm tới người khác, đánh giá đúng năng lực bản thân <br>
                                -       Các khóa học tiếng Nhật, tiếng Anh miễn phí
                            </p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mmaxv2/mediamax_img_05.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Đào tạo kĩ năng mềm bởi chuyên gia người Nhật</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mmaxv2/mediamax_img_06.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Phòng họp</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Yêu cầu</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul>
                                <li>Tối thiểu 01 năm kinh nghiệm phát triển các ứng dụng web</li>
                                <li>Sinh viên mới tốt nghiệp có kết quả học tập xuất sắc và khả năng đặc biệt cũng có thể ứng tuyển.</li>
                                <li>Có thể giao tiếp đọc, viết, nói bằng Tiếng Anh. Biết Tiếng Nhật là một lợi thế</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Giới thiệu về công ty</h3>
                    <p><strong>Media Max Việt Nam</strong></p>
                    <p>
                        Là công ty 100% vốn đầu tư Nhật từ Media Max Japan Inc, (MMJ) với gần 20 năm kinh nghiệm trong lĩnh vực IT, tương đương lịch sử phát triển Internet tại Nhật Bản đặc biệt về phát triển ứng dụng web. <br><br>

                        Là  một công ty start up, vì vậy các bạn sẽ có nhiều cơ hội thăng tiến và trở thành những người chủ chốt của công ty. Quan trọng nhất, chúng tôi đặc biệt tự tin về khả năng đào tạo nguồn nhân lực của mình. Các bạn sẽ được đào tạo trong môi trường chất lượng cao và chuyên nghiệp với đội ngũ chuyên gia đến từ Nhật Bản. Đặc biệt những nhân viên đạt thành tích tốt trong đào tạo và công việc sẽ có cơ hội thăng tiến và tham gia chương trình đào tạo chuyên sâu tại Nhật Bản – một trong những nơi đào tạo IT hàng đầu thế giới <br><br>

                        Môi trường làm việc trẻ trung, cởi mở và sáng tạo với chế độ đãi ngộ hấp dẫn như: xét tăng lương 6 tháng/lần, trợ cấp ăn trưa, gửi xe, khám sức khỏe định kì,… chắc chắn sẽ giúp phát huy tối đa tiềm năng của bạn. <br><br>

                        Còn chần chừ gì nữa, hãy gia nhập với chúng tôi ngay!!!
                    </p>
                </div>
            </div>
            <!-- /content entry -->

            <div class="mb40" align="center"><a href="javascript:scrollToAnchor('top')" class="btn btnTop">GO TO TOP OF PAGE</a></div>
        </div>


        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5"><img src="<?php echo base_url("static/img/mmaxv2/logo_mediamax_white.png") ?>"   alt="" class="img-responsive" /></div>
                    <div class="col-xs-5 col-xs-offset-2" align="right"><img src="<?php echo base_url("static/img/mmaxv2/footer_support.png") ?>"  alt="" class="img-responsive"/></div>
                </div>
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
                        function(value, element) {
                            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                        },
                        "Địa chỉ email không hợp lệ."
                        );
                $.validator.addMethod("customephone",
                        function(value, element) {
                            return /^[0-9().-]+$/.test(value);
                        },
                        "Số điện thoại không hợp lệ."
                        );
                $.validator.addMethod(
                        "filesize",
                        function(value, element) {

                            if ($(element).attr('type') == "file" && ($(element).hasClass('required')
                                    || element.files.length > 0)) {
                                var size = 0;
                                var $form = $(element).parents('form').first();
                                var $fel = $form.find('input[type=file]');
                                var $max = $form.find('input[name=maxFileSize]').first();
                                //var $max = 512000;
                                if ($max) {
                                    for (var j = 0, fo; fo = $fel[j]; j++) {
                                        files = fo.files;
                                        for (var i = 0, f; f = files[i]; i++) {
                                            size += f.size;
                                        }
                                    }
                                    return size <= $max.val();
                                }
                            }
                            return true;
                        },
                        "Dung lượng tập tin không phù hợp, Vui lòng chọn tập tin khác."
                        );

                jQuery.extend(jQuery.validator.messages, {
                    email: "Địa chỉ email không hợp lệ."
                });

                $("#mmax").validate({
                    rules: {
                        inputFName: {
                            required: true
                        },
                        inputLName: {
                            required: true
                        },
                        inputEmail: {
                            required: true,
                            customemail: true
                        },
                        inputPhone: {
                            required: true,
                            customephone: true
                        },
                        inputFile: {
                            required: true,
                            extension: "pdf|doc|docx",
                            filesize: true
                        },
                        yearBirth: {
                            required: true
                        },
                        expJob: {
                            required: true
                        },
                        enLevel: {
                            required: true
                        }
                    },
                    messages: {
                        inputFName: {
                            required: "Vui lòng nhập Họ."
                        },
                        inputLName: {
                            required: "Vui lòng nhập Tên."
                        },
                        inputEmail: {
                            required: "Vui lòng nhập email.",
                        },
                        inputPhone: {
                            required: "Vui lòng nhập số điện thoại."
                        },
                        inputFile: {
                            required: "Vui lòng đính kèm hồ sơ.",
                            extension: "Định dạng file không thể upload."
                        },
                        yearBirth: {
                            required: "Please select year of birth."
                        },
                        expJob: {
                            required: "Please select experience of job."
                        },
                        enLevel: {
                            required: "Please select your English skills."
                        }

                    },
                    errorClass: "has-error",
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        element.parent().find(".has-error").append(error);
                    }

                });
                $(document).ready(function() {
                    $('.check-option').val("false");
                });

        </script>

        <script>

            function scrollToAnchor(aid) {
                var aTag = $("a[name='" + aid + "']");
                $('html,body').animate({scrollTop: aTag.offset().top}, 'slow', function() {
                    $("#topApply").hide();
                });
            }

            function showTopApply() {
                var sTop = $(document).scrollTop();
                if (sTop >= 400) {
                    $("#topApply").show();
                }
                else {
                    $("#topApply").hide();
                }
            }

            function toggleCVform(z) {
                if (z == 1) {
                    $('.check-option').val("true");
                    $("#hasCV").val("0");
                    $("#attachCV").hide();
                    $("#noCV").slideDown(400);
                    $("#cancel_btn").show();
                }
                else if (z == 0) {
                    $('.check-option').val("false");
                    $("#hasCV").val("1");
                    $("#attachCV").show();
                    $("#noCV").slideUp(400);
                    $("#cancel_btn").hide();
                }
            }

            $(function() {
                var st = $("#title_area").html();
                $("#topApply").html(st);

                $(window).scroll(function() {
                    showTopApply();
                });

            });
        </script>
    </body>
</html>
