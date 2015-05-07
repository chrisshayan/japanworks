<?php
$url = base_url() . "search/index/1/cat/";
?>
<div class="col-md-4 col-sm-4 col-lg-4">
    <?php foreach ($categories as $key => $cat): ?>
        <a href="<?php echo base_url() . "category/index/cat/{$cat["category_id"]}" ?>" title="<?php echo $cat[$this->_langdb] ?>"><?php echo $cat[$this->_langdb] . " ({$cat['total']})" ?></a>
        <br>
        <?php echo (($key + 1) % 5 == 0) ? '</div><div class="col-md-4 col-sm-4 col-lg-4">' : '' ?>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() . "category" ?>" class="pull-right view-all"><?php echo $this->lang->line('view_all') ?></a>
    </div>
</div>


