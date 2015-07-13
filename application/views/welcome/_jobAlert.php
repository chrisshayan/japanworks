<!--job alert-->
<div class="ibox float-e-margins">
    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">THÔNG BÁO VIỆC LÀM</h3>
                            <p>Chúng tôi sẽ gửi bạn những việc làm tiếng nhật mới nhất</p>
                            <div class="form-group">
                                <label>Từ khóa</label>

                                <input id="sendme" name="sendme" type="text" placeholder="Nhập từ khóa hoặc mô tả công việc" class="form-control" required="" aria-required="true" hvkeyboarddefined="true"  aria-invalid="true"/>
                                <label id="-error" class="error" for="">Vui lòng nhập từ khóa.</label>
                            </div>
                            <div class="form-group">
                                <label>Trong Ngành Nghề</label>
                                <div id="category_chosen" class="input-group">

                                    <select data-placeholder="Tất cả ngành nghề" class="chosen-select form-control" id="jobcategoryalert" name="jobcategoryalert" multiple style="width:350px;" tabindex="-1">

                                        <?php foreach ($this->_categories as $catId => $category): ?>
                                            <option value="<?php echo $catId ?>"><?php echo $category[$this->_langdb] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Vị Trí</label>
                                <select class="form-control" name="joblevelalert" id="joblevelalert">
                                    <option selected value="0">Tất cả cấp bậc</option>
                                    <option value="1">Mới tốt nghiệp/Thực tập sinh</option>
                                    <option value="5">Nhân viên</option>
                                    <option value="6">Trưởng nhóm/Giám sát</option>
                                    <option value="7">Trưởng phòng</option>
                                    <option value="10">Phó giám đốc</option>
                                    <option value="3">Giám đốc</option>
                                    <option value="4">Tổng giám đốc điều hành</option>
                                    <option value="8">Phó chủ tịch</option>
                                    <option value="9">Chủ tịch</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tại</label>
                                <div id="location_chosen" class="input-group">
                                    <select data-placeholder="Tất cả địa điểm" class="chosen-select form-control" id="joblocaltionalert" name="joblocaltionalert"  multiple style="width:350px;" tabindex="-1">
                                        <?php foreach ($this->_locations as $locId => $location): ?>
                                            <option value="<?php echo $locId ?>"><?php echo $location[$this->_langdb] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Với Mức Lương</label>
                                <input type="text" placeholder="Mininum monthly salary (USD) " class="form-control" id="salaryalert" name="salaryalert">
                            </div>
                            <div class="form-group">
                                <label>Đến Địa Chỉ Email</label>
                                <p class="form-control-static">  <?php
                                    if (isset($this->_userInfo->login_token)) {
                                        echo $this->_userInfo->email;
                                    }
                                    ?></p>
                            </div>
                            <div class="form-group">
                                <label>Mỗi</label>
                                <select class="form-control" name="dayreceive" id="dayreceive">
                                    <option value="2">Ngày </option>
                                    <option value="3">Tuần</option>
                                </select>
                            </div>
                            <div>
                                <button id="savejobalert" class="btn btn-sm btn-primary pull-right m-t-n-xs"><strong>Lưu Thông Báo Việc Làm</strong></button>
                                <input type="hidden" id="flagjob" name="flagjob" value="<?php echo $checkShowPopUp; ?>" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4><a class="jobalert" onclick="openURLAlert(event)" >Xem Kết Quả Ngay Bây Giờ</a></h4>

                            <p class="text-center"> <a onclick="openURLAlert(event)"><i class="jobalert fa fa-sign-in big-icon"></i></a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end job alert-->

<script>
    $(document).ready(function () {
        if ($('#flagjob').val() == 1) {

            $("#modal-form").modal('show');
        }
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
        $('#sendme').focus(function () {
            $('.error').hide();
            $('#sendme').removeClass('input_error');
        })
        $('#savejobalert').click(function () {

            var keyword = $('#sendme').val();

            var joblevel = $('#joblevelalert').val();
            var salary = $('#salaryalert').val();
            var dayreceive = $('#dayreceive').val();

            var selectedCate = [];
            var selectedLocal = [];
            var stringSelect = '';

            if (keyword !== '') {
                $('#jobcategoryalert :selected').each(function () {
                    selectedCate.push($(this).val());
                });
                $('#joblocaltionalert :selected').each(function () {
                    selectedLocal.push($(this).val());

                });
                $.ajax({
                    url: "<?php echo base_url('/welcome/sendJobAlert'); ?>",
                    type: 'POST',
                    data: {'email': '<?php
                                    if (isset($this->_userInfo->login_token)) {
                                        echo $this->_userInfo->email;
                                    } else {
                                        echo "";
                                    }
                                    ?>', 'keyword': '<?php echo KEYWORD_DEDAULT ?> ' + keyword, 'job_level': joblevel, 'salary': salary, 'frequency': dayreceive,
                        'job_categories': selectedCate.join(","), 'job_locations': selectedLocal.join(",")},
                    dataType: "json",
                    success: function (response) {
                        if (response == true) {

                            console.log(response);

                            setTimeout(function () {
                                toastr.options = {
                                    closeButton: true,
                                    progressBar: true,
                                    showMethod: 'slideDown',
                                    timeOut: 4000
                                };
                                toastr.success('Save Successful', 'JAPANWORKS');
                            }, 1300);

                        } else {  //login not correct

                        }
                    }
                }); //end load ajax


                $("#modal-form").modal('hide');
                $('#flagjob').val('0');
                return true;

            } else {
                $('#sendme').addClass('input_error');
                $('.error').show();
                return false
            }//if validate for sendme
        })

    });
</script>