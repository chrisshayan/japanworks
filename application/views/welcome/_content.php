


<div class = "panel-heading">

    <div class = "panel-title"><h2> <span class = "glyphicon glyphicon-thumbs-up"></span> <?php echo $this->_contentTitle; ?> </h2> </div>
</div>
<div class = "panel-body" id="results">
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
