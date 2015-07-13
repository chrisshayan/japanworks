<div class="passwordBox animated fadeInDown forgot">
    <div class="text-center" style="margin-bottom:30px;"> <img class="log logo1" src="<?php echo base_url("static/img/vnw_logo.png") ?>" alt="vietnamworks"/> <img class="log logo2" src="<?php echo base_url("static/img/logo.jpg") ?>" alt="japanworks"/> </div>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">Quên mật khẩu</h2>
                <p> Vui lòng nhập Email của tài khoản. Chúng tôi sẽ gửi thông tin lấy lại mật khẩu đến Email này. </p>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <form id="form_forgetpassword" class="m-t" role="form" method="post" onsubmit="return vaidateBeforeSubmit(event)">
                            <div class="form-group">
                                <input id="email" name="email" type="email" method="post"  onkeyup = "checkEmailExistVNW()" class="form-control" placeholder="Email address" required="">
                                <img id="passLoading" style="display: none;position: absolute; top: 37px;right:20px" alt="" src="<?php echo base_url("static/img/ajax_loading.gif"); ?>" />
                                <input type="hidden" name="checkActiveEmail" id="checkActiveEmail" value="0" />
                                <span for="emailExist" class="emailExist" style="color: #ff0000!important;display: none">Email này chưa được đăng ký tại  VietnamWorks/JapanWorks.</span>
                            </div>
                            <button type="submit" id="applyButton" class="btn btn-primary block full-width m-b">Gửi mật khẩu mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
<script type="text/javascript">
//custom validation rule

                                    $.validator.addMethod("email", function (value, element) {
                                        return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                                    },
                                            "Địa chỉ email không hợp lệ."
                                            );
                                    $("#form_forgetpassword").validate({
                                        rules: {
                                            email: {
                                                required: true,
                                            }
                                        },
                                        messages: {
                                            email: {
                                                required: 'Vui lòng nhập địa chỉ email.',
                                            }
                                        },
                                    });

                                    function vaidateBeforeSubmit(e) {

                                        e.preventDefault();
                                        if ($("#form_forgetpassword").valid() == true && $("#checkActiveEmail").val() == 0) {
                                            fixSubmit();
                                        }
                                    }

                                    function fixSubmit() {

                                        var form = $("#form_forgetpassword");
                                        form.removeAttr('onsubmit');
                                        form.submit();

                                        $('#applyButton').attr('disabled', 'disabled');
                                    }

                                    function checkEmailExistVNW() {
                                        if ($("#email").val() != "" && $("#email").valid() === true) {
                                            $('#passLoading').show();
                                            $('#applyButton').attr('disabled', 'disabled');

                                            $.ajax({
                                                url: "<?php echo base_url('/jobs/checkEmailExist'); ?>",
                                                type: 'POST', data: {'email': $("#email").val()},
                                                dataType: "json",
                                                success: function (response) {

                                                    //  alert(response);


                                                    if (response === "NEW") {
                                                        $("#checkActiveEmail").val(1);
                                                        $('.emailExist').show();
                                                    } else {
                                                        $("#checkActiveEmail").val(0);
                                                        $('.emailExist').hide();
                                                    }

                                                    $('#passLoading').hide();
                                                    $('#applyButton').removeAttr('disabled');


                                                }
                                            });

                                        } else {
                                            $('.emailExist').hide();
                                        }

                                    }



</script>
