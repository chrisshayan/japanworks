<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Post translation contest </h2>

    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <a href="<?php echo base_url('translationadmin/listcontest'); ?>" class="small btn btn-primary"style="background-color: #1ab394;
               border-color: #1ab394;
               color: #FFFFFF;"><i class="fa fa-pencil"></i> List </a>

        </div>
    </div>
</div>
<div class="container" style="min-height:700px">
    <div class="middle-box text-center" style="margin-top: 0px;">
        <form id="form_post" role="form" method = "post">
            <div class="form-group">
                <input id="poster" name="poster" type="text" class="form-control" placeholder="Name of poster" required value="<?php if (isset($inforContest)) echo $inforContest['poster']; ?>">
            </div>
            <div class="form-group"  id="data_1">

                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="startdate" name="startdate"  type="text" class="form-control" value="<?php
                    if (isset($inforContest))
                        echo $inforContest['start_date'];
                    else
                        echo "Start date";
                    ?>" >
                </div>
            </div>
            <div class="form-group"  id="data_2">

                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="enddate" name="enddate"  type="text" class="form-control" value="<?php
                    if (isset($inforContest))
                        echo $inforContest['end_date'];
                    else
                        echo "End date";
                    ?>">
                </div>
            </div>

            <div class="form-group">
                <input id="leveltag" name="leveltag" type="text" class="form-control" placeholder="Level tag" required value="<?php if (isset($inforContest)) echo $inforContest['level_tag']; ?>">
            </div>
            <div class="form-group">
                <input id="prize" name="prize" type="text" class="form-control" placeholder="Prize" required value="<?php if (isset($inforContest)) echo $inforContest['prize']; ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="textarea" id="textarea" rows="10" ><?php if (isset($inforContest)) echo str_replace("<br />", "", $inforContest['text']); ?></textarea>
            </div>
            <input type="hidden" id="isSent" name="isSent" value="OK" />
            <button type="submit" id="applyButton" class="btn btn-primary block full-width m-b">Xác nhận</button>

        </form>


    </div>
</div>


<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/cfp/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>static/cfp/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>

<script type="text/javascript">

    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('#data_2 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $("#form_post").validate({
        rules: {
            poster: {
                required: true,
            },
            startdate: {
                required: true,
            },
            enddate: {
                required: true,
            },
            leveltag: {
                required: true,
            },
            prize: {
                required: true,
            },
            textarea: {
                required: true,
            }
        },
        messages: {
            poster: {
                required: 'This field is required.'
            },
            startdate: {
                required: 'This field is required.'
            },
            enddate: {
                required: 'This field is required.'
            },
            leveltag: {
                required: 'This field is required.'
            },
            prize: {
                required: 'This field is required.'
            },
            textarea: {
                required: 'This field is required.'
            }
        }
    });




</script>
