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
        Mulodo Vietnam様<br>
        <br>
        Mulodo様向けVietnamWorks特別求人ページより応募がありました。ご確認ください。<br>
        <br>

        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>対象求人</td>
                <td>: <?php echo (isset($data["jobInfo"]["jobtitle"])) ? $data["jobInfo"]["jobtitle"] : "Java engineer" ?></td>
            </tr>
            <tr>
                <td>名前（姓）</td>
                <td>: <?php echo $data['firstname'] ?></td>
            </tr>
            <tr>
                <td>名前（名）</td>
                <td>: <?php echo $data['lastname'] ?></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td>: <?php echo $data['email'] ?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td>: <?php echo $data['phonenumber'] ?></td>
            </tr>
            <tr>
                <td>レジュメ:</td>
                <td>: <?php echo ($data['hasCV']) ? "添付あり" : "添付なし" ?></td>
            </tr>
            <?php if (!$data['hasCV']): ?>
                <tr>
                    <td>性別</td>
                    <td>:
                        <?php echo (!isset($data['gender'])) ? '' : ( ($data['gender'] == 0) ? "男性" : "女性" ) ?>
                    </td>
                </tr>
                <?php foreach($data['skills'] as $skill): ?>
                <tr>
                    <td><?php
                        if (isset($skill['name'])) {
                            switch ($skill['name']) {
                                case "JAVA experience":
                                    echo "経験Java年数";
                                    break;
                                case "JAVA framework":
                                    echo "経験Javaフレームワーク";
                                    break;
                                case "Experience database":
                                    echo "経験データベース";
                                    break;
                                case "Experience server OS":
                                    echo "経験サーバソフト";
                                    break;
                                case "English level":
                                    echo "英語能力";
                                    break;
                                default:
                                    break;
                            }
                        }
                        ?></td>
                    <td>: <?php echo isset($skill["experienced"]) ? $skill["experienced"] : ""?></td>
                </tr>

                <?php endforeach; ?>
            <?php endif; ?>
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