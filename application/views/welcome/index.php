
<div id="home">
    <?php $this->load->view("/welcome/_intro"); ?>
    <div class="container " id="section2">
        <div class="row">
            <div class="col-sm-12">
                <!--  comment out banner rakus -->

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

                <!-- search -->
                <?php $this->load->view("/welcome/_searchBoxBase", array("categories" => $hotCats)); ?>
                <!--best jobs -->

                <div class="row">
                    <!-- Special -->
                    <?php $this->load->view("/welcome/_special"); ?>
                </div>
                <div class="row">

                    <div class="col-sm-9 left_side">

                        <?php $this->load->view("/welcome/_content", array("resultsSearchJob" => $resultsSearchJob)); ?>
                    </div>
                    <!-- Right column -->
                    <div class="col-sm-3 right_side">
                        <?php
                        if (($this->session->userdata('userInfo'))) {

                        } else {
                            ?>
                            <!-- register FB, GL, IN-->
                            <div class="panel register-right">
                                <img src="<?php echo base_url("/static/img/register-right-bg.jpg") ?>" alt="Register" class="register-bg" width="223" height="234"  >
                                <div class="btns">
                                    <p><strong>Đăng ký bằng</strong></p>
                                    <a href="<?php echo $loginFbUrl; ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoFB');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-fb-50.png") ?>" width="51" height="50"></a>&nbsp;&nbsp;
                                    <a href="<?php echo $loginGpUrl; ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoGP');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-ggplus-50.png") ?>" width="51" height="50"></a>&nbsp;&nbsp;
                                    <a href="<?php echo site_url('social/linkedin'); ?>" onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoLI');" target= "_blank"><img src="<?php echo base_url("/static/img/icon-linkedin-50.png") ?>" width="51" height="50"></a><br>
                                    <a onclick="ga('send', 'event', 'registrationlink', 'click', 'righttoJPW');" href="<?php echo site_url('register') ?>" class="btn">Hoặc đăng ký ở đây</a>
                                </div>
                            </div>
                        <?php } ?>
                        <?php /*
                          <p align="center" class="ads_title">QUẢNG CÁO</p>
                          <div class="mb15 ads">
                          <a href="http://jlit.evolable.asia/?utm_source=display&utm_medium=JAPANWORKSbanner&utm_campaign=JLIT" target="_blank"><img src="<?php echo base_url("static/img/JLIT_banner.jpg") ?>" width="100%" alt="">
                          </a>
                          </div>
                         */ ?>
                    </div>
                </div>


            </div>

            <!-- PAGE RIGHT SIDE -->

        </div>
    </div>
</div>



