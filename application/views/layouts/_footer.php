<div id="footer" align="center">
    <a href="<?php echo base_url(); ?>">Về JapanWorks</a>&nbsp;&nbsp;&nbsp;
    <a target='_blank' href="<?php echo(MAIN_SITE); ?>/lien-he">Liên hệ</a>&nbsp;&nbsp;&nbsp;
    <a target='_blank' href="http://advice.vietnamworks.com/">Tin tức</a>&nbsp;&nbsp;&nbsp;
    <a target='_blank' href="<?php echo(MAIN_SITE); ?>/tro-giup/viec-lam">Trợ giúp</a>&nbsp;&nbsp;&nbsp;<br>
    <a href="<?php echo site_url("about/term"); ?>">Thỏa thuận sử dụng</a>&nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url("about/privacy"); ?>">Quy định bảo mật</a> <br>
    <br>
    <p class="small copyright">Copyright © Công Ty Cổ Phần JapanWorks.</p>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/ui.plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/home.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/isotope.pkgd.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/functions.js"></script>

<?php
if (!isset($search)) {
    $search = new MySearch();
    if ($this->session->userdata("VNW_SEARCH_DETAIL"))
        $search = $this->session->userdata("VNW_SEARCH_DETAIL");
}

$cats = "";
$locs = "";
$jobLevel = "";
if (is_array($search->job_category)) {
    foreach ($search->job_category as $cat) {
        if (isset($this->_categories[$cat]))
            $cats .= "<li class='search-choice multi-3'><span>{$this->_categories[$cat][$this->_langdb]}</span><input type='hidden' name='job_category[]' value='{$cat}'/><a class='search-choice-close' data-option-array-index='{$cat}'></a></li>";
    }
}

if (is_array($search->job_location)) {
    foreach ($search->job_location as $loc) {
        if (isset($this->_locations[$loc]))
            $locs .= "<li class='search-choice multi-3'><span>{$this->_locations[$loc][$this->_langdb]}</span><input type='hidden' name='job_location[]' value='{$loc}'/><a class='search-choice-close' data-option-array-index='{$loc}'></a></li>";
    }
}

if (isset($this->_jobLevels[$search->job_level])) {
    $jobLevel = "<span>{$this->_jobLevels[$search->job_level][$this->_langdb]}<input type='hidden' name='job_level' value='{$search->job_level}' /></span>";
}

$catsJson = json_encode($cats);
$locsJson = json_encode($locs);
$jobLevelJson = json_encode($jobLevel);
$keywords = json_encode(trim(str_replace(strtolower(KEYWORD_DEDAULT), '', $search->job_title)));
?>
<script>
    var keywords = <?php echo $keywords ?>;
    $("#keywordMainSearch").val(keywords);
    var catSelectted = <?php echo $catsJson ?>;
    if (catSelectted) {
        $("#cateListMainSearch_chosen .chosen-choices").prepend(catSelectted);
        $("#cateListMainSearch_chosen .chosen-choices .search-field input").val("");
        $("#cateListMainSearch_chosen .chosen-choices .search-field input").css("width", "25px");
    }
    var locSelectted = <?php echo $locsJson ?>;
    if (locSelectted) {
        $("#locationMainSearch_chosen .chosen-choices").prepend(locSelectted);
        $("#locationMainSearch_chosen .chosen-choices .search-field input").val("");
        $("#locationMainSearch_chosen .chosen-choices .search-field input").css("width", "25px");
    }
    var jobLevel = <?php echo $jobLevelJson ?>;
    if (jobLevel) {
        $("#jobLevelMainSearch_chosen .chosen-single").html(jobLevel);
    }

    $(".search-choice-close").click(function () {
        $(this).parent().remove();
        return false;
    });
</script>
<script>
    function scrollToAnchor(aid) {
        var aTag = $("a[name='" + aid + "']");
        $('html,body').animate({scrollTop: aTag.offset().top}, 300);
    }
    $(function () {
    });
</script>