<!-- search -->

<?php $this->load->view("/welcome/_searchBox", array("categories" => $hotCats)); ?>
<!--best jobs -->
<div class="row">
    <?php $this->load->view("/welcome/_special"); ?>
</div>
<div class="row">
    <div class="col-sm-9 left_side">
        <div class = "panel" id="content">
            <?php $this->load->view("/welcome/_content", array("resultsSearchJob" => $resultsSearchJob)); ?>
        </div>
    </div>
    <!-- Right column -->
    <div class="col-sm-3 right_side">
        <p align="center" class="ads_title">QUẢNG CÁO</p>
        <div class="mb15 ads">
            <a href="http://japan.vietnamworks.com/job/546823-japanese-interpreter-staff-2-persons-urgent/?utm_source=JPWsBanner&utm_medium=JBU&utm_campaign=Toto" target="_blank"><img src="<?php echo base_url("static/img/toto-banner.jpg") ?>" width="100%" alt="">
            </a>
        </div>
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

