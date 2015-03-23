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

