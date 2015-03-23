<div><img src="<?php echo base_url("static/img/register_banner.jpg") ?>" width="100%"  alt="" class="round-img-bnr"/></div>
<div class="container" id="section2">
    <div class="row">

        <!-- search -->
        <div class="panel">
            <div class="panel-heading"><h2>ĐĂNG KÝ TÀI KHOẢN</h2></div>
            <div class="panel-body">

                <form id="frmSignUp" class="form-horizontal" onsubmit="return vaidateBeforeSubmit(event)"  role="form" action="<?php echo base_url(); ?>register/index" method="post" novalidate="novalidate">
                    <div class="form-group">
                        <label for="inputFirstName" class="col-sm-3 control-label"><?php echo $this->lang->line("full_name") ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="<?php echo $this->lang->line("first_name") ?>"
                                   value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['firstname']; ?>">
                            <span for="inputFirstName"></span>
                        </div>
                        <div class="col-sm-4 form-group">
                            <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="<?php echo $this->lang->line("last_name") ?>"
                                   value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['lastname']; ?>">
                            <span for="inputLastName"></span>
                        </div>
                    </div>


                    <div class="form-group  <?php
                    if (isset($messageError) && $messageError['message_error'] == true) {
                        echo "has-error";
                    }
                    ?>">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
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
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="inputPassword3" name="inputPassword3" placeholder="<?php echo $this->lang->line("input_password") ?>">
                            <span for="inputPassword3"></span>
                        </div>
                    </div>


                    <!-- -->
                    <div class="form-group">
                        <label for="jp_level" class="col-sm-3 control-label"><?php echo $this->lang->line("japanese_level") ?></label>
                        <div class="col-sm-8">
                            <select class="form-control" id="jp_level"  name="jp_level" >
                                <option value="0"><?php echo $this->lang->line("beginner_lv") ?></option>
                                <option value="1"><?php echo $this->lang->line("intermediate_lv") ?></option>
                                <option value="2"><?php echo $this->lang->line("advanced_lv") ?></option>
                                <option value="3"><?php echo $this->lang->line("fluent_lv") ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="industry" class="col-sm-3 control-label"><?php echo $this->lang->line("job_category") ?></label>
                        <div class="col-sm-8">
                            <select class="form-control" id="industry" name="industry">

                                <option value="0" selected="selected" disabled="disabled">Tất cả ngành nghề</option>
                                <?php foreach ($this->_categories as $catId => $category): ?>
                                    <option value="<?php echo $catId ?>"><?php echo $category[$this->_langdb] ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exp" class="col-sm-3 control-label"><?php echo $this->lang->line("job_exp") ?></label>
                        <div class="col-sm-8">
                            <select class="form-control" id="exp" name="exp">
                                <option value="0" ><?php echo $this->lang->line("under_one_year_exp") ?></option>
                                <option value="1" ><?php echo $this->lang->line("one_year_exp") ?></option>
                                <option value="2"><?php echo $this->lang->line("two_year_exp") ?></option>
                                <option value="3"><?php echo $this->lang->line("three_year_exp") ?></option>
                                <option value="4"><?php echo $this->lang->line("over_five_year_exp") ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
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
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" id="applyButton" class="btn btn-orange"><?php echo $this->lang->line("register") ?></button>
                        </div>
                    </div>
                    <!-- -->
                    <div class="col-sm-offset-3 col-sm-8">
                        <p class="small"><?php echo $this->lang->line("note_for_register_1"); ?>
                            <a href="<?php echo site_url("about/term"); ?>"><?php echo $this->lang->line("note_for_register_2"); ?>
                                <a href="<?php echo site_url("about/privacy"); ?>"><?php echo $this->lang->line("note_for_register_3"); ?>
                                    </div>
                                    <!-- -->
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
                                maxlength: 20

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

