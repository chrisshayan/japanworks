<div class="success-register">
    <?php echo $descriptionSuccessPage; ?>
</div>


<div class="middle-box text-center loginscreen animated fadeInDown register_success">
    <div>
        <div> <img class="log logo1" src="<?php echo base_url("static/img/vnw_logo.png") ?>" /> <img class="log logo2" src="<?php echo base_url("static/img/logo.jpg") ?>" />
            <h1 class="logo-name"> </h1>
        </div>
        <h3>Đăng nhập với tài khoản <br>
            VietnamWorks/JapanWorks</h3>
        <p></p>
        <p></p>
        <form id="form_login" class="m-t" role="form"  method="post">
            <div class="form-group">

                <span  class="show-message" style="color:#cc5965;font-weight: 700;"><?php if ($msg != '') echo ($msg); ?></span>
            </div>
            <div class="form-group">
                <input id="email" name="email" type="email" class="form-control" placeholder="Email" required="" value="<?php if (isset($myData['email'])) echo $myData['email']; ?>">
            </div>
            <div class="form-group">
                <input id="password" name="password" type="password" class="form-control" placeholder="Mật khẩu" required="" value="<?php if (isset($myData['password'])) echo $myData['password']; ?>">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b" id="applyButton">Xác nhận</button>
            <input type="hidden" id="isSent" name="isSent" value="OK" />
            <a href="<?php echo site_url('login/forgotPassword'); ?>"><small>Quên mật khẩu?</small></a>
        </form>
        <p class="m-t"> <small></small> </p>
    </div>
</div>




<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/cfp/js/plugins/validate/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#email").keyup(function () {

            $(".show-message").html('');
        });
        $.validator.addMethod("email", function (value, element) {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
        },
                "Địa chỉ email không hợp lệ."
                );
        $("#form_login").validate({
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 4,
                    maxlength: 20
                },
            },
            messages: {
                email: {
                    required: 'Vui lòng nhập địa chỉ email.',
                },
                password: {
                    required: 'Vui lòng nhập mật khẩu.',
                    minlength: 'Mật khẩu xác nhận không hợp lệ( 4 đến 20 kí tự).',
                    maxlength: 'Mật khẩu xác nhận không hợp lệ( 4 đến 20 kí tự).'
                },
            },
        });
    });
</script>
