<div class="container">
    <div class="middle-box text-center loginscreen   animated fadeInDown register">
        <div>
            <div>
                <h1 class="logo-name"></h1>
            </div>
            <h3>Đăng ký ngay bây giờ và nhận<br>
                hồ sơ mẫu Nhật Bản!!</h3>
            <form id="form_register" class="m-t" role="form" method = "post">
                <div class="form-group">
                    <input id="firstname" name="firstname" type="text" class="form-control" placeholder="Họ" required value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['firstname']; ?>">
                </div>
                <div class="form-group">
                    <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Tên" required value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['lastname']; ?>">
                </div>
                <div class="form-group">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" required  value="<?php if (isset($messageError) && $messageError['message_error'] == true) echo $postField['email']; ?>">
                    <?php if (isset($messageError) && $messageError['message_error'] === true) { ?>
                        <label id="check-exist" class="error"><?php echo $this->lang->line("error_email_exist") ?></label>
                    <?php } ?>

                </div>
                <div class="form-group">
                    <input id="password"name="password" type="password" class="form-control" placeholder="Mật khẩu" required >
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks">
                        <label>
                            <input type="checkbox" checked name="chkIsNewLetter" >
                            <i></i> Tôi muốn nhận Bản Tin JapanWorks<br>
                            hàng tuần và hàng tháng. </label>
                    </div>
                </div>
                <button type="submit" id="applyButton" class="btn btn-primary block full-width m-b">Xác nhận</button>
                <p class="text-muted text-center"><small>Bạn đã có tài khoản?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo site_url('login'); ?>">Đăng nhập</a>
            </form>
            <p class="m-t"> <small> Nhấn nút Đăng Ký nghĩa là tôi đã đọc và chấp nhận <br>
                    <a href="<?php echo site_url('about/term'); ?>">"Thỏa thuận sử dụng"</a> và <a href="<?php echo site_url('about/privacy'); ?>">"Quy định bảo mật".</a><br>
                    Bạn sẽ nhận được email thông báo xác nhận từ Vietnamworks. </small> </p>
        </div>
    </div>
</div>
<link href="<?php echo base_url(); ?>static/cfp/css/plugins/iCheck/custom.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/cfp/js/plugins/validate/jquery.validate.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/iCheck/icheck.min.js"></script>
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

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    //$('#form_register').validate();
    //
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

