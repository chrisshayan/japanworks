<!-- top level -->

<div class="row row_dotted">
    <!-- bold and red -->
    <?php if (($jobSecond->job_post_plus == "1") && ($jobSecond->is_show_job_image == "1") && ($jobSecond->bold_red == "1")) {  //job_post_plus ?>
        <div class="col-sm-9 job-block red-bold">
        <?php } else { ?>
            <div class="col-sm-9 job-block">
            <?php } ?>
            <!-- bold and red -->
            <a target="_blank" href="<?php echo site_url(jobDetailUrl($jobSecond->job_id, $jobSecond->job_title)) ?>" class="job-title"><?php echo $jobSecond->job_title ?></a>
            <div class="info">
                <span class="date-info">
                    <span class="glyphicon glyphicon-calendar"></span>
                    <?php echo $jobSecond->posted_date; ?>
                </span>
                <span class="place-info">
                    <span class="glyphicon glyphicon-globe"></span>
                    <?php
                    $locations = explode(",", $jobSecond->job_location);
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

                <span class = "salary">

                    <?php
                    if ($jobSecond->salary_visible == true) {
                        if (($this->session->userdata('userInfo'))) {
                            if ($jobSecond->salary_min == 0 && $jobSecond->salary_max == 0) {
                                echo "Mức lương: " . str_replace("$", "", $jobSecond->salary);
                            } else {
                                echo "Mức lương: " . $jobSecond->salary_min . ' - ' . $jobSecond->salary_max;
                            }
                        } else {
                            ?>
                            Mức lương: <a href="<?php echo site_url('login'); ?>" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem</a>
                            <?php
                        }
                    } else {
                        echo "Mức lương: Thỏa thuận";
                    }
                    ?>
                </span>

            </div>
            <!-- image job-->

            <?php if (($jobSecond->job_post_plus == "1") && ($jobSecond->is_show_job_image == "1") && (count($jobSecond->job_image_url) > 0)) { //job_post_plus    ?>
                <div class="co-photos-block">
                    <?php
                    for ($i = 0; $i < count($jobSecond->job_image_url); $i++) {
                        ?>
                        <a class="fancybox" rel="group_<?php echo $jobSecond->job_id; ?>" href="<?php echo $jobSecond->job_image_url[$i] ?>" title="">
                            <img src="<?php echo $jobSecond->job_image_url[$i] ?>"  <?php if ($i == 0) { ?> class="first"<?php } ?>>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>

            <!-- skill -->
            <?php if (count($jobSecond->skills) > 0) { ?>
                <div class="skills">
                    <?php $i = 0; ?>
                    <?php foreach ($jobSecond->skills as $skill) { ?>
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
        <div class="col-sm-3 name-block"><?php echo $jobSecond->job_company ?>
            <?php if ($jobSecond->job_post_plus == "1" & $jobSecond->is_show_job_image == "1" && $jobSecond->is_show_job_logo == "1") { //job_post_plus    ?>
                <a href="<?php echo site_url(jobDetailUrl($jobSecond->job_id, $jobSecond->job_title)) ?>" title="<?php echo $jobSecond->job_company ?>" target="_blank">  <img src="<?php echo $jobSecond->job_logo_url ?>" alt="company logo"> </a>
            <?php } ?>
        </div>
        <?php if (count($jobSecond->benefits) > 0) { ?>
            <div class="col-sm-12 benefit">
                <a href="#">
                    <span class="glyphicon glyphicon-gift"></span>
                    &nbsp;Phúc lợi công ty
                    <span class="arrow glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul>
                    <?php foreach ($jobSecond->benefits as $benefit) { ?>
                        <li>
                            <span class="fa fa-fw <?php echo $benefitIcon[$benefit->benefitId]; ?>"></span>
                            &nbsp;<?php echo $benefit->benefitValue; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>



