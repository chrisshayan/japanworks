<div class="row row_dotted">

    <div class="col-sm-9 job-block">

        <a target="_blank" href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) ?>" ><?php echo $job->job_title ?></a><br>
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
        <!-- image job-->
        <?php if ($job->is_show_job_image == "1") { ?>
            <div class="co-photos-block">
                <?php for ($i = 0; $i < count($job->job_image_url); $i++) { ?>

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
    </div>

    <div class="col-sm-3 name-block"><?php echo $job->job_company ?>
    </div>

</div>

