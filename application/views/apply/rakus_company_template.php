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
        RAKUS Vietnam<br>
        Hac 様<br>
        <br>
        RAKUS様向けVietnamWorks特別求人ページより応募がありました。ご確認ください。<br>
        <br>

        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>対象求人</td>
                <td>: <?php echo $data['projecttitle'] ?></td>
            </tr>
            <tr>
                <td>名前（姓）</td>
                <td>: <?php echo $data['inforstore']['firstname'] ?></td>
            </tr>
            <tr>
                <td>名前（名）</td>
                <td>: <?php echo $data['inforstore']['lastname'] ?></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td>: <?php echo $data['inforstore']['email'] ?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td>: <?php echo $data['inforstore']['phonenumber'] ?></td>
            </tr>
            <tr>
                <td>レジュメ:</td>
                <td>: <?php echo ($data['checkoption'] == "true") ? "添付なし" : "添付あり" ?></td>
            </tr>
            <?php if ($data['checkoption'] == "true"): ?>
                <tr>
                    <td>性別</td>
                    <td>:
                        <?php echo (!isset($data['inforstore']['gender']) || $data['inforstore']['gender'] == -1) ? '' : ( ($data['inforstore']['gender'] == 0) ? "男性" : "女性" ) ?>
                    </td>
                </tr>

                <tr>
                    <td>IT能力</td>
                    <td>: <?php echo $data['skills'] ?>
                    </td>
                </tr>
                <tr>
                    <td>日本語能力</td>
                    <td>: <?php
                        if (isset($data['inforstore']['jplevel'])) {
                            switch ($data['inforstore']["jplevel"]) {
                                case 0:
                                    echo "Beginner";
                                    break;
                                case 1:
                                    echo "Intermediate";
                                    break;
                                case 2:
                                    echo "Advanced";
                                    break;
                                case 3:
                                    echo "Fluent";
                                    break;
                                default:
                                    break;
                            }
                        }
                        ?></td>
                </tr>
                <tr>
                    <td>英語能力</td>
                    <td>: <?php
                        if (isset($data['inforstore']['enlevel'])) {
                            switch ($data['inforstore']["enlevel"]) {
                                case 0:
                                    echo "Beginner";
                                    break;
                                case 1:
                                    echo "Intermediate";
                                    break;
                                case 2:
                                    echo "Advanced";
                                    break;
                                case 3:
                                    echo "Fluent";
                                    break;
                                default:
                                    break;
                            }
                        }
                        ?></td>
                </tr>
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
        <a href="http://stage.jw.vitalify.vn" target="_blank">http://stage.jw.vitalify.vn</a>
    </div>

</div>


</div>
