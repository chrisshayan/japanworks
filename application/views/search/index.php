<!-- search -->
<?php $this->load->view("/welcome/_searchBox", array("categories" => $hotCats)); ?>

<!-- job alert -->

<div class="box-alert">

    <div class="box box-sm box-gray-light-ex ">
        <div class="main-message text-center">
            <div class="has-success" style="display:none">
                <label class="control-label">Một bước nữa! Kiểm tra hộp thư của bạn để xác nhận thông báo việc làm này.</label>
            </div>
            <div class="has-error" id="jobAlertEmailError" style="display:none">
                <label class="control-label">Email đã nhập không chính xác. Vui lòng kiểm tra và nhập email chính xác!</label>
            </div>
            <div class=" none-pass"  style="display:none;color:#a94442">
                <label class="control-label">Xin vui lòng điền địa chỉ email của bạn!</label>
            </div>
        </div>
        <div id="form-alert">
            <form class="form-inline" id="jobAlertEmailForm" name="jobAlertEmailForm" action="">
                <span class="description">
                    <span class="fa fa-fw fa-envelope-o fa-2x"></span>
                    <span class="description-content">Công việc mơ ước trong tầm tay!</span>
                </span>
                <div class="form-group" id="email-address-input-wrapper">
                    <div class=" col-sm-10">
                        <input type="text" class="form-control email-job-alert" name="emailSendJobAlert"  placeholder="Đăng kí ngay để nhận việc làm tốt">

                    </div>
                    <div class=" col-sm-2">

                        <input type="button" class="btn btn-success" id="createEmailJobAlert" value="Gửi việc cho tôi" data-original-title="" title="">
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


<!--best jobs -->
<div class = "panel">
    <div class = "panel-heading">
        <div class="panel-title"><h2><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $this->_contentTitle; ?> </h2></div>
    </div>
    <div class = "panel-body" id="results">

        <?php if (isset($data->jobs) && !empty($data->jobs)): ?>
            <p class="mb10 search_msg"><strong>Tìm thấy <span class="txtRed total"><?php echo $data->total; ?></span> việc làm</strong></p>

            <?php
            if (count($dataJobFirst) > 0) {
                foreach ($dataJobFirst as $key => $job) {

                    $this->load->view("/search/_item", array("key" => $key, "job" => $job));
                }
            }
            ?>
            <?php
            if (count($dataJobSecond) > 0) {
                foreach ($dataJobSecond as $key => $jobSecond) {

                    $this->load->view("/search/_itemSecond", array("key" => $key, "jobSecond" => $jobSecond));
                }
            }
            ?>

            <div class="pagination-block" align="center">
                <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong số <strong><?php echo $data->total; ?></strong> việc làm.</p>
                <ul class="pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </ul>
            </div>
        <?php else: ?>
            <p class="mb10 search_msg"><strong><?php echo $this->lang->line("no_result"); ?></strong></p>
                <?php endif; ?>
    </div>
</div>

<script>
    (function ($) {

        $('.fancybox').fancybox();

        // Limit Feature Jobs Titles characters
        var $featureJobsTitles = $('.feature-jobs .job strong'),
                titleString,
                maxChar = 45;

        $featureJobsTitles.each(function () {
            titleString = $(this).html();

            if (titleString.length > maxChar) {
                $(this).html(titleString.substring(0, maxChar) + '...');
            }
        });

    })(jQuery);

</script>

<!-- heapanalytics --> <?php /*
                  <script type="text/javascript">
                  window.heap = window.heap || [], heap.load = function (t, e) {
                  window.heap.appid = t, window.heap.config = e;
                  var a = document.createElement("script");
                  a.type = "text/javascript", a.async = !0, a.src = ("https:" === document.location.protocol ? "https:" : "http:") + "//cdn.heapanalytics.com/js/heap-" + t + ".js";
                  var n = document.getElementsByTagName("script")[0];
                  n.parentNode.insertBefore(a, n);
                  for (var o = function (t) {
                  return function () {
                  heap.push([t].concat(Array.prototype.slice.call(arguments, 0)))
                  }
                  }, p = ["clearEventProperties", "identify", "setEventProperties", "track", "unsetEventProperty"], c = 0; c < p.length; c++)
                  heap[p[c]] = o(p[c])
                  };
                  heap.load("1726761437");
                  </script>
                 */ ?>
<script>
    $('input#createEmailJobAlert').click(function () {
        if ($(".email-job-alert").val() != '') {
            $('#createEmailJobAlert').attr('disabled', 'disabled');

            $.ajax({
                url: "<?php echo base_url('/search/sendEmailJobAlert'); ?>",
                type: 'POST',
                data: {'email': $(".email-job-alert").val(), 'keyword': '<?php echo KEYWORD_DEDAULT . ' ' . $searchDetail->job_title; ?>', 'job_level': '<?php echo $searchDetail->job_level ?>',
                    'job_categories': '<?php echo implode(",", $searchDetail->job_category) ?>', 'job_locations': '<?php echo implode(",", $searchDetail->job_location) ?>'},
                dataType: "json",
                success: function (response) {
                    if (response == true) {

                        $('.main-message .has-error').fadeOut();
                        $('.main-message .none-pass ').fadeOut();

                        $('#createEmailJobAlert').removeAttr('disabled');
                        $('#form-alert ').fadeOut();
                        $('.main-message .has-success ').fadeIn();
                        setTimeout(function () {
                            $('.box-alert ').fadeOut();
                        }, 5000);

                    } else {  //login not correct
                        $('.main-message .has-success ').fadeOut();
                        $('.main-message .none-pass ').fadeOut();
                        $('.main-message .has-error').fadeIn();
                        $('#createEmailJobAlert').removeAttr('disabled');
                    }
                }
            }); //end load ajax
        } else {
            $('.main-message .has-error').fadeOut();
            $('.main-message .has-success').fadeOut();
            $('.main-message .none-pass ').fadeIn();
        }
    });

</script>

<?php
/*
 * data: {'email': $(".email-job-alert").val(), 'keyword': <?php echo KEYWORD_DEDAULT . ' ' . $searchDetail->job_title; ?>,
  'job_categories': <?php echo implode(",", $searchDetail->job_category) ?>, 'job_location':<?php echo implode(",", $searchDetail->job_location) ?>,
  'job_level':<?php echo $searchDetail->job_level ?>},
 */
?>
