<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Công Việc Dành Cho Người Mới Biết Tiếng Nhật- JapanWorks</title>

        <link rel="shortcut icon" href="<?php echo base_url("static/img/favicon.ico?240720141702"); ?>" type="image/x-icon">
        <meta name="keywords" content=" Tiếng Nhật, việc làm Nhật Bản, tìm công việc ở Nhật, sơ cấp tiếng Nhật, công việc sơ cấp tiếng Nhật, công ty Nhật Bản, học tiếng Nhật, nghiên cứu tiếng Nhật, làm việc tại Nhật Bản">
        <meta name="description" content="Việc làm tại Nhật dành cho người nói tiếng Nhật sơ cấp. JanpanWorks là trang tuyển dụng lớn nhất Việt Nam dành cho việc làm tại Nhật Bản.">

        <meta name="Robots" content="index, follow">
        <meta name="format-detection" content="telephone=no">

        <!-- cfp -->
        <link href="<?php echo base_url("static/cfp/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("static/cfp/css/style.css"); ?>" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/search.css?201406161725"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/default.css?201406241331"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_cfp.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("static/css/custom_grid.css?2014241300"); ?>">



        <script src="<?php echo base_url(); ?>static/cfp/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>static/cfp/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>static/cfp/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url(); ?>static/cfp/js/jquery-ui.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>static/cfp/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>static/cfp/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    </head>


    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper">


                <?php $this->load->view("/layouts/_header");
                ?>
                <div class="wrapper wrapper-content">
                    <div class="page-view">

                        <h2>ONLINE RESUME </h2>
                        <p>This is information about online resume</p>
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>email</th>
                                    <th>View</th>
                                    <th>Point</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listResume as $lr) {
                                    $new_str = utf8tourl(utf8convert($lr['name_of_resume'])) . '.docx';
                                    $emailUser = str_replace(array("@", "."), "", $lr['email']);
                                    $href = "https://docs.google.com/gview?url=" . base_url() . "uploads/" . $emailUser . "/" . $new_str . "&embedded = true";
                                    ?>

                                    <tr>
                                        <td><?php echo $lr['name']; ?></td>
                                        <td class="email-cv"><b><?php echo $lr['email']; ?></b></td>
                                        <td><a href ="<?php echo $href; ?>" target="_blank">PREVIEW</a>

                                        </td>
                                        <td><input type=hidden class="save-data" value="0" /><div class="editname" contenteditable="true" style="width: 35px;"><?php echo $lr['point']; ?></div></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                    <div class="pagination-block" align="center">
                        <p>Show: <strong><?php echo $valueShowRecord; ?></strong> in <strong><?php echo isset($totalAllResume) ? $totalAllResume : 0; ?></strong> resumes.</p>
                        <ul class="pagination">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
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

            </div>
        </div>
    </body>


    <!--End footer-->

</html>






<script>
    $(".editname").on("focusout keydown", function (e) {

        // if clicked away, or the enter key is pressed:
        if (e.keyCode == 13) {

            $(this).blur();
        }
        if (e.type == "focusout") {

            var email = $(this).closest('tr').find('.email-cv').text();
            var check = $(this).closest('tr').find('.save-data');
            var point = $(this).text();

            if (check.val() == 1) {

                $.ajax({
                    url: "<?php echo base_url('/listcv/updatepoint'); ?>",
                    type: 'POST',
                    data: {'email': email, 'point': point},
                    success: function (response) {
                        if (response == "true")
                            check.val(0);
                    }
                });
            }

        }

    });

    $('.editname').keyup(function () {
        var point = $(this).text();
        $(this).closest('tr').find('.save-data').val(1);

    });
</script>


