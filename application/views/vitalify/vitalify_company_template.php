<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
<style>
    a {color:red!important; text-decoration:none}
    a:hover {text-decoration:underline}
    ul {padding-left:20px;}
    li {margin-bottom:20px;}
</style>
<div style="width:100%; box-sizing:border-box; background-color:#e9e9e9;color:#555;padding:10px;">
    <div style="background-color:#fafafa; padding:20px;"><img src="http://images.vietnamworks.com/img/jobseekers/logo.png" width="250"></div>
    <div style="background-color:#fff;padding:20px; font-size:16px; line-height:1.5; font-family:arial,tahoma,verdana">
        Dear Vitalify Asia<br>
        <br>
        Candidate apply your Job.<br>
        Please check<br>
        <br>

        <table border="0" cellspacing="0" cellpadding="0">

            <tr>
                <td>First Name</td>
                <td>: <?php echo $data['firstname'] ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>: <?php echo $data['lastname'] ?></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>: <?php echo $data['email'] ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>: <?php echo $data['phonenumber'] ?></td>
            </tr>
<!--            <tr>
                <td>レジュメ:</td>
                <td>: <?php echo ($data['hasCV']) ? "添付あり" : "添付なし" ?></td>
            </tr>-->

            <?php if (!$data['hasCV']): ?>
                <tr>
                    <td>Male/Female</td>
                    <td>:
                        <?php echo (!isset($data['gender'])) ? '' : ( ($data['gender'] == 0) ? "Male" : "Female" ) ?>
                    </td>
                </tr>
                <?php foreach ($data['skills'] as $skill): ?>
                    <tr>
                        <td><?php
                            if (isset($skill['name'])) {
                                switch ($skill['name']) {
                                    case "IT experience":
                                        echo "IT Experience";
                                        break;
                                    case "Kinh nghiệm Lamp":
                                        echo "Lamp Exprience:";
                                        break;
                                    case "Experience database":
                                        echo "DB Experience";
                                        break;
                                    case "Ngôn ngữ lập trình":
                                        echo "Programe Language";
                                        break;
                                    case "Kinh nghiệm iOS/ Android":
                                        echo "iOS/Android Experience";
                                        break;
                                    case "English level":
                                        echo "English Language";
                                        break;
                                    case "Japan level":
                                        echo "Japanese Language";
                                        break;
                                    default:
                                        break;
                                }
                            }
                            ?></td>
                        <td>: <?php echo isset($skill["experienced"]) ? $skill["experienced"] : "" ?></td>
                    </tr>

                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <br>
        Please check.
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