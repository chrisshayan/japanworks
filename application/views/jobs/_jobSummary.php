<div class="panel" id="hot_news">
    <div class="panel-heading">
        <div class="panel-title"><h2><span class="glyphicon glyphicon-info-sign"></span> <?php echo $this->lang->line("job_info"); ?></h2></div>
    </div>
    <div class="panel-body">
        <?php if ($job->job_summary->salary_range) : ?>
            <div class="row row_dotted">
                <div class="col-xs-2">
                    <div class="pull-left txtRed fs18"><span class="glyphicon glyphicon-usd"></span></div>
                </div>
                <div class="col-xs-10">
                    <div class="pull-left"><strong class="fs18 txtBlack"><?php echo $this->lang->line("salary"); ?></strong><br>
                        <?php
                        if ($job->job_summary->salary_range == "negotiation") {
                            echo "Thương lượng";
                        } else {
                            echo $job->job_summary->salary_range;
                        }
                        ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
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