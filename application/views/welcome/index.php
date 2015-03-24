<!-- search -->

<?php $this->load->view("/welcome/_searchBox", array("categories" => $hotCats)); ?>

<!--best jobs -->
<div class = "panel" id="content">
    <?php $this->load->view("/welcome/_content", array("resultsSearchJob" => $resultsSearchJob)); ?>
</div>


<script>
    (function ($) {
        $('.fancybox').fancybox();
    })(jQuery);
</script>

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