<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
<style>
    a {color:red!important; text-decoration:none}
    a:hover {text-decoration:underline}
    ul {padding-left:20px;}
    li {margin-bottom:20px;}
</style>
<div style="width:100%; box-sizing:border-box; background-color:#e9e9e9;color:#555;padding:10px;">
    <div style="background-color:#fafafa; padding:20px;"><img src="http://japan.vietnamworks.com/static/img/logo.png" width="250"></div>
    <div style="background-color:#fff;padding:20px; font-size:16px; line-height:1.5; font-family:arial,tahoma,verdana">
        Information User<br>

        <br>

        <table border="0" cellspacing="0" cellpadding="0">

            <tr>
                <td>Full name</td>
                <td>: <?php echo $data['fullname'] ?></td>
            </tr>


            <tr>
                <td>Email</td>
                <td>: <?php echo $data['email'] ?></td>
            </tr>

            <tr>
                <td>Phone</td>
                <td>: <?php echo $data['phonenumber'] ?>
                </td>
            </tr>
            <tr>
                <td>Location</td>
                <td>: <?php
                    if (isset($data['location'])) {
                        switch ($data['location']) {
                            case 0:
                                echo "Ho Chi Minh";
                                break;
                            case 1:
                                echo "Ha Noi";
                                break;
                            case 2:
                                echo "Other";
                                break;
                            default:
                                break;
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Year Of Birth</td>
                <td>: <?php echo $data['yearofbirth'] ?>
                </td>
            </tr>
            <tr>
                <td>Japan Level</td>
                <td>: <?php echo $data['jplevel'] ?>
                </td>
            </tr>


        </table>

        <br>
        面接設定、より詳細な情報の希望は応募者に直接ご連絡くださいませ。<br>
        何卒よろしくお願いいたします。
    </div>

    <div style="background-color:#fff;padding:20px; font-size:12px; line-height:1.5; font-family:arial,tahoma,verdana">
        <hr size="1" color="#CCCCCC">
        VietnamWorks<br>
        130 Suong Nguyet Anh St., Ben Thanh Ward<br>
        District 1, Ho Chi Minh City, Vietnam<br>
        Tel: (84 8) 5404 1373 - Ext: 3334 / Fax: (84 8) 5404 1372<br>
        <a href="http://www.vietnamworks.com" target="_blank">http://www.vietnamworks.com</a><br>
        <a href="http://www.japan.vietnamworks.com" target="_blank">http://www.japan.vietnamworks.com</a>
    </div>

</div>


</div>
