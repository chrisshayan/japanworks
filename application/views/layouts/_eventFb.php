<!-- Event -->
<div class="event-section">
    <h3>
        <a href="<?php echo site_url("event"); ?>">

            <img src="<?php echo base_url("/static/img/event-bg.jpg") ?>" alt="Hội thảo cơ hội thăng tiến với tiếng Nhật">
            <strong>Hội thảo cơ hội thăng tiến với tiếng Nhật</strong>
        </a>
    </h3>
    <?php if (isset($listEvent->data) && count($listEvent->data) > 0) { //count if  ?>
        <ul>
            <?php
            foreach ($listEvent->data as $event) {
                $date = new DateTime($event->start_time);
                ?>

                <li>
                    <p class = "info"><span class = "glyphicon glyphicon-calendar"></span> <?php echo str_replace("-", "tháng", $date->format('d - m, Y')); ?></p>
                    <a onclick="ga('send', 'event', 'link', 'click', 'hometoFB', 1);" href="<?php echo 'https://www.facebook.com/events/' . $event->id; ?>" target = "_blank"><strong><?php echo $event->name; ?></strong></a>
                </li>
            <?php } ?>
        </ul>
        <?php
    }
    ?>

</div>
<!-- end Event -->
