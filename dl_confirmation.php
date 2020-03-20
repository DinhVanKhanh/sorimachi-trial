<?php
    require_once "/websites-data/common_files/includes/trial/header.inc.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
    <META name="robots" content="noindex,nofollow">
    <TITLE>ソリマチ株式会社 - <?= $_prd_name.' '.$_title ?> ダウンロード</TITLE>
    <META http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <META http-equiv="Content-Script-Type" content="text/javascript">
    <META http-equiv="Content-Style-Type" content="text/css">
    <META http-equiv="Imagetoolbar" content="no">
    <LINK rel="shortcut icon" href="/sorimachi.ico">
    <LINK rel="stylesheet" href="assets/css/general.css" type="text/css">
    <LINK rel="stylesheet" href="assets/css/blue.css" type="text/css">
    <LINK rel="stylesheet" href="assets/css/list.css" type="text/css">
    <LINK rel="stylesheet" href="assets/css/trial.css" type="text/css">
    <LINK rel="stylesheet" href="assets/css/indent.css" type="text/css">
</HEAD>

<body>
    <center>
        <table border="0" cellspacing="0" cellpadding="0" width="650">
            <tr>
                <td>
                    <?php
                        // 社内からの場合以外（通常） 
                        if ($_from != "srm" && $_from != "old") {
                            echo '<div style="text-align:center;">
                                    <div style="margin:20px auto 0 auto;"><IMG src="images/dlform_mainimage_'.$_DownloadProductCategory.'.jpg"></div>
                                </div>';
                        }
                    ?>

                    <div style="margin-top:20px;">
                        <table width="650" cellspacing="1" cellpadding="0" border="0">
                            <tr>
                                <td class="dlform_title_<?= $_DownloadProductCategory ?>"><?= $_prd_name ?><br><?= $_title ?>ダウンロード</td>
                            </tr>
                            <?php
                                // 社内からの場合以外（通常）
                                if ( $_from != "srm" && $_from != "old" ) {
                                    echo '
                                        <tr>
                                            <td>
                                                <div class="p080_150" style="margin-top:10px;">
                                                    ご入力いただいた内容をご確認ください。下の「'.$_title.'をダウンロードする」ボタンをクリックしていただくと、情報が弊社宛に送信され、ダウンロードページに進んでいただくことができます。
                                                </div>
                                            </td>
                                        </tr>';
                                }
                                else {
                                    if ( intval( $_POST["wish_exist"] ) == 1 ) {
                                        echo '<tr>
                                                <td align="center" bgcolor="#FFFFAA">
                                                    <div class="p090_150" style="margin:5px 0;">サポート開始希望日が　<B style="color:#FF3300;">'.$_POST["w_year"].'年'.$_POST["w_month"].'月'.$_POST["w_day"].'日</B>　に指定されています。</div>
                                                </td>
                                            </tr>';
                                    }
                                    else {
                                        echo '<tr>
                                                <td align="center">
                                                    <div class="p090_150" style="margin:5px 0;">サポート開始日は指定されていません。</div>
                                                </td>
                                            </tr>';
                                    }
                                }
                            ?>
                        </table>
                    </div>

                    <!-- FORM(START) -->
                    <form name="dl_inputform" method="post" action="<?= formatInput( 'dl_regist.php?' . $_SERVER["QUERY_STRING"] ); ?>">
                        <div style="margin-top:10px;">
                            <table width="640" cellspacing="1" cellpadding="0" border="0" class="list80">
                                <tr>
                                    <th class="list_item">会社名または事業所名</th>
                                    <td class="list_item">
                                        <!-- サニタイズ処理 -->
                                        <?= formatInput( to2Byte($_POST["company"]) ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">ご住所</th>
                                    <td class="list_item">
                                        <?php
                                            if ( $_POST["post_no"] != "" ) {
                                                echo "〒".formatInput( $_POST["post_no"] )."<br>";
                                                echo formatInput( $_POST["pref_name"] ).formatInput( $_POST["adr_city"] ).formatInput( to2Byte($_POST["adr_area"]) )."<br>";
                                                echo "".formatInput( to2Byte($_POST["adr_addr"]) );
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">お名前</th>
                                    <td class="list_item">
                                        <?= formatInput( to2Byte($_POST["name"]) ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">電話番号</th>
                                    <td class="list_item">
                                        <?= formatInput( $_POST["tel1"] ) . '-' . formatInput( $_POST["tel2"] ) . '-' . formatInput( $_POST["tel3"] ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">FAX番号</th>
                                    <td class="list_item">
                                        <?= formatInput( $_POST["fax1"] ) . '-' . formatInput( $_POST["fax2"] ) . '-' . formatInput( $_POST["fax3"] ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">メールアドレス</th>
                                    <td class="list_item">
                                        <?= formatInput( $_POST["mailaddress"] ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">弊社からの情報配信について</th>
                                    <td class="list_item">
                                        <?= formatInput( $_POST["mailmagazine"] ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="list_item">お客様の業種</th>
                                    <td class="list_item">
                                        <?= formatInput( $_POST["business"] ) ?>
                                    </td>
                                </tr>
                                <?php
                                    // リスティングの場合は表示しない
                                    if ( $_from != "lst" ) {
                                        $trigger_tmp = $_POST["trigger"] == "その他" ? "その他（".formatInput( $_POST["trigger_etc"] )."）" : $_POST["trigger"];
                                        $motive_tmp = $_POST["motive"] == "その他" ? "その他（".formatInput( $_POST["motive_etc"] )."）" : $_POST["motive"];

                                        echo '<tr>
                                                <th class="list_item">製品を知ったきっかけ</th>
                                                <td class="list_item">'.$trigger_tmp.'</td>
                                            </tr>';
                                        echo '<tr>
                                                <th class="list_item">購入時のポイント</th>
                                                <td class="list_item">'.$motive_tmp.'</td>
                                            </tr>';
                                    }
                                ?>
                                <tr>
                                    <th class="list_item">比較検討している他社商品</th>
                                    <td class="list_item">
                                        <?= formatInput( $_POST["competitive"] ) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="80" align="center">
                                    <?php
                                        if ( $_prd_div_cd1 != "" ) {
                                            echo '<input type="submit" name="submit" style="padding:10px;" value="'.$_title.'をダウンロードする">
                                                <br><br>
                                                [ <a onclick="javascript:history.back();">入力画面に戻る</a> ]';
                                        }
                                        else {
                                            echo '<a onclick="javascript:history.back();">戻る</a>';
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <input type="hidden" name="company" value="<?= formatInput( to2Byte($_POST["company"]) ) ?>">
                        <input type="hidden" name="name" value="<?= formatInput( to2Byte($_POST["name"]) ) ?>">
                        <input type="hidden" name="tel1" value="<?= formatInput( $_POST["tel1"] ) ?>">
                        <input type="hidden" name="tel2" value="<?= formatInput( $_POST["tel2"] ) ?>">
                        <input type="hidden" name="tel3" value="<?= formatInput( $_POST["tel3"] ) ?>">
                        <input type="hidden" name="fax1" value="<?= formatInput( $_POST["fax1"] ) ?>">
                        <input type="hidden" name="fax2" value="<?= formatInput( $_POST["fax2"] ) ?>">
                        <input type="hidden" name="fax3" value="<?= formatInput( $_POST["fax3"] ) ?>">
                        <input type="hidden" name="mailaddress" value="<?= formatInput( $_POST["mailaddress"] ) ?>">
                        <input type="hidden" name="pref_cd" value="<?= formatInput( $_POST["pref_cd"] ) ?>">
                        <input type="hidden" name="post_no" value="<?= formatInput( $_POST["post_no"] ) ?>">
                        <input type="hidden" name="adr_city" value="<?= formatInput( to2Byte($_POST["adr_city"]) ) ?>">
                        <input type="hidden" name="adr_area" value="<?= formatInput( to2Byte($_POST["adr_area"]) ) ?>">
                        <input type="hidden" name="adr_addr" value="<?= formatInput( to2Byte($_POST["adr_addr"]) ) ?>">
                        <input type="hidden" name="os" value="<?= formatInput( $_POST["os"] ) ?>">
                        <input type="hidden" name="business" value="<?= formatInput( $_POST["business"] ) ?>">
                        <input type="hidden" name="trigger" value="<?= formatInput( $_POST["trigger"] ) ?>">
                        <input type="hidden" name="trigger_etc" value="<?= formatInput( $_POST["trigger_etc"] ) ?>">
                        <input type="hidden" name="motive" value="<?= formatInput( $_POST["motive"] ) ?>">
                        <input type="hidden" name="motive_etc" value="<?= formatInput( $_POST["motive_etc"] ) ?>">
                        <input type="hidden" name="competitive" value="<?= formatInput( $_POST["competitive"] ) ?>">
                        <input type="hidden" name="mailmagazine" value="<?= formatInput( $_POST["mailmagazine"] ) ?>">
                        <input type="hidden" name="request_prd" value="<?= formatInput( $_POST["request_prd"] ) ?>">
                        <input type="hidden" name="wish_exist" value="<?= formatInput( intval( $_POST["wish_exist"] ) ) ?>">
                        <input type="hidden" name="refererURL" value="<?= formatInput( $_POST["refererURL"] ) ?>">
                        <?php
                            if ( intval( $_POST["wish_exist"] ) == "1" ) {
                                echo '<input type="hidden" name="w_year" value="'.formatInput( $_POST["w_year"] ).'">
                                    <input type="hidden" name="w_month" value="'.formatInput( $_POST["w_month"] ).'">
                                    <input type="hidden" name="w_day" value="'.formatInput( $_POST["w_day"] ).'">';
                            }
                        ?>
                        <!--2017/05/08 追加-->
                        <input type="hidden" name="privacy" value="<?= formatInput( $_POST["privacy"] ) ?>">
                    </form>
                </td>
            </tr>
        </table>
</body>

</html>
