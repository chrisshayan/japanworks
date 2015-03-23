<?php
$isHome = (in_array($this->router->fetch_class(), array("welcome", "search")) && $this->router->fetch_method() === 'index') ? true : false;
?>
<a name="top" id="top"></a>
<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="logo">
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url("static/img/logo.jpg") ?>" width="313" height="85" class="img-responsive-logo"  alt="JapanWorks"/>
                        <?php /* echo ($isHome) ? "<h1>": ""?><span class="slogan hidden-xs"><?php echo $this->lang->line("slogan") ?></span><?php echo ($isHome) ? "</h1>": "" */ ?></a>
                </div>
            </div>
            <div class="col-xs-6">
                <div align="right" class="head_right">
                    <div><a href="<?php echo(MAIN_SITE); ?>"><img src="<?php echo base_url("static/img/power_vnw.png") ?>" width="180" height="54" alt="" class="img-responsive"/></a></div>

                </div>
            </div>
        </div>
    </div>
</div>
