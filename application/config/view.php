<?php
$jobApply = $job->job_url->vn;
/*
  $jobApply = str_replace("vietnamworks.com/", "vietnamworks.com/jobs/apply-job-online/", $job->job_url->vn);
  if(strpos($job->job_url->vn, "-jv")){
  $jobApply = substr($jobApply, 0, strpos($jobApply, "-jv"));
  }
 */
?>

<!-- Job details -->
<div class="panel">
    <div class="panel-heading"><h2><span class="glyphicon glyphicon-briefcase"></span> <?php echo $this->lang->line("job_detail") ?></h2></div>
    <div class = "panel-body">
        <div class="row dotted_underline">
            <h1 class="job_title mb10 txtRed" itemprop="title"><?php echo $job->job_detail->job_title ?></h1>
            <div class="col-md-7">

                <p class="txtBlack mt10"><strong><?php echo $job->job_company->company_name ?></strong> <br>
                    <?php echo $job->job_company->company_address ?></p>
                <!--
                <div class="mb10">
                    <a href="#"><span class="glyphicon glyphicon-bookmark"></span> Lưu việc làm này</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> Gửi email việc làm tương tự</a></div>
                -->

            </div>
            <div class="col-md-1"><img src="<?php echo base_url("static/img/vnw_arrow.png") ?>" width="51" height="42"  alt="" class="visible-md visible-lg pull-right"/></div>
            <div class="col-md-4">
                <div class="col-sm-4 apply" align="right" style="width:100%">
                    <a href="javascript:scrollToAnchor('applyForm');" class="follow_bar_applylink_2" style="color:#797979"> Nộp đơn trong 1 bước! <i class="fa fa-arrow-down txtRed" style="font-size:35px"></i></a>
                </div>

                <!--div class="fs12" align="center">(Mẫu nộp đơn phía dưới đây)</div> -->
            </div>
        </div>
        <!-- Skills -->


        <?php if (isset($job->job_detail->skills) && count($job->job_detail->skills) > 0) : ?>
            <div class="row skills">
                <?php $i = 0; ?>
                <?php foreach ($job->job_detail->skills as $skill) { ?>
                    <a href="<?php echo site_url() . "kw/" . str2alias($skill->skillName, false); ?>" style="color:#555">
                        <span class="tag-skill">
                            <?php echo $skill->skillName; ?>
                        </span>
                    </a>
                    <?php
                }
                ?>
            </div>
        <?php endif; ?>
        <!-- Benefits -->



        <?php if (isset($job->job_summary->benefits) && count($job->job_summary->benefits) > 0) : ?>
            <div class="row benefits">
                <h3>Phúc lợi</h3>
                <ul>
                    <?php foreach ($job->job_summary->benefits as $benefit) { ?>
                        <li>
                            <span class="fa fa-fw <?php echo $benefitIcon[$benefit->benefitId]; ?>"></span>&nbsp;<?php echo $benefit->benefitValue; ?>
                        </li>

                    <?php } ?>
                </ul>
            </div>
        <?php endif; ?>
        <div>
            <p itemprop="description">
                <strong class="fs18"><?php echo $this->lang->line("job_description"); ?></strong><br>
                <span itemprop="description"><?php echo nl2br($job->job_detail->job_description) ?></span>
                <br><br><strong class="fs18"><?php echo $this->lang->line("job_requirement"); ?></strong><br>
                <span itemprop="experienceRequirements"><?php echo nl2br($job->job_detail->job_requirement); ?></span>
            </p>
        </div>
    </div>
</div>
<!--job details -->

<!--employer -->
<div class = "panel">
    <div class = "panel-heading"><h2><span class = "glyphicon glyphicon-info-sign"></span> <?php echo $this->lang->line("recruiters"); ?></h2></div>
    <div class = "panel-body">
        <p>
            <strong><?php echo $job->job_company->company_name ?> </strong><br>
            <span itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="addressLocality"><?php echo $job->job_company->company_address ?>
                    </span>
                </span>
            </span>
            <br>
            <br>
            <?php echo $this->lang->line("contact_person"); ?>: <strong><?php echo $job->job_company->contact_person ?></strong><br>
            <?php echo $this->lang->line("company_size"); ?>: <strong><?php echo $job->job_company->company_size ?></strong><br>
            <br>
            <?php echo nl2br($job->job_company->company_profile) ?>
        </p>
    </div>
