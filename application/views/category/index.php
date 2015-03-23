<!--best jobs -->
<div class = "panel">
    <div class = "panel-heading">
        <div class = "panel-title"> <span class = "glyphicon glyphicon-thumbs-up"></span>  CÁC NGÀNH NGHỀ </div>
    </div>
    <div class = "panel-body">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <ul class="list-unstyled">
                    <?php foreach ($categories as $key => $cat): ?>
                        <li>
                            <a href="<?php echo base_url() . "category/index/cat/" . $cat["category_id"] ?>" title="<?php echo $cat[$this->_langdb] ?>"><?php echo $cat[$this->_langdb] . " ({$cat['total']})" ?></a>
                        </li>
                        <?php echo (($key + 1) % 30 == 0) ? '</ul></div><div class="col-md-6 col-sm-12 col-lg-6"><ul class="list-unstyled">' : '' ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
