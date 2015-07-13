<!DOCTYPE html>
<!-- saved from url=(0028)http://www.vietnamworks.com/ -->
<html lang="en" class="js canvas geolocation video audio localstorage sessionstorage texttrackapi track"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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


        <!-- Latest compiled and minified CSS -->


        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/search.css?201406161725"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/default.css?201406241331"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_cfp.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_grid.css?2014241300"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/bootstrap-datepicker3.css") ?>">

        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.carousel.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("static/css/owl.theme.css"); ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/font-awesome.min.css") ?>">
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery-1.11.1.min.js"></script>
        <script type='text/javascript' src='https://api.stackexchange.com/js/2.0/all.js'></script>
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
                ga('send', 'pageview');</script>
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
                ga('send', 'pageview');</script>
        <?php } ?>
    </head>

    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper">
                <?php $this->load->view("/layouts/_header"); ?>
                <div class="wrapper wrapper-content">
                    <div class="container" id="section2">
                        <form id="online-resume-form" name="resumeForm" class="form-horizontal" action="" method="post"  novalidate="novalidate" onsubmit="return vaidateBeforeSubmit(event)" enctype="multipart/form-data">

                            <div class="container career-center-block" id="section2">
                                <div class="benefit-title">
                                    Mẫu hồ sơ của Japanworks
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-resume">
                                        <div class="panel">
                                            <div class="panel-body">

                                                <div class="col-sm-10">
                                                    <div class="edit-field">
                                                        <?php echo $this->lang->line("language_resume"); ?> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                        <a class="language-link" href="
                                                        <?php
                                                        if ($lang == 1) {
                                                            echo base_url('onlineresume/index/en#');
                                                        } else {

                                                            echo base_url('onlineresume/index/en');
                                                        }
                                                        ?>"><?php echo $this->lang->line("lang_english"); ?> </a> &nbsp; &nbsp;|&nbsp; &nbsp;
                                                        <a class="language-link" href="
                                                        <?php
                                                        if ($lang == 2) {
                                                            echo base_url('onlineresume/index/jp#');
                                                        } else {
                                                            echo base_url('onlineresume/index/jp');
                                                        }
                                                        ?>
                                                           "><?php echo $this->lang->line("lang_japanese"); ?> </a> &nbsp; &nbsp;|&nbsp; &nbsp;
                                                        <a class="language-link" href="
                                                        <?php
                                                        if ($lang == 3) {
                                                            echo base_url('onlineresume/index/vn#');
                                                        } else {
                                                            echo base_url('onlineresume/index/vn');
                                                        }
                                                        ?>
                                                           "><?php echo $this->lang->line("lang_vietnam"); ?> </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <label for="" class="col-sm-1 control-label">
                                                        <strong class="text-red">*</strong>
                                                        <?php echo $this->lang->line("title"); ?>
                                                    </label>
                                                    <div class="col-sm-11">
                                                        <div class="edit-field">
                                                            <input type="hidden" id="idLang" name="idLang" value="<?php echo $lang ?>" />
                                                            <input type="text" class="form-control edit-control" id="nameresume"  name="nameresume" placeholder=" <?php echo $this->lang->line("ph_title"); ?>" value="">
                                                            <div class="has-error"></div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" data-text="allow employers to search your resume" value="1" name="check-allow" id="check-allow" checked="checked" class="edit-control">
                                                                    <?php echo $this->lang->line("allow"); ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body panel-form">
                                                <div class="border-info">
                                                    <fieldset class="edit-mode">
                                                        <legend title="" class="box-md first" ><i class="fa fa-fw fa-phone"></i> <?php echo $this->lang->line("contact"); ?>
                                                        </legend>
                                                        <div class="field-cont">
                                                            <div class="col-sm-3">
                                                                <div class="tab01-imgCircle">
                                                                    <div class="inner-circle">
                                                                        <div><img id="blah" src="<?php echo base_url("static/img/avatar-circle.png"); ?>" alt="" /></div>
                                                                    </div>
                                                                </div>

                                                                <div class="edit-field" >



                                                                    <span class="upload-button">
                                                                        <input type="hidden" name="maxFileSize" value="1048576">
                                                                        <input type="file" rel="requiredField" id="inputFile" name="inputFile" class="editable left" tabindex="8" placeholder="">
                                                                        <span class="small">(định dạng .png, .jpeg,.gif, .jpg nhỏ hơn 1MB)</span>



                                                                    </span>
                                                                    <div class="has-error"></div>
                                                                    <?php if (isset($uploadError) && $uploadError['upload_error'] == true) { ?>
                                                                        <div class="has-error">

                                                                            <?php echo $errorUpload; ?>

                                                                        </div>
                                                                    <?php } ?>

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <div class="row">
                                                                    <!-- name  -->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for="name"><strong class="text-red">*</strong><?php echo $this->lang->line("name"); ?></label>

                                                                        <div class="col-sm-10">
                                                                            <div class="edit-field">
                                                                                <input type="text" value="" placeholder="<?php echo $this->lang->line("ph_name"); ?>" name="name" id="name" class="form-control edit-control">
                                                                                <div class="has-error"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- email-->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for="Email"><strong class="text-red">*</strong>Email</label>

                                                                        <div class="col-sm-10">
                                                                            <div class="edit-field">
                                                                                <input type="text" class="form-control" id="email" name="email"  placeholder="yourmail@gmail.com">
                                                                                <div class="has-error"></div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <!-- date-birthday / gender -->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for="Date of birtth"><strong class="text-red">*</strong><?php echo $this->lang->line("birthday"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field" id="date-birthday">
                                                                                <input type="text" class="form-control " id="birthday" name="birthday">
                                                                                <div class="has-error"></div>
                                                                            </div>
                                                                        </div>

                                                                        <label class="col-sm-2 control-label" for="Gender"><strong class="text-red">*</strong><?php echo $this->lang->line("gender"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <label class="radio-inline" for="gender-male">
                                                                                    <input class="edit-control" type="radio" name="gender" id="gender-male" value="Male"   data-text-value="Male">
                                                                                    <?php echo $this->lang->line("male"); ?>
                                                                                </label>

                                                                                <label class="radio-inline" for="gender-female">
                                                                                    <input class="edit-control" type="radio" name="gender" id="gender-female" value="Female" checked="checked"  data-text-value="Female">
                                                                                    <?php echo $this->lang->line("female"); ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!-- marital status / material status -->
                                                                    <div class="form-group">

                                                                        <label class="col-sm-2 control-label" for="Marital Status"><?php echo $this->lang->line("material"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <label class="radio-inline" for="sigle">
                                                                                    <input class="edit-control" type="radio" name="material" id="sigle" value="Single"
                                                                                           data-text-value="Single">
                                                                                           <?php echo $this->lang->line("single"); ?>
                                                                                </label>
                                                                                <label class="radio-inline" for="married">
                                                                                    <input class="edit-control" type="radio" name="material" id="married" value="married"
                                                                                           checked="checked"
                                                                                           data-text-value="Married">
                                                                                           <?php echo $this->lang->line("married"); ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <label class="col-sm-2 control-label" for="Nationality" ><strong class="text-red">*</strong><?php echo $this->lang->line("national"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <select  id="nationality" name="nationality" class="form-control" placeholder="<?php echo $this->lang->line("ph_national"); ?>">
                                                                                    <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                    <option value="Local Vietnamese" ><?php echo $this->lang->line("ph_national_vn"); ?></option>
                                                                                    <option value="Foreigner"  ><?php echo $this->lang->line("ph_national_forgein"); ?></option>
                                                                                </select>
                                                                                <div class="has-error"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- address -->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for=""><?php echo $this->lang->line("address"); ?></label>

                                                                        <div class="col-sm-10">
                                                                            <div class="edit-field">
                                                                                <input type="text" value="" id="address" name="address" placeholder="<?php echo $this->lang->line("ph_address"); ?>" class="form-control edit-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--  country / provice-->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for=""><strong class="text-red">*</strong> <?php echo $this->lang->line("country"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <select  id="country" name="country" class="form-control" placeholder="<?php echo $this->lang->line("ph_national"); ?>">
                                                                                    <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                    <?php foreach ($arrayCountry as &$value) { ?>
                                                                                        <option value="<?php echo $value; ?>" <?php if ($value == "Việt Nam")  ?>><?php echo $value; ?></option>

                                                                                    <?php }
                                                                                    ?>
                                                                                </select>
                                                                                <div class="has-error"></div>

                                                                            </div>
                                                                        </div>
                                                                        <label class="col-sm-2 control-label" for="Province"><strong class="text-red">*</strong><?php echo $this->lang->line("province"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <select  id="province" name="province" class="form-control" placeholder="<?php echo $this->lang->line("ph_province"); ?>">
                                                                                    <option value="0" disabled="disabled"><?php echo $this->lang->line("ph_select"); ?></option>


                                                                                </select>

                                                                                <div class="has-error"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--  district  -->
                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for=""><?php echo $this->lang->line("district"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <select  id="district" name="district" class="form-control" placeholder="<?php echo $this->lang->line("ph_district"); ?>">
                                                                                    <option value="0" disabled="disabled"><?php echo $this->lang->line("ph_select"); ?></option>


                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <label class="col-sm-2 control-label" for="Cell Number"><strong class="text-red">*</strong><?php echo $this->lang->line("phone"); ?></label>

                                                                        <div class="col-sm-4">
                                                                            <div class="edit-field">
                                                                                <input type="text" id="phone" name="phone" class="form-control" placeholder="+84 xxx xxxxxxx">
                                                                                <div class="has-error"></div>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="edit-mode">
                                                        <legend data-placement="top"  class="box-md"><i class="glyphicon glyphicon-tasks"></i> <?php echo $this->lang->line("experience"); ?>
                                                        </legend>
                                                        <div class="field-cont">

                                                            <!-- THEM MOI 3 FIELD CATEGORY -->
                                                            <div class="company-label">
                                                                <span><?php echo $this->lang->line("summary_career"); ?> </span>
                                                            </div>
                                                            <div class="row exp-year">
                                                                <!-- total year -->
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="name"><strong class="text-red">*</strong><?php echo $this->lang->line("total_years"); ?></label>
                                                                    <div class="col-sm-4">
                                                                        <div class="edit-field">
                                                                            <input type="text" value="" id="totalyears"  name="totalyears" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 7" name="" id="" class="form-control edit-control">
                                                                            <div class="has-error"></div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" value="1" name="neworexperience" id="neworexperience"  class="edit-control">
                                                                                <?php echo $this->lang->line("check_new"); ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="name"><?php echo $this->lang->line("exp_job"); ?> 1</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="edit-field">
                                                                            <input type="text" value="" id="jobcatsum1" name="jobcatsum1" placeholder="<?php echo $this->lang->line("ph_eg"); ?> IT Software" class="form-control edit-control" hvkeyboarddefined="true">
                                                                            <div class="has-error"></div>
                                                                        </div>

                                                                    </div>
                                                                    <label class="col-sm-1 control-label">Years</label>
                                                                    <div class="col-sm-2">
                                                                        <div class="edit-field">
                                                                            <input type="text" value="" id="jobcatyear1" name="jobcatyear1" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 7" class="form-control edit-control" hvkeyboarddefinced="true" />
                                                                            <div class="has-error"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="name"><?php echo $this->lang->line("exp_job"); ?>  2</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="edit-field">
                                                                            <input type="text" value="" id="jobcatsum2" name="jobcatsum2" placeholder="<?php echo $this->lang->line("ph_eg"); ?> IT Software" class="form-control edit-control" hvkeyboarddefined="true">
                                                                            <div class="has-error"></div>
                                                                        </div>

                                                                    </div>
                                                                    <label class="col-sm-1 control-label">Years</label>
                                                                    <div class="col-sm-2">
                                                                        <div class="edit-field">
                                                                            <input type="text" value="" id="jobcatyear2" name="jobcatyear2" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 7" class="form-control edit-control" hvkeyboarddefinced="true" />
                                                                            <div class="has-error"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="name"><?php echo $this->lang->line("exp_job"); ?>  3</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="edit-field">
                                                                            <input type="text" value="" id="jobcatsum3" name="jobcatsum3" placeholder="<?php echo $this->lang->line("ph_eg"); ?> IT Software" class="form-control edit-control" hvkeyboarddefined="true">
                                                                            <div class="has-error"></div>
                                                                        </div>

                                                                    </div>
                                                                    <label class="col-sm-1 control-label">Years</label>
                                                                    <div class="col-sm-2">
                                                                        <div class="edit-field">
                                                                            <input type="text"  id="jobcatyear3" name="jobcatyear3" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 7" class="form-control edit-control" hvkeyboarddefinced="true" />
                                                                            <div class="has-error"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-default add_field_button" aria-label="Left Align">
                                                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp; Add more
                                                                </button>

                                                            </div>
                                                            <!-- HET MOI 3 FIELD CATEGORY -->

                                                            <!-- company 1 -->
                                                            <div class="company-group">
                                                                <div class="company-1">
                                                                    <div class="company-label">
                                                                        <span><?php echo $this->lang->line("company"); ?> 1</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <!-- company name  -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("comp_name"); ?></label>

                                                                            <div class="col-sm-10">
                                                                                <div class="edit-field">
                                                                                    <input type="text" id="companyname1" name="companyname1" placeholder="<?php echo $this->lang->line("ph_eg"); ?> VietnamWorks" class="form-control edit-control">
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- japanese company /company size -->
                                                                        <div class="form-group">


                                                                            <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("jp_com"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <label class="radio-inline" for="japanese_vs3">
                                                                                        <input class="edit-control" type="radio" name="japanesecom1"  value="Yes"   id="japanesecom1">
                                                                                        <?php echo $this->lang->line("yes"); ?>
                                                                                    </label>
                                                                                    <label class="radio-inline" for="japanese_vs4">
                                                                                        <input class="edit-control" type="radio" name="japanesecom1"  value="No"  id="japanesecom1" >
                                                                                        <?php echo $this->lang->line("no"); ?>
                                                                                    </label>
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>

                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("company_size"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">

                                                                                    <select  class="form-control" id="numberemployee1" name="numberemployee1" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>

                                                                                        <option value="1-24" >1-24</option>
                                                                                        <option value="25-99" >25-99</option>
                                                                                        <option value="100-499" >100-499</option>
                                                                                        <option value="500-999" >500-999</option>
                                                                                        <option value="1,000-4,999">1,000-4,999</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- industry/job category -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("industry"); ?> </label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <input type="text"  id="industry1" name="industry1" placeholder="e.g Computer" class="form-control edit-control">
                                                                                </div>
                                                                            </div>

                                                                            <label class="col-sm-2 control-label" ><?php echo $this->lang->line("job_cate"); ?> </label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <input type="text"  id="jobcate1" name="jobcate1" class="form-control show-month" placeholder="e.g. IT Software">
                                                                                   <!-- <select  class="form-control" id="job-cate-1" name="job-cate-1" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                        <option value="1" >a</option>
                                                                                        <option value="2">b</option>
                                                                                    </select> -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- position / job level -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("position"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <input type="text"  id="positioncompany1" name="positioncompany1" placeholder="<?php echo $this->lang->line("ph_eg"); ?> PHP Developer" class="form-control edit-control">
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>

                                                                            <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("job_level"); ?> </label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <select  class="form-control" id="joblevelcom1" name="joblevelcom1" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                        <option value="New Grad/Entry Level/Internship"><?php echo $this->lang->line("ph_ex_1"); ?></option>
                                                                                        <option value="Experienced (Non-Manager)"  ><?php echo $this->lang->line("ph_ex_2"); ?></option>
                                                                                        <option value="Team Leader/Supervisor"  ><?php echo $this->lang->line("ph_ex_3"); ?></option>
                                                                                        <option value="Manager" ><?php echo $this->lang->line("ph_ex_4"); ?></option>
                                                                                        <option value="Vice Director"><?php echo $this->lang->line("ph_ex_5"); ?></option>
                                                                                        <option value="Director" ><?php echo $this->lang->line("ph_ex_6"); ?></option>
                                                                                        <option value="CEO" ><?php echo $this->lang->line("ph_ex_7"); ?></option>
                                                                                        <option value="Vice President"  ><?php echo $this->lang->line("ph_ex_8"); ?></option>
                                                                                        <option value="President" ><?php echo $this->lang->line("ph_ex_9"); ?></option>
                                                                                    </select>
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- managerment experience  -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label" ><?php echo $this->lang->line("manage_exp"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <select  id="numbermember1" name="numbermember1" class="form-control" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="N/A"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                        <option value="None" ><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                                        <option value="1-5" >1-5</option>
                                                                                        <option value="6-10">6-10</option>
                                                                                        <option value="11-20" >11-20</option>
                                                                                        <option value="20-30" >20-30</option>
                                                                                        <option value="more than 30" ><?php echo $this->lang->line("ph_more_than"); ?></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--  from month / to month -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("from_month"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field fcom1" id="from-month1" >
                                                                                    <input type="text" id="fmonth1" name="fmonth1" class="form-control show-month" placeholder="e.g. 09/2008" >
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>

                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("to_month"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field tcom1" id="from-month2 " >
                                                                                    <input type="text" id="tmonth1" name="tmonth1" class="form-control show-month" placeholder="e.g. 09/2008" >
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("detail_infor"); ?></label>

                                                                            <div class="col-sm-10">
                                                                                <div class="edit-field">
                                                                                    <textarea rows="4" id="dinfor1" name="dinfor1" ></textarea>
                                                                                    <em class="gray-light dinfor1-counter">2000 <?php echo $this->lang->line("ph_char"); ?></em>
                                                                                    <div class="has-error"></div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- company 2 -->
                                                                <div class="company-2">
                                                                    <div class="company-label">
                                                                        <span><?php echo $this->lang->line("company"); ?> 2</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <!-- company name  -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><strong class="text-red"></strong><?php echo $this->lang->line("comp_name"); ?></label>

                                                                            <div class="col-sm-10">
                                                                                <div class="edit-field">
                                                                                    <input type="text"  id="companyname2" name="companyname2" placeholder="<?php echo $this->lang->line("ph_eg"); ?> VietnamWorks" class="form-control edit-control">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- japanese company /company size -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><strong class="text-red"></strong><?php echo $this->lang->line("jp_com"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <label class="radio-inline" for="japanese_vs3">
                                                                                        <input class="edit-control" type="radio" name="japanesecom2"  value="Yes"  id="japanesecom2" >
                                                                                        <?php echo $this->lang->line("yes"); ?>
                                                                                    </label>
                                                                                    <label class="radio-inline" for="japanese_vs4">
                                                                                        <input class="edit-control" type="radio" name="japanesecom2"  value="No"  id="japanesecom2" >
                                                                                        <?php echo $this->lang->line("no"); ?>
                                                                                    </label>

                                                                                </div>
                                                                            </div>
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("company_size"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <select  class="form-control" id="numberemployee2" name="numberemployee2" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                        <option value="1-24">1-24</option>
                                                                                        <option value="25-99" >25-99</option>
                                                                                        <option value="100-499" >100-499</option>
                                                                                        <option value="500-999" >500-999</option>
                                                                                        <option value="1,000-4,999" >1,000-4,999</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- industry/job category -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("industry"); ?> </label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <input type="text" id="industry2" name="industry2" placeholder="e.g Computer" class="form-control edit-control">
                                                                                </div>
                                                                            </div>

                                                                            <label class="col-sm-2 control-label" ><?php echo $this->lang->line("job_cate"); ?>  </label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <input type="text" id="jobcate2" name="jobcate2" class="form-control show-month" placeholder="e.g. IT Software" >
                        <!--                                                                <select  class="form-control" id="job-cate-2" name="job-cate-2" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                       <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                       <option value="1" >a</option>
                                                                                       <option value="2">b</option>
                                                                                   </select>-->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- position / joblevel -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><strong class="text-red"></strong><?php echo $this->lang->line("position"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <input type="text" id="positioncompany2" name="positioncompany2" placeholder="<?php echo $this->lang->line("ph_eg"); ?> PHP Developer" class="form-control edit-control">

                                                                                </div>
                                                                            </div>
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("job_level"); ?> </label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <select  class="form-control" id="joblevelcom2" name="joblevelcom2" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                        <option value="New Grad/Entry Level/Internship"><?php echo $this->lang->line("ph_ex_1"); ?></option>
                                                                                        <option value="Experienced (Non-Manager)" ><?php echo $this->lang->line("ph_ex_2"); ?></option>
                                                                                        <option value="Team Leader/Supervisor"  ><?php echo $this->lang->line("ph_ex_3"); ?></option>
                                                                                        <option value="Manager" ><?php echo $this->lang->line("ph_ex_4"); ?></option>
                                                                                        <option value="Vice Director"  ><?php echo $this->lang->line("ph_ex_5"); ?></option>
                                                                                        <option value="Director"><?php echo $this->lang->line("ph_ex_6"); ?></option>
                                                                                        <option value="CEO" ><?php echo $this->lang->line("ph_ex_7"); ?></option>
                                                                                        <option value="Vice President"  ><?php echo $this->lang->line("ph_ex_8"); ?></option>
                                                                                        <option value="President"><?php echo $this->lang->line("ph_ex_9"); ?></option>
                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!-- manager ment exp -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label" ><?php echo $this->lang->line("manage_exp"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field">
                                                                                    <select  id="numbermember2" name="numbermember2" class="form-control" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                                        <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                                        <option value="None" ><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                                        <option value="1-5"  >1-5</option>
                                                                                        <option value="6-10" >6-10</option>
                                                                                        <option value="11-20" >11-20</option>
                                                                                        <option value="20-30" >20-30</option>
                                                                                        <option value="more than 30"><?php echo $this->lang->line("ph_more_than"); ?></option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <!--  from month / to month -->
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("from_month"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field fcom2" id="from-month3" >
                                                                                    <input type="text" id="fmonth2" name="fmonth2" class="form-control show-month" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 09/2008" >
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>

                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("to_month"); ?></label>

                                                                            <div class="col-sm-4">
                                                                                <div class="edit-field tcom2" id="from-month4">
                                                                                    <input type="text" id="tmonth2" name="tmonth2" class="form-control show-month" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 09/2008" >
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"><?php echo $this->lang->line("detail_infor"); ?></label>

                                                                            <div class="col-sm-10">
                                                                                <div class="edit-field">
                                                                                    <textarea rows="4" id="dinfor2" name="dinfor2" ></textarea>
                                                                                    <em class="gray-light dinfor2-counter"> 2000 <?php echo $this->lang->line("ph_char"); ?></em>
                                                                                    <div class="has-error"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-default add_com_button" aria-label="Left Align">
                                                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp; Add more
                                                                </button>

                                                            </div>
                                                        </div>
                                                </div>
                                                </fieldset>
                                                <fieldset class="edit-mode">
                                                    <legend data-placement="top"  class="box-md"><i class="glyphicon glyphicon-flag"></i> <?php echo $this->lang->line("language_skill"); ?>
                                                    </legend>
                                                    <div class="field-cont">
                                                        <div class="language-label"><?php echo $this->lang->line("japanese"); ?></div>
                                                        <div class="row">
                                                            <!-- general japanese level / verbal communication  -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("general_jp"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="jplevel" name="jplevel" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Fluent" ><?php echo $this->lang->line("ph_level_1"); ?></option>
                                                                            <option value="Advanced"><?php echo $this->lang->line("ph_level_2"); ?></option>
                                                                            <option value="Intermediate"><?php echo $this->lang->line("ph_level_3"); ?></option>
                                                                            <option value="Beginner"><?php echo $this->lang->line("ph_level_4"); ?></option>
                                                                            <option value="None"><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("verbal_com"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="jpverbal" name="jpverbal" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Fluent" ><?php echo $this->lang->line("ph_level_1"); ?></option>
                                                                            <option value="Advanced"><?php echo $this->lang->line("ph_level_2"); ?></option>
                                                                            <option value="Intermediate"><?php echo $this->lang->line("ph_level_3"); ?></option>
                                                                            <option value="Beginner"><?php echo $this->lang->line("ph_level_4"); ?></option>
                                                                            <option value="None"><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Read/Write communication / Business mail/document -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" ><strong class="text-red">*</strong><?php echo $this->lang->line("read_write"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="jpread" name="jpread" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Fluent" ><?php echo $this->lang->line("ph_level_1"); ?></option>
                                                                            <option value="Advanced"><?php echo $this->lang->line("ph_level_2"); ?></option>
                                                                            <option value="Intermediate"><?php echo $this->lang->line("ph_level_3"); ?></option>
                                                                            <option value="Beginner"><?php echo $this->lang->line("ph_level_4"); ?></option>
                                                                            <option value="None"><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("business_mail"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="jpbusiness" name="jpbusiness" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Very well experienced" ><?php echo $this->lang->line("ph_exp_1"); ?></option>
                                                                            <option value="Experienced"><?php echo $this->lang->line("ph_exp_2"); ?></option>
                                                                            <option value="Some experience"><?php echo $this->lang->line("ph_exp_3"); ?></option>
                                                                            <option value="No experience"><?php echo $this->lang->line("ph_exp_4"); ?></option>

                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--  Business meeting in Japanese / Experience of using Japanese in work-->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("business_meeting"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="jpmeeting" name="jpmeeting" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Very well experienced" ><?php echo $this->lang->line("ph_exp_1"); ?></option>
                                                                            <option value="Experienced"><?php echo $this->lang->line("ph_exp_2"); ?></option>
                                                                            <option value="Some experience"><?php echo $this->lang->line("ph_exp_3"); ?></option>
                                                                            <option value="No experience"><?php echo $this->lang->line("ph_exp_4"); ?></option>

                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("exp_using"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field" >
                                                                        <select  class="form-control" id="jpusing" name="jpusing" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Very well experienced" ><?php echo $this->lang->line("ph_exp_1"); ?></option>
                                                                            <option value="Experienced"><?php echo $this->lang->line("ph_exp_2"); ?></option>
                                                                            <option value="Some experience"><?php echo $this->lang->line("ph_exp_3"); ?></option>
                                                                            <option value="No experience"><?php echo $this->lang->line("ph_exp_4"); ?></option>

                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--  Experience of study in Japan / Experience of work in Japan-->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("exp_study"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field"><div>
                                                                            <label class="radio-inline" for="yes1">
                                                                                <input class="edit-control" type="radio" value="Yes" id="jpstudy" name="jpstudy" >
                                                                                <?php echo $this->lang->line("yes"); ?>
                                                                            </label>
                                                                            <label class="radio-inline" for="no1">
                                                                                <input class="edit-control" type="radio" id="jpstudy" name="jpstudy" value="No" >
                                                                                <?php echo $this->lang->line("no"); ?>
                                                                            </label>
                                                                        </div>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("exp_work"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field"><div>
                                                                            <label class="radio-inline" for="yes2">
                                                                                <input class="edit-control" type="radio" value="Yes" id="jpwork" name="jpwork" >
                                                                                <?php echo $this->lang->line("yes"); ?>
                                                                            </label>
                                                                            <label class="radio-inline" for="no2">
                                                                                <input class="edit-control" type="radio" id="jpwork" name="jpwork" value="No">
                                                                                <?php echo $this->lang->line("no"); ?>
                                                                            </label>
                                                                        </div>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--  Experience of Japanese company / JLPT-->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("exp_work_jp"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <div>
                                                                            <label class="radio-inline" for="yes3">
                                                                                <input class="edit-control" type="radio" value="Yes" id="jpcompany" name="jpcompany" >
                                                                                <?php echo $this->lang->line("yes"); ?>
                                                                            </label>
                                                                            <label class="radio-inline" for="no3">
                                                                                <input class="edit-control" type="radio" id="jpcompany" name="jpcompany"  value="No" >
                                                                                <?php echo $this->lang->line("no"); ?>
                                                                            </label>
                                                                        </div>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong>JLPT</label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="jpjlpt" name="jpjlpt"  placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="N1" >N1</option>
                                                                            <option value="N2" >N2</option>
                                                                            <option value="N3">N3</option>
                                                                            <option value="N4">N4</option>
                                                                            <option value="None"><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="language-label"><?php echo $this->lang->line("english"); ?></div>
                                                        <div class="row">
                                                            <!--  General English level / Experience of work in Japan-->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("genaral_en"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="enlevel" name="enlevel" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="Fluent" ><?php echo $this->lang->line("ph_level_1"); ?></option>
                                                                            <option value="Advanced"><?php echo $this->lang->line("ph_level_2"); ?></option>
                                                                            <option value="Intermediate"><?php echo $this->lang->line("ph_level_3"); ?></option>
                                                                            <option value="Beginner"><?php echo $this->lang->line("ph_level_4"); ?></option>
                                                                            <option value="None"><?php echo $this->lang->line("ph_level_5"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><strong class="text-red"></strong><?php echo $this->lang->line("toeic"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <input type="text" value="" id="entoeic" name="entoeic" placeholder="450" class="form-control edit-control" >
                                                                        <div class="has-error"></div>
                                                                         <!-- <select  class="form-control"  id="en-toeic" name="en-toeic" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                              <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                              <option value="1" >More than 950 </option>
                                                                              <option value="2">More than ... </option>
                                                                          </select> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--  Experience of Japanese company / JLPT-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("exp_en"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <div>
                                                                            <label class="radio-inline" for="yes5">
                                                                                <input class="edit-control" type="radio" value="Yes" id="enwork" name="enwork">
                                                                                <?php echo $this->lang->line("yes"); ?>
                                                                            </label>
                                                                            <label class="radio-inline" for="no6">
                                                                                <input class="edit-control" type="radio" id="enwork" name="enwork" value="No" >
                                                                                <?php echo $this->lang->line("no"); ?>
                                                                            </label>
                                                                        </div>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <!-- skill -->
                                                <fieldset class="edit-mode">
                                                    <legend data-placement="top"  class="box-md"><i class="glyphicon glyphicon-edit"></i> <?php echo $this->lang->line("other_skill"); ?>
                                                    </legend>
                                                    <div class="field-cont">
                                                        <div class="row">
                                                            <!-- general japanese level / verbal communication  -->
                                                            <p> <?php echo $this->lang->line("note_skill"); ?></p>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="edit-field">
                                                                        <textarea rows="4" id="otherskills" name="otherskills"></textarea>
                                                                        <em class="gray-light otherskills-counter">2000 <?php echo $this->lang->line("ph_char"); ?></em>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <!--  education -->
                                                <fieldset class="edit-mode">
                                                    <legend data-placement="top"  class="box-md"><i class="glyphicon glyphicon-education"></i> <?php echo $this->lang->line("education"); ?>
                                                    </legend>
                                                    <div class="field-cont">
                                                        <div class="row">
                                                            <!-- Highest Education  -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("high_edu"); ?></label>

                                                                <div class="col-sm-10">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="eduhightest" name="eduhightest" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>

                                                                            <option value="High School" ><?php echo $this->lang->line("ph_school_1"); ?></option>
                                                                            <option value="College"><?php echo $this->lang->line("ph_school_2"); ?></option>
                                                                            <option value="Bachelors"><?php echo $this->lang->line("ph_school_3"); ?></option>
                                                                            <option value="Master"><?php echo $this->lang->line("ph_school_4"); ?></option>
                                                                            <option value="MBA"><?php echo $this->lang->line("ph_school_5"); ?></option>
                                                                            <option value="Doctorate"><?php echo $this->lang->line("ph_school_6"); ?></option>
                                                                            <option value="Other"><?php echo $this->lang->line("ph_school_7"); ?></option>
                                                                        </select>

                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Subject  -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("subject"); ?></label>

                                                                <div class="col-sm-10">
                                                                    <div class="edit-field">
                                                                        <input type="text" value="" id="edusub" name="edusub" placeholder="<?php echo $this->lang->line("ph_eg"); ?> International Business" class="form-control edit-control">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- School/Qualification -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("school"); ?> </label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <input type="text" value="" id="eduschool" name="eduschool" placeholder="<?php echo $this->lang->line("ph_eg"); ?> <?php echo $this->lang->line("ph_school"); ?>" class="form-control edit-control">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label" ><strong class="text-red">*</strong><?php echo $this->lang->line("quallification"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="eduquan" name="eduquan" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>

                                                                            <option value="High School" ><?php echo $this->lang->line("ph_school_1"); ?></option>
                                                                            <option value="College"><?php echo $this->lang->line("ph_school_2"); ?></option>
                                                                            <option value="Bachelors"><?php echo $this->lang->line("ph_school_3"); ?></option>
                                                                            <option value="Master"><?php echo $this->lang->line("ph_school_4"); ?></option>
                                                                            <option value="MBA"><?php echo $this->lang->line("ph_school_5"); ?></option>
                                                                            <option value="Doctorate"><?php echo $this->lang->line("ph_school_6"); ?></option>
                                                                            <option value="Other"><?php echo $this->lang->line("ph_school_7"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--  from month / to month -->

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><?php echo $this->lang->line("edu_from_month"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field fedu" id="from-month3" >
                                                                        <input type="text" class="form-control show-month" id="edufmonth" name="edufmonth"  style="cursor:pointer; background-color: #FFFFFF"placeholder="<?php echo $this->lang->line("ph_eg"); ?> 09/2008">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 control-label"><?php echo $this->lang->line("edu_to_month"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field tedu" id="from-month4">
                                                                        <input type="text" class="form-control show-month" id="edutmonth" name="edutmonth" placeholder="<?php echo $this->lang->line("ph_eg"); ?> 09/2008">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Achievements  -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label"><?php echo $this->lang->line("archievement"); ?></label>

                                                                <div class="col-sm-10">
                                                                    <div class="edit-field">
                                                                        <textarea rows="4" id="eduachi" name="eduachi" ></textarea>
                                                                        <em class="gray-light eduachi-counter">2000 <?php echo $this->lang->line("ph_char"); ?></em>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                    <div class="has-error"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <!-- profile -->
                                                <fieldset class="edit-mode">
                                                    <legend data-placement="top"  class="box-md"><i class="glyphicon glyphicon-user"></i> <?php echo $this->lang->line("profile"); ?>
                                                    </legend>
                                                    <div class="field-cont">
                                                        <div class="row">
                                                            <!-- general japanese level / verbal communication  -->
                                                            <p><strong class="text-red">*</strong> <strong><?php echo $this->lang->line("introduce_profile"); ?> </strong></p>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="edit-field">
                                                                        <textarea rows="4" id="pfintro" name="pfintro" ></textarea>
                                                                        <em class="gray-light pfintro-counter">2000 <?php echo $this->lang->line("ph_char"); ?></em>
                                                                        <div class="has-error"></div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <!--  expectation -->
                                                <fieldset class="edit-mode">
                                                    <legend data-placement="top"  class="box-md"><i class="glyphicon glyphicon-expand"></i> <?php echo $this->lang->line("expectation"); ?>
                                                    </legend>
                                                    <div class="field-cont">
                                                        <div class="row">
                                                            <!-- School/Qualification -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" ><strong class="text-red">*</strong><?php echo $this->lang->line("ex_pos"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <input type="text" value="" id="expos" name="expos" placeholder="<?php echo $this->lang->line("ph_eg"); ?> IT Director" class="form-control edit-control">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("ex_job_level"); ?> </label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <select  class="form-control" id="exlv" name="exlv" placeholder="<?php echo $this->lang->line("ph_select"); ?>">
                                                                            <option value="0"><?php echo $this->lang->line("ph_select"); ?></option>
                                                                            <option value="New Grad/Entry Level/Internship" ><?php echo $this->lang->line("ph_ex_1"); ?></option>
                                                                            <option value="Experienced (Non-Manager)"><?php echo $this->lang->line("ph_ex_2"); ?></option>
                                                                            <option value="Team Leader/Supervisor" ><?php echo $this->lang->line("ph_ex_3"); ?></option>
                                                                            <option value="Manager"><?php echo $this->lang->line("ph_ex_4"); ?></option>
                                                                            <option value="Vice Director" ><?php echo $this->lang->line("ph_ex_5"); ?></option>
                                                                            <option value="Director"><?php echo $this->lang->line("ph_ex_6"); ?></option>
                                                                            <option value="CEO" ><?php echo $this->lang->line("ph_ex_7"); ?></option>
                                                                            <option value="Vice President"><?php echo $this->lang->line("ph_ex_8"); ?></option>
                                                                            <option value="President"><?php echo $this->lang->line("ph_ex_9"); ?></option>
                                                                        </select>
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- School/Qualification -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" ><strong class="text-red">*</strong><?php echo $this->lang->line("ex_localtion"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <input type="text" value="" id="exloc" name="exloc" placeholder="e.g. Ho Chi Minh" class="form-control edit-control">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-sm-2 control-label"><strong class="text-red">*</strong><?php echo $this->lang->line("ex_job_cate"); ?></label>

                                                                <div class="col-sm-4">
                                                                    <div class="edit-field">
                                                                        <input type="text" value="" id="excate" name="excate" placeholder="e.g. Accouting" class="form-control edit-control">
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- School/Qualification -->
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" ><strong class="text-red">*</strong><?php echo $this->lang->line("ex_salary"); ?></label>

                                                                <div class="col-sm-2">
                                                                    <div class="edit-field">
                                                                        <input type="text" id="salaryfrom" name="salaryfrom" class="form-control show-month"  >
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-1 control-label" style="width:20px !important"><span style="font-weight: bold;font-size:20px">~</span></label>

                                                                <div class="col-sm-2">
                                                                    <div class="edit-field">
                                                                        <input type="text" id="salaryto" name="salaryto" class="form-control show-month"  >
                                                                        <div class="has-error"></div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <!-- School/Qualification -->
                                                            <div class="form-group require">
                                                                <div class="col-sm-12">
                                                                    <strong class="text-red">*</strong> <?php echo $this->lang->line("required"); ?>
                                                                </div>
                                                            </div>
                                                            <!-- School/Qualification -->
                                                            <div class="form-group bottom-btn">
                                                                <div class="col-sm-12">
                                                                    <input type="hidden" id="isSent" name="isSent" value="OK" />
                                                                    <button class="btn btn-green btn-lg" name="preview" type="submit"  id="preview-resume-bt" data-original-title="" title="" value=""> <?php echo $this->lang->line("preview_btn"); ?></button>
                                                                    <button class="btn btn-red btn-lg" name="save" type="submit"  id="save-resume-bt"  data-original-title="" title="" value=""> <?php echo $this->lang->line("save_btn"); ?></button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--footer-->

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

                <!--End footer-->
            </div></div>
        <!-- //wrapper -->

        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/bootstrap-datepicker.js"></script>


        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>static/js/functions.js"></script>

        <script type="text/javascript">
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#blah').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }



                            $("#inputFile").change(function () {

                                readURL(this);
                            });
                            $("#neworexperience").change(function () {
                                console.log(document.getElementById('neworexperience').checked);
                                if (document.getElementById('neworexperience').checked) {
                                    $('#totalyears').attr("disabled", true);
                                } else {
                                    $('#totalyears').removeAttr("disabled");
                                }
                            });
                            //custom validation rule


                            $.validator.addMethod("customemail",
                                    function (value, element) {

                                        return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
                                    },
                                    "<?php echo $this->lang->line("error_email_format"); ?>"
                                    );
                            $.validator.addMethod("customephone",
                                    function (value, element) {
                                        return /^[0-9().-]+$/.test(value);
                                    },
                                    "<?php echo $this->lang->line("error_phone_format"); ?>"
                                    );
                            $("input[type=radio][name=exsalary]").click(function () {
                                var value = $(this).val();
                                if (value == 1) {
                                    $("#salary").rules("add", {
                                        required: true,
                                        messages: {
                                            required: "<?php echo $this->lang->line("error_salary"); ?>",
                                        }
                                    });
                                } else {

                                    $("#salary").rules("remove");
                                }
                            });
                            $.validator.addMethod("valueNotEquals", function (value, element, arg) {
                                return arg != value;
                            }, "Value must not equal arg.");
                            $.validator.addMethod("filesize",
                                    function (value, element) {

                                        if ($(element).attr('type') == "file"
                                                && ($(element).hasClass('required')
                                                        || element.files.length > 0)) {
                                            var size = 0;
                                            var $form = $(element).parents('form').first();
                                            var $fel = $form.find('input[type=file]');
                                            var $max = $form.find('input[name=maxFileSize]').first();
                                            if ($max) {
                                                for (var j = 0, fo; fo = $fel[j]; j++) {
                                                    files = fo.files;
                                                    for (var i = 0, f; f = files[i]; i++) {
                                                        size += f.size;
                                                    }
                                                }
                                                return size <= $max.val();
                                            }
                                        }
                                        return true;
                                    },
                                    "File size is not correct, please choose another file."
                                    );
                            $("#online-resume-form").validate({
                                rules: {
                                    inputFile: {
                                        required: true,
                                        extension: "png|jpg|jpeg|gif",
                                        filesize: true
                                    },
                                    jpjlpt: {valueNotEquals: "0"},
                                    nameresume: {
                                        required: true
                                    },
                                    name: {
                                        required: true
                                    },
                                    birthday: {
                                        required: true
                                    },
                                    phone: {
                                        required: true,
                                        customephone: true
                                    },
                                    nationality: {
                                        valueNotEquals: "0"
                                    },
                                    email: {
                                        required: true,
                                        customemail: true
                                    },
                                    country: {
                                        valueNotEquals: "0"
                                    },
                                    totalyears: {
                                        required: true
                                    },
                                    companyname1: {
                                        required: true
                                    },
                                    positioncompany1: {
                                        required: true
                                    },
                                    eduhightest: {
                                        valueNotEquals: "0"
                                    },
                                    japanesecom1: {
                                        required: true
                                    },
                                    edusub: {
                                        required: true
                                    },
                                    eduschool: {
                                        required: true
                                    },
                                    eduquan: {
                                        valueNotEquals: "0"
                                    },
                                    pfintro: {
                                        required: true
                                    },
                                    salaryto: {
                                        required: true
                                    },
                                    salaryfrom: {
                                        required: true
                                    },
                                    dinfor1: {required: true, maxlength: 2000},
                                    dinfor2: {maxlength: 2000},
                                    eduachi: {maxlength: 2000},
                                    otherskills: {maxlength: 2000},
                                    exlv: {
                                        valueNotEquals: "0"
                                    },
                                    jplevel: {
                                        valueNotEquals: "0"
                                    },
                                    jpverbal: {
                                        valueNotEquals: "0"
                                    },
                                    jpread: {
                                        valueNotEquals: "0"
                                    },
                                    jpbusiness: {
                                        valueNotEquals: "0"
                                    },
                                    jpmeeting: {
                                        valueNotEquals: "0"
                                    },
                                    jpusing: {
                                        valueNotEquals: "0"
                                    },
                                    joblevelcom1: {
                                        valueNotEquals: "0"
                                    },
                                    enlevel: {
                                        valueNotEquals: "0"
                                    }, enwork: {
                                        required: true
                                    },
                                    expos: {
                                        required: true
                                    },
                                    exloc: {
                                        required: true
                                    },
                                    excate: {
                                        required: true
                                    },
                                    jpstudy: {
                                        required: true
                                    },
                                    jpcompany: {
                                        required: true
                                    },
                                    jpwork: {
                                        required: true
                                    }
                                },
                                messages: {
                                    nameresume: {
                                        required: "<?php echo $this->lang->line("error_title"); ?>"
                                    },
                                    name: {
                                        required: "<?php echo $this->lang->line("error_name"); ?>"
                                    },
                                    birthday: {
                                        required: "<?php echo $this->lang->line("error_birthday"); ?>"
                                    },
                                    phone: {
                                        required: "<?php echo $this->lang->line("error_phone"); ?>"
                                    },
                                    email: {
                                        required: "<?php echo $this->lang->line("error_email"); ?>"
                                    },
                                    country: {
                                        valueNotEquals: "<?php echo $this->lang->line("error_country"); ?>"
                                    },
                                    nationality: {
                                        valueNotEquals: "<?php echo $this->lang->line("error_nationality"); ?>"
                                    },
                                    totalyears: {
                                        required: "<?php echo $this->lang->line("error_totalyears"); ?>"
                                    },
                                    companyname1: {
                                        required: "<?php echo $this->lang->line("error_companyname1"); ?>"
                                    },
                                    positioncompany1: {
                                        required: "<?php echo $this->lang->line("error_positioncompany1"); ?>"
                                    },
                                    eduhightest: {
                                        valueNotEquals: "<?php echo $this->lang->line("error_eduhightest"); ?>"
                                    },
                                    japanesecom1: {
                                        required: "<?php echo $this->lang->line("error_japanesecom1"); ?>"
                                    },
                                    edusub: {
                                        required: "<?php echo $this->lang->line("error_edusub"); ?>"
                                    },
                                    eduschool: {
                                        required: "<?php echo $this->lang->line("error_eduschool"); ?>"
                                    },
                                    eduquan: {
                                        valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"
                                    },
                                    pfintro: {
                                        required: "<?php echo $this->lang->line("error_pfintro"); ?>",
                                        maxlength: "<?php echo $this->lang->line("error_maxlenght"); ?>"
                                    },
                                    expos: {
                                        required: "<?php echo $this->lang->line("error_expos"); ?>"
                                    },
                                    exloc: {
                                        required: "<?php echo $this->lang->line("error_exloc"); ?>"
                                    },
                                    salaryto: {
                                        required: "<?php echo $this->lang->line("error_salary"); ?>"
                                    },
                                    salaryfrom: {
                                        required: "<?php echo $this->lang->line("error_salary"); ?>"
                                    },
                                    excate: {
                                        required: "<?php echo $this->lang->line("error_excate"); ?>"
                                    }, inputFile: {
                                        required: "<?php echo $this->lang->line("error_file_select"); ?>",
                                        extension: "<?php echo $this->lang->line("error_file_format"); ?>"
                                    },
                                    jpstudy: {
                                        required: "<?php echo $this->lang->line("error_jpstudy"); ?>"
                                    },
                                    dinfor1: {
                                        required: "<?php echo $this->lang->line("error_dinfor1"); ?>",
                                        maxlength: "<?php echo $this->lang->line("error_maxlenght"); ?>"
                                    },
                                    dinfor2: {maxlength: "<?php echo $this->lang->line("error_maxlenght"); ?>"},
                                    eduachi: {maxlength: "<?php echo $this->lang->line("error_maxlenght"); ?>"},
                                    otherskills: {maxlength: "<?php echo $this->lang->line("error_maxlenght"); ?>"},
                                    jpcompany: {
                                        required: "<?php echo $this->lang->line("error_jpcompany"); ?>"
                                    },
                                    jpwork: {
                                        required: "<?php echo $this->lang->line("error_jpwork"); ?>"
                                    }, enwork: {
                                        required: "<?php echo $this->lang->line("error_enwork"); ?>"
                                    },
                                    jpjlpt: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    exlv: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    jplevel: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    jpverbal: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    jpread: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    jpbusiness: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    jpmeeting: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    jpusing: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    enlevel: {valueNotEquals: "<?php echo $this->lang->line("error_select"); ?>"},
                                    joblevelcom1: {valueNotEquals: "<?php echo $this->lang->line("error_joblevelcom1"); ?>"}

                                },
                                errorClass: "has-error-load",
                                errorElement: "span",
                                errorPlacement: function (error, element) {
                                    element.parents("div.edit-field").find(".has-error").append(error);
                                }
                            });</script>
        <script>
            var startDate = new Date(1900, 1, 20);
            var endDate = new Date(1900, 1, 25);
            var startDateCom2 = new Date(1900, 1, 20);
            var endDateCom2 = new Date(1900, 1, 25);
            var startDateEdu = new Date(1900, 1, 20);
            var endDateComEdu = new Date(1900, 1, 25);
            // datepicker 1
            $('#date-birthday input').datepicker();
            //  datepicker 2
            $('.fcom1 input').datepicker({
                format: "mm/yy",
                minViewMode: 1,
                viewMode: "months",
            }).on('changeDate', function (ev) {
                startDate = ev.date;

            });

            $('.tcom1 input').datepicker({
                format: "mm/yy",
                minViewMode: 1,
                viewMode: "months",
            }).on('changeDate', function (ev) {
                endDate = ev.date;
                if ((endDate - startDate) / (86400000) < 0) {
                    $('.tcom1').find('.has-error').html('');
                    $('.tcom1').find('.has-error').append('<span for="tcom1" class="has-error-load"><?php echo $this->lang->line("error_date"); ?></span>');

                } else {

                    $('.tcom1').find('.has-error').html('');

                }
            });
            $('.fcom2 input').datepicker({
                format: "mm/yy",
                minViewMode: 1,
                viewMode: "months",
            }).on('changeDate', function (ev) {
                startDateCom2 = ev.date;
            });

            $('.tcom2 input').datepicker({
                format: "mm/yy",
                minViewMode: 1,
                viewMode: "months",
            }).on('changeDate', function (ev) {
                endDateCom2 = ev.date;
                if ((endDateCom2 - startDateCom2) / (86400000) < 0) {
                    $('.tcom2').find('.has-error').html('');
                    $('.tcom2').find('.has-error').append('<span for="tcom1" class="has-error-load"><?php echo $this->lang->line("error_date"); ?></span>');

                } else {
                    $('.tcom2').find('.has-error').html('');

                }
            });
            //  datepicker 3
            $('.fedu input').datepicker({
                format: "mm/yy",
                minViewMode: 1,
                viewMode: "months",
            }).on('changeDate', function (ev) {
                startDateEdu = ev.date;

            });
            //  datepicker 4
            $('.tedu input').datepicker({
                format: "mm/yy",
                minViewMode: 1,
                viewMode: "months",
            }).on('changeDate', function (ev) {
                endDateEdu = ev.date;
                if ((endDateEdu - startDateEdu) / (86400000) < 0) {
                    $('.tedu').find('.has-error').html('');
                    $('.tedu').find('.has-error').append('<span for="tedu" class="has-error-load"><?php echo $this->lang->line("error_date"); ?></span>');

                } else {
                    $('.tedu').find('.has-error').html('');

                }
            });</script>
        <script>
            var buttonpressed;
            $('#preview-resume-bt').click(function () {
                buttonpressed = $(this).attr('name');
            });
            $('#save-resume-bt').click(function () {
                buttonpressed = $(this).attr('name');
            });
            function vaidateBeforeSubmit(e) {
                e.preventDefault();
                if ($("#online-resume-form").valid() == true) {

                    $('#applyButton').attr('disabled', 'disabled');
                    //  fixSubmit();
                    var fields = $("#online-resume-form").serializeArray();
                    var formData = new FormData();
                    for (var i = 0; i < fields.length; i++) {
                        formData.append(fields[i].name, fields[i].value);
                    }
                    formData.append('inputFile', $('input[type=file]')[0].files[0]);
                    $.ajax({
                        url: "<?php echo base_url('/onlineresume/preview_resume'); ?>",
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (buttonpressed == "preview") {
                                $('#applyButton').removeAttr('disabled');
                                window.open(response);
                            } else {
                                $('#applyButton').removeAttr('disabled');
                                window.location.replace('<?php echo base_url('account') ?>');
                            }
                            // console.log(response);
                            //  window.open(response, '_blank');
                        }
                    }); //end load ajax
                }



            }



            $('#dinfor1').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.dinfor1-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#dinfor2').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.dinfor2-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#dinfor3').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.dinfor3-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#dinfor4').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.dinfor4-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#dinfor5').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.dinfor4-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#eduachi').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.eduachi-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#otherskills').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.otherskills-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });
            $('#pfintro').keyup(function () {
                var left = 2000 - $(this).val().length;
                if (left < 0) {
                    left = 0;
                }
                $('.pfintro-counter').text(left + ' <?php echo $this->lang->line("ph_char"); ?>');
            });</script>
        <script>

            $(document).ready(function () {
                //change state
                $("#country").change(function () {
                    var selectedCountry = $("#country option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/onlineresume/choosestate'); ?>",
                        data: {'country': selectedCountry, 'lang': $("#idLang").val()}
                    }).done(function (data) {

                        $("#province").html(data);
                        $("#province").trigger('change');
                    });
                });
                $("#province").change(function () {
                    var selectedProvince = $("#province option:selected").val();
                    var country = $("#country option:selected").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/onlineresume/choosedistrict'); ?>",
                        data: {'province': selectedProvince, 'lang': $("#idLang").val(), 'country': country}
                    }).done(function (data) {

                        $("#district").html(data);
                    });
                });
                var max_fields = 5; //maximum input boxes allowed
                var wrapper = $(".exp-year"); //Fields wrapper
                var wrapper_comp = $(".company-group"); //Fields wrapper
                var add_button = $(".add_field_button"); //Add button ID
                var add_com_button = $(".add_com_button"); //Add button ID
                var x = 4; //initlal text box count
                var xcom = 3; //initlal text box count
                $(add_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (x <= max_fields) { //max input box allowed
                        $.ajax({
                            url: "<?php echo base_url('/onlineresume/addexperience'); ?>",
                            type: 'POST',
                            data: {'lang': $("#idLang").val(), 'xvalue': x},
                            success: function (response) {
                                $(wrapper).append(response);
                            }
                        }); //end load ajax
                        x++; //text box increment

                    }
                }
                );
                ///add more company
                $(add_com_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (xcom <= max_fields) { //max input box allowed
                        $.ajax({
                            url: "<?php echo base_url('/onlineresume/addompany'); ?>",
                            type: 'POST',
                            data: {'lang': $("#idLang").val(), 'xvalue': xcom},
                            success: function (response) {
                                $(wrapper_comp).append(response);
                                $('#from-month1 input').datepicker({
                                    format: "mm/yy",
                                    minViewMode: 1,
                                    viewMode: "months",
                                });
                                //  datepicker 3
                                $('#from-month2 input').datepicker({
                                    format: "mm/yy",
                                    minViewMode: 1,
                                    viewMode: "months",
                                });
                            }
                        }); //end load ajax
                        xcom++; //text box increment
                    }

                }
                );
                $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).closest('.form-group').remove();
                    x--;
                })
            });
        </script>
    </body>

</html>