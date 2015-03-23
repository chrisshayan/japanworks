<!-- search -->
<?php $this->load->view("/welcome/_searchBox", array("categories" => $hotCats)); ?>
<!--best jobs -->
<div class = "panel">
    <div class = "panel-heading">
        <div class="panel-title"><h2><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $this->_contentTitle; ?> <a href="http://vietnamworks.com" class="pull-right titleLinkR">Vietnamworks ></a> </h2></div>
    </div>
    <div class = "panel-body" id="results">

        <?php if (isset($data->jobs) && !empty($data->jobs)): ?>
            <p class="mb10 search_msg"><strong>Tìm thấy <span class="txtRed total"><?php echo $data->total; ?></span> việc làm</strong></p>
            <?php
            foreach ($data->jobs as $key => $job) {

                $this->load->view("/search/_item", array("key" => $key, "job" => $job));
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