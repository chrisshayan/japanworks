<!DOCTYPE html>
<!-- saved from url=(0028)http://www.vietnamworks.com/ -->
<html lang="en" class="js canvas geolocation video audio localstorage sessionstorage texttrackapi track"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url("static/img/favicon.ico?240720141702"); ?>" type="image/x-icon">
        <title><?php echo ($this->_pageTitle) ? $this->_pageTitle : $this->lang->line("page_title") ?></title>
        <meta name="Robots" content="index, follow">
        <meta name="Description" content="<?php echo ($this->_metaData) ? $this->_metaData : $this->lang->line("meta_data") ?>">
        <meta name="Keywords" content="<?php echo ($this->_metaKeys) ? $this->_metaKeys : $this->lang->line("meta_keys") ?>">
        <meta name="format-detection" content="telephone=no">

        <meta property="og:image" content="<?php echo base_url("static/img/big_photo.ipg"); ?>">
        <meta property="og:title" content="<?php echo ($this->_pageTitle) ? $this->_pageTitle : $this->lang->line("page_title") ?>">
        <meta property="og:url" content="<?php echo current_url() ?>">
        <meta property="og:title_name" content="<?php echo base_url() ?>">
        <meta property="og:description" content="<?php echo ($this->_metaData) ? $this->_metaData : $this->lang->line("meta_data") ?>">
        <link rel="canonical" href="<?php echo($this->_canonicalLink); ?>" />


        <!-- cfp -->

        <link href="<?php echo base_url("static/cfp/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/style.css"); ?>" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link href="<?php echo base_url("static/cfp/css/plugins/chosen/chosen.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/plugins/blueimp/css/blueimp-gallery.min.css"); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/site.css?201507011"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/grid.css?201507012"); ?>">
        <!-- job alert -->
        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>static/cfp/js/jquery-2.1.1.js"></script>
        <!-- Jquery Validate -->
        <style>
            /* Local style for demo purpose */

            .lightBoxGallery {
                text-align: center;
            }

            .lightBoxGallery img {
                margin: 5px;
            }

        </style>


    </head>

    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper">
                <!--header-->
                <?php echo render_partial('/headerBase'); ?>
                <!--End header-->
                <!-- main -->
                <div class="wrapper wrapper-content ">
                    <?php echo $this->ocular->yield(); ?>
                </div>
                <!-- main -->
                <!--footer-->
                <div class="footer">
                    <?php echo render_partial('/footerBase'); ?>
                </div>
                <!--End footer-->

            </div>
        </div>
        <?php echo render_partial('/scriptBaseSearch'); ?>
        <!-- //wrapper -->
    </body>
</html>
