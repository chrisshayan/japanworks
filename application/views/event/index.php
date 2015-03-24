
<ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
    <li>Hội thảo Cơ hội thăng tiến với tiếng Nhật</li>
</ol>
<div class="row">
    <div class="col-sm-12">
        <div class="banner-title">
            <h1>
                <img src="<?php echo base_url("/static/img/event-banner-title.png") ?>" alt="Hội thảo cơ hội thăng tiến nhờ tiếng Nhật">
            </h1>
        </div>
        <div id="myCarousel" class="carousel slide events" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo base_url("/static/img/slider/slider-img-1.jpg") ?>" alt="">
                </div>

                <div class="item">
                    <img src="<?php echo base_url("/static/img/slider/slider-img-2.jpg") ?>" alt="">
                </div>

                <div class="item">
                    <img src="<?php echo base_url("/static/img/slider/slider-img-3.jpg") ?>" alt="">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>

<div class="row main">

    <!-- PAGE LEFT SIDE -->
    <div class="col-sm-12 left_side events-container">
        <div class="panel-heading upcoming-event">
            <h2><span class="glyphicon glyphicon-volume-up"></span> Event sắp tới</h2>
        </div>
        <!--
        <div class="panel-heading past-event">
            <h2><span class="glyphicon glyphicon-volume-off"></span> Event đã qua</h2>
        </div>
        -->
        <!-- search -->
        <div class="panel">

            <div class="panel-body qa-block">
                <?php if (isset($listEvent->data) && count($listEvent->data) > 0) { //count if ?>
                    <ul class="qa-list upcoming">
                        <?php
                        foreach ($listEvent->data as $event) {
                            $date = new DateTime($event->start_time);
                            ?>
                            <li>
                                <div class="col-sm-9 summary">
                                    <h3><a target="_blank" href="<?php echo 'https://www.facebook.com/events/' . $event->id; ?>"><strong> <?php echo $event->name; ?></strong></a></h3>
                                    <p class="post-summary">
                                        <?php
                                        if (strlen(($event->description)) > 250)
                                            echo substr(($event->description), 0, 250) . "...";
                                        else
                                            echo ($event->description);
                                        ?>

                                    </p>
                                </div>
                                <div class="col-sm-3 time-info">
                                    <span class="glyphicon glyphicon-calendar"></span> <?php echo str_replace("-", "tháng", $date->format('d - m, Y')); ?>
                                    <br>
                                    <span class = "glyphicon glyphicon-time"></span> <?php echo $date->format('h:i a');
                                        ?><br>
                                    <button type="button" class="btn btn-default join-in-fb" aria-label="Left Align">
                                        <a target="_blank" onclick="ga('send', 'event', 'link', 'click', 'eventtoFB', 1);" href="<?php echo 'https://www.facebook.com/events/' . $event->id; ?>"><strong>Join in Facebook</strong></a>
                                    </button>
                                </div>
                            </li>

                            <?php
                        }
                        ?>

                    </ul>
                <?php } ?>
                <!--
                 <ul class="qa-list past">
                     <li>
                         <div class="col-sm-9 summary">
                             <h3><a href="#"><strong>Đã qua Ngày hội họp mặt người yêu tiếng Nhật</strong></a></h3>
                             <p class="post-summary">
                                 Ngày 22/3 sắp tới, sự kiện offline đặc biệt dành riêng cho cộng đồng FIFA Online 3 Hà Nội và TP Hồ Chí Minh sẽ được diễn ra, hứa hẹn đem đến nhiều bất.
                             </p>
                         </div>
                         <div class="col-sm-3 time-info">
                             <span class="glyphicon glyphicon-calendar"></span> Thứ Tư, 1 tháng 5, 2015<br>
                             <span class="glyphicon glyphicon-time"></span> 13:00 - 16:00<br>
                             <button type="button" class="btn btn-default join-in-fb" aria-label="Left Align">
                                 <a href="#"><strong>Review in Facebook</strong></a>
                             </button>
                         </div>
                     </li>
                     <li>
                         <div class="col-sm-9 summary">
                             <h3><a href="#"><strong>Đã qua Giao lưu văn hóa Nhật Bản</strong></a></h3>
                             <p class="post-summary">
                                 Ngày 22/3 sắp tới, sự kiện offline đặc biệt dành riêng cho cộng đồng FIFA Online 3 Hà Nội và TP Hồ Chí Minh sẽ được diễn ra, hứa hẹn đem đến nhiều bất.
                             </p>
                         </div>
                         <div class="col-sm-3 time-info">
                             <span class="glyphicon glyphicon-calendar"></span> Thứ Tư, 1 tháng 5, 2015<br>
                             <span class="glyphicon glyphicon-time"></span> 13:00 - 16:00<br>
                             <button type="button" class="btn btn-default join-in-fb" aria-label="Left Align">
                                 <a href="#"><strong>Review in Facebook</strong></a>
                             </button>
                         </div>
                     </li>
                 </ul>
                -->
                <div class="more-event last-info">
                    <div class="wrapper">
                        <span class="preapare">Nhiều event mới đang được chuẩn bị!</span><br>
                        <span>Nếu bạn có ý tưởng hay yêu cầu về những Event sắp tới, đừng ngần ngại cho chúng tôi biết. Cảm ơn!</span><br>
                        <button type="button" class="btn btn-default btn-email-survey" aria-label="Left Align">
                            <a href="mailto:morio@vietnamworks.com"><strong>Gửi email: morio@vietnamworks.com</strong></a>
                        </button>
                    </div>
                </div>
                <div class="no-event last-info">
                    <div class="wrapper">
                        <span class="preapare">Không có event cũ.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- results / jobs -->

    </div>
</div>

<!-- heapanalytics -->
<script type="text/javascript">
    window.heap = window.heap || [], heap.load = function (t, e) {
        window.heap.appid = t, window.heap.config = e;
        var a = document.createElement("script");
        a.type = "text/javascript", a.async = !0, a.src = ("https:" === document.location.protocol ? "https:" : "http:") + "//cdn.heapanalytics.com/js/heap-" + t + ".js";
        var n = document.getElementsByTagName("script")[0];
        n.parentNode.insertBefore(a, n);
        for (var o = function (t) {
            return function () {
                heap.push([t].concat(Array.prototype.slice.call(arguments, 0)))
            }
        }, p = ["clearEventProperties", "identify", "setEventProperties", "track", "unsetEventProperty"], c = 0; c < p.length; c++)
            heap[p[c]] = o(p[c])
    };
    heap.load("1726761437");
</script>
