<div class="panel panel-default" id="content">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-thumbs-up"></span> Việc làm mới
    </div>
    <div class="panel-body" id="results">
        <div id="blueimp-gallery" class="blueimp-gallery">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <?php
        if (isset($resultsSearchJob->data->jobs) && !empty($resultsSearchJob->data->jobs)) {
            foreach ($resultsSearchJob->data->jobs as $key => $job) {
                $this->load->view("/welcome/_item", array("key" => $key, "job" => $job));
            }
        } else {
            echo "<p class='mb10 search_msg'><strong>{$this->lang->line("no_result")}</strong></p>";
        }
        ?>
    </div>
</div>