</div>
<!-- /employer -->

<div class = "panel">


    <!-- Form -->
    <a name="applyForm" id="applyForm"></a>
    <div class="panel-heading"><h2>Nộp đơn chỉ trong 1 bước!</h2></div>
    <div class="panel-body">
        <div align="right" class="img-vnw"><span class="small">Supported by </span><img src="<?php echo base_url("static/img/vnw_logo_small.png") ?>" width="36%"  alt=""/></div>
        <div class="clear"></div>
        <br>
        <form id="frmSignUp" class="form-horizontal" role="form" action="" method="post" onsubmit="return vaidateBeforeSubmit(event)" novalidate="novalidate" enctype="multipart/form-data">
            <div class="form-group ">

                <label for="inputFirstName" class="col-sm-2 control-label">*Họ Tên</label>
                <div class="col-sm-5 input-container">
                    <input type="text" rel="requiredField" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="Họ"
                           value="<?php
                           if (($this->session->userdata('userInfo'))) {

                               $user = $this->session->userdata('userInfo');
                               echo $user->profile->last_name;
                           }
                           ?>">
                    <div class="has-error"></div>
                </div>
                <div class="col-sm-5 input-container">
                    <input type="text"  rel="requiredField" class="form-control" id="inputLastName" name="inputLastName" placeholder="Tên"
                           value="<?php
                           if (($this->session->userdata('userInfo'))) {

                               $user = $this->session->userdata('userInfo');
                               echo $user->profile->first_name;
                           }
                           ?>">
                    <div class="has-error"></div>
                </div>

            </div>

            <div class="form-group ">

                <label for="inputEmail" class="col-sm-2 control-label">*E-mail</label>
                <div class="col-sm-5 input-container">
                    <?php
                    if (($this->session->userdata('userInfo'))) {

                        $user = $this->session->userdata('userInfo');
                        ?>
                        <input type = "text" rel = "requiredField" class = "form-control" onkeyup = "checkEmailExistVNW()" id = "inputEmail" name = "inputEmail" placeholder = "E-mail" value = "<?php echo $user->profile->email; ?>" disabled = "true">
                    <?php } else {
                        ?>
                        <input type="text" rel="requiredField" class="form-control" onkeyup="checkEmailExistVNW()" id="inputEmail" name="inputEmail" placeholder="E-mail"
                               value="">

                    <?php } ?>

                    <div class="has-error"></div>
                </div>

            </div>

            <div style="position: relative; bottom: 42px; left: 430px; margin-bottom: -21px"><img id="passLoading" style="display: none" alt="" src="<?php echo base_url("static/img/ajax_loading.gif"); ?>" />&nbsp;</div>

            <div class="form-group " id="loadData" style="">
                <div id="login-vnw">
                    <div class="tooltip-arrow"></div>
                    <label class="col-sm-10" id="forget-text"></label>
                    <div class="col-sm-12 input-container">
                        <div class="col-sm-6">
                            <input style="display:none" />
                            <input type="password" rel="requiredField" class="form-control" onkeyup="checkPasswordVNW()" id="inputPassword" name="inputPassword" placeholder="Mật khẩu" value="" />
                        </div>
                        <div class="has-error" style="margin-top: 5px;">
