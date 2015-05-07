<!-- search -->
<ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
    <li>Hỏi đáp tiếng Nhật</li>
</ol>

<div class="row">
    <div class="col-sm-12 qa-banner">
        <img class="logo-qa" src="<?php echo base_url() ?>static/img/logo-qa.png" alt="Q&A">
        <h1><img src="<?php echo base_url() ?>static/img/title-qa.png" alt="Hỏi đáp tiếng Nhật"></h1>
        <div class="sum-info">Hơn <?php echo isset($listQuest->total) ? $listQuest->total : 0; ?> câu hỏi về tiếng Nhật</div>
        <div class="by-info">Japanese Language Stack Exchange</div>
    </div>

</div>

<div class="row main">

    <!-- PAGE LEFT SIDE -->
    <div class="col-sm-9 left_side">

        <!-- search -->
        <div class="panel">
            <div class="panel-heading"><h2><span class="glyphicon glyphicon-question-sign"></span> Danh sách câu hỏi</h2></div>
            <div class="panel-body qa-block">
                <?php if (isset($listQuest->items) && count($listQuest->items) > 0) { //count if ?>
                    <ul class="qa-list">
                        <?php foreach ($listQuest->items as $quest) { ?>
                            <li>
                                <div class="statscontainer">
                                    <div class="statsarrow"></div>
                                    <div class="stats">
                                        <div class="vote">
                                            <div class="votes">
                                                <span class="count-post "><strong><?php echo $quest->score ?></strong></span>
                                                <div class="viewcount">bình chọn</div>
                                            </div>
                                        </div>
                                        <div class="vote">
                                            <span class="count-post"><strong><?php echo $quest->answer_count ?></strong></span>
                                            <div class="viewcount">trả lời</div>
                                        </div>
                                    </div>
                                    <div class="vote" title=" <?php echo $quest->view_count ?> đã xem">
                                        <?php echo $quest->view_count ?> đã xem
                                    </div>
                                </div>

                                <div class="summary">
                                    <h3><a href="<?php echo base_url() . 'questions/detail/' . $quest->question_id ?>"><?php echo $quest->title ?></a></h3>
                                    <p class="post-summary"><?php
                                        if (strlen(strip_tags($quest->body)) > 195)
                                            echo substr(strip_tags($quest->body), 0, 195) . "...";
                                        else
                                            echo strip_tags($quest->body);
                                        ?>
                                    </p>
                                    <div class="tags-section">
                                        <?php foreach ($quest->tags as $tag) { ?>
                                            <a href="<?php echo base_url() . 'tags/result/' . $tag ?>" title="<?php echo $tag; ?>" rel="tag" class="tag"><?php echo $tag; ?></a>
                                        <?php } ?>
                                    </div>
                                    <?php if ($quest->owner->user_type != 'does_not_exist') { ?>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <a target="_blank" href="<?php echo $quest->owner->link ?>"><div class="avatar-wrapper"><img src="<?php echo $quest->owner->profile_image ?>" alt="" width="32" height="32"></div></a>
                                            </div>
                                            <div class="user-details">
                                                <a target="_blank" href="<?php echo $quest->owner->link ?>"><?php echo $quest->owner->display_name ?></a><br>
                                            </div>
                                        </div>

                                    <?php } else { ?>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <div class="avatar-wrapper"><img src="<?php echo base_url("static/img/default_user.png") ?>" alt="" width="32" height="32"></div>
                                            </div>
                                            <div class="user-details">
                                                <?php echo $quest->owner->display_name ?><br>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </li>

                        <?php } ?>

                    </ul>

                    <div class="pagination-block" align="center">
                        <p>Hiển thị: <strong><?php echo $valueShowRecord; ?></strong> trong số <strong><?php echo isset($listQuest->total) ? $listQuest->total : 0;?></strong> câu hỏi.</p>
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- results / jobs -->

    </div>


    <!-- PAGE RIGHT SIDE -->
    <div class="col-sm-3 right_side">
        <div class="qa-section">
            <div class="module" id="questions-count">
                <div class="summarycount"><?php echo isset($listQuest->total) ? $listQuest->total : 0; ?></div>
                <p>câu hỏi</p>
            </div>

            <div class="js-gps-related-tags" id="related-tags">

                <h4 id="h-related-tags">Tag liên quan</h4>
                <?php if (isset($tagRight->items) && count($tagRight->items) > 0) { //count if ?>
                    <?php foreach ($tagRight->items as $key => $tag) { ?>
                        <div class="each-tag">
                            <a href="<?php echo base_url() . 'tags/result/' . $tag->name ?>" title="<?php echo $tag->name; ?> " rel="tag" class="tag"><?php echo $tag->name; ?> </a>&nbsp;<span class="item-multiplier"><span class="item-multiplier-x">×</span>&nbsp;<span class="item-multiplier-count"><?php echo $tag->count ?></span></span>
                        </div>

                        <?php
                    }
                }
                ?>

                <a href="<?php echo base_url() . 'tags/' ?>" class="show-more">
                    Xem thêm
                </a>
            </div>
        </div>
    </div>
    <!-- end PAGE RIGHT SIDE -->

</div>
<?php /*

  <div class="col-sm-9 left_side">
  <div class = "panel" id="content">
  <?php
  foreach ($qaTop->items as $key => $qa) {

  foreach ($qa->tags as $tag) {
  echo $tag;
  }
  echo $qa->title . "<br/>";
  }
  ?>
  </div>
  </div>

  <!-- PAGE RIGHT SIDE -->
  <div class="col-sm-3 right_side">
  <?php
  foreach ($tagRight->items as $key => $tag) {

  echo $tag->name . "<br/>";
  }
  ?>
  </div>


 */ ?>
