
<div class="row">
    <div class="col-sm-12">
        <!-- form -->
        <div class="panel">
            <div class="panel-heading"><h2>Success!!!</h2></div>
            <div class="panel-body ">

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
    window.setTimeout(function () {
        window.location.href = '<?php echo base_url('manager/insert'); ?>';
    }, 3000);
</script>
