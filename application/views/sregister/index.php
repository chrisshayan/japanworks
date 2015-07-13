<div class="sregister">

    <div class="container">
        <!--site content in here-->

        <div class="row">
            <div class="container social-registration" id="section1">
                <div class="content col-sm-6">
                    <p class="text-now">Đăng ký tham gia ngay</p>
                    <h1>Website số 1</h1>
                    <p class="text-job">Cho các việc làm tiếng Nhật</p>
                    <div class="register-block">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">

                                <div class="social-btns">
                                    <span><strong>Đăng ký ngay</strong></span>&nbsp;&nbsp
                                    <a onclick="ga('send', 'event', 'registrationlink', 'click', 'LPtoFB');"  href="<?php echo $loginFbUrl; ?>" target="_blank" ><img src="<?php echo base_url('static/img/icon-fb.png') ?>" alt="facebook"></a>&nbsp;
                                    <a onclick="ga('send', 'event', 'registrationlink', 'click', 'LPtoGP');" href="<?php echo $loginGpUrl; ?>" target="_blank"><img src="<?php echo base_url('static/img/icon-ggplus.png') ?>" alt="g+"></a>&nbsp;
                                    <a onclick="ga('send', 'event', 'registrationlink', 'click', 'LPtoLI');" href="<?php echo site_url('social/linkedin'); ?>" target="_blank"><img src="<?php echo base_url('static/img/icon-linkedin.png') ?>" alt="Linkin"></a>&nbsp;

                                </div>

                            </div>
                            <div class="ibox-content"> <strong>Hoặc điền thông tin</strong><br>
                                <br>
                                <form id="form_register"  onsubmit="return vaidateBeforeSubmit(event)"  role="form" method="post" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="text" id="firstname" name="firstname" placeholder="Họ" class="form-control" required value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['firstname']; ?>">

                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" placeholder="Nhập email" class="form-control" required  value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['email']; ?>">
                                                <?php if (isset($messageError) && $messageError['message_error'] === true) { ?>
                                                    <label id="check-exist" class="error"><?php echo "Email đã được đăng ký."; ?></label>
                                                <?php } ?>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit"><strong>Kết nối ngay</strong></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">

                                            <div class="form-group">
                                                <input type="text" id="lastname" name="lastname" placeholder="Tên" class="form-control" required value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['lastname']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" class="form-control" required>

                                            </div>



                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="banner-regis-top">
                <div class="top-intro">Đăng ký ngay, bạn sẽ nhận được mẫu hồ sơ tiếng Nhật chính thức từ Japanworks!</div>
                <div class="person-intro">
                    <div class="per1">
                        <div class="top-img">
                            <img src="<?php echo base_url('static/img/langding_morio.png') ?>" alt="">
                        </div>
                        Quản lý dự án JapanWorks <br>Morio Nakatsuka
                    </div>
                    <div class="per2">
                        <div class="top-img">
                            <img src="<?php echo base_url('static/img/langding_ryosuke.png') ?>" alt="">
                        </div>
                        Chuyên viên cố vấn <br> Ryosuke Kanemoto
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container features" id="section2">
        <div class="row">
            <div class="col col-sm-4 first">
                <img src="<?php echo base_url('static/img/icon-register-1.png') ?>" alt="">
                <p>Số lượng việc làm lớn nhất & cập nhật nhanh nhất</p>
            </div>
            <div class="col col-sm-4">
                <img src="<?php echo base_url('static/img/icon-register-2.png') ?>" alt="">
                <p>Chia sẻ của chuyên gia về sự nghiệp ở các công ty Nhật</p>
            </div>
            <div class="col col-sm-4">
                <img src="<?php echo base_url('static/img/icon-register-3.png') ?>" alt="">
                <p>Email thông báo việc làm thường xuyên với những công việc tốt nhất và thông tin hỗ trợ</p>
            </div>
        </div>
    </div>

</div>


<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/cfp/js/plugins/validate/jquery.validate.min.js"></script>
<script type="text/javascript">

                                    $(document).ready(function () {
                                        $("#email").keyup(function (e) {
                                            $("#check-exist").html('');
                                        });
                                        $("#email, #password").keydown(function (e) {
                                            if (e.keyCode == 32)
                                                return false;
                                        });
<?php if (isset($messageError) && $messageError['message_error'] == true) { ?>
                                            $('#email').focus();
<?php } else {
    ?>
                                            $('#firstname').focus();
<?php } ?>
                                    });


                                    $.validator.addMethod("email", function (value, element) {
                                        return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                                    },
                                            "Địa chỉ email không hợp lệ."
                                            );
                                    $.validator.addMethod("custompassword",
                                            function (value, element) {

                                                var email = $("#email").val();
                                                var arr = email.split('@');
                                                if ((arr[0] == $("#password").val()) || (email == $("#password").val())) {
                                                    return false;
                                                } else {
                                                    return true;
                                                }
                                            },
                                            "<?php echo "Mật khẩu không đủ mạnh." ?>"
                                            );
                                    $("#form_register").validate({
                                        rules: {
                                            firstname: {
                                                required: true,
                                            },
                                            lastname: {
                                                required: true,
                                            },
                                            email: {
                                                required: true,
                                            },
                                            password: {
                                                required: true,
                                                minlength: 4,
                                                maxlength: 20,
                                                custompassword: true
                                            }
                                        },
                                        messages: {
                                            firstname: {
                                                required: 'Vui lòng nhập họ'
                                            },
                                            lastname: {
                                                required: 'Vui lòng nhập tên'
                                            },
                                            email: {
                                                required: 'Địa chỉ email không hợp lệ.'
                                            },
                                            password: {
                                                required: 'Vui lòng nhập mật khẩu.',
                                                minlength: 'Mật khẩu xác nhận không hợp lệ( 4 đến 20 kí tự).',
                                                maxlength: 'Mật khẩu xác nhận không hợp lệ( 4 đến 20 kí tự).'
                                            }
                                        }
                                    });


                                    function vaidateBeforeSubmit(e) {
                                        e.preventDefault();
                                        if ($("#form_register").valid() == true) {
                                            fixSubmit();
                                        }
                                    }

                                    function fixSubmit() {
                                        var form = $("#form_register");
                                        form.removeAttr('onsubmit');
                                        form.submit();
                                        $('#applyButton').attr('disabled', 'disabled');
                                    }

</script>