<!--                                <span for="inputPassword" class="has-error" style="font-size: 10pt;"></span>-->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden"  data-toggle="modal" data-target="#myModal" id="myButtonForgot" >

                    <div id="forgotPass" style="display:none;color:blue !important;text-align: right;margin-right:20px;"><a  style="color:blue !important;cursor:pointer" onclick='forgotPassword(event)'>Quên mật khẩu</a></div>
                </div>
            </div>
            <div class="form-group ">
                <label for="inputResume" class="col-sm-2 control-label">*Resume</label>
                <div class="col-sm-5 dropdown-resume">
                    <select class="form-control" id="resume-selector" name="resume-selector">
                        <option value="defaultCV">Sử dụng online resume để nộp</option>
                        <option value="attachCV">Sử dụng resume đính kèm để nộp</option>
                    </select>
                </div>
            </div>

            <div class="form-group colors" id="attachCV" style="display:none">
                <div class="col-sm-2 input-container"></div>
                <div class="col-sm-10 input-container">

                    <?php if (($this->session->userdata('userInfo'))) { //user login  ?>
                        <div class="radio saved-resume">
                            <label>
                                <div class="col-sm-3">
                                    <input class="editable" tabindex="5" type="radio" name="resumeApply" id="optionsRadios1" value="currentResume"> Dùng hồ sơ cũ
                                </div>
                                <div class="col-sm-9 preview-cv" style="display:none">
                                    <?php if (isset($dataCV['nameresume']) && $dataCV['nameresume']!="") { ?>
                                        <input type="hidden" name="checkOldCV" id="checkOldCV" value="true" />
                                        <span class="ok glyphicon glyphicon-ok"></span>
                                        <span class="resume-name" ><?php echo (isset($dataCV['nameresume'])) ? $dataCV['nameresume'] : "Bạn chưa có hồ sơ" ?></span>
                                    <?php } else { ?>
                                        <input type="hidden" name="checkOldCV" id="checkOldCV" value="false" />
                                        <span class="no-resume-warning">Không có hồ sơ của bạn tại JapanWork, vui lòng tải một hồ sơ mới.</span>
                                    <?php } ?>

                                </div>
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <div class="col-sm-3">
                                    <input class="editable" tabindex="7" type="radio" name="resumeApply" id="optionsRadios2" value="newAttachment" checked> Tải hồ sơ mới
                                </div>
                                <div class="col-sm-9">
                                    <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE_FOR_JOBS; ?>" />
                                    <span class="upload-button">
                                        <input class="editable left" type="file" name="inputFile" id="inputFile" value="Đính kèm hồ sơ" tabindex="8" rel="requiredField" placeholder="Your resume">
                                        <span class="small">(định dạng .doc, .docx, .pdf nhỏ hơn 512KB)</span>
                                    </span>
                                    <div class="has-error"></div>
                                </div>

                            </label>
                        </div>
                    <?php } else { ?>

                        <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE_FOR_JOBS; ?>" />
                        <input type="file" class="left" rel="requiredField" id="inputFile" name="inputFile"  placeholder="Your resume" />


                        <span class="small">(định dạng .doc, .docx, .pdf nhỏ hơn 512KB)</span>
                        <div class="has-error"></div>


                    <?php } ?>
                </div>

            </div>
            <?php if (isset($uploadError) && $uploadError['upload_error'] == true) { ?>
                <div class="form-group has-error">
                    <label class="col-sm-2 control-label has-error">Error.</label>
                    <div class="col-sm-10">
                        <label class="radio-inline has-error"><?php echo $errorUpload; ?></label>
                    </div>
                </div>
            <?php } ?>





            <br>

            <div class="form-group colors" id="defaultCV" style="">
                <div class="col-sm-12 input-container">
                    <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                    <?php if (isset($dataCV['nameresumeonline']) && $dataCV['nameresumeonline']!="") { ?>
                                        <input type="hidden" name="checkOnlineResume" id="checkOnlineResume" value="true" />
                                        <span class="ok glyphicon glyphicon-ok"></span>
                                        <span class="resume-name" ><?php echo $dataCV['nameresumeonline']; ?></span>
                                    <?php } else { ?>
                                    <input type="hidden" name="checkOnlineResume" id="checkOnlineResume" value="false" />
                                         <span>Bạns cần phải tạo online resume </span>
                        <a href="<?php echo site_url("account") ?>" class="btn_createCV">Tạo resume</a>
                                    <?php } ?>

                        

                    </div>
                </div>

            </div>
            <br>
            <input type="hidden"  id="checkPassword"  name="checkPassword" value="0" />
            <input type="hidden" name="checkOption" class="check-option" value="false" />
            <input type="hidden" name="checkActiveEmail" id="checkActiveEmail" value="" />
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" id="isSent" name="isSent" value="OK" />
                    <button onclick="ga('send', 'event', 'apply', 'click', 'applyindescription');" type="submit"  id="applyButton" value="upload" class="btn btn-red btn-lg" style="min-width:40%">Nộp đơn</button>&nbsp;&nbsp;&nbsp;

                </div>
                <div style="text-align:center"><br/>*Nhấp chọn "Nộp đơn", tôi đã đọc và đồng ý với các <a href="<?php echo base_url("about/term") ?>" target="_blank">Thỏa thuận sử dụng</a>.</div>
            </div>

        </form>

    </div>
    <!-- /Form -->
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div id="popup-password">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <div class="imageLogo" >
                        <table>
                            <tr><td><img src="<?php echo base_url("static/img/power_vnw.png") ?>" width="180" height="54" alt="" ></td><td><img src="<?php echo base_url("static/img/logo.jpg") ?>" width="313" height="85" ></td></tr>
                        </table>

                    </div>
                </div>
                <div class="modal-body">
                    VietnamWorks đã gửi một e-mail để thiết lập lại mật khẩu của bạn.<br/>
                    1. Mở e-mail và thiết lập lại mật khẩu trong Vietnamworks<br/>
                    2. Hãy quay lại trang này và sử dụng với mật khẩu mới
                    <div style="text-align: center">Cảm ơn!</div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--! Modal -->
