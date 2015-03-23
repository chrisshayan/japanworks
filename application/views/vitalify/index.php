<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Working in Japan | Supported by VietnamWorks</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url("static/css/vitalify/bootstrap.min.css") ?>" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/font-awesome.min.css") ?>">
        <link href="<?php echo base_url("static/css/vitalify.css") ?>" rel="stylesheet">


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
    </head>
    <body>

        <a name="top" id="top"></a>

        <div id="topApply"></div>

        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5"><img src="<?php echo base_url("static/img/vitalify/vnw_logo.png") ?>"   alt="" class="img-responsive" /></div>
                    <div class="col-xs-5 col-xs-offset-2" align="right"><img src="<?php echo base_url("static/img/vitalify/vfa_logo.png") ?>"  alt="" class="img-responsive"/></div>
                </div>
            </div>
        </div>


        <div id="main_photo" class="mb40">
            <div align="center">
                <div id="theForm">
                    <div align="center">
                        <h2>VIỆC LÀM IT TẠI NHẬT BẢN</h2>
                        <p class="f20">
                            Cơ hội đi Nhật <span class="bold">miễn phí</span> để tham dự Sự kiện nghề nghiệp và làm việc trong các công ty công nghệ cao
                        </p>
                    </div>


                    <form class="form-horizontal" role="form" method="post" id="vitalify" action="" enctype="multipart/form-data" onsubmit="return vaidateBeforeSubmit(event)" >


                        <div class="form-group">

                            <label for="inputFName" class="col-sm-3 control-label">Họ Tên</label>
                            <div class="col-sm-4 txtFirstName" style="padding-right:3px;">
                                <input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="Họ" style="margin-bottom:0px;">
                                <div class="has-error"><span><?php echo form_error('inputFName'); ?></span></div>
                            </div>
                            <div class="col-sm-4 txtLastName" style="padding-left:3px;">
                                <input type="text" class="form-control" id="inputLName" name="inputLName" placeholder="Tên">
                                <div class="has-error"><span><?php echo form_error('inputLName'); ?></span></div>
                            </div>
                        </div>
                        <input type="hidden"  id="checkValidPass"  name="checkValidPass" value="true" />
                        <input type="hidden"  id="checkPassword"  name="checkPassword" value="0" />
                        <input type="hidden" name="checkOption" class="check-option" value="false" />
                        <input type="hidden" name="checkActiveEmail" id="checkActiveEmail" value="" />
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" onkeyup="checkEmailExistVNW()" id="inputEmail" name="inputEmail" placeholder="E-mail">
                                <div class="has-error"><span><?php echo form_error('inputEmail'); ?></span></div>
                            </div>
                        </div>
                        <div style="position: relative; bottom: 35px; left: 430px; margin-bottom: -21px"><img id="passLoading" style="display: none" alt="" src="<?php echo base_url("static/img/ajax_loading.gif"); ?>" />&nbsp;</div>
                        <div  id="loadData" style="display: none">
                            <div id="login-vnw">
                                <div class="tooltip-arrow"></div>
                                <label class="col-sm-10" id="forget-text" style="width:100%"></label>
                                <div class="col-sm-12 input-container">
                                    <div class="col-sm-6">
                                        <input style="display:none" />
                                        <input type="password" rel="requiredField" class="form-control"  onkeyup="checkPasswordNull()" id="inputPassword" name="inputPassword" placeholder="Mật khẩu" value="" />

                                    </div>
                                    <div class="has-error" style="margin-top: 5px;">
            <!--                                <span for="inputPassword" class="has-error" style="font-size: 10pt;"></span>-->
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPhone" class="col-sm-3 control-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="Số điện thoại">
                                <div class="has-error"><span><?php echo form_error('inputPhone'); ?></span></div>
                            </div>
                        </div>

                        <div class="form-group" id="attachCV">
                            <label for="inputFile" class="col-sm-3 control-label">Đính kèm CV <br> (tiếng Anh/ tiếng Nhật)</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE ?>" />
                                <input type="file" id="filestyle-0" name="inputFile" class="filestyle" placeholder="Your resume" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
                                <div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0">
                                        <label for="filestyle-0" class="btn-browse">Browse...</label></span>   No file selected</div>
                                <span class="small">(Định dạng .doc, .docx, .pdf nhỏ hơn 3Mb)</span>
                                <div class="has-error"><span><?php echo form_error('inputFile'); ?></span></div>
                                <div class="mb10"><a href="javascript:toggleCVform(1)" style="text-decoration:underline">Không có CV?</a></div>
                            </div>
                        </div>

                        <input type="hidden" id="hasCV" name="hasCV" class="check-option" value="1" />
                        <input id="jobId" type="hidden" name="checkJob" class="check-job" value="12" />
                        <div id="noCV" style="display:none">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Giới tính</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" name="inputGender" id="inputGender" value=0 checked>
                                        Male </label>
                                    <label class="radio-inline" style="margin-left:0;">
                                        <input type="radio" name="inputGender" id="inputGender" value=1>
                                        Female </label>
                                    <div class="has-error"><span><?php echo form_error('inputGender'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm về IT</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="skills[0][name]" value="IT experience" />
                                    <select class="form-control" id="selectItExp" name="skills[0][experienced]">
                                        <option value="1 year">1 year</option>
                                        <option value="2 years">2 years</option>
                                        <option value="3 years">3 years</option>
                                        <option value="4 years">4 years</option>
                                        <option value="5 years">from 5 years</option>
                                    </select>
                                    <div class="has-error"><span><?php echo form_error('skills[0][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm Lamp</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="skills[1][name]" value="Kinh nghiệm Lamp" />
                                    <input type="text" class="form-control" id="inputExpLamp" name="skills[1][experienced]" placeholder="Linux, Ajax, MySQL, PHP...">
                                    <div class="has-error"><span><?php echo form_error('skills[1][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm database</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="skills[2][name]" value="Experience database" />
                                    <input type="text" class="form-control" id="inputExpDB" name="skills[2][experienced]" placeholder="MySQL, SQLite, Oracle...">
                                    <div class="has-error"><span><?php echo form_error('skills[2][experienced]'); ?></span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ngôn ngữ lập trình</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="skills[3][name]" value="Ngôn ngữ lập trình" />
                                    <input type="text" class="form-control" id="inputExpDev" name="skills[3][experienced]" placeholder="Java, C#, C++, PHP...">
                                    <div class="has-error"><span><?php echo form_error('skills[3][experienced]'); ?></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Kinh nghiệm iOS/ Android</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="skills[4][name]" value="Kinh nghiệm iOS/ Android" />
                                    <input type="text" class="form-control" id="inputExpIA" name="skills[4][experienced]" placeholder="iOS hoặc Android">
                                    <div class="has-error"><span><?php echo form_error('skills[4][experienced]'); ?></span></div>
                                </div>
                            </div>


                            <div class="form-group mb20">
                                <label class="col-sm-3 control-label">Ngoại ngữ</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="skills[5][name]" value="Japan level" />
                                    <select class="form-control" id="selectEngLv" name="skills[5][experienced]">
                                        <option value="0">Tiếng Anh</option>
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Fluent">Fluent</option>
                                    </select>
                                    <div class="has-error"><span><?php echo form_error('skills[5][experienced]'); ?></span></div>
                                </div>



                                <div class="col-sm-4">
                                    <input type="hidden" name="skills[6][name]" value="Japan level" />
                                    <select class="form-control" id="selectJpLv" name="skills[6][experienced]">
                                        <option value="0">Tiếng Nhật</option>
                                        <option value="None">None</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                        <option value="Fluent">Fluent</option>
                                    </select>
                                    <div class="has-error"><span><?php echo form_error('skills[6][experienced]'); ?></span></div>
                                </div>

                            </div>
                            <div class="form-group mb20">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-4">
                                    <div class="cancel"><a href="javascript:toggleCVform(0)" id="cancel_btn">Đính kèm hồ sơ</a></div>
                                </div>
                            </div>
                            <br>
                            <!--                            <div align="center" class="mb10"><a href="javascript:toggleCVform(0)" id="cancel_btn">Đính kèm hồ sơ</a></div>-->


                        </div>  <!-- /noCV -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="hidden" id="isSent" name="isSent" value="OK" />
                                <button type="submit" id="applyButton" class="btn btn-red btn-lg" id="btnApply">NỘP ĐƠN NGAY!</button>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Về sự kiện nghề nghiệp tại Nhật Bản</h3>
                            <p>
                                - Thời gian từ 17/3 đến 19/3 - 2015. <br>
                                - Tiếp cận hơn 30 công ty hàng đầu về lĩnh vực IT tại Nhật Bản <br>
                                - Cơ hội sinh sống và làm việc lâu dài tại Nhật Bản. <br>
                                - Toàn bộ chi phí (vé may bay, chỗ ở, ăn uống) trong toàn bộ chuyến đi sẽ được công ty tài trợ <br>
                                - Một nhân viên của Vitalify sẽ đồng hành hỗ trợ bạn trong suốt thời gian tại Nhật. <br>
                                - Chúng tôi sẽ phỏng vấn những ứng viên phù hợp trong tháng Hai và chuẩn bị mọi thủ tục Visa vào đầu tháng Ba. <br>
                                - Chi tiết về Ngày Hội Việc Làm sẽ được chia sẻ thêm vào buổi Hướng Nghiệp vào đầu tháng Ba.
                            </p>
                        </div>
                        <div class="col-sm-3 col-xs-6" align="center">
                            <div><img src="<?php echo base_url("static/img/vitalify/img_01.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                        </div>
                        <div class="col-sm-3 col-xs-6" align="center">
                            <div><img src="<?php echo base_url("static/img/vitalify/img_02.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row mb10">
                        <div class="col-sm-6">
                            <h3>Vì sao bạn nên ứng tuyển?</h3>
                            <p>
                                Nhật Bản là một trong những nước có công nghệ phát triển nhất thế giới, tuy nhiên cũng là nước đang thiếu nhân lực trẻ. Do đó, ngày càng nhiều các công ty IT Nhật mở rộng phạm vi tuyển dụng, bao gồm cả những ứng viên người nước ngoài, đặc biệt là thị trường nhân lực Việt Nam. <br>
                                - Tham gia Ngày Hội Việc Làm tại Nhật, bạn sẽ có cơ hội làm việc trong một xã hội hiện đại, trải nghiệm những công nghệ tiên tiến hàng đầu thế giới. Ngoài ra, tiếp xúc và sử dụng tiếng Nhật hằng ngày cũng nâng cao khả năng ngôn ngữ Tiếng Nhật của bạn. <br>
                                - Cơ hội sinh sống và làm việc tại đất nước hoa anh đào Nhật Bản đang rộng mở dành cho tất cả các bạn, kể cả những ứng viên không biết tiếng Nhật.
                            </p>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/vitalify/img_03.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                        </div>
                        <div class="col-sm-3 col-xs-6 mb10" align="center">
                            <div><img src="<?php echo base_url("static/img/vitalify/img_04.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Điều kiện ứng tuyển</h3>
                            <p>
                                Nếu bạn hội đủ các yếu tố sau, bạn chắc chắn là ứng viên tiềm năng mà chúng tôi đang cần: <br>
                                1. Lưu loát tiếng Anh (TOIEC 500 trở lên) hoặc biết tiếng Nhật <br><br>

                                2.  Có kinh nghiệm 3 năm trở lên ở một trong những vị trí: <br>
                                <b>* BSE:</b><br>
                                - Am hiểu về LAMP (Linux, Ajax, MySQL và PHP)/ Java hoặc Android, iOS <br>
                                - Kỹ năng quản lý dự án <br>
                                - Ưu tiên nếu bạn đã từng là Project Manager, Project Leader, Programmer hoặc Web Developer<br><br>

                                <b>* PHP Developer:</b><br>
                                - Giàu kinh nghiệm MySQL, Oracle hoặc MS SQL Server<br>
                                - Ưu tiên nếu bạn đã từng là Project Manager, Project Leader, Programmer hoặc Web Developer<br>
                                - Quen thuộc với ít nhất hai trong các ngôn ngữ Java, C#, C++, PHP<br><br>

                                <b>* iPhone Developer:</b><br>
                                - Có kinh nghiệm phát triển game hoặc ứng dụng trên iOS, Object-C<br>
                                - Kỹ năng phân tích system và bug<br><br>

                                <b>* Android Developer:</b><br>
                                - Có kinh nghiệm phát triển game hoặc ứng dụng trên Android Java<br>
                                - Kỹ năng phân tích system và bug

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <!-- content entry -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Giới thiệu về Vitalify</h3>
                            <p>
                                Vitalify là công ty của Nhật Bản chuyên phát triển web và ứng dụng trên di động cũng như các dịch vụ liên quan đến Internet. <br><br>

                                Chúng tôi có hơn 100 Kỹ sư ở Việt Nam, trong đó gồm 10 chuyên gia người Nhật. Tại trụ sở ở Tokyo, chúng tôi có 30 nhân viên. <br><br>

                                Website: <a href="http://vitalify.asia/" target="blank">http://vitalify.asia/</a>

                            </p>

                        </div>
                        <div class="col-sm-5 col-sm-offset-1" align="center">
                            <div><img src="<?php echo base_url("static/img/vitalify/img_05.jpg") ?>" width="100%"  alt="" class="img-responsive" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content entry -->

            <div class="mblast" align="center"><a href="javascript:scrollToAnchor('top')" class="btn btnTop">GO TO TOP OF PAGE</a></div>
        </div>






        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo base_url("static/js/jquery-2.1.1.min.js") ?>" ></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url("static/js/bootstrap.min.js"); ?>"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>


        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>

        <script type="text/javascript">

                                            //custom validation rule

                                            $.validator.addMethod("checkEn", function (value, element, arg) {
                                                return arg != value;
                                            }, "Vui lòng chọn trình độ tiếng Anh của bạn.");
                                            $.validator.addMethod("checkJp", function (value, element, arg) {
                                                return arg != value;
                                            }, "Vui lòng chọn trình độ tiếng Nhật của bạn.");
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
                                            $("#vitalify").validate({
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
                                                    },
                                                    "skills[5][experienced]": {
                                                        checkEn: "0"

                                                    },
                                                    "skills[6][experienced]": {
                                                        checkJp: "0"
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
                                                    inputGender: {
                                                        required: "Vui lòng chọn giới tính."
                                                    },
                                                    "skills[0][experienced]": {
                                                        required: "Vui lòng chọn kinh nghiệm IT."
                                                    },
                                                    "skills[1][experienced]": {
                                                        required: "Vui lòng nhập kinh nghiệm Lamp."
                                                    },
                                                    "skills[2][experienced]": {
                                                        required: "Vui lòng nhập kinh nghiệm database."
                                                    },
                                                    "skills[3][experienced]": {
                                                        required: "Vui lòng nhập ngôn ngữ lập trình."
                                                    },
                                                    "skills[4][experienced]": {
                                                        required: "Vui lòng nhập kinh nghiệm iOS/ Android."
                                                    }


                                                },
                                                //errorClass: "has-error",
                                                errorElement: "span",
                                                errorPlacement: function (error, element) {

                                                    element.parent().find("div.has-error").append(error);
                                                }

                                            });
                                            $(document).ready(function () {

                                            });</script>

        <script>
            function checkEmailExistVNW() {
                var forgetText = $("#forget-text");
                if ($("#inputEmail").val() != "" && $("#inputEmail").valid() === true && $("#inputEmail").val() != currentEmail) {

                    $('#passLoading').show();
                    $('#applyButton').attr('disabled', 'disabled');
                    clearTimeout(emailTimeout);
                    emailTimeout = setTimeout(function () {
                        def = $.Deferred();
                        def.promise();
                        $.ajax({
                            url: "<?php echo base_url('/jobs/checkEmailExist'); ?>",
                            type: 'POST', data: {'email': $("#inputEmail").val()},
                            dataType: "json",
                            success: function (response) {
                                //show form password
                                $('#passLoading').hide();
                                if (response == "NEW") {

                                    $("#checkActiveEmail").val(0);
                                    forgetText.html(newMessage);
                                    $("#loadData").show();
                                } else {
                                    $("#loadData").hide();
                                    $("#checkActiveEmail").val(1);
                                }
                                $('#applyButton').removeAttr('disabled');
                                // fillPassword();

                                def.resolve($("#checkActiveEmail").val());
                                currentEmail = $("#inputEmail").val();
                            }
                        });
                    }, 1000);
                } else if ($("#inputEmail").val() != currentEmail) {

                    //hide form password
                    $("#loadData").hide();
                    $("#inputPassword").val('');
                    $("#loadData").find(".has-error").empty();

                    $("#checkPassword").val(0);
                    forgetText.html("");
                    clearTimeout(emailTimeout);
                    $('#passLoading').hide();
                    $('#applyButton').removeAttr('disabled');
                    currentEmail = null;
                }

            }



            //----------------------------------------------------------------------------------------------//
            //  var def;
            var emailTimeout;
            var passTimeout;
            var local = {};
            var secret = "X2{mY@T;v.zgTPs";
            var currentEmail;
            //var newMessage = "Vui lòng thiết lập mật khẩu để nộp đơn.<br />Bạn sẽ đăng ký tài khoản ở JapanWorks và VietnamWorks.";
            var newMessage = "";
            var existMessage = "Bạn có tài khoản ở Vietnamwork!<br />Nhập mật khẩu VietnamWorks của bạn.";

            function checkPasswordNull() {
                if ($("#inputPassword").val() == "") {
                    $("#loadData").find(".has-error").empty();
                    $("#loadData").find(".has-error").append("<img alt='error' src='<?php echo base_url('static/img/error.png'); ?>' style='width: 15px' /><span class='textPass' style='margin-left: 5px !important'>Nhập mật khẩu. </span>");
                    $("#checkValidPass").val('false');
                } else if ($("#inputPassword").val() != "" && ($("#inputPassword").val().length < 4 || $("#inputPassword").val().length > 20)) {

                    $("#loadData").find(".has-error").empty();
                    $("#loadData").find(".has-error").append("<img alt='error' src='<?php echo base_url('static/img/error.png'); ?>' style='width: 15px' /><span class='textPass' style='margin-left: 5px !important'>Mật khẩu phải từ 4 đến 20 kí tự. </span>");
                    $("#checkValidPass").val('false');
                } else {
                    $("#loadData").find(".has-error").empty();
                    $("#checkValidPass").val('true');
                }
            }


            $("#checkPassword").val(0);
            var emailVal = $("#checkActiveEmail").val();
            if (emailVal !== '') {

                def = $.Deferred();
                def.promise();
                def.resolve(emailVal);
                var forgetText = $("#forget-text");
                if (emailVal == 0) {
                    $("#loadData").show();
                    forgetText.html(newMessage);
                }

                //  fillPassword();
            }

            $(document).ready(function () {
                if ($("#checkActiveEmail").val() == 0) {
                    $("#checkActiveEmail").val(1);
                }

                $("#loadData").hide();
                $('.check-option').val("false");
                $("#checkValidPass").val("true");
                // when User go back agian
                //disable form loaddata when focus in email input
                //check email in vietnamwork when focus out email input
                $('#inputEmail').on('input', function () {
                    checkEmailExistVNW();
                });
            });

            function registerAccountVNW()
            {
                $('#passLoading').show();
                $('#applyButton').attr('disabled', 'disabled');
                $.ajax({
                    url: "<?php echo base_url('/vitalify/registerAccountVNW'); ?>",
                    type: 'POST', data: {'email': $("#inputEmail").val(),
                        'password': $("#inputPassword").val(),
                        'firstname': $("#inputFName").val(),
                        'lastname': $("#inputLName").val(),
                        'genderid': $("#inputGender").val()},
                    dataType: "json",
                    success: function (response) {
                        if (response == true) {

                            fixSubmit();
                            $('#passLoading').hide();
                        } else {
                            $('#applyButton').removeAttr('disabled');
                            alert(response);
                            fixSubmit();

                        }
                    }
                }); //end load ajax
            }

            function vaidateBeforeSubmit(e) {
                e.preventDefault();
                if (typeof (def) != "undefined") {
                    // console.log($("#checkActiveEmail").val());
                    def.done(function (result) {
                        var activeEmail = $("#checkActiveEmail").val();
                        // console.log(activeEmail + " done");
                        //  console.log($("#checkPassword").val());
                        //  console.log($("#vitalify").valid());
                        if ($("#checkActiveEmail").val() == 0) { //password null with new account
                            if ($("#checkValidPass").val() == 'true' && $("#vitalify").valid() == true) {
                                registerAccountVNW();
                            } else {
                                checkPasswordNull();
                            }
                        } else if ($("#vitalify").valid() == true) { //active account
                            $('#passLoading').show();
                            fixSubmit();

                        }

                    });
                } // end of undefined
            }

            function fixSubmit() {
                var form = $("#vitalify");
                form.removeAttr('onsubmit');
                form.submit();
                $('#applyButton').attr('disabled', 'disabled');
                $('#passLoading').hide();
            }
            //-----------------------------------------------------------------------------------------------//
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