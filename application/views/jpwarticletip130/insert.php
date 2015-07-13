<link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/bootstrap-datetimepicker.min") ?>">
<div class="container" id="section2">
    <div class="row">
        <div class="col-sm-12">
            <!-- form -->
            <div class="panel">
                <div class="panel-heading"><h2>Create a new article</h2></div>
                <div class="panel-body form-block">

                    <div class="title">
                        <h3>Create a new article</h3>
                        <div>
                            <img class="vnw" src="<?php echo base_url("static/img/vnw_logo.png") ?>" alt="vietnamworks">
                            <img class="jpw" src="<?php echo base_url("static/img/logo.jpg") ?>" alt="japanworks">
                        </div>
                    </div>

                    <form id="frmSignUp" class="form-horizontal"   role="form"  method="post" novalidate="novalidate" enctype="multipart/form-data">

                        <!-- title -->
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title"
                                       value="">
                                <span for="inputTitle"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDate" class="col-sm-3 control-label">Date </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputDate" name="inputDate" placeholder="Date"
                                       value="<?php echo date("Y-m-d H:i:s") ?>">
                                <span for="inputDate"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="8" name="inputDescription"  id="inputDescription"></textarea>
                                <span for="inputDescription"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTextVN" class="col-sm-3 control-label">Text <br/>(by Vietnamese Language)</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="8" name="inputTextVN"  id="inputTextVN"></textarea>
                                <span for="inputTextVN"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTextJP" class="col-sm-3 control-label">Text <br/>(by Japanese Language)</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="15" name="inputTextJP"  id="inputTextJP"></textarea>
                                <span for="inputTextJP"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKeyword" class="col-sm-3 control-label">Keyword for search</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="8" name="inputKeyword"  id="inputKeyword"></textarea>
                                <span for="inputKeyword"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTag" class="col-sm-3 control-label">Tags</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="8" name="inputTag"  id="inputTag"></textarea>
                                <span for="inputTag"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFile" class="col-sm-3 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="maxFileSize" value="<?php echo LIMIT_FILE_SIZE ?>" />
                                <span class="small">(định dạng .png, .jpg, .gif, .jpeg nhỏ hơn 3MB)</span>
                                <input type="file" class="left" rel="requiredField" id="inputFile" name="inputFile"  placeholder="IMAGE" />

                            </div>
                            <br>
                            <!-- -->
                            <br/>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <input type="hidden" id="isSent" name="isSent" value="OK" />
                                <button type="submit" id="applyButton" class="btn btn-orange"style="min-width:40%">Create</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>static/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>static/js/additional-methods.min.js"></script>

<script type="text/javascript">

    //custom validation rule


    $.validator.addMethod(
            "filesize",
            function (value, element) {

                if ($(element).attr('type') == "file" && ($(element).hasClass('required')
                        || element.files.length > 0)) {
                    var size = 0;
                    var $form = $(element).parents('form').first();
                    var $fel = $form.find('input[type=file]');
                    var $max = $form.find('input[name=maxFileSize]').first();
                    //var $max = 512000;
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
            "Dung lượng tập tin không phù hợp, Vui lòng chọn tập tin khác."
            );



    $("#frmSignUp").validate({
        rules: {
            inputTitle: {
                required: true
            },
            inputDate: {
                required: true
            },
            inputDescription: {
                required: true
            },
            inputKeyword: {
                required: true
            },
            inputTag: {
                required: true
            },
            inputTextVN: {
                required: true
            },
            inputTextJP: {
                required: true
            },
            inputFile: {
                required: true,
                extension: "png|jpg|gif|jpeg",
                filesize: true
            }
        },
        messages: {
            inputTitle: {
                required: "Please fill title."
            },
            inputDate: {
                required: "Please input date."
            },
            inputDescription: {
                required: "Please fill Description."
            },
            inputKeyword: {
                required: "Please fill keyword."
            },
            inputTag: {
                required: "Please fill Tag."
            },
            inputTextVN: {
                required: "Please fill text by Vietnamese."
            },
            inputTextJP: {
                required: "Please fill text by Japanese."
            },
            inputFile: {
                required: "Please attach file.",
                extension: "file format can not upload."
            }


        },
        errorClass: "error-message",
        errorElement: "span",
        highlight: function (element) {
//$(element).siblings('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        success: function (element) {
//element.addClass('glyphicon glyphicon-ok form-control-feedback').closest('.form-group').removeClass('has-error').addClass('has-success has-feedback');
            element.closest('.form-group').removeClass('has-error');
            $(".test").empty();
        }
    });
    $(document).ready(function () {

    });
</script>
