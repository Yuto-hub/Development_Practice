<?php
    include 'includes/login.php';
?>

<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="cssfiles/style.css">
            <link rel="stylesheet" href="cssfiles/style_pastdata.css">
            <title>就職活動過去データ</title>
        </head>
        <body>
            <div class="return">    <!-- 犬の画像用戻るボタン -->
                <img src="images/innu.jpeg">
            </div>
            <div id="main_title">   <!-- 共通のタイトル部分 -->
                <h1>就職活動<br class="br-sp">過去データ</h1>
            </div>
            <div class="big-div">
                <div class="div-info">
                    <div class="divdiv">
                        <p class="p-info">科名：</p><p class="p-view">情報システム科</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">応募方法：</p><p class="p-view">本校の紹介</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">書類選考：</p><p class="p-view">有</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">応募先企業：</p><p class="p-view">○○株式会社</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">応募先所在地：</p><p class="p-view">○○市</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">提出書類：</p><p class="p-view">履歴書、終了見込証明書</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">職種：</p><p class="p-view">SE</p>
                    </div>
                    <div class="divdiv">
                        <p class="p-info">担当者名：</p><p class="p-view">情報太郎</p>
                    </div>
                </div>
                <div class="div-detail">
                    <div class="test">
                        <div>
                            <p>一次：</p><p>日時(○○月 ○○日　　<br class="br-sp">○○時 ○○分～○○時 ○○分)</p><p>適性検査(専門分野)</p>
                        </div>
                        <div>
                            <p class="p-info">適性検査詳細：</p><p class="p-view">表示</p>
                        </div>
                    </div>
                    <div class="test">
                        <div>
                            <p>二次：</p><p>日時(○○月 ○○日：○○時 ○○分～○○時 ○○分)</p><p>面接(個別面接)</p>
                        </div>
                        <div>
                            <p class="p-info">面接試験詳細：</p><p class="p-view">表示</p>
                        </div>
                    </div>
                    <div class="test">
                        <div>
                            <p>三次：</p><p>日時(○○月 ○○日：○○時 ○○分～○○時 ○○分)</p><p>実技</p>
                        </div>
                        <div>
                            <p class="p-info">実技試験詳細：</p><p class="p-view">表示</p>
                        </div>
                    </div>
                    <div class="test">
                        <div>
                            <p class="p-info">感想、反省点：</p><p class="p-view">表示</p>
                        </div>
                    </div>
                    <div class="test">
                        <div>
                            <p class="p-info">今後の活動予定：</p><p class="p-view">表示</p>
                        </div>
                    </div>
                </div>
                <div class="change">
                    <button onclick="location.href='#!'">← 前</button>
                    <button onclick="location.href='#!'">次 →</button>
                </div>
                <div class="page-top">
                    <a href="#"><img src="images/pagetop 1.png" alt="page-top"></a>
                </div>
            </div>

        </body>
    
    </html>


</html>