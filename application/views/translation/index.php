<link href="<?php echo base_url("static/cfp/css/plugins/sweetalert/sweetalert.css"); ?>" rel="stylesheet">
<div class="container">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Cuộc Thi Dịch Thuật</h2>
            <ol class="breadcrumb">
                <li> <a href="<?php echo site_url(); ?>">Trang chủ</a> </li>
                <li class="active"> <strong>Cuộc thi dịch thuật</strong> </li>
            </ol>
        </div>
        <div class="col-sm-8">

            <div class="title-action">
                <a href="#" class="btn btn-primary btn-sm btn-order-2">Đặt bản dịch</a>
            </div>
        </div>
    </div>
    <div class="row qa-all">
        <div class="col-sm-12">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="text-center p-sm">
                        <h2>Nếu bạn muốn dịch thông tin gì đó</h2>
                        <span>đặt bản dịch </span>

                        <?php if (isset($this->_userInfo->login_token)) { ?>
                            <input type="hidden" name="email_login" class="email_login" value="<?php echo $this->_userInfo->email; ?>">
                        <?php } ?>
                        <button title="Order Translation" class="btn btn-primary btn-sm btn-order-1"><i class="fa fa-plus"></i> <span class="bold">TẠI ĐÂY</span></button>
                    </div>
                </div>
                <?php
                $i = 1;
                if (isset($listContest)) {
                    foreach ($listContest as $list) {
                        ?>
                        <div class="faq-item">
                            <div class="row">
                                <div class="col-sm-7">
                                    <a data-toggle="collapse" href="#<?php echo 'faq' . $i; ?>" class="faq-question"> <?php
                                        $order = array("&lt;br /&gt;", "&lt;br&gt;","<br />","<br>");
					if (strlen(($list['text'])) > 37) {

                                            echo mb_substr(str_replace($order, "", ($list['text'])), 0, 37,"utf-8") . "...";
                                        } else {

                                            echo $list['text'];
                                        }
                                        ?>
                                    </a>

                                    <small>Thêm bởi <strong><?php echo $list['poster'] ?></strong>
                                        <i class="fa fa-clock-o"></i>
                                        <?php
                                        $datetime1 = date_create($list['end_date']);
                                        $datetime2 = date_create(date('Y-m-d'));
                                        $interval = date_diff($datetime1, $datetime2);
                                        $checkDate = $interval->format('%a');
                                        echo $checkDate;
                                        ?>
                                        <?php if ($checkDate <= 2) { ?>
                                            <span class="date_expired">hết hạn vào  <?php echo date('F j, Y', strtotime($list['end_date'])); ?></span>
                                        <?php } else { ?>
                                            <span class="date_available"><?php echo date('F j, Y', strtotime($list['start_date'])); ?> - <?php echo date('F j, Y', strtotime($list['end_date'])); ?></span>

                                        <?php } ?>

                                    </small>
                                </div>
                                <div class="col-sm-2"> <span class="small font-bold">Mức độ/Kỹ năng</span>
                                    <div class="tag-list">
                                        <?php
                                        $array = explode(",", $list['level_tag']);
                                        foreach ($array as $lv) {
                                            ?>
                                            <span class="tag-item"><?php echo trim($lv); ?></span>
                                        <?php }
                                        ?>


                                    </div>
                                </div>
                                <div class="col-sm-2 text-left"> <span class="small font-bold prize_text">Giải nhất <br>
                                        <?php echo $list['prize'] ?></span></div>
                                <div class="col-sm-1 text-right"> <span class="small font-bold">Bài gửi </span><br/>
                                    <?php echo $list['answers'] ?> </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="<?php echo 'faq' . $i; ?>" class="panel-collapse collapse ">
                                        <div class="faq-answer">
                                            [Dịch các câu dưới đây]<br/>
                                            <p> <?php echo $list['text'] ?> </p>
                                            <div class="row row-form">

                                                <?php if (isset($this->_userInfo->login_token)) { ?>
                                                    <?php if ($list['check'] == 0 && (strtotime(date("Y-m-d")) - strtotime($list['end_date']) <= 0)) { ?>
                                                        <div>
                                                            <form class="form-horizontal" name="form-faq1" id="<?php echo 'form-faq' . $i; ?>">
                                                                <div class="form-group">
                                                                    <div class="col-sm-4">
                                                                        <input type="hidden"  name="idquest" value="<?php echo $list['id']; ?>">
                                                                        <input type="text" id="<?php echo 'nicknamefaq' . $i; ?>" name="nicknamefaq" placeholder="Nickname của bạn" class="form-control" required>
                                                                    </div>
                                                                    <div class="col-sm-4"> <span class="help-block m-b-none">* Thành viên khác có thể thấy bí danh của bạn</span> </div>
                                                                </div>
                                                                <div class="ibox float-e-margins">
                                                                    <div class="ibox-content no-padding">

                                                                        <textarea class="form-control" required name="textfaq" id="<?php echo 'textfaq' . $i; ?>" rows="5" placeholder="Nội dung " ></textarea>

                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs btn_submit" type="submit"><strong>Submit</strong></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="text-center font-bold translated-done-alert-faq text-trans">Bạn đã dịch chủ đề này</div>
                                                        <?php
                                                    } else {

                                                        if (strtotime(date("Y-m-d")) - strtotime($list['end_date']) > 0) {
                                                            ?>
                                                            <div class="alert alert-danger text-center">
                                                                Rất tiếc, chủ đề này đã hết hạn để tham gia
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="text-center font-bold translated-done-alert-faq text-trans" style="display: block;">
                                                                Bạn đã dịch chủ đề này
                                                            </div>
                                                        <?php } ?>


                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="alert alert-danger text-center">
                                                        Vui lòng đăng nhập để JapanWorks trước để thi dịch thuật<br>
                                                        <a class="#" href="<?php echo base_url('login') . "/?utm_source=Translate&utm_medium=InternalLinks&utm_campaign=TranslateLogin" ?>">Đăng nhập.</a>
                                                    </div>
                                                <?php } ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php
                        $i++;
                    }
                }
                ?>
                <div class="pagination-block ibox-content" align="center">
                    <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong <strong><?php echo isset($totalAllContest) ? $totalAllContest : 0; ?></strong> cuộc thi.</p>
                    <ul class="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</div>



<script src = "<?php echo base_url(); ?>static/cfp/js/plugins/validate/jquery.validate.min.js"></script>

<script src="<?php echo base_url(); ?>static/cfp/js/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        var email = $('.email_login').val();
        // validate form
        $('form').each(function () {

            $(this).validate({
                rules: {
                    nicknamefaq: {
                        required: true,
                    },
                    textfaq: {
                        required: true,
                    }
                },
                messages: {
                    nicknamefaq: {required: 'Vui lòng nhập nick name .',
                    },
                    textfaq: {
                        required: 'Vui lòng nhập nội dung.',
                    }
                },
                submitHandler: function (form) { // for demo
                    console.log($(this).find('input[name="nicknamefaq"]').val());
                    var idquest = $(this).find('input[name="idquest"]').val();
                    var nickname = $(this).find('input[name="nicknamefaq"]').val();
                    var text = $(this).find('textarea[name="textfaq"]').val();
                    return alertbtn($(this), '.translated-done-alert-faq', idquest, nickname, text, email);
                }.bind(this)
            });
        });

    });
    $('.btn-order-1,.btn-order-2').click(function () {
        swal({
            title: "Order Translation",
            text: "Bạn muốn tạo câu hỏi cho cuộc thi? Vui lòng gửi cho tôi câu hỏi của bạn đến địa chỉ email morio@vietnamworks.com"
        });
    });
    function alertbtn(form_name, text_tr, idquest, nickname, text, email) {

        swal({
            title: "Bạn có chắc không?",
            text: "Bạn sẽ không thể phục hồi văn bản này của bạn!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF0000",
            confirmButtonText: "Vâng, hãy gửi nó!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo base_url('/translation/insertAnswer'); ?>",
                data: {"id": idquest, "nickname": nickname, "text": text, "email": email},
                success: function (result) {


                }
            });
            swal("Saved", "Bài của bạn được gửi thành công. Chúng tôi sẽ phản hồi trong thời gian ngắn", "success");
            $(form_name).css('display', 'none');
            $(text_tr).css('display', 'block');

        });
    }


    function simpleLoad(btn, state) {
        if (state) {
            btn.children().addClass('fa-spin');
            btn.contents().last().replaceWith(" Loading");
        } else {
            setTimeout(function () {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Refresh");
            }, 2000);
        }
    }
</script>
