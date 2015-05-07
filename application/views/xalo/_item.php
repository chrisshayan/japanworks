<!-- top level -->
<?php if ($job->top_level == "1") { //job_post_plus ?>
    <div class="top-level">
    <?php } ?>

    <div class="row row_dotted">

        <div class="col-sm-9 job-block red-bold">
            <a target="_blank" href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" class="job-title"><?php echo $job->job_title ?></a>

            <div class="info">
                <span class="date-info">
                    <span class="glyphicon glyphicon-calendar"></span>
                    <?php echo $job->posted_date; ?>
                </span>
                <span class="place-info">
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
                </span>
                <br>
                <span class = "salary">
                    <?php
                    if ($job->salary_visible == true) {
                        if ($job->salary_min == 0 && $job->salary_max == 0) {
                            echo "Mức lương: " . str_replace("$", "", $job->salary);
                        } else {
                            echo "Mức lương: " . $job->salary_min . ' - ' . $job->salary_max;
                        }
                    } else {
                        echo "Mức lương: Thỏa thuận";
                    }
                    ?>
                </span>
            </div>
            <!-- image job-->
            <?php if ($job->is_show_job_image == "1") { ?>
                <div class="co-photos-block">
                    <?php
                    for ($i = 0; $i < count($job->job_image_url); $i++) {
                        ?>

                        <a class="fancybox" rel="group_<?php echo $job->job_id; ?>" href="<?php echo $job->job_image_url[$i] ?>" title="">
                            <img src="<?php echo $job->job_image_url[$i] ?>"  <?php if ($i == 0) { ?> class="first"<?php } ?>>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>


            <!-- skill -->
            <?php if (count($job->skills) > 0) { ?>
                <div class="skills">
                    <?php $i = 0; ?>
                    <?php foreach ($job->skills as $skill) { ?>
                        <?php
                        $strClass = '';
                        switch ($i) {
                            case 0:
                                $strClass = 'progress-bar progress-bar-success';
                                break;
                            case 1:
                                $strClass = 'progress-bar progress-bar-warning';
                                break;
                            case 2:
                                $strClass = 'progress-bar progress-bar-danger';
                                break;
                            default:
                                $strClass = 'progress-bar progress-bar-success';
                                break;
                        }
                        ?>
                        <div class = "row">
                            <div class = "col-sm-2 col-xs-2">
                                <div class = "progress progress-xxs">


                                    <div class = "<?php echo $strClass ?>" role = "progressbar" aria-valuenow = "<?php echo $skill->skillWeight; ?>" aria-valuemin = "0" aria-valuemax = "100">&nbsp;
                                    </div>
                                </div>
                            </div>

                            <a class = "skill" href = "<?php echo site_url() . "kw/" . str2alias($skill->skillName, false); ?>" title = "<?php echo $skill->skillName; ?>">
                                <em class = "text-xs gray col-sm-10 col-xs-10 text-clip"><?php echo $skill->skillName; ?></em>
                            </a>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            <?php } ?>
            <!-- end skill -->

        </div>
        <div class="col-sm-3 name-block"><?php echo $job->job_company ?></div>

        <?php if (count($job->benefits) > 0) { ?>
            <div class="col-sm-12 benefit">
                <a href="#">
                    <span class="glyphicon glyphicon-gift"></span>
                    &nbsp;Phúc lợi công ty
                    <span class="arrow glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul>
                    <?php foreach ($job->benefits as $benefit) { ?>
                        <li>
                            <span class="fa fa-fw <?php echo $benefitIcon[$benefit->benefitId]; ?>"></span>
                            &nbsp;<?php echo $benefit->benefitValue; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

    </div>
    <?php if ($job->top_level == "1") { ?>
    </div>
<?php } ?>
