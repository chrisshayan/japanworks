
<script src="<?php echo base_url(); ?>static/cfp/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?php echo base_url(); ?>static/cfp/js/inspinia.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/pace/pace.min.js"></script>

<script src="<?php echo base_url(); ?>static/cfp/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/chosen/chosen.jquery.js"></script>

<script src="<?php echo base_url(); ?>static/cfp/js/jquery-ui.custom.min.js"></script>

<!-- blueimp gallery -->
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

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
    $(".benefit").click(function () {
        var a = $(this).attr('class');
        var word = a.split(" ").pop();

        $("." + word + " ul").toggle();
        $('span.arrow', this).toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
    });


    $("a#hot_cat").click(function () {
        //alert(1);
        $("#categories").slideToggle(function () {
            //$("a#hot_cat span").addClass('glyphicon-chevron-up');
        });
    });

    $(document).ready(function () {
        if ($('#flagjob').val() == 1) {

            $("#modal-form").modal('show');
        }
        var config = {
            '.chosen-select': {max_selected_options: 3},
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
        });

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
        });

    });
</script>

<script>

    var keywords = <?php echo $keywords; ?>;
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
        alert('aaaa');
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
