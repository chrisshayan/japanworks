<!-- Job details -->
<div class="panel panel-default">
    <div class="panel-heading"> <span class="glyphicon glyphicon-briefcase"></span> Chi tiết việc làm </div>
    <div class="panel-body">
        <div class="row dotted_underline">
            <h1 class="job_title mb10 txtRed" itemprop="title"><?php echo $job->job_detail->job_title ?></h1>
            <div class="col-md-7">
                <p class="txtBlack mt10"><strong><?php echo $job->job_company->company_name ?></strong> <br>
                    <?php echo $job->job_company->company_address ?></p>
            </div>
            <div class="col-md-1"><img src="<?php echo base_url("static/img/vnw_arrow.png") ?>" width="51" height="42" alt="" class="visible-md visible-lg pull-right"></div>
            <div class="col-md-4">
                <div class="col-sm-4 apply" align="right" style="width:100%"> <a href="javascript:scrollToAnchor('applyForm');" class="follow_bar_applylink_2" style="color:#797979"> Nộp đơn trong 1 bước! <br>
                        <i class="fa fa-arrow-down txtRed" style="font-size:35px"></i> </a> </div>
            </div>
        </div>
        <!-- Skills -->
        <?php if (isset($job->job_detail->skills) && count($job->job_detail->skills) > 0) : ?>
            <div class="row skills">
                <?php $i = 0; ?>
                <?php foreach ($job->job_detail->skills as $skill) { ?>
                    <a href="<?php echo site_url() . "kw/" . str2alias($skill->skillName, false); ?>" style="color:#555">
                        <span class="tag-skill">
                            <?php echo $skill->skillName; ?>
                        </span>
                    </a>
                    <?php
                }
                ?>
            </div>
        <?php endif; ?>
        <!-- end skills -->
        <!-- Benefits -->
        <?php if (isset($job->job_summary->benefits) && count($job->job_summary->benefits) > 0) : ?>
            <div class="row benefits">
                <h3>Phúc lợi</h3>
                <ul>
                    <?php foreach ($job->job_summary->benefits as $benefit) { ?>
                        <li>
                            <span class="fa fa-fw <?php echo $benefitIcon[$benefit->benefitId]; ?>"></span>&nbsp;<?php echo $benefit->benefitValue; ?>
                        </li>

                    <?php } ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- end benefits -->
        <!-- description -->
        <div>
            <p itemprop="description">
                <strong class="fs18"><?php echo $this->lang->line("job_description"); ?></strong><br>
                <span itemprop="description"><?php echo nl2br($job->job_detail->job_description) ?></span>
                <br><br><strong class="fs18"><?php echo $this->lang->line("job_requirement"); ?></strong><br>
                <span itemprop="experienceRequirements"><?php echo nl2br($job->job_detail->job_requirement); ?></span>
            </p>
        </div>
        <!-- end description -->
    </div>
</div>
<!--job details -->

<!--employer -->

<div class="panel panel-default">
    <div class="panel-heading"> <span class="glyphicon glyphicon-info-sign"></span><?php echo $this->lang->line("recruiters"); ?> </div>
    <div class = "panel-body">
        <p>
            <strong><?php echo $job->job_company->company_name ?> </strong><br>
            <span itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="addressLocality"><?php echo $job->job_company->company_address ?>
                    </span>
                </span>
            </span>
            <br>
            <br>
            <?php echo $this->lang->line("contact_person"); ?>: <strong><?php echo $job->job_company->contact_person ?></strong><br>
            <?php echo $this->lang->line("company_size"); ?>: <strong><?php echo $job->job_company->company_size ?></strong><br>
            <br>
            <?php echo nl2br($job->job_company->company_profile) ?>
        </p>
    </div>
</div>
<!-- /employer -->