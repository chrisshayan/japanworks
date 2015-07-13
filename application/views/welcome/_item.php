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
                        $strLoc .= $location->lang_vn . ', ';
                    }
                }
                echo trim($strLoc, ", ");
                ?>
            </span>
            <br>

            <span class = "salary">
                <?php
                if ($job->salary_visible == true) {
                    if (($this->session->userdata('userInfo'))) {
                        if ($job->salary_min == 0 && $job->salary_max == 0) {
                            echo "Mức lương: " . str_replace("$", "", $job->salary);
                        } else {
                            echo "Mức lương: " . $job->salary_min . ' - ' . $job->salary_max;
                        }
                    } else {
                        ?>
                        Mức lương: <a href="<?php echo site_url('login'); ?>" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem mức lương</a>
                        <?php
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
                <div class="lightBoxGallery" id="<?php echo $job->job_id; ?>">
                    <?php
                    for ($i = 0; $i < count($job->job_image_url); $i++) {
                        ?>

                        <a  rel="group_<?php echo $job->job_id; ?>" href="<?php echo $job->job_image_url[$i] ?>" title="" data-gallery="#blueimp-gallery-<?php echo $job->job_id; ?>">
                            <img src="<?php echo $job->job_image_url[$i] ?>"  <?php if ($i == 0) { ?> class="first"<?php } ?> width="114">
                        </a>
                        <?php
                    }
                    ?>
                </div>
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
                            $strClass = 'progress-bar  progress-small progress-bar-success';
                            break;
                        case 1:
                            $strClass = 'progress-bar progress-small progress-bar-warning';
                            break;
                        case 2:
                            $strClass = 'progress-bar progress-small progress-bar-danger';
                            break;
                        default:
                            $strClass = 'progress-bar  progress-small progress-bar-success';
                            break;
                    }
                    ?>
                    <div class = "row">
                        <div class = "col-sm-2 col-xs-2">
                            <div class = "progress progress-xxs">


                                <div class = "<?php echo $strClass ?>" role = "progressbar" aria-valuenow = "<?php echo $skill->skillWeight; ?>" aria-valuemin = "0" aria-valuemax = "100" style="width: 100%;">&nbsp;
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
        <div class="col-sm-12 benefit benefit<?php echo $job->job_id; ?>">

            <span class="glyphicon glyphicon-gift"></span>
            &nbsp;Phúc lợi công ty
            <span class="arrow glyphicon glyphicon-chevron-down"></span>

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
