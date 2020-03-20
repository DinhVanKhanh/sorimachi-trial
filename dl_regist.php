<?php
    require_once "/websites-data/common_files/includes/trial/header.inc.php";
    require_once "/websites-data/common_files/japanese.php";

    // 入力内容をDBに登録
    $tfp = new db_API();
    $count_user = $tfp->ResponseData(
      "free_user",
      '{
        "free_user":{
          "query": "mail=\''.formatInput( $_POST["mailaddress"] ).'\'"
        }
      }',
      "GET"
    );
    if ( $count_user["total_count"] == 100 ) {
        echo "You registed more than 100 product";
        return;
    }

    $ErrorFlag = 0;
    $Conn = dbTaiken();
    $sql = 'SELECT TFP_shin_cd, CONCAT(Prd_dev_cd1, Prd_dev_cd2, Prd_dev_cd3) AS Prd_code FROM Product_Service_Master HAVING Prd_code = "%1$s" ORDER BY TFP_shin_cd ASC';
    $result = $Conn->getRow( sprintf( $sql, $_key_shin ) );
    $_TFP_shin_cd = $result["TFP_shin_cd"];
    $Conn = null;

    if ( $_DownloadProductCategory == "af" || $_from == "old" ) {
        MDBRegist($free_user_no);
    }
    else {
        sendMail($free_user_no);
    }

    if ($ErrorFlag == 1) {
        // メール送信エラー画面を表示 ?>
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
        <HTML lang="ja">

        <HEAD>
            <META http-equiv="Content-Type" content="text/html; charset=shift_jis">
            <META http-equiv="Content-Script-Type" content="text/javascript">
            <META http-equiv="Content-Style-Type" content="text/css">
            <META http-equiv="Imagetoolbar" content="no">
            <META name="robots" content="noindex,nofollow">
            <TITLE>ソリマチ株式会社</TITLE>
            <LINK rel="shortcut icon" href="/sorimachi.ico">
            <LINK rel="stylesheet" href="assets/css/general.css" type="text/css">
            <LINK rel="stylesheet" href="assets/css/blue.css" type="text/css">
        </HEAD>

        <BODY text="#404040" bgcolor="#FFFFFF">
            <CENTER>
                <div style="margin:100px;">
                    <table border="0" cellspacing="0" cellpadding="0" width="530">
                        <tr>
                            <td width="130" align="left" valign="top">
                                <img src="assets/images_general/alert_machiko.gif">
                            </td>
                            <td width="400" valign="bottom">
                                <div class="p100_150" style="color:#A31D1D; font-weight:bold; margin-bottom:1em;">メール送信時にエラーが発生しました。</div>
                                <div class="p090_180" style="color:#404040; font-weight:normal; margin-bottom:1em;">おそれ入りますが、[ <a href="javascript:history.back();">前の画面</a> ] に戻っていただき、<b>入力されたメール内容が正しいかどうか</b>を念のためご確認ください。<br>正しく入力されている場合には、そのままもう一度「30日無料版をダウンロードする」ボタンをクリックしてみてください。</div>
                            </td>
                        </tr>
                    </table>
                </div>
            </CENTER>
        </BODY>

        </HTML>
    <?php
    }
    else {
        $OSFlag = $OSXPFlag = $OSVistaFlag = "";
        $OS = formatInput( $_POST["os"] );

        if ( $VER_TRIAL >= 19 ) {
          // 19シリーズでは30日無料版が2種類に！(2017/11/09 K.Watanabe)
          $OSFlag = ($OS == "Windows 10" || $OS == "Windows 8.1" || $OS == "Windows 8") ? "&osflg=19a" : "&osflg=19b";
        }
        elseif ( $VER_TRIAL >= 17 ) {
          // 17シリーズでは30日無料版が3種類に！(2015/11/09 K.Watanabe)
          $OSFlag = ($OS == "Windows 10" || $OS == "Windows 8.1" || $OS == "Windows 8") ? "&osflg=17a" : (($OS == "Windows 7") ? "&osflg=17b" : "&osflg=17c");
        }
        else {
          // 16シリーズでは30日無料版は2種類
          if ($OS != "Windows 10" && $OS != "Windows 8.1" && $OS != "Windows 8" && $OS != "Windows 7") {
            $OSVistaFlag = "&vistaflg=yes";
          }
        }

        ob_start();
        switch ( $_DownloadProductCategory ) {
            case "bs":
                if ($_from == "srm" || $_from == "old") {
                    header("Location: dl_download.php?from=" . $_from . "&prd=" . $_prd_div_cd1 . $OSVistaFlag . $OSFlag . "&iid={$free_user_no}");
                    exit();
                }
                else {
                    header("Location: dl_download.php?" . $_SERVER["QUERY_STRING"] . $OSVistaFlag . $OSFlag . "&iid={$free_user_no}");
                    exit();
                }
                break;

            case "af":
                if ($_from == "srm" || $_from == "old") {
                    header("Location: download.php?from=" . $_from . "&prd=" . $_prd_div_cd1);
                    exit();
                }
                else {
                    header("Location: download.php?" . $_SERVER["QUERY_STRING"]);
                    exit();
                }
            break;
        }
        ob_end_flush();
    }

    function MDBRegist( &$free_user_no ) {
        global $_from, $_TFP_shin_cd, $_DownloadProductName1, $_DownloadProductName2, $_DownloadProductCategory;
        if ( $_from == "srm" ) {
            // サポート開始希望日
            if ( intval( $_POST["wish_exist"] ) == 0 ) {
                $paramTFP["hs_ymd"] = date( "Ymd");
            }
            else {
                $paramTFP["hs_ymd"] = date( "Ymd", strtotime( $_POST["w_year"] . "/" . $_POST["w_month"] . "/" . $_POST["w_day"] ) );
                $paramMySQL["WishDate"] = $paramTFP["hs_ymd"];
            }
        }

        // Category
        $paramMySQL["DownloadProductCategory"] = $_DownloadProductCategory;

        // Shin code
        $paramTFP["shin_cd"] = $_TFP_shin_cd;

        // Product name
        $paramMySQL["DownloadProductName1"] = $_DownloadProductName1;
        if ( $_DownloadProductName2 != "" ) {
            $paramTFP["free_user_bun_s_nm"] = convertName( $_DownloadProductName2 );
            $paramMySQL["DownloadProductName2"] .= convertName( $_DownloadProductName2 );
        }

        // ご住所
        $paramTFP["pref_cd"]  = formatInput( $_POST["pref_cd"] );

        if ( formatInput( $_POST["post_no"] ) == "" ) {
            require_once "/websites-data/common_files/includes/trial/proccessExcel.inc.php";
            $file_addr = "data/address.xlsx";
            chmod( $file_addr, 0777 );
            $address = readXslx( $file_addr );
            $countAdr = count($address);

            for ( $i = 1; $i <= $countAdr; $i++ ) {
                if ( in_array( $paramTFP["pref_cd"], $address[$i] ) ) {
                    $paramTFP["post_no"]  = $address[$i][2];
                    $paramTFP["adr_city"] = $address[$i][3];
                    $paramTFP["adr_area"] = $address[$i][4];
                    break;
                }
            }
            chmod( $file_addr, 0644 );
        }
        else {
            $paramTFP["post_no"]  = formatInput( $_POST["post_no"] );
            if ( strpos( $paramTFP["post_no"], "-" ) === false ) {
                $paramTFP["post_no"] = substr( $paramTFP["post_no"], 0 , 3 ) . "-" . substr( $paramTFP["post_no"], 3);
            }
            $paramTFP["adr_city"] = convertName( formatInput( $_POST["adr_city"] ) );
            $paramTFP["adr_area"] = convertName( formatInput( $_POST["adr_area"] ) );
            $paramTFP["adr_addr"] = convertName( formatInput( $_POST["adr_addr"] ) );
        }

        // Mail
        $paramMySQL["MailAddress"] = $paramTFP["mail"] = formatInput( $_POST["mailaddress"] );
        $paramMySQL["Mailmagazine"] = formatInput( $_POST["mailmagazine"] );
        if ( $paramMySQL["Mailmagazine"] == "配信に同意しない" ) {
            $paramTFP["delv_stop_fg"] = 9;
        }

        // お名前
        if ( @$_POST["name"] != "" ) {
            $paramTFP["user_nm"] = convertName( formatInput( $_POST["name"] ) );
        }

        // 会社名・事業所名
        if ( @$_POST["company"] != "" ) {
            $paramTFP["kai_nm"] = str_replace("'", "’", formatInput( $_POST["company"] ) );
            $paramTFP["kai_nm"] = convertName( $paramTFP["kai_nm"] );
        }

        // 電話番号
        if ( @$_POST["tel1"] != "" && @$_POST["tel2"] != "" && @$_POST["tel3"] != "" ) {
            $paramTFP["tel"] = formatInput( $_POST["tel1"] ) . "-" . formatInput( $_POST["tel2"] ) . "-" . formatInput( $_POST["tel3"] );
        }

        // FAX番号
        if ( @$_POST["fax1"] != "" && @$_POST["fax2"] != "" && @$_POST["fax3"] != "" ) {
            $paramTFP["fax"] = formatInput( $_POST["fax1"] ) . "-" . formatInput( $_POST["fax2"] ) . "-" . formatInput( $_POST["fax3"] );
        }

        // お客様の業種
        if ( @$_POST["business"] != "" ) {
            $paramMySQL["UserBusiness"] = formatInput( $_POST["business"] );
        }

        // 製品を知ったきっかけ
        if ( @$_POST["trigger"] != "" ) {
            $paramMySQL["Trigger"] = formatInput( $_POST["trigger"] );
        }

        if ( @$_POST["trigger_etc"] != "" ) {
            $paramMySQL["TriggerEtc"] = str_replace("'", "’", formatInput( $_POST["trigger_etc"] ) );
        }

        // 購入時のポイント
        if ( @$_POST["motive"] != "" ) {
            $paramMySQL["Motive"] = formatInput( $_POST["motive"] );
        }

        if ( @$_POST["motive_etc"] != "" ) {
            $paramMySQL["MotiveEtc"] = str_replace("'", "’", formatInput( $_POST["motive_etc"] ) );
        }

        // 比較検討している 他社商品
        if ( @$_POST["competitive"] != "" ) {
            $paramMySQL["Competitive"] = formatInput( $_POST["competitive"] );
        }

        // 現在日時
        $paramMySQL["RealDate"] = date("Ymd");

        // Version trial
        $paramTFP["free_user_bun_cd"] = 2;

        // Client params
        $paramMySQL["OS"]          = formatInput( $_POST["os"] );
        $paramMySQL["IPAddress"]   = $_SERVER["REMOTE_ADDR"];

        $paramMySQL["ReferrerURL"] = formatInput( @$_POST["refererURL"] );

        // Params from URL
        $paramMySQL["DownloadFrom"] = $_from;
        if ( @$_GET["category"] != "" ) {
            $paramMySQL["LocationCategory"] = formatInput( $_GET["category"] );
        }

        if ( @$_GET["page"] != "" ) {
            $paramMySQL["LocationPage"] = formatInput( $_GET["page"] );
        }

        if ( @$_GET["point"] != "" ) {
            $paramMySQL["LocationPoint"] = formatInput( $_GET["point"] );
        }

        $insTFP = new db_API();
        $free_user = $insTFP->ResponseData( "free_user", $paramTFP, "POST" );

        if ( !is_array( $free_user ) || ( isset($free_user["free_user"]) && isset( $free_user["free_user"][0]["error"] ) ) ) {
            header( "Location: dl_inputform.php?" . $_SERVER["QUERY_STRING"] . "&error=1" );
            exit();
        }

        // Free user from TFP
        $free_user = (object) $free_user["free_user"][0];

        // Free user for MySQL
        $paramMySQL["TFP_FreeUserNo"] = $free_user->free_user_no;
        //$free_user_no = makeUserNo( $free_user->free_user_no, 9, 3 );
        $free_user_no = $free_user->free_user_no."S";

        $column = $data = "";
        // 農業の場合と、旧システムからダウンロードした場合にはメールを送信しない。
        foreach ( $paramMySQL as $field => $value ) {
          $column .= ",`$field`";
          $data   .= ",'$value'";
        }

        $column = trim($column, ",");
        $data   = trim($data, ",");
        $Conn = dbTaiken();
        $Conn->execute_edit("INSERT INTO Trial_DownloadInfo($column) VALUES ($data)");
    }

    function sendMail( &$free_user_no ) {
        global $_send_mag_text, $_prd_name;

        MDBRegist( $free_user_no );
        $objText = file_get_contents( $_send_mag_text );
        $indexSbj = mb_strpos( $objText, "\n" );

        // テキストファイルを分割する
        $subj = mb_substr( $objText, 0, $indexSbj + 1 ); // １行目はタイトルとして読み込む
        $body = mb_substr( $objText, $indexSbj + 1 );	   // ３行目以降はまた読み込む

        // 配信時に本文中の必要な値を置き換える
        $body = str_replace( '$DOWNLOAD_PRODUCT_NAME', $_prd_name, $body );
        // $body = str_replace( '$SEND_INQUIRY_ID', trim( str_replace( array("-", "0"), "", $free_user_no ) ) . "S", $body );
        $body = str_replace('$SEND_INQUIRY_ID', $free_user_no, $body);
        $body = str_replace( '$THIS_YEAR', date("Y"), $body );
        $mailto = formatInput( $_POST["mailaddress"] );
        $svname = "mail.sorimachi.co.jp";

        $mailfrom = "ソリマチ株式会社<taiken@mail.sorimachi.co.jp>";
        $headers = "From: $mailfrom";

        mb_language( "ja" );
        if ( !mb_send_mail( "$mailto,$svname", $subj, $body, $headers, "-f{$mailfrom}" ) ) {
            $GLOBAL["ErrorFlag"] = 1;
        }
    }

    function makeUserNo( $no, $len, $pos ) {
        $no = "$no";
        $lenght = $len - strlen($no);
        $arr = array();
        $makeNo = $readyNo = "";
        for ($i = 0; $i < $lenght; $i++) {
          $makeNo .= "0";
        }
        $makeNo .= $no;

        $lenght = strlen($makeNo);
        for ($i = 0; $i < $lenght; $i++) {
          if ($i % $pos == 0) {
            $arr[] = $i;
          }
        }

        $count = count($arr);
        for ($i = 0; $i < $count; $i++) {
          $readyNo .= "-".substr($makeNo, $arr[$i], $pos);
        }
        return trim($readyNo, "-");
    }

    function convertName( $value ) {
        $value = str_replace( " ", "　", $value );
        $value = Japanese::strConv( $value, 4 );
        return $value;
    }
?>
