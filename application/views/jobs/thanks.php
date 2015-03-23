
<div class="col-sm-12">
    <div class="thanks">Xin chúc mừng! Hồ sơ ứng tuyển của bạn đã dược gửi thành công đến nhà tuyển dụng</div>
    <div id="similar">
        <div class="row mb20">
            <div class="col-xs-12 col-sm-8 similar-title">Việc làm tương tự</div>
            <div class="col-xs-12 col-sm-4"><a href="<?php echo base_url() . $link ?>"><div class="similar-btn">XEM TẤT CẢ CÁC VIỆC LÀM TƯƠNG TỰ</div></a></div>
        </div>
    </div>
</div>
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
                $tempInfor = "aaaaa";

            //var_dump($tempInfor);
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



    <?php echo render_partial('/footer'); ?>




    <?php /*
      <div class="container">
      <div class="clearfix mb20">

      </div>
      <div class = "panel-heading">
      <div class="panel-title"> <span class="txtRed total">Xin chúc mừng! Hồ sơ ứng tuyển của bạn đã dược gửi thành công đến nhà tuyển dụng</span></div>
      </div>

      <div class="panel-title"> <strong>Việc làm tương tự</strong></div>
      <div style="margin: auto; text-align: center;">
      <p><a href="<?php echo base_url() . $link ?>">Xem tất cả các việc làm tương tự</a></p>

      </div>

      <div class = "panel-body" id="results">

      <?php if (isset($data->jobs) && !empty($data->jobs)): ?>

      <?php
      $i = 0;
      foreach ($data->jobs as $key => $job) {

      $this->load->view("/jobs/_item", array("key" => $key, "job" => $job));
      if (++$i == 3)
      break;
      }
      ?>
      <?php endif; ?>
      </div>
      <div style="margin: auto; text-align: center;">
      <p class="mb10 search_msg"><strong>Trở lại trang kết quả tìm kiếm</strong></p>
      <p><a href="<?php echo $linkSearch ?>">Trở lại</a></p>

      </div>
      </div>






      </div>

      <script>
      function showTab(id) {
      $('#myTab a[href="' + id + '"]').tab('show')
      }

      </script>

      </body>
      </html>


     */ ?>