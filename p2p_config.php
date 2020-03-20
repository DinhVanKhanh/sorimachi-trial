<?php
    require_once "/websites-data/common_files/includes/trial/header.inc.php";
    $lcPrdCode = formatInput( $_GET["prdcode"] );
    switch ($lcPrdCode) {
        case "accnet":
            $lcPrdName = "会計王{$VersionNoNewestTrialACC}PRO";
            break;

        case "spr":
            $lcPrdName = "販売王{$VersionNoNewestTrialSAL}販売・仕入・在庫";
            break;

        case "scl":
            $lcPrdName = "顧客王{$VersionNoNewestTrialSAL}";
            break;
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=shift_jis">
    <META http-equiv="Content-Style-Type" content="TEXT/CSS">
    <META http-equiv="Imagetoolbar" content="no">
    <TITLE>30日無料版をピア・ツー・ピアで使用するには｜ソリマチ株式会社</TITLE>
    <LINK rel="shortcut icon" href="/sorimachi.ico">
    <LINK rel="stylesheet" href="assets/css/general.css" type="TEXT/CSS">
    <LINK rel="stylesheet" href="assets/css/blue.css" type="TEXT/CSS">
    <LINK rel="stylesheet" href="assets/css/gyoumu.css" type="TEXT/CSS">
    <LINK rel="stylesheet" href="assets/css/indent.css" type="TEXT/CSS">
    <SCRIPT language="JavaScript" src="assets/js/general.js"></SCRIPT>
</HEAD>

<BODY text="#404040" bgcolor="#F8F8F8">
    <TABLE border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
        <TR>
            <TD valign="middle" style="padding:20px;">
                <div style="border:1px #3C4EAB solid; background-color:#FFFFFF;">
                    <div class="p090_130" style="padding:8px; border-bottom:1px #3C4EAB solid;">
                        <FONT color="#3C4EAB">◆</FONT>
                        <FONT color="#606060"><B>ピア・ツー・ピアで使用するには</B></FONT>
                    </div>
                    <div class="p080_150" style="margin:8px 15px; background-color:#FFFFFF;">
                        <div style="margin-bottom:2em;">本システムは、ピア・ツー・ピア型ネットワークに対応しています。ピア・ツー・ピア型のネットワークで本システムを使用することにより、30日無料版では最大2台のパソコンで同時に1つのデータベースを利用できるようになります（伝票の入力などが同時に行えます）。</div>
                        <div style="margin:1ex 0; background-color:#E0E8F8; padding:2px 5px;">
                            <FONT color="#3C4EAB"><B>１．ホストとして利用するパソコンでの設定</B></FONT>
                        </div>
                        <div class="id0_2"> （1） Windows のスタートボタン→[すべてのプログラム]（※）→[ソリマチアプリケーション]→[ソリマチ製品 サポートと設定ツール]→[<?= $lcPrdName ?> 体験版]→[ピア・ツー・ピア環境設定]を選択します。<BR>
                        </div>
                        <!--<div class="id2_3">
                        ※Windows 8の場合は、スタート画面を表示し（キーボードでWindowsキーを押す）、画面下部で右クリックして表示される「全てのアプリ」をクリックします。
                        </div>-->
                        <div class="id0_2" style="margin-bottom:1ex;"> （2） 「ピア・ツー・ピア環境設定」画面で、追加シリアル番号の欄に<br>「1111-2222-33333-444」と入力してください（入力の際にはハイフンは必要ありません）。 </div>
                        <div class="id0_2" style="margin-bottom:1ex;"> （3） 「設定」ボタンをクリックすると、確認画面が表示されます。問題なければ「OK」ボタンをクリックしてください。 </div>
                        <div class="id0_2" style="margin-bottom:2em;"> （4） 本システムを起動すると、設定が有効になります。 </div>
                        <div style="margin:1ex 0; background-color:#E0E8F8; padding:2px 5px;">
                            <FONT color="#3C4EAB"><B>２．クライアントのパソコンでの設定</B></FONT>
                        </div>
                        <div class="id0_2" style="margin-bottom:1ex;"> （1） 「<?= $lcPrdName ?> 体験版」を起動します。 <?php if ($lcPrdCode == "accnet") { ?> <br>本システムの[ファイル]-[起動時に接続先設定ダイアログを表示する]を選択します。 <?php } ?> </div>
                        <div class="id0_2" style="margin-bottom:1ex;"> （2） 本システムの[ファイル]-[起動時にログインダイアログを表示する]を選択します。 </div>
                        <div class="id0_2" style="margin-bottom:1ex;"> （3） 本システムを一度終了します。 </div>
                        <div class="id0_2" style="margin-bottom:1ex;"> （4） 本システムを起動します。 </div>
                        <div class="id0_2" style="margin-bottom:1ex;"> <?php if ($lcPrdCode == "accnet") { ?> （5） 「接続先設定」画面が表示されるので、接続先を新しいホスト側のSQL Serverに変更します。 <?php } else { ?> （5） 「接続先設定」画面が表示されるので、接続先を新しいホスト側のSQL Serverに変更します。<?php } ?></div>
                        <div class="id0_2" style="margin-bottom:1ex;"> <?php if ($lcPrdCode == "accnet") { ?> （6） 「接続」ボタンで、 「ログイン」画面が表示されるので、ホスト側の[利用者設定]で登録してあるユーザー名に変更します。 <?php } else { ?> （6） 「接続」ボタンで、データベースに接続されます。ホスト側の[利用者設定]で登録してあるユーザー名でログインします。<?php } ?></div>
                        <div class="id0_2" style="margin-bottom:1ex;"> （7） 「ログイン」ボタンで、新しいホスト側のデータベースに接続され、本システムが起動します。 </div>
                    </div>
                </div>
                <div style="padding-top:10px; font-size:11px; color:#A0A0A0; font-family:verdana; text-align:center;">Copyright&#169; Sorimachi Co.,Ltd. All rights reserved.</div>
            </TD>
        </TR>
    </TABLE>
</BODY>

</HTML>
