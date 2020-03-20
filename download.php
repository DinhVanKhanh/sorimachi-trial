<?php 
    require_once "/websites-data/common_files/includes/trial/header.inc.php";

    $seihin = ( @$_GET["products"] == "" ) ? $_GET["prd"] : @$_GET["products"];

    $TRPRG_DOWNLOAD_SERVER = "http://sorimachi-download.s3-ap-northeast-1.amazonaws.com/prg/trial/agri/";

    // 体験版ファイルのファイル名（大文字・小文字を区別）
    $TRPRGName_nbk10 = "bk10taiken.exe";
    $TRPRGName_nns6p1611 = "NS6PTAIKENSETUP.exe";

    // Image
    $btn1 = "assets/images_general/btn_dwnload_b1.gif";
    $btn2 = "assets/images_general/btn_dwnload_r2.gif";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="robots" content="noindex">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <title>ソリマチ株式会社 - 農業ソフト体験版ダウンロード</title>
    <link rel="stylesheet" href="assets/css/general.css" type="text/css">
</head>
<body>
    <table width="750" border="0" cellspacing="0" cellpadding="0">
        <tr><td style="padding-bottom:50px;"><img src="assets/images_general/hd_trialversion.gif" border="0"></td></tr>
        <tr><td style="padding-left:125px;">
            <table border="0" bgcolor="#FFFFFF">
                <tr><td><img src="images/title_logo.gif" width="227" height="75"></td></tr>
            </table><br>
            <font size="2">インストール前に必ず「セットアップマニュアル」をダウンロードし、内容をご確認ください。</font><br>
            <table width="500" border="0">
                <tr><td width="500" bgcolor="#cccccc">
                    <table width="500" bgcolor="#FFFFFF">
                        <tr>
                            <td style="padding:3px;"><a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank"><img src="assets/images_general/get_adobe_reader.gif" border="0" alt="Adobe Reader"></a></td>
                            <td height="32"><font size="2">セットアップマニュアルをご覧になる場合は、<a href="<?= __EXWS_AdobeReaderDL__ ?>" target="_blank">Adobe Reader</a>が必要です。</font></td>
                        </tr>
                    </table>
                </td></tr>
            </table><br>
            <font size="2">「ダウンロード」ボタンをクリックし、任意のフォルダを指定して、保存してください。<br></font>
            <font size="-1" color="#A31D1D">※体験版につきましてはサポートの対象外となりますのであらかじめご了承ください。</font><br>
            <?php
                switch ($seihin) {
                    case "51":
                    case "nbk":
            ?>
                        <br>
                        <font class="p085_150"><a href="<?= $_sorimachi_web_home ?>/products/trial_version/nbk10.php" target="_blank">【 農業簿記<?= $VER_TRIAL_nbk ?> 体験版について 】</a></font>
                        <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font><br><br>
                        <table border="1" cellpadding="5" bordercolor="#999999">
                            <tr>
                                <td height="30"><font size="2"><b>「農業簿記<?= $VER_TRIAL_nbk ?>」体験版</b></font></td>
                                <td align="center"><font color="#666666"><?= $VER_TRIAL_nbk_size_prg ?></font></td>
                                <td><a href="<?= $TRPRG_DOWNLOAD_SERVER.$TRPRGName_nbk10 ?>"><img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「農業簿記<?= $VER_TRIAL_nbk ?>」体験版"></a></td>
                            </tr>
                            <tr>
                                <td height="30" align="left"><b><font size="2">セットアップマニュアル</font></b></td>
                                <td align="center"><font color="#666666"><?= $VER_TRIAL_nbk_size_mn1 ?></font></td>
                                <td><a href="<?= $TRPRG_DOWNLOAD_SERVER ?>bk<?= $VER_TRIAL_nbk ?>taiken.pdf" target="_blank">
                                    <img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="セットアップマニュアル">
                                </a></td>
                            </tr>
                        </table><br>

                        <table width="500" bgcolor="c1c1c1">
                            <tr><td width="500" align="center" bgcolor="#666666">
                                <font color="#FFFFFF" style="font-size:90%; line-height:150%;"><b>【インストール方法】</b></font><br>
                                <table border="0" width="500" bgcolor="#FFFFFF" style="font-size:90%; line-height:140%;">
                                    <tr>
                                        <td valign="top">1．</td>
                                        <td><font size="2">「農業簿記<?= $VER_TRIAL_nbk ?>」をお使いのパソコンの任意のフォルダにダウンロードします。</font></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">2．</td>
                                        <td><font size="2">「セットアップマニュアル」をお使いのパソコンの任意のフォルダにダウンロードします。</font></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">3．</td>
                                        <td><font size="2">ダウンロード終了後、ダウンロードした「bk<?= $VER_TRIAL_nbk ?>taiken.exe」を実行します。</font></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">4．</td>
                                        <td><font size="2">
                                            「bk<?= $VER_TRIAL_nbk ?>taiken.exe」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダに解凍します。解凍先のフォルダ名は半角英数字を指定してください。<br>
                                            （通常は、C:\BK<?= $VER_TRIAL_nbk ?>TAIKEN）
                                        </font></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">5．</td>
                                        <td><font size="2">解凍後、自動的にインストールプログラムが起動します。</font></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">6．</td>
                                        <td><font size="2">ダウンロードしたセットアップマニュアルを参照しながらインストールを行ってください。</font></td>
                                    </tr>
                                    <tr>
                                        <td valign="top">7．</td>
                                        <td><font size="2">インストール後、ダウンロードした「bk<?= $VER_TRIAL_nbk ?>taiken.exe」と、解凍したフォルダ「C:\BK<?= $VER_TRIAL_nbk ?>TAIKEN」のすべては削除して構いません。</font></td>
                                    </tr>
                                </table>
                            </td></tr>
                        </table>
            <?php 
                        break;
                    case "52":
                    case "nns":
            ?>
                        <br>
                        <font class="p085_150"><a href="<?= $_sorimachi_web_home ?>/products/trial_version/nns06p.php" target="_blank">【「農業日誌<?= $VER_TRIAL_nns ?>」体験版について】</a></font>
                        <font class="p075_150" style="padding-left:10px;">※動作環境／制限・注意事項</font>
                        <br><br>
                        <table border="1" cellpadding="5" bordercolor="#999999">
                            <tr>
                                <td height="30"><b><font size="2">農業日誌<?= $VER_TRIAL_nns ?></font></b></td>
                                <td align="center"><font color="#666666"><?= $VER_TRIAL_nns_size_prg ?></font></td>
                                <td><a href="<?= $TRPRG_DOWNLOAD_SERVER.$TRPRGName_nns6p1611 ?>">
                                    <img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="「農業日誌」体験版">
                                </a></td>
                            </tr>
                            <tr>
                                <td height="30" align="left"><b><font size="2">セットアップマニュアル</font></b></td>
                                <td align="center"><font color="#666666"><?= $VER_TRIAL_nns_size_mn1 ?></font></td>
                                <td><a href="<?= $TRPRG_DOWNLOAD_SERVER ?>ns6ptaiken.pdf" target="_blank">
                                    <img src="<?= $btn1 ?>" onMouseover="this.src='<?= $btn2 ?>'" onMouseout="this.src='<?= $btn1 ?>'" width="108" height="35" border="0" alt="セットアップマニュアル">
                                </a></td>
                            </tr>
                        </table><br>

                        <table width="500" bgcolor="c1c1c1">
                            <tr><td width="500" align="center" bgcolor="#666666">
                                <font color="#FFFFFF" style="font-size:90%; line-height:150%;"><b>【インストール方法】</b></font><br>
                                <table border="0" width="500" bgcolor="#FFFFFF" style="font-size:90%; line-height:140%;">
                                    <tr>
                                    <td valign="top">1．</td>
                                    <td>「農業日誌<?= $VER_TRIAL_nns ?>」をお使いのパソコンの任意のフォルダにダウンロードします。</td>
                                    </tr>
                                    <tr>
                                    <td valign="top">2．</td>
                                    <td>「セットアップマニュアル」をお使いのパソコンの任意のフォルダにダウンロードします。</td>
                                    </tr>
                                    <tr>
                                    <td valign="top">3．</td>
                                    <td>ダウンロード終了後、ダウンロードした「<?= $TRPRGName_nns6p1611 ?>」を実行します。</td>
                                    </tr>
                                    <tr>
                                    <td valign="top">4．</td>
                                    <td>「<?= $TRPRGName_nns6p1611 ?>」は圧縮されたファイルの自己解凍プログラムです。 実行後、任意のフォルダに解凍します。解凍先のフォルダ名は半角英数字を指定してください。<br>（通常は、C:\NS6P_TAIKEN）</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">5．</td>
                                        <td>解凍後、自動的にインストールプログラムが起動します。</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">6．</td>
                                        <td>ダウンロードしたセットアップマニュアルを参照しながらインストールを行ってください。</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">7．</td>
                                        <td>インストール後、ダウンロードした「<?= $TRPRGName_nns6p1611 ?>」と、解凍したフォルダ「C:\NS6P_TAIKEN」のすべては削除して構いません。</td>
                                    </tr>
                                </table>
                            </td></tr>
                        </table>
            <?php 
                        break;
                }
            ?>
            <p><br><br><br></p>
            </td>
        </tr>
        <tr><td style="padding-top:30px;"><img src="assets/images_general/ft_all.gif" border="0"></td></tr>
    </table>
    <!-- Google Code for &#20307;&#39443;&#29256;&#28961;&#26009;DL&#23436;&#20102;&#12398;&#12467;&#12531;&#12496;&#12540;&#12472;&#12519;&#12531;&#12479;&#12464;&#65288;&#20840;&#21830;&#21697;&#20849;&#36890;&#65289; Conversion Page -->
    <script type="text/javascript">
        var google_conversion_id = 1014384598;
        var google_conversion_language = "ja";
        var google_conversion_format = "2";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "OLnJCOKKqAIQ1o_Z4wM";
        var google_conversion_value = 0;
    </script>
    <script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="https://www.googleadservices.com/pagead/conversion/1014384598/?label=OLnJCOKKqAIQ1o_Z4wM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>
</body>
</html>
