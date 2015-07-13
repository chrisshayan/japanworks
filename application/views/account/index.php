






<div class="container career-center-block" id="section2">
    <div class="benefit-title">
        Quản lý nghề nghiệp
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="info-block">
                        <?php
                        if (($this->session->userdata('userInfo'))) {
                            $user = $this->session->userdata('userInfo');
                            ?>
                            <div class="col-sm-6 left">
                                <span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $user->profile->first_name . ' ' . $user->profile->last_name; ?>
                            </div>
                            <div class="col-sm-6 right">
                                <span class="glyphicon glyphicon-envelope"></span> &nbsp;<?php echo $user->profile->email; ?>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- PHẦN CAREER CENTER MỚI -->

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs nav-justified">
                <li <?php
                if (!isset($active)) {
                    echo "class='active'";
                }
                ?>><a data-toggle="tab" href="#create_resume">Tạo mới hồ sơ</a></li>
                <li <?php
                if (isset($active)) {
                    echo "class='active'";
                }
                ?>c><a data-toggle="tab" href="#upload_resume">Tải lên hồ sơ</a></li>
            </ul>
            <div class="tab-content">
                <div id="create_resume" class="tab-pane fade
                <?php
                if (!isset($active)) {
                    echo " in active";
                }
                ?>">
                    <div class="row">
                        <div class="avatarpix col-sm-5"><img style="width:276px;height:276px;"  src="<?php
                            if (isset($dataCV['photo']) && $dataCV['photo'] != NULL) {
                                echo base_url($dataCV['photo']);
                            } else
                                echo base_url("static/img/avatarpix.jpg")
                                ?>" class="img-circle img-responsive" alt=""/></div>
                        <div class="leftcontent col-sm-7">
                            <div class="row">
                                <?php if (isset($dataCV['nameresumeonline']) && $dataCV['nameresumeonline'] != "") { ?>
                                    <div class="flag_icon col-sm-12 text-right">
                                        <?php if (($dataCV['language_id']) == '1') { ?>
                                            <img src="<?php echo base_url("static/img/flag_en.jpg") ?>" />
                                        <?php } else if (($dataCV['language_id']) == '2') { ?>
                                            <img src="<?php echo base_url("static/img/flag_jp.jpg") ?>" />
                                        <?php } else if (($dataCV['language_id']) == '3') { ?>
                                            <img src="<?php echo base_url("static/img/flag_vn.jpg") ?>" />
                                        <?php } ?>
                                    </div>
                                    <div class="name_resume col-sm-12 text-left"><a target="_blank" href='https://docs.google.com/gview?url=<?php echo urlencode(base_url() . $dataCV['linkresumeonline']) ?>&embedded = true'><?php echo $dataCV['nameresumeonline']; ?></a></div>
                                    <div class="modify_btn col-sm-12">
                                        <div class="row">

                                            <div class="col-sm-1 text-center"><a target="_blank" href='https://docs.google.com/gview?url=<?php echo urlencode(base_url() . $dataCV['linkresumeonline']) ?>&embedded = true'><img src="<?php echo base_url("static/img/icon_view.jpg") ?>"  /><br>Xem</a></div>
                                            <?php if (($dataCV['language_id']) == '1') { ?>
                                                <div class="col-sm-1 text-center"><a href="<?php echo base_url('onlineresume/edit/en') ?>"><img src="<?php echo base_url("static/img/icon_edit.jpg") ?>" /><br>Sửa</a></div>
                                            <?php } else if (($dataCV['language_id']) == '2') { ?>
                                                <div class="col-sm-1 text-center"><a href="<?php echo base_url('onlineresume/edit/jp') ?>"><img src="<?php echo base_url("static/img/icon_edit.jpg") ?>" /><br>Sửa</a></div>
                                            <?php } else if (($dataCV['language_id']) == '3') { ?>
                                                <div class="col-sm-1 text-center"><a href="<?php echo base_url('onlineresume/edit/vn') ?>"><img src="<?php echo base_url("static/img/icon_edit.jpg") ?>" /><br>Sửa</a></div>
                                            <?php } ?>

                                            <div class="col-sm-1 text-center"><a href="<?php echo base_url('account/download') . '?file=' . $dataCV['nameresumeonline']; ?>"><img src="<?php echo base_url("static/img/icon_download.jpg") ?>" /><br>Tải về</a></div>
                                            <div class="col-sm-1 text-center"><a class = "delete" href="<?php echo base_url('account/deleteresume') ?>"><img src="<?php echo base_url("static/img/icon_delete.jpg") ?>" /><br>Xóa</a></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-1"></div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="toptext col-sm-12">
                                        <h1>Hiện tại, bạn chưa có hồ sơ</h1>
                                        <p>vui lòng chọn chức năng “Tạo Mới hồ Sơ” bên dưới để tạo hồ sơ</p>
                                    </div>
                                <?php } ?>
                                <div class="dotline col-sm-12"></div>
                                <div class="btn_new text-center col-sm-12"><a class="<?php if (isset($dataCV['nameresumeonline']) && $dataCV['nameresumeonline'] != "") {echo "creaters"; } ?>" href="<?php echo base_url('onlineresume/index') ?>">Tạo Mới hồ Sơ</a></div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="jumbotron">
                                <div class="row">
                                    <div class="why_title text-center col-sm-12">
                                        <span>Tại sao bạn nên sử dụng "Mẫu hồ sơ chuẩn của JapanWorks"</span><br>
                                        "Mẫu hồ sơ chuẩn của JapanWorks" được thiết kế riêng cho công ty Nhật. Hãy lưu thông tin của bạn tại đây!
                                    </div>
                                    <div class="stars col-sm-12 text-center">
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col1 text-center col-sm-4"><blockquote><p>"Mẫu hồ sơ này giúp nhà tuyển dụng dễ dàng hiểu kinh nghiệm và kĩ năng của ứng viên, đặc biệt phần về khả năng tiếng Nhật rất hữu ích."</p><footer><cite title="IT software company">Khách Hàng của VietnamWorks<br>(Ngành Công Nghệ Thông Tin - Phần Mềm)</cite></footer></blockquote></div>
                                    <div class="col2 text-center col-sm-4"><blockquote><p>"Mẫu hồ sơ thiết kế rất tốt<br>cho công ty Nhật, chứa đầy đủ<br>các thông tin cần thiết<br>khi ứng tuyển ở công ty Nhật."</p><footer><cite title="IT software company">Khách hàng của VietnamWorks<br>(Ngành Sản Xuất)</cite></footer></blockquote></div>
                                    <div class="col3 text-center col-sm-4"><blockquote><p>"Với mẫu hồ sơ chính thức của JapanWorks, khả năng tiến đến vòng phỏng vấn cao hơn 200% so với những mẫu hồ sơ thông thường"</p><footer><cite title="IT software company">Ryosuke Kanemoto<br>(Chuyên Viên Tuyển Dụng của Navigos Group)</cite></footer></blockquote></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="upload_resume" class="tab-pane fade
                <?php
                if (isset($active)) {
                    echo " in active";
                }
                ?>">
                    <div class="row">
                        <div class="avatarpix col-sm-5"><img src="<?php echo base_url("static/img/avatarpix1.jpg") ?>" class="img-responsive" alt=""/></div>
                        <div class="leftcontent col-sm-7">
                            <div class="row">
                                <?php if (isset($dataCV['nameresume'])) { ?>
                                
                                    <div class="flag_icon col-sm-12 text-right">&nbsp;</div>
                                    <div class="name_resume col-sm-12 text-left"><a href="#"><?php echo $dataCV['nameresume']; ?></a></div>
                                    <div class="modify_btn col-sm-12">
                                        <div class="row">

                                            <div class="col-sm-1 text-center">
                                                <?php
                                                if (substr($dataCV['nameresume'], -4) === "docx") {
                                                    ?>
                                                    <a target="_blank" href="https://docs.google.com/gview?url=<?php echo urlencode(base_url() . $dataCV['linkresume']) ?>&embedded = true"><img src="<?php echo base_url("static/img/icon_view.jpg") ?>"  /><br>Xem</a></div>

                                            <?php } else { ?>

                                                <a target="_blank" href="https://docs.google.com/viewerng/viewer?url=<?php echo urlencode(base_url() . $dataCV['linkresume']) ?>"><img src="<?php echo base_url("static/img/icon_view.jpg") ?>"  /><br>Xem</a></div>

                                            <?php
                                        }
                                        ?>

                                        <div class="col-sm-1 text-center"><a href="<?php echo base_url('account/download') . '?file=' . $dataCV['nameresume']; ?>"><img src="<?php echo base_url("static/img/icon_download.jpg") ?>" /><br>Tải về</a></div>
                                        <div class="col-sm-1 text-center"><a class = "delete" href="<?php echo base_url('account/delete') ?>"><img src="<?php echo base_url("static/img/icon_delete.jpg") ?>" /><br>Xóa</a></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="toptext col-sm-12">
                                    <h1>Hiện tại, bạn chưa có hồ sơ</h1>
                                    <p>vui lòng chọn chức năng “Tải lên hồ sơ” bên dưới để tạo hồ sơ</p>
                                </div>
                            <?php } ?>
                            <div class="dotline col-sm-12"></div>
                            <div class="bot1text col-sm-12">
                                <div class="row">
                                    <div class="icon1 col-sm-2"><img src="<?php echo base_url("static/img/icon11.jpg") ?>" width="67" height="66" alt="" class="img-responsive"/></div>
                                    <div class="text1 col-sm-10">
                                        <h1>Tải lên hồ sơ</h1>
                                        <p>Đinh dạng doc, docx, pdf. Kích thước nhỏ hơn 512 KB<br>Nếu bạn tải lên hồ sơ mới, hồ sơ hiện tại sẽ bị xóa<br>Chọn chức năng “Tải về” nếu bạn muốn lưu giử hồ sơ hiện tại.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bot2text col-sm-12">
                                <div class="row">
                                    <div class="icon2 col-sm-2"></div>
                                    <div class="text2 col-sm-10">
                                        <form name="upload-cv" id="upload-cv-form" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            <div class="form-group input-container">
                                                <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE_FOR_JOBS; ?>">
                                                <input type="hidden" id="isSent" name="isSent" value="OK" />
                                                <input type="file" rel="requiredField" id="inputFile" name="inputFile" placeholder="Your resume">
                                                <div class="has-error"></div>
                                                <?php if (isset($uploadError) && $uploadError['upload_error'] == true) { ?>
                                                    <div class="form-group has-error">
                                                        <label class="col-sm-2 control-label has-error">Error.</label>
                                                        <div class="col-sm-10">
                                                            <label class="radio-inline has-error"><?php echo $errorUpload; ?></label>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <button type="submit" class="btn btn-danger">Lưu Hồ Sơ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <button type="button" id="download-sample" class="btn_sample btn btn-block">
            <span><img src="<?php echo base_url("static/img/img_left_btn.jpg") ?>" /></span>
            <span><b>Mẫu hồ sơ trực tuyến tiếng Nhật</b><br>Xem mẫu tham khảo trực tuyến tiếng nhật</span>
            <span><img src="<?php echo base_url("static/img/img_right_btn.jpg") ?>" /></span>
        </button>

        <!-- KẾT THÚC CAREER CENTER MỚI -->






    </div>
</div>

</div>





<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>

<script type="text/javascript">
    $("#download-sample").click(function () {

        window.open("https://docs.google.com/viewerng/viewer?url=<?php echo base_url("docx/japanworks_resume.docx") ?>&embedded = true");
    });

    $.validator.addMethod("filesize",
            function (value, element) {

                if ($(element).attr('type') == "file"
                        && ($(element).hasClass('required')
                                || element.files.length > 0)) {
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
    $("#upload-cv-form").validate({
        rules: {
            inputFile: {
                required: true,
                extension: "pdf|doc|docx",
                filesize: true
            }
        },
        messages: {
            inputFile: {
                required: "Vui lòng đính kèm hồ sơ.",
                extension: "Định dạng file không hỗ trợ."
            }

        },
        errorClass: "has-error",
        errorElement: "span",
        errorPlacement: function (error, element) {
            element.parents("div.input-container").find(".has-error").append(error);
        }

    });
    $('.delete').click(function (event) {
        event.preventDefault();
        var r = confirm("Bạn thật sự muốn xóa?");
        if (r == true) {
            window.location = $(this).attr('href');
        }

    });
    $('.creaters').click(function (event) {
        event.preventDefault();
        var r = confirm("Nếu bạn tạo một hồ sơ trực tuyến, hồ sơ cũ sẽ bị xóa");
       
        if (r == true ) {
            window.location = $(this).attr('href');
        }

    });
    $(document).ready(function () {

    });</script>

