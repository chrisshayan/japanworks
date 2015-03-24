<ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
    <li><a href="<?php echo base_url() . "questions" ?>">Hỏi đáp tiếng Nhật</a></li>
    <li>Tag</li>
</ol>

<div class="row main">
    <div class="col-sm-12 left_side">
        <div class="panel">
            <div class="panel-heading"><h2><span class="glyphicon glyphicon-tags"></span> Tag</h2></div>
            <div class="panel-body tag-search-block">
                <div>
                    <p>Tìm kiếm theo Tag (từ khóa / nhãn) theo mỗi lĩnh vực riêng biệt.</p>
                    <form action="<?php echo base_url() . "tags/search" ?>" method="post">
                        <input id="tag-search" class="form-control search-all" name="valueTag" placeholder="">
                        <input type="submit" class="btn btn-orange" id="btnSearch" value="Tìm kiếm">
                    </form>
                </div>
                <?php if (isset($listTags->items) && count($listTags->items) > 0) { //count if ?>
                    <div class="tags-list">
                        <row>
                            <?php
                            $i = 1;
                            foreach ($listTags->items as $tag) {
                                ?>
                                <div class="col col-sm-3 col-xs-6">
                                    <a href="<?php echo base_url() . 'tags/result/' . $tag->name ?>" title="<?php echo $tag->name ?>" rel="tag" class="tag"><?php echo $tag->name ?></a>&nbsp;<span class="item-multiplier"><span class="item-multiplier-x">×</span>&nbsp;<span class="item-multiplier-count"><?php echo $tag->count ?></span></span><br>
                                </div>
                                <?php
                                if ($i % 4 == 0) {
                                    echo "  </row><row>";
                                }
                                $i++;
                            }
                            ?>
                        </row>
                    </div>

                    <div class="pagination-block" align="center">
                        <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong số <strong><?php echo $listTags->total; ?></strong> câu hỏi.</p>
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>