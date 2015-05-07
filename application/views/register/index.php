<div class="container" id="section2">
    <div class="row">
        <div class="col-sm-12">
            <!-- form -->
            <div class="panel">
                <div class="panel-heading"><h2>ĐĂNG KÝ</h2></div>
                <div class="panel-body form-block">

                    <div class="title">
                        <h3>Đăng ký tài khoản VietnamWorks/JapanWorks</h3>
                        <div>
                            <img class="vnw" src="<?php echo base_url("static/img/vnw_logo.png") ?>" alt="vietnamworks">
                            <img class="jpw" src="<?php echo base_url("static/img/logo.jpg") ?>" alt="japanworks">
                        </div>
                    </div>

                    <form id="frmSignUp" class="form-horizontal" onsubmit="return vaidateBeforeSubmit(event)"  role="form" action="<?php echo base_url(); ?>register/index" method="post" novalidate="novalidate">
                        <div class="form-group">
                            <label for="inputFirstName" class="col-sm-3 control-label"><?php echo $this->lang->line("full_name") ?></label>
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="<?php echo $this->lang->line("first_name") ?>"
                                       value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['firstname']; ?>">
                                <span for="inputFirstName"></span>
                            </div>
                            <div class="col-sm-3 form-group fname">
                                <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="<?php echo $this->lang->line("last_name") ?>"
                                       value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['lastname']; ?>">
                                <span for="inputLastName"></span>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="form-group  <?php
                        if (isset($messageError) && $messageError['message_error'] == true) {
                            echo "has-error";
                        }
                        ?>">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputEmail3" name="inputEmail3" placeholder="<?php echo $this->lang->line("input_email") ?>"
                                       value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['email']; ?>">
                                <span for="inputEmail3"></span>
                                <?php if (isset($messageError) && $messageError['message_error'] === true) { ?>
                                    <span for="inputEmail3" class="test"><?php echo $this->lang->line("error_email_exist") ?> </span>
                                <?php } ?>
                                <input type="hidden" name="chkEmail" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php echo $this->lang->line("password") ?></label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="inputPassword3" name="inputPassword3" placeholder="<?php echo $this->lang->line("input_password") ?>">
                                <span for="inputPassword3"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="chkIsNewLetter" checked="checked" ><?php echo $this->lang->line("get_news_every_day") ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <!-- -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <button type="submit" id="applyButton" class="btn btn-orange"style="min-width:40%">Xác nhận</button>
                            </div>
                        </div>



                        <div class="col-sm-offset-3 col-sm-6">
                            <p class="small">
                                <?php echo $this->lang->line("note_for_register_1"); ?>
                                <a href="<?php echo site_url("about/term"); ?>"><?php echo $this->lang->line("note_for_register_2"); ?></a>
                                <a href="<?php echo site_url("about/privacy"); ?>"><?php echo $this->lang->line("note_for_register_3"); ?></a>
                        </div>
                    </form>

                </div>
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

                                    var email = $("#inputEmail3").val();
                                    var arr = email.split('@');

                                    if ((arr[0] == $("#inputPassword3").val()) || (email == $("#inputPassword3").val()))
                                        return false;
                                    else
                                        return true;

                                },
                                "<?php echo "Mật khẩu không đủ mạnh." ?>"
                                );
                        $("#frmSignUp").validate({
                            rules: {
                                inputFirstName: {
                                    required: true
                                },
                                inputLastName: "required",
                                inputEmail3: {
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
                                inputPassword3: {
                                    required: true,
                                    minlength: 4,
                                    maxlength: 20,
                                    custompassword: true

                                }
                            },
                            messages: {
                                inputFirstName: {
                                    required: "<?php echo $this->lang->line("error_firstname_empty") ?>"
                                },
                                inputLastName: {
                                    required: "<?php echo $this->lang->line("error_lastname_empty") ?>"
                                },
                                txtLastname: "<?php echo $this->lang->line("error_lastname_empty") ?>",
                                inputEmail3: {
                                    required: "<?php echo $this->lang->line("error_email_empty") ?>",
                                    remote: jQuery.validator.format("<?php echo $this->lang->line("error_email_exist") ?>")
                                },
                                inputPassword3: {
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
                                $(".test").empty();
                            }
                        });
                        $(document).ready(function () {
<?php if (isset($messageError) && $messageError['message_error'] == true) { ?>
                                $('#inputEmail3').focus();
<?php } else {
    ?>
                                $('#inputFirstName').focus();
<?php } ?>
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

