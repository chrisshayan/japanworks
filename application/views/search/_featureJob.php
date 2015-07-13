<!-- Feature Jobs -->

<?php if ($countFeature > 0) { ?>
    <div class="panel feature-jobs" id="archives">


        <ul>
            <?php
            foreach ($data->jobs as $key => $job) {
                if ($job->job_post_plus == "1" & $job->is_show_job_image == "1") {
                    if ($job->featured_job == "1") {
                        ?>
                        <li>
                            <a target="_blank" href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" title="<?php echo $job->job_title ?>"><span class="job"><strong><?php echo $job->job_title ?></strong></span></a>
                            <br>
                            <span class="job-company text-gray-light text-clip" data-original-title="" title=""><?php echo $job->job_company ?></span>
                            <br>
                            <span class="job-level text-clip" data-original-title="" title=""><em>Cấp Bậc:</em> <?php echo $job->job_level ?></span>
                            <br>
                            <span class="job-location text-clip"><em>Địa điểm:</em>
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
                            </span>
                            <br>
                            <span class="job-salary"><em>Mức lương:</em><span class="orange"> <?php echo $job->salary ?></span></span>
                        </li>
                        <?php
                    }
                }
            }
            ?>


        </ul>
    </div>
    <!-- /Feature Jobs -->
<?php } ?>