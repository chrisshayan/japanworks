
<div class="row">
    <div class="col-sm-12">
        <!-- form -->
        <div class="panel">
            <div class="panel-heading"><h2>Success!!!</h2></div>
            <div class="panel-body ">
                <?php if (isset($check)) { ?>
                    <input type="hidden" id="check" name="check" value="1" />
                <?php } ?>
                <div class="success-register">
                    <div class="well well-success">
                        Success!!! Return to the previous screen after 3 seconds.<br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var url = '<?php echo base_url('translationadmin/insert'); ?>';
    if ($('#check').val() == 1) {
        url = '<?php echo base_url('translationadmin/listcontest'); ?>';
    }

    window.setTimeout(function () {
        window.location.href = url;

    }, 3000);
</script>
