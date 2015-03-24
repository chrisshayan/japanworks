

<!-- top level -->
<?php if ($job->top_level == "1") { ?>
    <div class="top-level">
    <?php } ?>

    <?php if ($job->job_post_plus == "1" & $job->is_show_job_image == "1") { ?>
        <div class="row row_dotted">
            <!-- bold and red -->
            <?php if ($job->bold_red == "1") { ?>
                <div class="col-sm-9 job-block red-bold">
                <?php } else { ?>
                    <div class="col-sm-9 job-block">
                    <?php } ?>
                    <!-- bold and red -->

                    <a target="_blank" class="job-title" href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" ><?php echo $job->job_title ?></a><br>

                    <p class="date-info">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <?php echo $job->posted_date; ?>
                    </p>
                    <p class="place-info">
                        <span class="glyphicon glyphicon-globe"></span>
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
                    </p>

                    <!-- image job-->
                    <div class="co-photos-block">
                        <?php for ($i = 0; $i < count($job->job_image_url); $i++) { ?>
                            <a class="fancybox" rel="group_<?php echo $job->job_id ?> " href="<?php echo $job->job_image_url[$i] ?>" title="">
                                <img src="<?php echo $job->job_image_url[$i] ?>" alt="photo-1"  <?php if ($i == 0) { ?> class="first"<?php } ?> >
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>


                <div class="col-sm-3 name-block"><?php echo $job->job_company ?>
                    <?php if ($job->is_show_job_logo == "1") { ?>
                        <a href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" title="<?php echo $job->job_company ?>" target="_blank">  <img src="<?php echo $job->job_logo_url ?>" alt="company logo"> </a>
                    <?php } ?>
                </div>

            </div>

            <!--else -->
        <?php } else { ?>
            <div class="row row_dotted">
                <div class="col-sm-9 job-block">
                    <a target="_blank" class="job-title"  href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" ><?php echo $job->job_title ?></a><br>
                    <p class="date-info">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <?php echo $job->posted_date; ?>
                    </p>
                    <p class="place-info">
                        <span class="glyphicon glyphicon-globe"></span>
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
                    </p>
                    <!-- image job-->
                </div>
                <div class="col-sm-3 name-block"><?php echo $job->job_company ?> </div>
            </div>
        <?php } ?>
        <?php if ($job->top_level == "1") { ?>
        </div>
    <?php } ?>


