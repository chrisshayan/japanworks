

<div class="row">
    <div class="col-sm-12">
        <!-- form -->
        <div class="panel">
            <div class="panel-heading"><h2>Đăng ký thành công</h2></div>
            <div class="panel-body form-block">

                <div class="success-register">
                    <?php echo $descriptionSuccessPage; ?>
                </div>

                <div class="title">
                    <h3>Đăng nhập với tài khoản VietnamWorks/JapanWorks</h3>
                    <div>
                        <img class="vnw" src="<?php echo base_url("static/img/vnw_logo.png") ?>" alt="vietnamworks">
                        <img class="jpw" src="<?php echo base_url("static/img/logo.jpg") ?>" alt="japanworks">
                    </div>
                </div>
                <form class="form-horizontal" role="form" id="frmSignUp" method="post">
                    <input type="hidden" name="redirectURL" value="">

                    <input type="hidden" name="jobidforjobdetail" value="">
                    <input type="hidden" name="remember" value="1">
                    <input type="hidden" name="hidcode" value="">
                    <div class="form-group has-error">

                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">

                            <span for="inputPassword" class="show-message"><?php if ($msg != '') echo($msg); ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="inputEmail" value="<?php if (isset($myData['inputEmail'])) echo $myData['inputEmail']; ?>" name="inputEmail" placeholder="<?php echo $this->lang->line("input_email") ?>"
                                   <span for="inputEmail"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-3 control-label"><?php echo $this->lang->line("password") ?></label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="inputPassword" value="<?php if (isset($myData['inputPassword'])) echo $myData['inputPassword']; ?>" name="inputPassword" placeholder="<?php echo $this->lang->line("input_password") ?>">
                            <span for="inputPassword"></span>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            <button type="submit" id="applyButton" name="login"  value="Sign In"  class="btn btn-orange btn-lg">Xác nhận</button>
                        </div>
                        <div class="col-sm-3 forgot-password">
                            <a href="<?php echo site_url('login/forgotPassword'); ?>" title="Quên mật khẩu?">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
<script type="text/javascript">
//custom validation rule
    $.validator.addMethod("customemail",
            function (value, element) {
                return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
            },
            "<?php echo $this->lang->line("error_email_valid") ?>"
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
    $("#frmSignUp").validate({
        rules: {
            inputEmail: {
                required: true,
                customemail: true
                        //                ,
                        //                remote: {
                        //                    url: "http://staging.vietnamworks.com/sign-up",
                        //                    type: "post",
                        //                    data: {
                        //                        txtEmail: function() {
                        //
                        //                            return $("#txtEmail").val();
                        //                        },
                        //                        chkEmail: '1'
                        //                    }
                        //                }
            },
            inputPassword: {
                required: true,
                minlength: 4,
                maxlength: 20,
                custompassword: true

            }
        },
        messages: {
            inputEmail: {
                required: "<?php echo $this->lang->line("error_email_empty") ?>",
                remote: jQuery.validator.format("<?php echo $this->lang->line("error_email_exist") ?>")
            },
            inputPassword: {
                required: "<?php echo $this->lang->line("error_password_empty") ?>",
                minlength: "<?php echo $this->lang->line("error_password_valid") ?>",
                maxlength: "<?php echo $this->lang->line("error_password_valid") ?>"

            }
        },
        errorClass: "error-message",
        errorElement: "span",
        highlight: function (element) {
//$(element).siblings('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
//element.addClass('glyphicon glyphicon-ok form-control-feedback').closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
            element.closest('.form-group').removeClass('has-error');

        }
    });

    $("#applyButton").click(function () {
        $('.show-message').empty();
    });
    function vaidateBeforeSubmit(e) {

        e.preventDefault();
        if ($("#frmSignUp").valid() == true) {

            fixSubmit();
        }
    }

    function fixSubmit() {

        var form = $("#frmSignUp");
        form.removeAttr('onsubmit');
        form.submit();

        $('#applyButton').attr('disabled', 'disabled');
    }




</script>
