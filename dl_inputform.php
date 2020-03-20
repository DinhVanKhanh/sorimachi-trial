<?php
    require_once "/websites-data/common_files/includes/trial/header.inc.php";
    require_once "/websites-data/common_files/includes/trial/date.inc.php";

    if ( strpos( $_SERVER["HTTP_USER_AGENT"], "Windows NT 10.0" ) !== false ) {
        $GetUserOS = "ten";
        $OSValue   = "Windows 10";
    }
    elseif ( strpos( $_SERVER["HTTP_USER_AGENT"], "Windows NT 6.3" ) !== false ) {
        $GetUserOS = "eight-one";
        $OSValue   = "Windows 8.1";
    }
    elseif ( strpos( $_SERVER["HTTP_USER_AGENT"], "Windows NT 6.2" ) !== false ) {
        $GetUserOS = "eight";
        $OSValue   = "Windows 8";
    }
    elseif ( strpos( $_SERVER["HTTP_USER_AGENT"], "Windows NT 6.1" ) !== false ) {
        $GetUserOS = "seven";
        $OSValue   = "Windows 7";
    }
    elseif ( strpos( $_SERVER["HTTP_USER_AGENT"], "Windows NT 6.0" ) !== false ) {
        $GetUserOS = "vista";
        $OSValue   = "Windows Vista";
    }
    elseif ( strpos( $_SERVER["HTTP_USER_AGENT"], "Windows NT 5.1" ) !== false ) {
        $GetUserOS = "xp";
        $OSValue   = "Windows XP";
    }
    else {
        $GetUserOS = "etc";
        $OSValue   = "その他のWindows OS";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="robots" content="noindex,nofollow">
    <title>ソリマチ株式会社 - <?= $_prd_name.' '.$_title ?> ダウンロード</title>
    <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Imagetoolbar" content="no">
    <link rel="shortcut icon" href="/sorimachi.ico">
    <link rel="stylesheet" href="assets/css/general.css" type="text/css">
    <link rel="stylesheet" href="assets/css/blue.css" type="text/css">
    <link rel="stylesheet" href="assets/css/list.css" type="text/css">
    <link rel="stylesheet" href="assets/css/trial.css" type="text/css">
    <link rel="stylesheet" href="assets/css/indent.css" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/css/form.css" type="text/css">
</head>

<body>
    <center>
        <table border="0" cellspacing="0" cellpadding="0" width="650">
            <tr>
                <td>
                    <?php
                        if ( $_GET["page"] == "prddmnr" ) {
                            echo '<div style="margin-bottom:15px;"><a href="/usersupport/value/" target="_blank"><img src="images/bnr_190204_value.gif"></a></div>';
                        }
                    ?>

                    <!-- FORM(START) -->
                    <form name="dl_inputform" method="post" action="<?= htmlspecialchars( 'dl_confirmation.php?' . $_SERVER["QUERY_STRING"] ); ?>">
                        <input type="hidden" name="refererURL"/>
                        <?php 
                            // 社内からの場合以外（通常）
                            if ( $_from != "srm" && $_from != "old" ) {
                                echo '  <div style="text-align:center;">
                                            <div style="margin:20px auto 0 auto;"><img src="images/dlform_mainimage_'.$_DownloadProductCategory.'.jpg"></div>
                                        </div>

                                        <div style="margin-top:20px;">
                                            <table width="650" cellspacing="1" cellpadding="0" border="0">
                                                <tr>
                                                    <td class="dlform_title_'.$_DownloadProductCategory.'">'.$_prd_name.'<br>'.$_title.'ダウンロード</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <input type="hidden" name="input_user_flg" value="o">';
                            }
                            // 社内からの場合
                            else {
                                echo '  <div style="margin-top:20px;">
                                            <table width="650" cellspacing="1" cellpadding="0" border="0" class="list90">
                                                <tr>
                                                    <th class="list_item">'.__HissuKoumoku__.'をお送りする製品</th>
                                                </tr>
                                                <tr>
                                                    <td class="list_item">
                                                        <input type="radio" name="request_prd" value="accstd">会計王' . $VER_TRIAL_accstd . '
                                                        <input type="radio" name="request_prd" value="accnet">会計王' . $VER_TRIAL_accnet . 'PRO<br>
                                                        <input type="radio" name="request_prd" value="accnpo">会計王' . $VER_TRIAL_accnpo . ' NPO法人スタイル　
                                                        <input type="radio" name="request_prd" value="acccar">会計王' . $VER_TRIAL_acccar . ' 介護事業所スタイル<br>
                                                        <input type="radio" name="request_prd" value="accper">みんなの青色申告' . $VER_TRIAL_accper . '
                                                        <input type="radio" name="request_prd" value="psl">給料王' . $VER_TRIAL_psl . '<br>
                                                        <input type="radio" name="request_prd" value="sal">販売王' . $VER_TRIAL_sal . '　
                                                        <input type="radio" name="request_prd" value="spr">販売王' . $VER_TRIAL_spr . ' 販売・仕入・在庫　
                                                        <input type="radio" name="request_prd" value="scl">顧客王' . $VER_TRIAL_scl . '<br>
                                                        <input type="radio" name="request_prd" value="nbk">農業簿記' . $VER_TRIAL_nbk . '
                                                        <input type="radio" name="request_prd" value="nns">農業日誌' . $VER_TRIAL_nns . '
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_item">サポート開始希望日<br>
                                                        <font style="font-weight:normal; font-size:90%; color:#FF3300;">※希望日を入力する場合は必ず<b>「指定する」にチェック</b>を入れてください（日付を）。</font>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="list_item">
                                                        <input type="hidden" name="input_user_flg" value="i">
                                                        <input type="radio" name="wish_exist" value="0" checked>指定しない　　
                                                        <input type="radio" name="wish_exist" value="1">指定する';
                                                        showDate("w_year", "w_month", "w_day", 2018, 2020);
                                echo '                  <br><span class="error_blue" id="id_wishexist"></span>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>';
                            }
                        ?>
                        <div style="margin-top:10px;">
                            <table width="650" cellspacing="1" cellpadding="0" border="0" class="list90">
                                <tr>
                                    <th class="list_item">ご住所（都道府県名）</th>
                                    <td class="list_item"><?= __HissuKoumoku__ ?>
                                        <select id="pref_cd" name="pref_cd">
                                            <option value="" selected="selected">都道府県</option>
                                            <option value="1">北海道</option>
                                            <option value="2">青森県</option>
                                            <option value="3">岩手県</option>
                                            <option value="4">宮城県</option>
                                            <option value="5">秋田県</option>
                                            <option value="6">山形県</option>
                                            <option value="7">福島県</option>
                                            <option value="8">茨城県</option>
                                            <option value="9">栃木県</option>
                                            <option value="10">群馬県</option>
                                            <option value="11">埼玉県</option>
                                            <option value="12">千葉県</option>
                                            <option value="13">東京都</option>
                                            <option value="14">神奈川県</option>
                                            <option value="15">山梨県</option>
                                            <option value="16">長野県</option>
                                            <option value="17">新潟県</option>
                                            <option value="18">富山県</option>
                                            <option value="19">石川県</option>
                                            <option value="20">福井県</option>
                                            <option value="21">岐阜県</option>
                                            <option value="22">静岡県</option>
                                            <option value="23">愛知県</option>
                                            <option value="24">三重県</option>
                                            <option value="25">滋賀県</option>
                                            <option value="26">京都府</option>
                                            <option value="27">大阪府</option>
                                            <option value="28">兵庫県</option>
                                            <option value="29">奈良県</option>
                                            <option value="30">和歌山県</option>
                                            <option value="31">鳥取県</option>
                                            <option value="32">島根県</option>
                                            <option value="33">岡山県</option>
                                            <option value="34">広島県</option>
                                            <option value="35">山口県</option>
                                            <option value="36">徳島県</option>
                                            <option value="37">香川県</option>
                                            <option value="38">愛媛県</option>
                                            <option value="39">高知県</option>
                                            <option value="40">福岡県</option>
                                            <option value="41">佐賀県</option>
                                            <option value="42">長崎県</option>
                                            <option value="43">熊本県</option>
                                            <option value="44">大分県</option>
                                            <option value="45">宮崎県</option>
                                            <option value="46">鹿児島県</option>
                                            <option value="47">沖縄県</option>
                                        </select>
                                        <br>
                                        <span class="error_blue" id="id_pref"></span>
                                        <input type="hidden" name="pref_name"/>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="list_item">メールアドレス</th>
                                    <td class="list_item">
                                        <?= __HissuKoumoku__ ?> <input type="text" name="mailaddress" style="width:400px; ime-mode:disabled;" maxlength="120"><br>
                                        <span class="error_blue" id="id_mailaddress"></span>
                                        <?php
                                            if ( $_DownloadProductCategory == "bs" ) {
                                                echo '<div class="caut_red">※<b>'.$_title.'サポートをご利用いただく為の『お問い合わせ番号』</b>をこちらのメールアドレスに送らせていただきます。メールアドレスは正しくご入力ください。</div>';
                                            }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="list_item">弊社からの情報配信<br>について</th>
                                    <td class="list_item">
                                        <?php
                                            //業務の場合
                                            if ( $_DownloadProductCategory == "bs" ) {
                                                echo '<div class="lead">' . $_title . 'をご利用いただくお客様には、キャンペーンなどのお得な情報を掲載したメールマガジンを配信させていただきます。<br>メールマガジンの配信にご同意いただけますか？</div>';
                                            }
                                            else {
                                                echo '<div class="lead">ソリマチからのメールでの情報配信を希望しますか？</div>' . __HissuKoumoku__;
                                            }
                                        ?>
                                        <label><input type="radio" name="mailmagazine" value="配信に同意する" checked="checked">配信に同意する</label>
                                        <label><input type="radio" name="mailmagazine" value="配信に同意しない">配信に同意しない</label>
                                        <div class="caut">※メールマガジンの配信停止は後ほど行っていただくこともできます。<br></div>
                                        <span class="error_blue" id="id_mailmagazine"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" height="80" align="center">
                                        <div style="margin-top:10px;">
                                            ダウンロードしていただく際には、必ず [ <a href="<?= $_sorimachi_web_home ?>/co_info/information/privacy_policy.php" target="_blank"><b>個人情報保護ポリシー</b></a> ] をご確認ください。
                                        </div>
                                        <!--<input type="button" onClick="javascript:checkPrdDLForm(dl_inputform);" style="padding:10px;" value="入力内容の確認画面へ進む">-->
                                        <div id="form-submit">
                                            <input type="button" onClick="javascript:checkPrdDLForm(dl_inputform);" value="個人情報保護基本方針に同意して、確認画面へ進む">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th colspan="2" class="list_item" style="text-align:center; font-family:Meiryo,メイリオ,sans-serif; font-size:16px; background-color:#E0F0FF;">以下の項目の入力は任意です</th>
                                </tr>

                                <tr>
                                    <th class="list_item">お名前</th>
                                    <td class="list_item"><input type="text" name="name" style="width:300px;" maxlength="40"><br>
                                        <span class="error_blue" id="id_name"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="list_item">会社名・事業所名</th>
                                    <td class="list_item">
                                        <input type="text" name="company" style="width:400px;" maxlength="40">
                                    </td>
                                </tr>

                                <tr>
                                    <th class="list_item">ご住所</th>
                                    <td class="list_item" style="padding-left:10px">
                                        <label>
                                            郵便番号&emsp;&emsp;<input type="text" id="post_no" name="post_no" style="width:100px;" maxlength="8">
                                            <span class="error_blue" id="id_postno"></span>
                                        </label><br>
                                        <label>
                                            都道府県&emsp;&emsp;<select id="pref_name2" name="pref_name2" style="margin-top:5px" disabled>
                                                                    <option value="" selected="selected">都道府県</option>
                                                                    <option value="1">北海道</option>
                                                                    <option value="2">青森県</option>
                                                                    <option value="3">岩手県</option>
                                                                    <option value="4">宮城県</option>
                                                                    <option value="5">秋田県</option>
                                                                    <option value="6">山形県</option>
                                                                    <option value="7">福島県</option>
                                                                    <option value="8">茨城県</option>
                                                                    <option value="9">栃木県</option>
                                                                    <option value="10">群馬県</option>
                                                                    <option value="11">埼玉県</option>
                                                                    <option value="12">千葉県</option>
                                                                    <option value="13">東京都</option>
                                                                    <option value="14">神奈川県</option>
                                                                    <option value="15">山梨県</option>
                                                                    <option value="16">長野県</option>
                                                                    <option value="17">新潟県</option>
                                                                    <option value="18">富山県</option>
                                                                    <option value="19">石川県</option>
                                                                    <option value="20">福井県</option>
                                                                    <option value="21">岐阜県</option>
                                                                    <option value="22">静岡県</option>
                                                                    <option value="23">愛知県</option>
                                                                    <option value="24">三重県</option>
                                                                    <option value="25">滋賀県</option>
                                                                    <option value="26">京都府</option>
                                                                    <option value="27">大阪府</option>
                                                                    <option value="28">兵庫県</option>
                                                                    <option value="29">奈良県</option>
                                                                    <option value="30">和歌山県</option>
                                                                    <option value="31">鳥取県</option>
                                                                    <option value="32">島根県</option>
                                                                    <option value="33">岡山県</option>
                                                                    <option value="34">広島県</option>
                                                                    <option value="35">山口県</option>
                                                                    <option value="36">徳島県</option>
                                                                    <option value="37">香川県</option>
                                                                    <option value="38">愛媛県</option>
                                                                    <option value="39">高知県</option>
                                                                    <option value="40">福岡県</option>
                                                                    <option value="41">佐賀県</option>
                                                                    <option value="42">長崎県</option>
                                                                    <option value="43">熊本県</option>
                                                                    <option value="44">大分県</option>
                                                                    <option value="45">宮崎県</option>
                                                                    <option value="46">鹿児島県</option>
                                                                    <option value="47">沖縄県</option>
                                                                </select>
                                        </label><br>
                                        <label>市区町村&emsp;&emsp;<input type="text" id="adr_city" name="adr_city" style="width:200px; margin-top:5px"></label><br>
                                        <label>番地&emsp;&emsp;&emsp;&emsp;<input type="text" id="adr_area" name="adr_area" style="width:200px; margin-top:5px" maxlength="80"></label><br>
                                        <label>建物・その他&ensp;<input type="text" name="adr_addr" style="width:200px; margin-top:5px" maxlength="80"></label>
                                    </td>
                                </tr>

                                <tr>
                                    <th class="list_item">電話番号</th>
                                    <td class="list_item">
                                        <input type="text" id="tel1" name="tel1" style="width:25%; ime-mode:disabled;" maxlength="5"> - 
                                        <input type="text" id="tel2" name="tel2" style="width:25%; ime-mode:disabled;" maxlength="4"> - 
                                        <input type="text" id="tel3" name="tel3" style="width:25%; ime-mode:disabled;" maxlength="4">
                                    </td>
                                </tr>

                                <tr>
                                    <th class="list_item">FAX番号</th>
                                    <td class="list_item">
                                        <input type="text" id="fax1" name="fax1" style="width:25%; ime-mode:disabled;" maxlength="5"> - 
                                        <input type="text" id="fax2" name="fax2" style="width:25%; ime-mode:disabled;" maxlength="4"> - 
                                        <input type="text" id="fax3" name="fax3" style="width:25%; ime-mode:disabled;" maxlength="4">
                                    </td>
                                </tr>
                                <input type="hidden" name="os" value="<?= $OSValue ?>">

                                <tr>
                                    <th class="list_item">お客様の業種</th>
                                    <td class="list_item">
                                        <select id="business" name="business">
                                            <option value="">--選択してください--</optiton>
                                            <option value="小売業">小売業</optiton>
                                            <option value="卸売業">卸売業</optiton>
                                            <option value="サービス業">サービス業</optiton>
                                            <option value="建設業">建設業</optiton>
                                            <option value="製造業">製造業</optiton>
                                            <option value="特殊法人・官公庁等">特殊法人・官公庁等</optiton>
                                            <option value="農業">農業</optiton>
                                            <option value="漁業">漁業</optiton>
                                            <option value="その他">その他</optiton>
                                        </select>
                                    </td>
                                </tr>

                                <?php
                                    //リスティングの場合は表示しない
                                    if ( $_from != "lst" ) {
                                        echo '  <tr>
                                                    <th class="list_item">製品を知ったきっかけ</th>
                                                    <td class="list_item">
                                                        <div class="lead">本製品をお知りになったきっかけを教えてください。</div>
                                                        <label><input type="radio" name="trigger" value="広告">広告</label>　
                                                        <label><input type="radio" name="trigger" value="ホームページ">ホームページ</label>　
                                                        <label><input type="radio" name="trigger" value="家電量販店">家電量販店</label>　
                                                        <label><input type="radio" name="trigger" value="知人">知人</label>　
                                                        <label><input type="radio" name="trigger" value="弊社営業担当者">弊社営業担当者</label><br>
                                                        <label><input type="radio" name="trigger" value="その他">その他</label> <input type="text" name="trigger_etc" style="width:300px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="list_item">購入時のポイント</th>
                                                    <td class="list_item">
                                                        <div class="lead">購入を決定する上で最も重視するポイントは何ですか？</div>
                                                        <label><input type="radio" name="motive" value="価格">価格</label>　
                                                        <label><input type="radio" name="motive" value="ブランド">ブランド</label>　
                                                        <label><input type="radio" name="motive" value="入力機能・操作性">入力機能・操作性</label>　
                                                        <label><input type="radio" name="motive" value="出力機能">出力機能</label><br>
                                                        <label><input type="radio" name="motive" value="画面デザイン">画面デザイン</label>　
                                                        <label><input type="radio" name="motive" value="サポート">サポート</label>　
                                                        <label><input type="radio" name="motive" value="他ソフトの連携">他ソフトの連携</label><br>
                                                        <label><input type="radio" name="motive" value="その他">その他</label> <input type="text" name="motive_etc" style="width:300px;">
                                                    </td>
                                                </tr>';
                                    }
                                ?>

                                <tr>
                                    <th class="list_item">比較検討している<br>他社商品</th>
                                    <td class="list_item">
                                        <div class="lead">比較検討している弊社以外のソフトがありましたらご入力ください。</div>
                                        <input type="text" name="competitive" style="width:400px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" style="padding-top:10px;">
                                        <table align="center" width="635" border="0" cellspacing="2" cellpadding="4">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <font size="-1">弊社の個人情報保護基本方針を必ずご確認の上、確認画面へお進みください。なお、弊社の個人情報保護基本方針につきましては、<a href="/information/privacy-policy/" target="_Blank">こちらのページ</a>からも同じ内容をご確認いただけます。</font>
                                                    </div>
                                                    <div style="margin:5 auto;"><?php require_once "privacy-policy/text.php"; ?></div>
                                                    <div id="form-submit">
                                                        <input type="button" onClick="javascript:checkPrdDLForm(dl_inputform);" value="個人情報保護基本方針に同意して、確認画面へ進む">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <input type="hidden" name="privacy" value="0"/>

                        <?php
                            if ( $_from == "lst" ) {
                                echo '  <input type="hidden" name="trigger" value="―">
                                        <input type="hidden" name="trigger_etc" value="―">
                                        <input type="hidden" name="motive" value="―">
                                        <input type="hidden" name="motive_etc" value="―">';
                            }
                        ?>
                    </form>
                </td>
            </tr>
        </table>
    </center>
    <?php
        if ( $_prd_div_cd1 != "" ) {
            switch ($_prd_div_cd1) {
                case "acc":
                case "accstd":
                    $google_conversion_label = "AJDjCIr3pwIQ1o_Z4wM";
                    break;
                case "acn":
                case "accnpo":
                    $google_conversion_label = "ZAQaCKKDqAIQ1o_Z4wM";
                    break;
                case "acccar":
                case "apr":
                case "accnet":
                    $google_conversion_label = "iYvkCJKFqAIQ1o_Z4wM";
                    break;
                case "min":
                case "accper":
                    $google_conversion_label = "0J0bCML_pwIQ1o_Z4wM";
                    break;
                case "psl":
                    $google_conversion_label = "7aCKCNr8pwIQ1o_Z4wM";
                    break;
                case "sal":
                    $google_conversion_label = "Lak_COr6pwIQ1o_Z4wM";
                    break;
                case "spr":
                case "scl":
                    $google_conversion_label = "z496CMr-pwIQ1o_Z4wM";
                    break;
                case "nbk":
                    $google_conversion_label = "MFVUCIKHqAIQ1o_Z4wM";
                    break;
                case "nns":
                case "gbk":
                    $google_conversion_label = "KBmyCPKIqAIQ1o_Z4wM";
                    break;
            }

            echo '  <script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js"></script>
                    <noscript>
                        <div style="display:inline;">
                            <img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1014384598/?label=<?= $google_conversion_label ?>&amp;guid=ON&amp;script=0" />
                        </div>
                    </noscript>';
        }
    ?>
    <?php
        if ( isset( $_GET["error"] ) ) {
	    switch ( formatInput( $_GET["error"] ) ) {
	        case 1:
		    echo '<script type="text/javascript">';
		    echo 'alert("データの登録でエラーが発生しました。\n\nお手数ですが「郵便番号」や「ご住所」の内容をご確認の上、再度ご入力ください。")';
		    echo '</script>';
		    break;
	    }
	}
    ?>
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/trial2018-01.js"></script>
    <script>
        window.onload = function() {
            bindInputCode('tel1');
            bindInputCode('tel2');
            bindInputCode('tel3');
            bindInputCode('fax1');
            bindInputCode('fax2');
            bindInputCode('fax3');

            numericInput('tel1');
            numericInput('tel2');
            numericInput('tel3');
            numericInput('fax1');
            numericInput('fax2');
            numericInput('fax3');
        };

        //if ( document.location.protocol === "http:" ) {
            //location.replace(\'https:\/\/\'+window.location.host + window.location.pathname + window.location.search);
        //}
    </script>
</body>

</html>
