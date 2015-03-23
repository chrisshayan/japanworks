<?php
$jobApply = $job->job_url->vn;
/*
  $jobApply = str_replace("vietnamworks.com/", "vietnamworks.com/jobs/apply-job-online/", $job->job_url->vn);
  if(strpos($job->job_url->vn, "-jv")){
  $jobApply = substr($jobApply, 0, strpos($jobApply, "-jv"));
  }
 */
?>
<!-- Job details -->
<div class="panel">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase"></span> <?php echo $this->lang->line("job_detail") ?></div>
    <div class = "panel-body">
        <div class="row dotted_underline">
            <h1 class="job_title mb10 txtRed" itemprop="title"><?php echo $job->job_detail->job_title ?></h1>
            <div class="col-md-7">
                <p class="txtBlack mt10">
                <h2 class="job_detail mb10"><strong><?php echo $job->job_company->company_name ?></strong></h2>
                <h3 class="job_detail">
                    <span itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
                        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <span itemprop="addressLocality"><?php echo $job->job_company->company_address ?>
                            </span>
                        </span>
                    </span>
                </h3>
                </p>
                <!--
                <div class="mb10">
                    <a href="#"><span class="glyphicon glyphicon-bookmark"></span> Lưu việc làm này</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> Gửi email việc làm tương tự</a></div>
                -->
            </div>
            <div class="col-md-1"><img src="<?php echo base_url("static/img/vnw_arrow.png") ?>" width="51" height="42"  alt="" class="visible-md visible-lg pull-right"/></div>
            <div class="col-md-4">
                <div id="btnApply" class="mt10 mb10"><a onclick="ga('send', 'event', 'JAPAN+WORK', 'CLICK+APPLY+NOW', '<?php echo $job->job_detail->job_id; ?>');"  href="<?php echo(setLinkVNWorks($jobApply)); ?>" class="btn btn-lg btn-orange w100p" ><?php echo $this->lang->line("apply"); ?></a></div>
                <div class="fs12" align="center">(Việc làm từ Vietnamworks)</div>
            </div>
        </div>

        <div>
            <p itemprop="description">
                <strong class="fs18"><?php echo $this->lang->line("job_description"); ?></strong><br>
                <span itemprop="description"><?php echo nl2br($job->job_detail->job_description) ?></span>
                <br><br><strong class="fs18"><?php echo $this->lang->line("job_requirement"); ?></strong><br>
                <span itemprop="experienceRequirements"><?php echo nl2br($job->job_detail->job_requirement); ?></span>
            </p>
        </div>
    </div>
</div>
<!--job details -->

<!--employer -->
<div class = "panel">
    <div class = "panel-heading"><span class = "glyphicon glyphicon-info-sign"></span> <?php echo $this->lang->line("recruiters"); ?></div>
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

<div id="topApply">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><p class="job_title txtRed" itemprop="title"><?php echo $job->job_detail->job_title ?></p></div>
            <div class="col-md-3 top-text-apply" align="right">(Việc làm từ Vietnamworks)</div>
            <div class="col-md-3">
                <a onclick="_gaq.push(['_trackEvent', 'JAPAN+WORK', 'CLICK+APPLY+NOW', '<?php echo $job->job_detail->job_id; ?>']);"  href="<?php echo(setLinkVNWorks($jobApply)); ?>" class="btn btn-orange w100p" ><?php echo $this->lang->line("apply"); ?></a>
            </div>
        </div>
    </div>
</div>