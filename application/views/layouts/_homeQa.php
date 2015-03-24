
<!-- Q&A -->
<?php if (isset($qaTop->items) && count($qaTop->items) > 0) { //count if ?>
    <div class="qa-section">
        <div class="panel-heading">
            <h3><strong>Hỏi đáp tiếng Nhật</strong></h3>
        </div>
        <ul>
            <?php foreach ($qaTop->items as $key => $item) { ?>
                <li>
                    <a href="<?php echo base_url() . 'questions/detail/' . $item->question_id ?>" title="<?php echo $item->title ?>"><?php echo $item->title ?></a>
                    <div class="info"><?php echo $item->score ?> votes / <?php echo $item->answer_count ?> answers</div>
                </li>
            <?php } ?>

        </ul>
        <?php if ($qaTop->has_more == true) { //have more ?>
            <a href="<?php echo base_url() . 'questions' ?>" title="See all <?php echo $qaTop->total ?> questions" class="all-qa"><strong>See all <?php echo $qaTop->total ?> questions</strong></a>
        <?php } //end have more  ?>
    </div>

<?php } //end count if  ?>
<!-- end Q&A -->

