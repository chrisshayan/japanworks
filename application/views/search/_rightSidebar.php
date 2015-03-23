<?php
$url = base_url() . "search/index/1/cat/";
?>
<!--Begin Sidebar-->
<div class="sidebar col-md-3">
    <div class="list-ver link-n">
        <h2 class="list-header"><?php echo $this->lang->line('job_categories') ?></h2>
        <ul class="hotjob">
            <?php
            foreach ($categories as $cat) {
                if (isset($cat['category_id'])) {
                    $fullAlias = aliasHasId($cat['category_id'], $cat['lang_en']);
                    ?>
                    <li>
                        <a href="<?php echo base_url() . "category/index/cat/{$cat["category_id"]}" ?>" title="<?php echo $cat[$this->_langdb] ?>"><?php echo $cat[$this->_langdb] ?></a>
                        <em><?php echo $cat['total'] ?></em>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        <p class="link-h"><a href="<?php echo base_url() . "category" ?>"><?php echo $this->lang->line('view_all') ?></a></p>
    </div>
</div>