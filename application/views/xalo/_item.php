<div class="row row_dotted">
    <div class="col-sm-7"><a target="_blank" href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" ><strong class="txtRed"><?php echo $job->job_title ?></strong></a><br>
        <?php echo $job->posted_date; ?>
        <?php
        $locations = explode(",", $job->job_location);
        $strLoc = "";
        foreach ($this->_searchData->locations as $location) {
            if (in_array($location->location_id, $locations)) {
                $strLoc .= $location->lang_en . ', ';
            }
        }
        echo trim($strLoc, ", ");
        ?>
    </div>
    <div class="col-sm-5"><?php echo $job->job_company ?></div>
</div>
