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
        <div class="location-job mb5"><b>Nơi Làm Viêc:</b><br>
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
        <div class="cate-jobs mb5">
            <b>Ngành Nghề: </b><br>
            <?php
            $industries = explode(",", $job->job_industry);
            $strIn = "";

            foreach ($this->_searchData->categories as $industry) {
                if (in_array($industry->category_id, $industries)) {
                    $strIn .= $industry->lang_en . ', ';
                }
            }
            echo trim($strIn, ", ");
            ?>
        </div>
        <div class="salary-jobs"><b>Mức Lương:</b> <a href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) . "/?utm_source=SimilarJob&utm_medium=SuccessApply&utm_campaign=Salary" ?>">Xem chi tiết</a></div>
        <!--        <div class="button-jobs"style="text-align: center;padding-top:10px">
                    <button type="submit" id="applyButton" class="btn btn-red btn-lg" style="min-width:40%" data-original-title="" title="">Nộp đơn</button>
                </div>-->
    </div>
</div>




