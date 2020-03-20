<?php
    require_once "/websites-data/common_files/includes/trial/header.inc.php";
    require_once "/websites-data/www_sorizo/lib/get_filesize.php";
    define("LocationCategory", "bsprd");
    define("LocationPage", "trialdl");

    $Products = $_prd_div_cd1;
    $SendInquiryID = $_GET["iid"];

    // 説明用ページの拡張子を指定（12シリーズ以降はPHPに統一）
    $GuidePageExtension = ".php";

    // Directory file product
    $dir_prd = __DIR__ . "/download_files/";

    // Image
    $btn1 = "assets/images_general/btn_dwnload_b1.gif";
    $btn2 = "assets/images_general/btn_dwnload_r2.gif";

    // ダウンロード用サーバー
    //★修正が必要
    $TRPRG_DOWNLOAD_SERVER = "http://sorimachi-download.s3-ap-northeast-1.amazonaws.com/prg/trial/ou/";
    $TRPRG_MANUAL_SERVER = "http://support.sorimachi.co.jp/download-s/manual/pdf/";

    // OSによるプログラムの振り分け
    // ★将来的に効かなくなる…
    $SortPRGFromOS = "";
    if ( $VER_TRIAL >= 19 ) {
        if ( $Products != "accstd" && $Products != "accper" && $Products != "accnpo" && $Products == "acccar" ) {
            if ( $_GET["osflg"] == "19b" ) {
                $SortPRGFromOS = "_withDotNet4";
            }
        }
        elseif ( $VER_TRIAL >= 17 ) {
            if ( $_GET["osflg"] == "17b" ) {
                $SortPRGFromOS = "_withDotNet4CP";
            }
            elseif ( $_GET["osflg"] == "17c" ) {
                $SortPRGFromOS = "_withDotNet3_4CP";
            }
        }
        else {
            if ( $_GET["vistaflg"] == "yes" ) {
                $SortPRGFromOS = "_withDotNet";
            }
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <meta name="robots" content="noindex,nofollow">
    <title>ソリマチ株式会社 - 業務ソフト 30日無料版ダウンロード</title>
    <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" href="assets/css/general.css" type="text/css">
    <link rel="stylesheet" href="assets/css/indent.css" type="text/css">
    <script language="JavaScript" src="assets/js/general.js"></script>
</head>

<body>
    <table width="750" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td style="padding-bottom:50px;"><img src="assets/images_general/hd_bs30f.gif" border="0"></td>
        </tr>
        <tr>
            <td style="padding-left:100px;">

                <!--★ここから★-->
                <!--<table border="0" bgcolor="#FFFFFF">
                  <tr><td>
                <img src="images/title_logo.gif" width="227" height="75"></td></tr>
                </table>
                -->
                <div style="font:bold 32px/48px Meiryo,メイリオ,sans-seirf; color:#c00; border-bottom:1px #333 dotted; width:550px; margin-bottom:20px; text-align:center;">30日無料版をダウンロードできます</div>

                <div class="p080_130" style="width:545px; margin-left:5px;">30日無料版のインストールや操作の際には「<b>PDFマニュアル</b>」をダウンロードしてお使いください。</div>

                <table width="550" border="0">
                    <tr>
                        <td width="550" bgcolor="#cccccc">
                            <table width="550" bgcolor="#FFFFFF">
                                <tr>
                                    <td style="padding:3px;"><a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank"><img src="assets/images_general/get_adobe_reader.gif" border="0" alt="Adobe Reader"></a></td>
                                    <td height="32">
                                        <font size="2">「PDFマニュアル」をご覧になる場合は、<a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank">Adobe Reader</a>が必要です。</font>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <div class="p080_130" style="width:550px;">
                    <div class="id0_1" style="margin-bottom:1ex;">「ダウンロード」ボタンをクリックし、任意のフォルダーを指定して、保存してください。</div>
                    <div class="id0_1" style="margin-bottom:2em; color:#dd0000;">※本30日無料版に関するサポートは「30日無料版サポートセンター」にて承ります。<br>「30日無料版サポートセンター」のご利用方法につきましてはご入力いただきましたメールアドレス宛に、メールでお知らせしております。</div>
                    <!--緊急メンテナンス情報(2014/01/28)
                    <div class="id0_1" style="margin-bottom:20px; color:#dd0000;">※<u>2014年1月29日(水) 深夜0時～5時の間</U>、ネットワーク設備のメンテナンスに伴い、ダウンロードの際に動作が不安定になる場合がございます。途中で切断されてしまう場合は5時以降に再度ダウンロードをしていただきますようお願いいたします。</div>-->
                </div>

        <?php switch ($Products) {
                case "accstd":
                case "acc":
                  $ProductsLocal = "accstd"; ?>
                  <!-- 会計王（ここから）-->
                  <!-- 会計王ダウンロードファイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal . $VER_TRIAL_acc . $GuidePageExtension ?>" target="_blank">「会計王<?= $VER_TRIAL_acc ?>」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>

                  <br>
                  <br>
                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「会計王<?= $VER_TRIAL_acc ?>」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accstd_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「会計王<?= $VER_TRIAL_acc ?>」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accstd_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <br>
                  <br>
                  <!-- 会計王インストール方法（ここから）-->
                  <table width="550" bgcolor="#C1C1C1">
                      <tr>
                          <td width="550" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「会計王<?= $VER_TRIAL_acc ?>」30日無料版（プログラムファイル）をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">次に、解凍したフォルダー内（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）の「Setup.exe」を実行し、「会計王<?= $VER_TRIAL_acc ?>」本体をインストールします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">8．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</font>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!-- 会計王（ここまで）-->

                  <? // ▼▼▼会計王リスティング広告用タグ（2019.07.22設置 担当窓口：プロモーション東） ?>
                  <!----- ValueCommerce CV_DIV_F：ここから ----->
                  <div data-vc-ec-id="3470114" data-vc-order-id="<?= $SendInquiryID ?>">
                  </div>
                  <script type="text/javascript" src="//cv.valuecommerce.com/vccv.min.js"></script>
                  <noscript>
                      <img src="https://itrack2.valuecommerce.ne.jp/cgi-bin/3470114/vc_itag.cgi?type=img&order_id=<?= $SendInquiryID ?>" width="1" height="1">
                  </noscript>
                  <!----- ValueCommerce CV_DIV_F：ここまで ----->
              <?php
                  break;

                 // ▲▲▲会計王リスティング広告用タグ（2019.07.22設置 担当窓口：プロモーション東）
                case "accper":
                case "min":
                  $ProductsLocal = "accper"; ?>
                  <!-- みんなの青色申告（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal . $VER_TRIAL_min . $GuidePageExtension ?>" target="_blank">「みんなの青色申告<?= $VER_TRIAL_min ?>」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>

                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「みんなの青色申告<?= $VER_TRIAL_min ?>」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accper_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER . $ProductsLocal . $VER_TRIAL_min ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「みんなの青色申告<?= $VER_TRIAL_min ?>」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accper_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER . $ProductsLocal . $VER_TRIAL_min ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <br>
                  <br>
                  <!-- みんなの青色申告　インストール方法（ここから）-->
                  <table width="550" bgcolor="#C1C1C1">
                      <tr>
                          <td width="550" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「みんなの青色申告<?= $VER_TRIAL_min ?>」30日無料版（プログラムファイル）をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_min ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal . $VER_TRIAL_min ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_min ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">次に、解凍したフォルダー内（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_min ?>_taiken<?= $SortPRGFromOS ?>）の「Setup.exe」を実行し、「みんなの青色申告<?= $VER_TRIAL_min ?>」本体をインストールします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">8．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_min ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal . $VER_TRIAL_min ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!-- みんなの青色申告（ここまで）-->
              <?php
                  break;

                case "accnpo":
                  $ProductsLocal = "accnpo";
                  //12シリーズ（会計王NPO法人スタイル）以降 ?>
                  <!-- 会計王NPO法人スタイル（ここから）-->
                  <!-- 会計王NPO法人スタイル　ダウンロードファイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal . $VER_TRIAL_acc . $GuidePageExtension ?>" target="_blank">「会計王<?= $VER_TRIAL_acc ?> NPO法人スタイル」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br>
                  <!--
                  <div class="p080_130" style="width:550px; margin:10px 0 15px 0; padding:5px 1em 5px 1em; text-indent:0em; border:1px #B0B0B0 solid; background-color:#FFFFA0;">
                  <font color="#FF3300"><b>本30日無料版には、NPO法人の新会計基準での入力に対応する新会計基準伝票入力ツールは搭載されておりません。</b></font><br>詳しくは弊社窓口（東京営業所 TEL：03-5475-5301）までお問い合わせください。</div>
                  -->
                  <br>
                  <br>
                  <font size="2">「ダウンロード」ボタンをクリックし、任意のフォルダーを指定して、保存してください。</font>
                  <table border="1" cellpadding="5" bordercolor="#999999" width="550px">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「会計王<?= $VER_TRIAL_acc ?> NPO法人スタイル」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accnpo_size_prg ?></font>
                          </td>
                          <td align="center"><a href="<?= $TRPRG_DOWNLOAD_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「会計王<?= $VER_TRIAL_acc ?> NPO法人スタイル」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accnpo_size_mn1 ?></font>
                          </td>
                          <td align="center"><a href="<?= $TRPRG_MANUAL_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <br>
                  <!-- 会計王NPO法人スタイル　ダウンロード予想時間（削除）-->

                  <br>
                  <table width="406" bgcolor="#C1C1C1">
                      <tr>
                          <td width="638" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「会計王<?= $VER_TRIAL_acc ?> NPO法人スタイル」30日無料版（プログラムファイル）を、お使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">
                                          「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。
                                          実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>
                                          （通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）
                                      </td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">次に、解凍したフォルダー内（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）の「Setup.exe」を実行し、「会計王<?= $VER_TRIAL_acc ?> NPO法人スタイル」本体をインストールします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">8．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!-- 会計王NPO法人スタイル（ここまで）-->
              <?php
                  break;

                case "acccar":
                  $ProductsLocal = "acccar"; ?>
                  <!-- 会計王 介護事業所スタイル（ここから）-->
                  <!-- 会計王 介護事業所スタイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal . $VER_TRIAL_acc . $GuidePageExtension ?>" target="_blank">「会計王<?= $VER_TRIAL_acc ?> 介護事業所スタイル」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>
                  <font size="2">「ダウンロード」ボタンをクリックし、任意のフォルダーを指定して、保存してください。</font>
                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「会計王<?= $VER_TRIAL_acc ?> 介護事業所スタイル」30日無料版<br>（プログラムファイル）</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_acccar_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「会計王<?= $VER_TRIAL_acc ?> 介護事業所スタイル」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_acccar_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <br>
                  <!-- 会計王 介護事業所スタイル　ダウンロード予想時間 （削除）-->
                  <br>
                  <table width="406" bgcolor="#C1C1C1">
                      <tr>
                          <td width="638" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「会計王<?= $VER_TRIAL_acc ?> 介護事業所スタイル」30日無料版（プログラムファイル）を、お使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。
                                          実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>
                                          （通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">次に、解凍したフォルダー内（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）の「Setup.exe」を実行し、「会計王<?= $VER_TRIAL_acc ?> 介護事業所スタイル」本体をインストールします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">8．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!-- 会計王 介護事業所スタイル（ここまで）-->
              <?php
                  break;

                case "accnet":
                case "accnet12":
                case "apr":
                  $ProductsLocal = "accnet"; ?>
                  <!-- 会計王PRO（ここから）-->
                  <!-- 会計王PROダウンロードファイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal . $VER_TRIAL_acc . $GuidePageExtension ?>" target="_blank">「会計王<?= $VER_TRIAL_acc ?> PRO」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>

                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「会計王<?= $VER_TRIAL_acc ?> PRO」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accnet_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「会計王<?= $VER_TRIAL_acc ?> PRO」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_accnet_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER . $ProductsLocal . $VER_TRIAL_acc ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <!-- 会計王PRO　ダウンロードファイル（ここまで）-->
                  <div class="p080_150" style="margin:1ex 0; width:500px;">
                      <!-- <div class="id0_1">※30日無料版では「セットアップ／拡張機能マニュアル」を提供させていただいております。</div> -->
                      <div class="id0_1">※ピア・ツー・ピア型ネットワークで使用するための設定は [ <a href="" onclick="window.open('p2p_config.php?prdcode=<?= $ProductsLocal ?>')"><b>こちら</b></a> ] でご確認ください。</div>
                  </div>

                  <br>
                  <!-- 会計王PRO　ダウンロード予想時間（削除）-->
                  <br>
                  <br>
                  <!-- 会計王PRO　インストール方法（ここから）-->
                  <table width="550" bgcolor="#C1C1C1">
                      <tr>
                          <td width="550" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「会計王<?= $VER_TRIAL_acc ?> PRO」30日無料版（プログラムファイル）を、お使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_acc ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal . $VER_TRIAL_acc ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>

                  <div class="p090_130" style="margin:1em 0em;">
                      <div class="id0_1">※ピア・ツー・ピア型ネットワークで使用するための設定は [ <a href="" onclick="window.open('p2p_config.php?prdcode=<?= $ProductsLocal ?>')"><b>こちら</b></a> ] でご確認ください。</div>
                  </div>
                  <!-- 会計王PRO　インストール方法（ここまで）-->
                  <!-- 会計王PRO（ここまで）-->
              <?php
                  break;

                case "psl":
                  $ProductsLocal = "psl"; ?>
                  <!-- 給料王（ここから）-->
                  <!-- 給料王ダウンロードファイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal . $VER_TRIAL_psl . $GuidePageExtension ?>" target="_blank">「給料王<?= $VER_TRIAL_psl ?>」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>

                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「給料王<?= $VER_TRIAL_psl ?>」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_psl_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER.$ProductsLocal.$$VER_TRIAL_psl ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「給料王<?= $VER_TRIAL_psl ?>」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_psl_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER.$ProductsLocal.$VER_TRIAL_psl ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <br>
                  <br>
                  <!-- 給料王インストール方法（ここから）-->
                  <table width="550" bgcolor="#C1C1C1">
                      <tr>
                          <td width="550" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「給料王<?= $VER_TRIAL_psl ?>」30日無料版（プログラムファイル）をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_psl ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal . $VER_TRIAL_psl ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\psl<?= $VER_TRIAL_psl ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal . $VER_TRIAL_psl ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal . $VER_TRIAL_psl ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!-- 給料王（ここまで）-->
              <?php
                  break;

                case "sal":
                  $ProductsLocal = "sal"; ?>
                  <!-- 販売王（ここから）-->
                  <!-- 販売王ダウンロードファイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal.$VER_TRIAL_sal.$GuidePageExtension ?>" target="_blank">「販売王<?= $VER_TRIAL_sal ?>」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>

                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「販売王<?= $VER_TRIAL_sal ?>」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_sal_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER.$ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「販売王<?= $VER_TRIAL_sal ?>」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_sal_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER ?>sal_spr<?= $VER_TRIAL_sal ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <!-- 販売王ダウンロードファイル（ここまで）-->
                  <br>
                  <br>
                  <!-- 販売王インストール方法（ここから）-->
                  <table bgcolor="#C1C1C1">
                      <tr>
                          <td width="550" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「販売王<?= $VER_TRIAL_sal ?>」30日無料版（プログラムファイル）をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\<?= $ProductsLocal.$VER_TRIAL_sal ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal.$VER_TRIAL_sal ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
                  <!-- 販売王（ここまで）-->
              <?php
                  break;

                case "spr":
                  $ProductsLocal = "spr"; ?>
                  <!-- 販仕在（ここから）-->
                  <!-- 販仕在　ダウンロードファイル（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal.$VER_TRIAL_sal.$GuidePageExtension ?>" target="_blank">「販売王<?= $VER_TRIAL_sal ?> 販売・仕入・在庫」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>

                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「販売王<?= $VER_TRIAL_sal ?> 販売・仕入・在庫」30日無料版<br>（プログラムファイル）</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_spr_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER.$ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「販売王<?= $VER_TRIAL_sal ?> 販売・仕入・在庫」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_spr_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER ?>sal_spr<?= $VER_TRIAL_sal ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <div class="p080_150" style="margin:1ex 0; width:500px;">
                      <!-- <div class="id0_1">※30日無料版では「導入マニュアル」を提供させていただいております。</div> -->
                      <div class="id0_1">※ピア・ツー・ピア型ネットワークで使用するための設定は [ <a href="" onclick="window.open('p2p_config.php?prdcode=<?= $ProductsLocal ?>')"><b>こちら</b></a> ] でご確認ください。</div>
                  </div>
                  <!-- 販仕在　ダウンロードファイル（ここまで）-->
                  <br>
                  <br>
                  <!-- 販仕在　インストール方法（ここから）-->
                  <table bgcolor="#C1C1C1">
                      <tr>
                          <td width="550" align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「販売王<?= $VER_TRIAL_sal ?> 販売・仕入・在庫」30日無料版（プログラムファイル）をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\<?= $ProductsLocal.$VER_TRIAL_sal ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal.$VER_TRIAL_sal ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>

                  <div class="p090_130" style="margin:1em 0em;">
                      <div class="id0_1">※ピア・ツー・ピア型ネットワークで使用するための設定は [ <a href="" onclick="window.open('p2p_config.php?prdcode=<?= $ProductsLocal ?>')"><b>こちら</b></a> ] でご確認ください。</div>
                  </div>
                  <!-- 販仕在インストール方法（ここまで）-->
                  <!-- 販仕在（ここまで）-->
              <?php
                  break;

                case "scl":
                  $ProductsLocal = "scl"; ?>
                  <!-- 顧客王（ここから）-->
                  <font class="p090_130" style="font-family:Meiryo,メイリオ,sans-serif; font-weight:bold;"><a href="<?= $_sorimachi_web_home ?>/products_gyou/trial_version/<?= $ProductsLocal.$VER_TRIAL_sal.$GuidePageExtension ?>" target="_blank">「顧客王<?= $VER_TRIAL_sal ?>」30日無料版について</a></font>
                  <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                  <br><br>

                  <table border="1" cellpadding="5" bordercolor="#999999">
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>「顧客王<?= $VER_TRIAL_sal ?>」30日無料版<br>（プログラムファイル）</font></b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_scl_size_prg ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_DOWNLOAD_SERVER.$ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「顧客王<?= $VER_TRIAL_sal ?>」30日無料版"></a></td>
                      </tr>
                      <tr>
                          <td height="30" align="left" class="p090_130"><b>PDFマニュアル</b></td>
                          <td align="center">
                              <font color="#666666"><?= $VER_TRIAL_scl_size_mn1 ?></font>
                          </td>
                          <td><a href="<?= $TRPRG_MANUAL_SERVER.$ProductsLocal.$VER_TRIAL_sal ?>.pdf" target="_blank"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="PDFマニュアル"></a></td>
                      </tr>
                  </table>
                  <!-- 顧客王ダウンロードファイル（ここまで）-->
                  <div class="p080_150" style="margin:1ex 0; width:500px;">
                      <!-- <div class="id0_1">※30日無料版では「導入マニュアル」を提供させていただいております。</div> -->
                      <div class="id0_1">※ピア・ツー・ピア型ネットワークで使用するための設定は [ <a href="" onclick="window.open('p2p_config.php?prdcode=<?= $ProductsLocal ?>')"><b>こちら</b></a> ] でご確認ください。</div>
                  </div>
                  <br>
                  <br>
                  <!-- 顧客王インストール方法（ここから）-->
                  <table width="550" bgcolor="#C1C1C1">
                      <tr>
                          <td align="center" bgcolor="#666666">
                              <div class="p090_150" style="margin:3px;">
                                  <font color="#FFFFFF"><b>【インストール方法】</b></font>
                              </div>
                              <table border="0" cellpadding="4" width="550" bgcolor="#FFFFFF">
                                  <tr>
                                      <td valign="top">1．</td>
                                      <td class="p090_130">「顧客王<?= $VER_TRIAL_sal ?>」30日無料版（プログラムファイル）をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">2．</td>
                                      <td class="p090_130">「PDFマニュアル」をお使いのマシンの任意のフォルダーにダウンロードします。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">3．</td>
                                      <td class="p090_130">ダウンロード終了後、ダウンロードした「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」を実行します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">4．</td>
                                      <td class="p090_130">「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダーに解凍します。解凍先のフォルダー名は半角英数字を指定してください。<br>（通常は、C:\<?= $ProductsLocal.$VER_TRIAL_sal ?>_taiken<?= $SortPRGFromOS ?>）</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">5．</td>
                                      <td class="p090_130">解凍後、自動的にインストールプログラムが起動します。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">6．</td>
                                      <td class="p090_130">ダウンロードしたPDFマニュアルを参照しながらインストールを行なってください。</td>
                                  </tr>
                                  <tr>
                                      <td valign="top">7．</td>
                                      <td class="p090_130">インストール後、ダウンロードした「<?= $ProductsLocal.$VER_TRIAL_sal ?>taiken<?= $SortPRGFromOS ?>.exe」と、解凍したフォルダー「C:\<?= $ProductsLocal.$VER_TRIAL_sal ?>_taiken<?= $SortPRGFromOS ?>」はすべて削除して構いません。</td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>

                  <div class="p090_130" style="margin:1em 0em;">
                      <div class="id0_1">※ピア・ツー・ピア型ネットワークで使用するための設定は [ <a href="" onclick="window.open('p2p_config.php?prdcode=<?= $ProductsLocal ?>')"><b>こちら</b></a> ] でご確認ください。</div>
                  </div>
                  <!-- 顧客王インストール方法（ここまで）-->
                  <!-- 顧客王（ここまで）-->
              <?php 
                  break;
        } ?>
                <P><br><br><br></P>
            </td>
        </tr>
        <tr>
            <td style="padding-top:30px;"><img src="assets/images_general/ft_all.gif" border="0"></td>
        </tr>
    </table>

    <!-- Yahoo Code for your Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var yahoo_conversion_id = 1000089842;
        var yahoo_conversion_label = "MOp_CL-9pQgQuenu0AM";
        var yahoo_conversion_value = 0;
        /* ]]> */
    </script>
    <script type="text/javascript" src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="https://b91.yahoo.co.jp/pagead/conversion/1000089842/?value=0&amp;label=MOp_CL-9pQgQuenu0AM&amp;guid=ON&amp;script=0&amp;disvt=true" />
        </div>
    </noscript>

    <!-- Google Code for &#20307;&#39443;&#29256;&#28961;&#26009;DL&#23436;&#20102;&#12398;&#12467;&#12531;&#12496;&#12540;&#12472;&#12519;&#12531;&#12479;&#12464;&#65288;&#20840;&#21830;&#21697;&#20849;&#36890;&#65289; Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1014384598;
        var google_conversion_language = "ja";
        var google_conversion_format = "2";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "OLnJCOKKqAIQ1o_Z4wM";
        var google_conversion_value = 0;
        /* ]]> */
    </script>
    <script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1014384598/?label=OLnJCOKKqAIQ1o_Z4wM&amp;guid=ON&amp;script=0" />
        </div>
    </noscript>
</body>
</html>