<div id="topApply">
    <div class="container">

        <div class="row">
            <div class="col-md-6 slidebar-top" ><p class="job_title txtRed" itemprop="title"><?php echo $job->job_detail->job_title ?></p></div>

            <div class="col-sm-4 apply" align="right"><a href="javascript:scrollToAnchor('applyForm');" class="follow_bar_applylink" style="color:#797979">Nộp đơn trong 1 bước! <i class="fa fa-arrow-down txtRed" style="font-size:35px"></i></a></div>
            <!--            <div class="col-md-3 top-text-apply" align="right">(Việc làm từ Vietnamworks)</div>
                        <div class="col-md-3">
                            <a onclick="onclick="ga('send','event','JAPAN+WORK', 'CLICK+APPLY+NOW', '<?php echo $job->job_detail->job_id; ?>');"  href="<?php echo(setLinkVNWorks($jobApply)); ?>" class="btn btn-orange w100p" ><?php echo $this->lang->line("apply"); ?></a>
                        </div>-->
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url("static/css/applyform.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("static/css/font-awesome.min.css"); ?>">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url("static/js/jquery-2.1.1.min.js") ?>" ></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url("static/js/bootstrap.min.js"); ?>"></script>

<!-- heapanalytics --><?php /*
              <script type="text/javascript">
              window.heap = window.heap || [], heap.load = function (t, e) {
              window.heap.appid = t, window.heap.config = e;
              var a = document.createElement("script");
              a.type = "text/javascript", a.async = !0, a.src = ("https:" === document.location.protocol ? "https:" : "http:") + "//cdn.heapanalytics.com/js/heap-" + t + ".js";
              var n = document.getElementsByTagName("script")[0];
              n.parentNode.insertBefore(a, n);
              for (var o = function (t) {
              return function () {
              heap.push([t].concat(Array.prototype.slice.call(arguments, 0)))
              }
              }, p = ["clearEventProperties", "identify", "setEventProperties", "track", "unsetEventProperty"], c = 0; c < p.length; c++)
              heap[p[c]] = o(p[c])
              };
              heap.load("1726761437");
              </script>
             */ ?>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<script type="text/javascript">
                        $("input[type=radio][name=resumeApply]").click(function () {
                            var value = $(this).val();

                            if (value == "newAttachment") {

                                $('.preview-cv').hide();

                                $("#inputFile").rules("add", {
                                    required: true,
                                    extension: "pdf|doc|docx",
                                    filesize: true,
                                    messages: {
                                        required: "Vui lòng đính kèm hồ sơ.",
                                        extension: "Định dạng file không hỗ trợ."
                                    }
                                });
                            } else {

                                $("#inputFile").rules("remove");

                                $('.preview-cv').show();
                            }
                        });
                        //custom validation rule
                        $.validator.addMethod("customemail",
                                function (value, element) {

                                    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                                },
                                "<?php echo "Vui lòng nhập email." ?>"
                                );
                        $.validator.addMethod("custompassword",
                                function (value, element) {

                                    var email = $("#inputEmail").val();
                                    var arr = email.split('@');
                                    if ((arr[0] == $("#inputPassword").val()) || (email == $("#inputPassword").val()))
                                        return false;
                                    else
                                        return true;
                                },
                                "<?php echo "Mật khẩu không đủ mạnh." ?>"
                                );
                        $.validator.addMethod("customephone",
                                function (value, element) {
                                    return /^[0-9().-]+$/.test(value);
                                },
                                "Vui lòng nhập số điện thoại."
                                );
                        $.validator.addMethod("filesize",
                                function (value, element) {


                                    if ($(element).attr('type') == "file" && ($(element).hasClass('required') || element.files.length > 0)) {
                                        var size = 0;
                                        var $form = $(element).parents('form').first();
                                        var $fel = $form.find('input[type=file]');
                                        var $max = $form.find('input[name=maxFileSize]').first();
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
                        $("#frmSignUp").validate({
                            rules: {
                                inputFirstName: {
                                    required: true
                                },
                                inputLastName: {
                                    required: true
                                },
                                inputEmail: {
                                    required: true,
                                    customemail: true
                                },
                                inputPassword: {
                                    required: true,
                                    minlength: 4,
                                    maxlength: 20,
                                    custompassword: true
                                }, inputFile: {
                                    required: true,
                                    extension: "pdf|doc|docx",
                                    filesize: true
                                },
                                inputPhone: {
                                    required: false,
                                    customephone: false
                                },
                                itExp: {
                                    required: false
                                },
                                jpLevel: {
                                    required: false
                                },
                                managerExp: {
                                    required: false
                                }
                            },
                            messages: {
                                inputFirstName: {
                                    required: "Vui lòng nhập Họ."
                                },
                                inputLastName: {
                                    required: "Vui lòng nhập Tên."
                                },
                                inputEmail: {
                                    required: "Vui lòng nhập email."
                                },
                                inputPassword: {
                                    required: "Vui lòng nhập password.",
                                    minlength: "Mật khẩu phải từ 4 đến 20 kí tự.",
                                    maxlength: "Mật khẩu phải từ 4 đến 20 kí tự."
                                },
                                inputPhone: {
                                    required: "Vui lòng nhập số điện thoại."
                                },
                                inputFile: {
                                    required: "Vui lòng đính kèm hồ sơ.",
                                    extension: "Định dạng file không hỗ trợ."
                                },
                                itExp: {
                                    required: "Please choose it experience."
                                },
                                jpLevel: {
                                    required: "Please choose japan level."
                                },
                                managerExp: {
                                    required: "Please ch0ose managerment."
                                }
                            },
                            errorClass: "has-error-load",
                            errorElement: "span",
                            errorPlacement: function (error, element) {
                                element.parents("div.input-container").find(".has-error").append(error);
                            }
                        });
                        //---------------------action to check email and password------------------------------------------------//
                        var def;
                        var emailTimeout;
                        var passTimeout;
                        var local = {};
                        var secret = "X2{mY@T;v.zgTPs";
                        var currentEmail;
                        var newMessage = "Vui lòng thiết lập mật khẩu để nộp đơn.<br />Bạn sẽ đăng ký tài khoản ở JapanWorks và VietnamWorks.";
                        var existMessage = "Bạn có tài khoản ở Vietnamwork!<br />Nhập mật khẩu VietnamWorks của bạn.";
                        function fillPassword() {

                            var email = $("#inputEmail").val();
                            var passEl = $("#inputPassword");
                            if (typeof (Storage) !== "undefined" && typeof (local[email]) !== "undefined") {
                                passEl.val(CryptoJS.AES.decrypt(local[email], secret).toString(CryptoJS.enc.Utf8));
                                checkPasswordVNW("Mật khẩu đã bị thay đổi, vui lòng nhập lại");
                            } else {
                                passEl.val("");
                                $("#loadData").find(".has-error").empty();
                            }
                        }

                        function savePassword() {

                            local[$("#inputEmail").val()] = CryptoJS.AES.encrypt($("#inputPassword").val(), secret).toString();
                            if (typeof (Storage) !== "undefined") {
                                local.currentEmail = $("#inputEmail").val();
                                localStorage.jpw = JSON.stringify(local);
                            }
                        }

                        if (typeof (Storage) !== "undefined" && typeof (localStorage.jpw) !== "undefined") {
                            local = JSON.parse(localStorage.jpw);
                        }

                        $("#checkPassword").val(0);
                        var emailVal = $("#checkActiveEmail").val();
                        if (emailVal !== '') {
                            $("#loadData").show();
                            def = $.Deferred();
                            def.promise();
                            def.resolve(emailVal);
                            var forgetText = $("#forget-text");
                            if (emailVal == 1 || emailVal == 3) {
                                forgetText.html(existMessage);
                            } else {
                                forgetText.html(newMessage);
                            }

                            fillPassword();
                        }

                        $(document).ready(function () {

                            $('.check-option').val("false");
                            // when User go back agian

                            if ($("#checkActiveEmail").val() == 1 && $("#checkPassword").val() == 1) {

                            }
                            //disable form loaddata when focus in email input
                            //check email in vietnamwork when focus out email input
                            //check password when focus out password input

                            $('#inputEmail').on('input', function () {
                                checkEmailExistVNW();
                            });
                        });
                        function checkPasswordVNW(msg) {

                            if ($("#checkActiveEmail").val() == "1" && $("#inputPassword").val() !== "") {
                                $('#passLoading').show();
                                $('#applyButton').attr('disabled', 'disabled');
                                clearTimeout(passTimeout);
                                passTimeout = setTimeout(function () {
                                    $.ajax({
                                        url: "<?php echo base_url('/jobs/checkLogin'); ?>",
                                        type: 'POST',
                                        data: {'email': $("#inputEmail").val(), 'password': $("#inputPassword").val()},
                                        dataType: "json",
                                        success: function (response) {

                                            if (response == true) { //if login is correct
                                                $("#forgotPass").hide();
                                                $("#checkPassword").val(1);
                                                $("#loadData").find(".has-error").empty();
                                                $("#loadData").find(".has-error").append("<img alt='tick' src='<?php echo base_url('static/img/tick.png'); ?>' style='width: 15px' /><span class='textPass' style='color: #555 !important; margin-left: 5px !important'>Đúng mật khẩu</span>");
                                            } else { //login not correct
                                                $("#forgotPass").show();
                                                $("#checkPassword").val(0);
                                                $("#loadData").find(".has-error").empty();
                                                var email = $("#inputEmail").val();
                                                if (typeof (msg) !== "undefined") {
                                                    $("#loadData").find(".has-error").append("<img alt='error' src='<?php echo base_url('static/img/error.png'); ?>' style='width: 15px' /><span class='textPass' style='margin-left: 5px !important'>" + msg + "</span>");
                                                    delete local[email];
                                                    localStorage.jpw = JSON.stringify(local);
                                                } else {
                                                    if ($("#inputPassword").valid() === true)
                                                        $("#loadData").find(".has-error").append("<img alt='error' src='<?php echo base_url('static/img/error.png'); ?>' style='width: 15px' /><span class='textPass' style='margin-left: 5px !important'>Sai mật khẩu. </span>");
                                                }
                                            }

                                            $('#passLoading').hide();
                                            $('#applyButton').removeAttr('disabled');
                                        }
                                    }); //end load ajax
                                }, 1000);
                            }
                            else {
                                $("#loadData").find(".has-error").empty();
                                clearTimeout(passTimeout);
                                $('#passLoading').hide();
                                $('#applyButton').removeAttr('disabled');
                            }
                        }

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
                                            $("#loadData").show();
                                            if (response == "ACTIVATED") {
                                                $("#checkActiveEmail").val(1);
                                                forgetText.html(existMessage);
                                                $("#forgotPass").show();
                                            } else if (response == "NON_ACTIVATED") {
                                                $("#forgotPass").hide();
                                                $("#checkActiveEmail").val(3);
                                                forgetText.html(existMessage);
                                            } else {
                                                $("#forgotPass").hide();
                                                $("#checkActiveEmail").val(0);
                                                forgetText.html(newMessage);
                                            }

                                            $('#passLoading').hide();
                                            $('#applyButton').removeAttr('disabled');
                                            fillPassword();
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
                                $("#forgotPass").hide();
                                $("#checkPassword").val(0);
                                forgetText.html("");
                                clearTimeout(emailTimeout);
                                $('#passLoading').hide();
                                $('#applyButton').removeAttr('disabled');
                                currentEmail = null;
                            }

                        }

                        function forgotPassword(e)
                        {

                            $.ajax({
                                url: "<?php echo base_url('/jobs/resendPassword'); ?>",
                                type: 'POST', data: {'email': $("#inputEmail").val()},
                                dataType: "json",
                                success: function (response) {
                                    if (response == true) {
                                        $('#myButtonForgot').trigger('click');
                                    } else {
                                        alert('resend false');
                                        alert(response);
                                    }
                                }
                            }); //end load ajax
                        }

                        function checkPasswordLogin() {

                            if ($("#checkActiveEmail").val() == "1" && $("#inputPassword").valid() === true) {
                                $.ajax({
                                    url: "<?php echo base_url('/jobs/checkLogin'); ?>",
                                    type: 'POST',
                                    data: {'email': $("#inputEmail").val(), 'password': $("#inputPassword").val()},
                                    dataType: "json",
                                    success: function (response) {
                                        if (response == true) {
                                            $("#forgotPass").hide();
                                            $("#checkPassword").val(1);
                                            $("#loadData").find(".has-error").empty();
                                            $("#loadData").find(".has-error").append("<span class='textPass'>Đúng mật khẩu. </span>");
                                        } else {  //login not correct
                                            $("#forgotPass").show();
                                            $("#checkPassword").val(0);
                                            $("#loadData").find(".has-error").empty();
                                            $("#loadData").find(".has-error").append("<span class='textPass'>Sai mật khẩu. </span>");
                                        }
                                    }
                                }); //end load ajax
                            }
                        }

                        function showPassworkForm(e) {

                            if ($("#checkActiveEmail").val() == "1") {
                                $("#loadData").show();
                            }
                        }

                        function vaidateBeforeSubmit(e) {

                            e.preventDefault();
                            console.log('sssssszzzzaaa');   
                            if (typeof (def) != "undefined") {

                                console.log($("#checkActiveEmail").val());
                                def.done(function (result) {
                                    var activeEmail = $("#checkActiveEmail").val();
                                    console.log(activeEmail + " done");
                                    if (($("#resume-selector").val() =="defaultCV" && $("#checkOnlineResume").val()=="true")|| $("#resume-selector").val() =="attachCV") {
                                    if (((activeEmail == 1 && $("#checkPassword").val() == 1) || activeEmail != 1) && $("#frmSignUp").valid() == true) {
                                        savePassword();
                                        fixSubmit();
                                    }
                                    }
                                });
                            } // end of undefined
                            else {
                            
                            
                            console.log('vvvvv '+ $("#resume-selector").val() +'  '+ $("#checkOnlineResume").val());   
                            if ($("#resume-selector").val() =="defaultCV" && $("#checkOnlineResume").val()=="true"){
                            if ($("#frmSignUp").valid() == true) {

                                        fixSubmit();
                                    }
                            }else if($("#resume-selector").val() =="attachCV"){
                            if ($("#checkOldCV").val() == "false"
                                        && ($("input[name='resumeApply']:checked").val() == "currentResume")) {


                                }
                                else {

                                    if ($("#frmSignUp").valid() == true) {

                                        fixSubmit();
                                    }
                                }
                            
                            }
                            }
                            

                            

                        }

                        function fixSubmit() {
                            var form = $("#frmSignUp");
                            form.removeAttr('onsubmit');
                            form.submit();
                            $('#applyButton').attr('disabled', 'disabled');
                        }

                        //---------------------------------------------------------------------//
                        function scrollToAnchor(aid) {
                            var aTag = $("a[name='" + aid + "']");
                            $('html,body').animate({scrollTop: aTag.offset().top}, 'slow', function () {
                                $("#topApply").hide();
                            });
                        }



                        function showTab(id) {
                            $('#myTab a[href="' + id + '"]').tab('show')
                        }

                        function showTopApply() {
                            var sTop = $(document).scrollTop();
                            if (sTop >= 400) {
                                $("#topApply .job-title h1 strong").attr("class", "txtRed");
                                $("#topApply").show();
                            }
                            else {
                                $("#topApply .job-title h1 strong").attr("class", "txtGreen");
                                $("#topApply").hide();
                            }
                        }


                        $(function () {
                            $(window).scroll(function () {
                                showTopApply();
                            });
                        });


                        $(function () {
                            $('#resume-selector').change(function () {
                                $('.colors').hide();
                                $('#' + $(this).val()).show();
                            });
                        });
                        function scrollToAnchor(aid) {
                            var aTag = $("a[name='" + aid + "']");
                            $('html,body').animate({scrollTop: aTag.offset().top}, 300);
                        }
                        $(function () {
                        });

</script>
