
<div class="footer">
    <div class="pright">
        <a href="<?php echo base_url(); ?>">Về JapanWorks</a>&nbsp;&nbsp;&nbsp;
        <a target='_blank' href="<?php echo(MAIN_SITE); ?>/lien-he">Liên hệ</a>&nbsp;&nbsp;&nbsp;
        <a target='_blank' href="http://advice.vietnamworks.com/">Tin tức</a>&nbsp;&nbsp;&nbsp;
        <a target='_blank' href="<?php echo(MAIN_SITE); ?>/tro-giup/viec-lam">Trợ giúp</a>&nbsp;&nbsp;&nbsp;
        <br class="newline">
        <a href="<?php echo site_url("about/term"); ?>">Thỏa thuận sử dụng</a>&nbsp;&nbsp;&nbsp;
        <a href="<?php echo site_url("about/privacy"); ?>">Quy định bảo mật</a> <br>
        <br>
    </div>

    <div><strong>Copyright</strong> © Công Ty Cổ Phần JapanWorks.</div>
</div>


<?php if (ENVIRONMENT_REAL) { ?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-103236-1', 'auto');
        ga('send', 'pageview');

    </script>
<?php } else { ?>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-56887961-2', 'auto');
        ga('send', 'pageview');

    </script>
<?php } ?>

<script src="<?php echo base_url(); ?>static/cfp/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/ui.plugins.js" defer ></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>static/js/modernizr.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.fancybox.pack.js" defer></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/home.js" defer></script>

<script type="text/javascript" src="<?php echo base_url(); ?>static/js/imagesloaded.pkgd.min.js" defer></script>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/functions.js" defer></script>
<!-- Chosen -->
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/chosen/chosen.jquery.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        if ($('#flagjob').val() == 1) {

            $("#modal-form").modal('show');
        }
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
        $('#sendme').focus(function () {
            $('.error').hide();
            $('#sendme').removeClass('input_error');
        })
        $('#savejobalert').click(function () {

            var keyword = $('#sendme').val();

            var joblevel = $('#joblevelalert').val();
            var salary = $('#salaryalert').val();
            var dayreceive = $('#dayreceive').val();

            var selectedCate = [];
            var selectedLocal = [];
            var stringSelect = '';

            if (keyword !== '') {
                $('#jobcategoryalert :selected').each(function () {
                    selectedCate.push($(this).val());
                });
                $('#joblocaltionalert :selected').each(function () {
                    selectedLocal.push($(this).val());

                });
                $.ajax({
                    url: "<?php echo base_url('/welcome/sendJobAlert'); ?>",
                    type: 'POST',
                    data: {'email': '<?php
if (isset($this->_userInfo->login_token)) {
    echo $this->_userInfo->email;
} else {
    echo "";
}
?>', 'keyword': '<?php echo KEYWORD_DEDAULT ?> ' + keyword, 'job_level': joblevel, 'salary': salary, 'frequency': dayreceive,
                        'job_categories': selectedCate.join(","), 'job_locations': selectedLocal.join(",")},
                    dataType: "json",
                    success: function (response) {
                        if (response == true) {

                            console.log(response);

                            setTimeout(function () {
                                toastr.options = {
                                    closeButton: true,
                                    progressBar: true,
                                    showMethod: 'slideDown',
                                    timeOut: 4000
                                };
                                toastr.success('Save Successful', 'JAPANWORKS');
                            }, 1300);

                        } else {  //login not correct

                        }
                    }
                }); //end load ajax


                $("#modal-form").modal('hide');
                $('#flagjob').val('0');
                return true;

            } else {
                $('#sendme').addClass('input_error');
                $('.error').show();
                return false
            }//if validate for sendme
        })

    });
</script>
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

    var keywords = <?php echo $keywords; ?>;
    console.log(keywords);
    $("#keywordMainSearch").val(keywords);
    var catSelectted = <?php echo $catsJson; ?>;

    if (catSelectted) {
        var lis = $(catSelectted);
        var cateSelect = $('#cateListMainSearch');
        lis.each(function () {
            cateSelect.find("option:contains(" + $(this).find('span').html() + ")").attr('selected', 'selected');
        });
        cateSelect.trigger('chosen:updated');
    }
    var locSelectted = <?php echo $locsJson ?>;
    if (locSelectted) {
        var los = $(locSelectted);
        var locSelect = $('#locationMainSearch');
        los.each(function () {
            locSelect.find("option:contains(" + $(this).find('span').html() + ")").attr('selected', 'selected');
        });
        locSelect.trigger('chosen:updated');

    }
    var jobLevel = <?php echo $jobLevelJson ?>;
    if (jobLevel) {
        setTimeout(function () {
            $("#jobLevelMainSearch_chosen").find('a').eq(0).find('span').replaceWith(jobLevel);
        }, 1);
    }

    $(".search-choice-close").click(function () {
        $(this).parent().remove();
        return false;
    });
</script>
<script>
    function openURLAlert(e) {

        e.preventDefault();

        var keyword = $('#sendme').val();

        var joblevel = $('#joblevelalert').val();

        var selectedCate = [];
        var selectedLocal = [];
        var stringSelect = '';

        if (keyword !== '') {
            $('#jobcategoryalert :selected').each(function () {
                selectedCate.push($(this).val());
            });
            $('#joblocaltionalert :selected').each(function () {
                selectedLocal.push($(this).val());

            });
            $.ajax({
                url: "<?php echo base_url('/welcome/getUrlAlert'); ?>",
                type: 'POST',
                data: {'keyword': '<?php echo KEYWORD_DEDAULT ?> ' + keyword, 'job_level': joblevel,
                    'job_categories': selectedCate, 'job_locations': selectedLocal},
                success: function (response) {
                    window.open(response, '_blank');
                }
            }); //end load ajax

        } else {
            $('#sendme').addClass('input_error');
            $('.error').show();
            return false;
        }//if validate for sendme
    }

    function scrollToAnchor(aid) {
        var aTag = $("a[name='" + aid + "']");
        $('html,body').animate({scrollTop: aTag.offset().top}, 300);
    }
    $(function () {
    });
</script>

<script>
    $('.carousel').carousel({
        interval: 3000
    });
</script>