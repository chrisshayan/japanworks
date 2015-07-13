
<div class="col-sm-4 coupon">
    <div class="title-coupon">
        <div style="height:40px"><a href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) . "/?utm_source=SimilarJob&utm_medium=SuccessApply&utm_campaign=JobTitle" ?>" style="color:white"><?php
                if (strlen($job->job_title) > 70)
                    echo substr(($job->job_title), 0, 70) . "...";
                else
                    echo $job->job_title;
                ?> </a></div></div>
    <div class="coupon-text">
        <div class="company-name mb10" style="height:45px"><strong class="txtRed"><?php
                echo $job->job_company;
                ?></strong></div>
        <div class="cate-jobs mb5"><b>Mức Lương:</b> <br>
            <?php
            if ($job->salary_visible == true) {
                if ($job->salary_min == "0" && $job->salary_max == "0") {
                    if ($job->salary_range == "negotiation") {
                        echo "Thỏa thuận";
                    } else {
                        echo str_replace("$", "", $job->salary_range);
                    }
                } else {
                    echo $job->salary_min . " - " . $job->salary_max;
                }
            } else {
                echo "Thỏa thuận";
            }
            ?>

        </div>
        <div class="location-job mb5"><b>Nơi Làm Viêc:</b><br>
            <?php
            $locations = explode(",", $job->job_location);
            $strLoc = "";
            foreach ($this->_searchData->locations as $location) {
                if (in_array($location->location_id, $locations)) {
                    $strLoc .= $location->lang_vn . ', ';
                }
            }
            echo trim($strLoc, ", ");
            ?>
        </div>
        <div class="cate-jobs mb5">
            <b>Ngành Nghề: </b><br>
            <?php
            $industries = explode(",", $job->job_industry);
            $strIn = "";

            foreach ($this->_searchData->categories as $industry) {
                if (in_array($industry->category_id, $industries)) {
                    $strIn .= $industry->lang_vn . ', ';
                }
            }
            echo trim($strIn, ", ");
            ?>
        </div>

        <div class="cate-jobs mb5">
            <b>Cấp bậc: </b><br>
            <?php
            echo $job->job_level;
            ?>
        </div>
        <div class="button-jobs"style="text-align: center;padding-top:10px">
            <a href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) . "/?utm_source=SimilarJob&utm_medium=SuccessApply&utm_campaign=Detail" ?>"><div class="similar-btn">XEM CHI TIẾT</div></a>
        </div>
    </div>
</div>




<script src="<?php echo base_url("static/js/jquery-2.1.1.min.js") ?>" ></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url("static/js/bootstrap.min.js"); ?>"></script>