<div class="panel panel-default" id="search-widget">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-search"></span> TÌM VIỆC LÀM PHÙ HỢP
    </div>
    <div class="panel-body">
        <form name="search" id="frm_block_quick_search" action="<?php echo base_url() ?>" method="post">  <!--onsubmit="return submitBlockSearchForm()"-->
            <!--onsubmit="return submitBlockSearchForm()"-->
            <div class="row">
                <div class="col-sm-9">
                    <div class="mb10 col-sm-12">
                        <input id="keywordMainSearch" class="form-control search-all" name="job_title" placeholder="<?php echo $this->lang->line("keyword_placeholder") ?>">
                    </div>
                    <div class="mb10 col-sm-12">
                        <select data-placeholder="Tất cả ngành nghề" multiple="" class="chosen-select" id="cateListMainSearch" name="job_category[]" tabindex="-1" style="display: none;">

                            <?php foreach ($this->_categories as $catId => $category): ?>
                                <option value="<?php echo $catId ?>"><?php echo $category[$this->_langdb] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb10 col-sm-6">
                        <select data-placeholder="Tất cả địa điểm" multiple="" class="chosen-select" id="locationMainSearch" name="job_location[]" tabindex="-1" style="display: none;">

                            <?php foreach ($this->_locations as $locId => $location): ?>
                                <option value="<?php echo $locId ?>"><?php echo $location[$this->_langdb] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="textbox">
                            <select data-placeholder="Tất cả cấp bậc" id="jobLevelMainSearch" name="job_level" style="width: 100%;" class="chosen-select">
                                <option value="0" >Tất cả cấp bậc</option>
                                <?php foreach ($this->_jobLevels as $levelId => $jobLevel): ?>
                                    <option value="<?php echo $levelId ?>"><?php echo $jobLevel[$this->_langdb] ?></option>
                                <?php endforeach; ?>
                            </select>


                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb10 col-sm-12">
                        <input type="submit" class="btn btn-primary" id="btnSearch" value="Tìm kiếm" style="width:100%;" data-original-title="" title="">
                    </div>
                    <div class="mb10" style="line-height:40px; display: none"><i class="glyphicon glyphicon-plus" id="more-critera-toggle" data-target="#more-criteria" data-toggle="collapse"></i></div>
                </div>

            </div>
        </form>
    </div>
    <div class="panel-footer">
        <a href="#" id="hot_cat">Ngành nghề hấp dẫn <span class="glyphicon glyphicon-chevron-down small"></span></a>
        <div id="categories">
            <div class="row">
                <?php $this->load->view("/welcome/_hotCats", array("categories" => $categories)); ?>
            </div>
        </div>
    </div>
</div>