<div class="row wrapper  white-bg page-heading">
    <div class="col-lg-8">
        <h2>Translation detail </h2>

    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <a href="<?php echo base_url('translationadmin/listcontest'); ?>" class="small btn btn-primary"style="background-color: #1ab394;
               border-color: #1ab394;
               color: #FFFFFF;"><i class="fa fa-pencil"></i> List </a>
            <a href="<?php echo base_url('translationadmin/insert'); ?>" class="small btn btn-primary" style="background-color: #1ab394;
               border-color: #1ab394;
               color: #FFFFFF;"><i class="fa fa-check "></i> Post </a>

        </div>
    </div>
</div>
<div class="row">
    <div class="ibox-title">
        <div class=" m-b-xs">
            <strong><?php echo $inforContest['poster'] ?></strong> <span class="text-muted"><i class="fa fa-clock-o"></i> 04 Jan 2015</span> - <span class="text-muted"> 04 Jan 2015</span>
        </div>
        <h2>
            <?php echo $inforContest['text'] ?>
        </h2>

        <div class="row">
            <div class="col-md-6">
                <?php
                $array = explode(",", $inforContest['level_tag']);
                foreach ($array as $lv) {
                    ?>
                    <button class="btn btn-white btn-xs" type="button"><?php echo trim($lv); ?></button>
                <?php }
                ?>

            </div>
            <div class="col-md-6">
                <div class=" text-right">
                    <div> <i class="fa fa-comments"> </i> <?php echo $totalAllAnswer; ?> answers </div>
                    <i class="fa fa-trophy"> </i>  <?php echo $inforContest['prize'] ?>

                </div>
            </div>
        </div>

    </div>
    <div class="ibox-content">
        <?php if ($listAnswer) { ?>
            <?php foreach ($listAnswer as $list) {
                ?>
                <div class="well well-sm">
                    <div class="small m-b-xs">
                        <?php if (isset($list['cv'])) { ?>
                            <strong><a href='https://docs.google.com/gview?url=<?php echo urlencode(base_url() . $list['cv']) ?>&embedded = true' target="_blank"><?php echo $list['email'] ?></a></strong>
                        <?php } else { ?>
                            <strong><?php echo $list['email'] ?></strong>
                        <?php } ?>
                        <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo date('F j, Y', strtotime($list['createdate'])); ?></span>
                    </div>
                    <div class="small m-b-xs">
                        <strong><?php echo $list['nickname'] ?></strong>
                    </div>
                    <?php echo $list['text'] ?>
                </div>
            <?php } ?>

        <?php } else { ?>
            <div class="well well-sm">
                No record
            </div>
        <?php } ?>
        <div class="pagination-block" align="center">
            <p>Show: <strong><?php echo $valueShowRecord; ?></strong> in <strong><?php echo isset($totalAllAnswer) ? $totalAllAnswer : 0; ?></strong> answers.</p>
            <ul class="pagination">
                <?php echo $this->pagination->create_links(); ?>
            </ul>
        </div>
    </div>

</div>


