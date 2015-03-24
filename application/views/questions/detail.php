
<?php if (isset($quesTion->items) && count($quesTion->items) > 0) { //count if  ?>
    <?php foreach ($quesTion->items as $quest) { ?>

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
            <li><a href="<?php echo base_url() . 'questions/'; ?>">Hỏi đáp tiếng Nhật</a></li>
            <li><?php echo $quest->title; ?></li>
        </ol>

        <div class="row main">
            <!-- PAGE LEFT SIDE -->
            <div class="col-sm-9 left_side">

                <!-- search -->
                <div class="panel">
                    <div class="panel-heading"><h2><span class="glyphicon glyphicon-question-sign"></span> Câu hỏi</h2></div>
                    <div class="panel-body qa-block question-block">
                        <ul class="qa-list question">
                            <li>
                                <div class="statscontainer">
                                    <div class="statsarrow"></div>
                                    <div class="stats">
                                        <div class="vote">
                                            <div class="votes">
                                                <span class="count-post "><strong><?php echo $quest->score; ?></strong></span>
                                                <div class="viewcount">bình chọn</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="summary">
                                    <h3><a href="<?php echo base_url() . 'questions/detail/' . $quest->question_id ?>"><strong><?php echo $quest->title; ?></strong></a></h3>
                                    <p class="post-summary"><?php echo $quest->body; ?></p>
                                    <div class="tags-section">
                                        <a href="<?php echo base_url() . 'tags/result/' . $quest->tags[0] ?>" title="meaning" rel="tag" class="tag"><?php echo $quest->tags[0]; ?></a>
                                    </div>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            <a href="<?php echo $quest->owner->link; ?>"><div class="avatar-wrapper"><img src="<?php echo $quest->owner->profile_image; ?>" alt="" width="32" height="32"></div></a>
                                        </div>
                                        <div class="user-details">
                                            <a href="<?php echo $quest->owner->link; ?>"><?php echo $quest->owner->display_name; ?></a><br>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($quest->is_answered == true) { ?>
                                    <div class="sum-answers">
                                        <strong><?php echo $quest->answer_count; ?> Trả lời</strong>
                                    </div>
                                <?php } ?>
                            </li>
                        </ul>
                        <?php if ($quest->is_answered == true) { ?>
                            <ul class="qa-list answers">
                                <?php foreach ($quest->answers as $ans) { ?>

                                    <li>
                                        <div class="statscontainer">
                                            <div class="statsarrow"></div>
                                            <div class="stats">
                                                <div class="vote">
                                                    <div class="votes">
                                                        <span class="count-post "><strong><?php echo $ans->score; ?> </strong></span>
                                                        <div class="viewcount">bình chọn</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="summary">
                                            <p class="post-summary"><?php echo $ans->body; ?> </p>
                                            <div class="user-info">
                                                <div class="user-avatar">
                                                    <a href="<?php echo $ans->owner->link; ?>"><div class="avatar-wrapper"><img src="<?php echo $ans->owner->profile_image; ?>" alt="" width="32" height="32"></div></a>
                                                </div>
                                                <div class="user-details">
                                                    <a href="<?php echo $ans->owner->link; ?>"><?php echo $ans->owner->display_name; ?></a><br>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        <?php } ?>
                    </div>
                </div>

                <!-- results / jobs -->

            </div>


            <!-- PAGE RIGHT SIDE -->
            <div class="col-sm-3 right_side">
                <div class="qa-section">
                    <div class="module viewcount-info">
                        <span>Đã xem: </span><span><strong><?php echo $quest->view_count; ?> lần</strong></span>
                    </div>

                <?php } ?>
                <div class="related-questions">
                    <h4>Câu hỏi liên quan</h4>
                    <?php foreach ($reLated->items as $val) { ?>
                        <div class="each-question">
                            <span class="num">3</span>
                            <a href="<?php echo base_url() . 'questions/detail/' . $val->question_id ?>" title="">
                                <?php echo $val->title; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- end PAGE RIGHT SIDE -->
    <?php } //end count?>
</div>
