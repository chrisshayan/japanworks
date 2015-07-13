

<div class="panel panel-default" id="hot_news">
    <div class="panel-heading">
        <div class="panel-title"><span class="glyphicon glyphicon-info-sign"></span> <?php echo $this->lang->line("job_info"); ?></div>
    </div>
    <div class="panel-body">

        <div class="row row_dotted">
            <div class="col-xs-2">
                <div class="pull-left txtRed fs18"><span class="glyphicon glyphicon-usd"></span></div>
            </div>
            <div class="col-xs-10">
                <div class="pull-left"><strong class="fs18 txtBlack"><?php echo $this->lang->line("salary"); ?></strong><br>



                    <?php
                    if ($job->job_summary->salary_visible == true) {
                        if ($job->job_summary->salary_min == "0" && $job->job_summary->salary_max == "0") {
                            if ($job->job_summary->salary_range == "negotiation") {
                                echo "Thỏa thuận";
                            } else {
                                if (($this->session->userdata('userInfo'))) {
                                    echo str_replace("$", "", $job->job_summary->salary_range);
                                } else {
                                    ?>
                                    <a href="<?php echo site_url('login'); ?>" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem</a> <?php
                                }
                            }
                        } else {

                            if (($this->session->userdata('userInfo'))) {
                                echo $job->job_summary->salary_min . " - " . $job->job_summary->salary_max;
                            } else {
                                ?>
                                <a href="<?php echo site_url('login'); ?>" target="_blank" title="Đăng nhập" class="log-in-salary">Đăng nhập để xem</a> <?php
                            }
                        }
                    } else {
                        echo "Thỏa thuận";
                    }
                    ?>

                </div>
            </div>
        </div>

        <?php
        if (isset($this->_jobLevels[$job->job_summary->job_level][$this->_langdb])) :
            $url = site_url("/search/jobLevel/{$job->job_summary->job_level}");
            ?>
            <div class="row row_dotted">
                <div class="col-xs-2">
                    <div class="pull-left txtRed fs18"><span class="glyphicon glyphicon-signal"></span></div>
                </div>
                <div class="col-xs-10">
                    <div class="pull-left"><strong class="fs18 txtBlack"><?php echo $this->lang->line("job_level"); ?></strong><br>
                        <?php echo "<a href='{$url}' >{$this->_jobLevels[$job->job_summary->job_level][$this->_langdb]}</a>" ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($job->job_summary->job_category) : ?>
            <div class="row row_dotted">
                <div class="col-xs-2">
                    <div class="pull-left txtRed fs18"><span class="glyphicon glyphicon-folder-open"></span></div>
                </div>
                <div class="col-xs-10">
                    <div class="pull-left"><strong class="fs18 txtBlack"><?php echo $this->lang->line("job_categories"); ?></strong><br>
                        <?php
                        $cats = explode(",", $job->job_summary->job_category);
                        foreach ($cats as $cat) {
                            if (isset($this->_categories[$cat][$this->_langdb])) {
                                $url = site_url() . "category/index/cat/" . $cat;
                                echo "<a href='{$url}' >{$this->_categories[$cat][$this->_langdb]}</a><br>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($job->job_company->company_address) : ?>
            <div class="row row_dotted">
                <div class="col-xs-2">
                    <div class="pull-left txtRed fs18"><span class="glyphicon glyphicon-map-marker"></span></div>
                </div>
                <div class="col-xs-10">
                    <div class="pull-left"><strong class="fs18 txtBlack"><?php echo $this->lang->line("job_location"); ?></strong><br>
                        <?php echo $job->job_company->company_address ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $languages = unserialize(LANGUAGES);
        if (isset($languages[$job->job_summary->prefer_language][$this->_langdb])) :
            ?>
            <div class="row row_dotted">
                <div class="col-xs-2">
                    <div class="pull-left txtRed fs18"><span class="glyphicon glyphicon-font"></span></div>
                </div>
                <div class="col-xs-10">
                    <div class="pull-left"><strong class="fs18 txtBlack"><?php echo $this->lang->line("preferred_language"); ?></strong><br>
                        <?php echo $languages[$job->job_summary->prefer_language][$this->_langdb]; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>





    </div>

</div>
<!--them phan cong viec tuong tu-->

<?php if (isset($dataSimilar->jobs) && !empty($dataSimilar->jobs)) { ?>

    <div class="panel panel-default" id="similarjob">
        <div class="panel-heading">
            <div class="panel-title text-left">
                Công việc tương tự
            </div>
        </div>
        <div class="panel-body">
            <?php
            $i = 0;
            foreach ($dataSimilar->jobs as $key => $job) {
                ?>
                <div class="row row_dotted">
                    <div class="col-sm-12"><a href="<?php echo site_url(jobDetailUrl($job->job_id, $job->job_title)) . "/?utm_source=AlsoViewed&utm_medium=InternalLinks&utm_campaign=AlsoViewedJobTitle" ?>">
                            <strong class="fs18 txtBlack"><?php
                                if (strlen($job->job_title) > 70)
                                    echo substr(($job->job_title), 0, 70) . "...";
                                else
                                    echo $job->job_title;
                                ?></strong><br>
                            <?php
                            $locations = explode(",", $job->job_location);
                            $strLoc = "";
                            foreach ($this->_searchData->locations as $location) {
                                if (in_array($location->location_id, $locations)) {
                                    $strLoc .= $location->lang_vn . ', ';
                                }
                            }
                            echo trim($strLoc, ", ");
                            ?></a></div>
                </div>
                <?php
                if (++$i == 10)
                    break;
            }
            ?>


        </div>
    </div>
<?php } ?>
<!--ket thuc phan cong viec tuong tu-->