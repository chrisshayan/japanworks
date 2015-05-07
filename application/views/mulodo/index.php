<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url("static/img/favicon.ico?240720141702"); ?>" type="image/x-icon">
        <title>Mulodo | Supported by VietnamWorks</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url("static/css/bootstrap.min.css") ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/bootstrap.min.css") ?>">
        <link href="<?php echo base_url("static/css/mulodo.css") ?>" rel="stylesheet">

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
                    <div class="col-xs-5"><img src="<?php echo base_url("static/img/mulodo/header_logo.jpg") ?>"   alt="Mulodo logo" class="img-responsive" /></div>
                    <div class="col-xs-5 col-xs-offset-2" align="right"><a href="http://vietnamworks.com" target="_blank"><img src="<?php echo base_url("static/img/mulodo/vnw_logo.png") ?>"  alt="VietnamWorks logo" width="150" class="img-responsive"/></a></div>
                </div>
            </div>
        </div>

        <div id="main_photo" class="mb40">
            <div align="center">
                <div id="theForm">
                    <div align="center"><img src="<?php echo base_url("static/img/mulodo/title.png") ?>"  class="big_title img-responsive mb10"   alt="TUYỂN 60 KỸ SƯ JAVA - Chỉ cần có kinh nghiệm 6 tháng về JAVA"/></div>
                    <p align="center" class="fsLarge"><strong>Tham gia ứng tuyển ngay!</strong></p>

                    <form class="form-horizontal" role="form" method="post" id="mulodo" action="" enctype="multipart/form-data">
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
                            <label for="inputResume" class="col-sm-3 control-label">Đính kèm CV (tiếng Anh)</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE ?>" />
                                <input type="file" id="inputResume" name="inputResume" placeholder="Your resume" style="margin-top:5px;">
                                <span class="small">(định dạng .doc, .docx, .pdf nhỏ hơn 3MB)</span>
                                <div class="has-error"><span><?php echo form_error('inputResume'); ?></span></div>
                                <div class="mb10"><a href="javascript:toggleCVform(1)" style="text-decoration:underline">Không có CV tiếng Anh?</a></div>
                            </div>
                        </div>

                        <input type="hidden" id="hasCV" name="hasCV" class="check-option" value="1" />
                        <div id="noCV" style="display:none">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Giới tính</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <input type="radio" name="inputGender" id="inputGender" value="0" checked>
                                        Male </label>
                                    <label class="radio-inline" style="margin-left:0;">
                                        <input type="radio" name="inputGender" id="inputGender" value="1">
                                        Female </label>
                                    <div class="has-error"><span><?php echo form_error('inputGender'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm về JAVA</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="skills[0][name]" value="JAVA experience" />
                                    <select class="form-control" id="selectJavaExp" name="skills[0][experienced]">
                                        <option value="0-6 months">0-6 tháng</option>
                                        <option value="6-12 months">6-12 tháng</option>
                                        <option value="1 year~">1 năm trở lên</option>
                                        <option value="2 years~">2 năm trở lên</option>
                                        <option value="3 years~">3 năm trở lên</option>
                                    </select>
                                    <div class="has-error"><span><?php echo form_error('skills[0][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">JAVA framework</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="skills[1][name]" value="JAVA framework" />
                                    <input type="text" class="form-control" id="inputFramework" name="skills[1][experienced]" placeholder="Spring, Slim, Struts, etc...">
                                    <div class="has-error"><span><?php echo form_error('skills[1][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm database</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="skills[2][name]" value="Experience database" />
                                    <input type="text" class="form-control" id="inputExpDB" name="skills[2][experienced]" placeholder="MySQL, SQLite, Oracle, etc...">
                                    <div class="has-error"><span><?php echo form_error('skills[2][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm Server</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="skills[3][name]" value="Experience server" />
                                    <input type="text" class="form-control" id="inputExpOS" name="skills[3][experienced]" placeholder="Apache, IIS, lighttpd, etc...">
                                    <div class="has-error"><span><?php echo form_error('skills[3][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group mb20">
                                <label class="col-sm-3 control-label">Trình độ tiếng Anh</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="skills[4][name]" value="English level" />
                                    <select class="form-control" id="selectEngLv" name="skills[4][experienced]">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Fluent">Fluent</option>
                                    </select>
                                    <div class="has-error"><span><?php echo form_error('skills[4][experienced]'); ?></span></div>
                                </div>
                            </div>
                            <br>
                            <div align="center" class="mb10"><a href="javascript:toggleCVform(0)" id="cancel_btn">Đính kèm hồ sơ</a></div>


                        </div>  <!-- /noCV -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-red btn-lg" id="btnApply">NỘP ĐƠN NGAY!</button>
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
                    <h3>Nội dung công việc</h3>
                    <div class="row">
                        <div class="col-sm-6 pad20">
                            <ul>
                                <li>Nơi làm việc : Quận 3, TP. Hồ Chí Minh</li>
                                <li>Lương: 300~500$ </li>
                            </ul>
                            <p>Chúng tôi đang có những dự án rất lớn với lượng khách hàng khổng lồ từ các công ty danh tiếng. <br>
                                <br>
                                Vì vậy, chúng tôi đang tìm kiếm 60 kỹ sư tham gia trong các dự án này. Ứng tuyển ngay để cùng chúng tôi tạo nên những bước đột phá mới.</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_01.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Vừa cải thiện văn phòng mới</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_02.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Giám đốc ông Shimoura</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Vì sao bạn nên ứng tuyển?</h3>
                    <div class="row mb10">
                        <div class="col-sm-6 pad20">
                            <p>1. Trở thành thành viên của chúng tôi, bạn sẽ được tham gia những back-end project lớn từ các khách hàng là những công ty nổi tiếng về du lịch, dịch vụ EC, công ty cung cấp dịch vụ phát tín âm nhạc ... </p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_03.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Công ty du lịch HIS lớn nhất của Nhật</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_04.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Thương mại điện tử Rakuten lớn nhất của Nhật</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 pad20">
                            <p>2. Được học hỏi từ các chuyên gia người Nhật. Đây là cơ hội để bạn được phát triển về kĩ thuật và phương pháp quản lí dự án từ 3 project manager ở văn phòng Việt Nam và các Manager khác ở Nhật.</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_05.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Kondo và Nemoto tại Nhật Bản</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_06.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p class="caption">Văn phòng Việt nam</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Điều kiện ứng tuyển</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul>
                                <li>Có kinh nghiệm từ 06 tháng đến 3 năm về JAVA Web Application </li>
                                <li>Có kiến thức sâu về lập trình Java </li>
                                <li>Giao tiếp tốt bằng Tiếng Anh hoặc tiếng Nhật là một lợi thế</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Giới thiệu về Mulodo</h3>
                    <div class="row">
                        <div class="col-sm-6 pad20">
                            <p><strong>Mulodo Japan</strong></p>
                            <ul>
                                <li>Nhân viên: 25 người</li>
                                <li>Vốn đầu tư: 20 triệu yên</li>
                                <li>Thành lập: 2007/4</li>
                                <li>Website: <a href="http://www.mulodo.co.jp/company/" target="_blank">http://www.mulodo.co.jp/company/</a></li>
                            </ul>

                            <p><strong>Mulodo Vietnam</strong></p>
                            <ul>
                                <li>Nhân viên: 80 người</li>
                                <li>Thành lập: 2012/2</li>
                                <li>Website: <a href="http://www.mulodo.com.vn/en/" target="_blank">http://www.mulodo.com.vn/en/</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_07.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p> Mulodo Vietnam</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/mulodo/mulodo_img_08.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                            <p> Mulodo Vietnam</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <div class="mb40" align="center"><a href="javascript:scrollToAnchor('top')" class="btn btnTop">QUAY VỀ ĐẦU TRANG</a></div>
        </div>


        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5"><img src="<?php echo base_url("static/img/mulodo/footer_logo.png") ?>"   alt="Mulodo logo" class="img-responsive" /></div>
                    <div class="col-xs-5 col-xs-offset-2" align="right"><a href="http://vietnamworks.com" target="_blank"><img src="<?php echo base_url("static/img/mulodo/vnw_logo.png") ?>"  alt="VietnamWorks logo" width="150" class="img-responsive"/></a></div>
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
                        $.validator.addMethod(
                                "filesize",
                                function (value, element) {

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

                        $("#mulodo").validate({
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
                                inputResume: {
                                    required: true,
                                    extension: "pdf|doc|docx",
                                    filesize: true
                                },
                                inputGender: {
                                    required: true
                                },
                                "skills[0][experienced]": {
                                    required: true
                                },
                                "skills[1][experienced]": {
                                    required: true
                                },
                                "skills[2][experienced]": {
                                    required: true
                                },
                                "skills[3][experienced]": {
                                    required: true
                                },
                                "skills[4][experienced]": {
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
                                inputResume: {
                                    required: "Vui lòng đính kèm hồ sơ.",
                                    extension: "Định dạng file không thể upload."
                                },
                                inputGender: {
                                    required: "Vui lòng chọn giới tính."
                                },
                                "skills[0][experienced]": {
                                    required: "Vui lòng chọn kinh nghiệm JAVA."
                                },
                                "skills[1][experienced]": {
                                    required: "Chọn JAVA framework mà bạn giỏi."
                                },
                                "skills[2][experienced]": {
                                    required: "Vui lòng nhập kinh nghiệm database."
                                },
                                "skills[3][experienced]": {
                                    required: "Vui lòng nhập kinh nghiệm về Server OS."
                                },
                                "skills4][experienced]": {
                                    required: "Vui lòng chọn trình độ tiếng Anh của bạn."
                                }

                            },
                            errorClass: "has-error",
                            errorElement: "span",
                            errorPlacement: function (error, element) {
                                element.parent().find(".has-error").append(error);
                            }

                        });
                        $(document).ready(function () {

                        });
        </script>

        <script>

            function scrollToAnchor(aid) {
                var aTag = $("a[name='" + aid + "']");
                $('html,body').animate({scrollTop: aTag.offset().top}, 'slow', function () {
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
                    $("#hasCV").val("0");
                    $("#attachCV").hide();
                    $("#noCV").slideDown(400);
                    $("#cancel_btn").show();
                }
                else if (z == 0) {
                    $("#hasCV").val("1");
                    $("#attachCV").show();
                    $("#noCV").slideUp(400);
                    $("#cancel_btn").hide();
                }
            }

            $(function () {
                var st = $("#title_area").html();
                $("#topApply").html(st);

                $(window).scroll(function () {
                    showTopApply();
                });

            });
        </script>
    </body>
</html>