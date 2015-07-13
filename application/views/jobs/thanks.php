<div class="col-sm-12">
    <div class="thanks">Xin chúc mừng! Hồ sơ ứng tuyển của bạn đã dược gửi thành công đến nhà tuyển dụng</div>
    <div id="similar">
        <div class="row mb20">
            <div class="col-xs-12 col-sm-8 similar-title">Việc làm tương tự</div>
            <div class="col-xs-12 col-sm-4"><a href="<?php echo base_url() . $link ?>"><div class="similar-btn">XEM TẤT CẢ CÁC VIỆC LÀM TƯƠNG TỰ</div></a></div>
        </div>
    </div>
</div>

<div class="similar-content">
    <div class="container">
        <div class="row">
            <?php
            $tempInfor = $this->session->userdata('tempInfor');
            if (isset($tempInfor)) {
                $tempInfor = $this->session->userdata('tempInfor');
            } else
                $tempInfor = "";
            ?>

            <?php if (isset($data->jobs) && !empty($data->jobs)): ?>

                <?php
                $i = 0;
                //check job id applied
                $jobApplied = $this->session->userdata('jobIdApplied');

                if (isset($jobApplied)) {
                    $jobApplied = $this->session->userdata('jobIdApplied');
                } else
                    $jobApplied = "nothing";

                foreach ($data->jobs as $key => $job) {

                    if (($job->job_id) == $jobApplied) {

                    } else {

                        $this->load->view("/jobs/_item", array("key" => $key, "job" => $job));
                        if (++$i == 3)
                            break;
                    }
                }
                ?>
            <?php endif; ?>


        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-sm-9 back-result">
                Trở lại trang kết quả tìm kiếm
            </div>
            <a href="<?php echo $linkSearch ?>"><div class="col-sm-3 back-btn">Trở lại</div></a>
        </div>
    </div>
    <br/><br/>

</div>
<br/><br/>
<style type="text/css">



    .top-navigation #page-wrapper{
        min-height:500px;
    }
    .top-navigation .wrapper.wrapper-content.specsec{
        padding:40px 0px 40px 0px !important;
        margin-left:-15px !important;
        margin-right:-15px !important;
    }

</style>