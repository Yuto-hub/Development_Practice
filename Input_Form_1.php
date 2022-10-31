<?php
    include 'includes/login.php';
?>

<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="cssfiles/style.css">
            <link rel="stylesheet" href="cssfiles/style_Input_Form.css">
            <title>入力画面</title>
        </head>
        <body>
            <div class="return">
                <a href="houkoku.php"><img src="images/innu.jpeg"></a>
            </div>
            <div id="main_title"> 
                <h1>就職活動報告</h1>
                <h2>ステップ１</h2>
            </div>
            <div class="big-div">   
                <form action="#">
                    <div class="div-info">
                        <div class="divdiv">   
                            <p class="p-info"><label for="department_name">科名：</label></p>
                            <input type="text" class="input-view" name="department_name">
                        </div>
                        <div class="divdiv">   
                            <p class="p-info"><label for="number_of_applications"> 応募件数：</label></p>
                            <input type="number" class="input-view" name="number_of_applications">
                        </div>
                        
                         <div class="divdiv_col_1 divdiv">   
                            <p class="p-info_col_1"><label for="company_name">応募先企業名：</label></p>
                            <input type="text" class="input-view" name="company_name">
                        </div>
                        
                         <div class="divdiv_col_1 divdiv">   
                            <p class="p-info_col_1"><label for="business_address">応募先所在地：</label></p>
                            <input type="text" class="input-view" name="business_address">
                        </div>
                        
                        <div class="divdiv">   
                            <p class="p-info"><label for="application_method">応募方法：</label></p>
                            <select class="input-view select_box" name="application_method">
                                <option>本校紹介</option>
                                <option>職安の紹介</option>
                                <option>縁故者の紹介</option>
                                <option>求人情報誌等</option>
                                <option>その他</option>
                            </select>
                        </div>
                        
                        <div class="divdiv">   
                            <p class="p-info">書類選考：</p>
                            <div class="input-view input-view_1">
                                <div><input type="radio" name="document_screening" value="0">有</div>
                                <div><input type="radio" name="document_screening" value="1">無</div>
                            </div>
                        </div>
                    
                        <div class="divdiv_col_1 divdiv">   
                            <p class="p-info_col_1"><label for="occupation">職種：</label></p>
                            <input type="text" class="input-view" name="occupation"></label>
                        </div>
                        
                        <div class="divdiv_width_all">   
                            <p class="p-info">提出書類：</p>
                            <div class="docu_sele">
                                <div><input type="checkbox" name="Documents_submitted" value="resume">履歴書</div>
                                <div><input type="checkbox" name="Documents_submitted" value="curriculum_vitae">職務経歴書</div>
                                <div><input type="checkbox" name="Documents_submitted" value="certificate_expected_completion">終了見込証明書</div>
                                <div><input type="checkbox" name="Documents_submitted" value="transcript">成績証明書</div>
                                <div><input type="checkbox" name="Documents_submitted" value="health_certificate">健康診断書</div>
                                <div><input type="checkbox" name="Documents_submitted" value="portfolio">作品</div>
                                <div class="div_oder_area">
                                    <input type="checkbox" name="Documents_submitted" value="other_area">その他：
                                    <input type="text" name="Documents_submitted">
                                </div>
                            </div>
                        </div>                
                    </div>
                    <div class="button">
                       <input type="reset"  class="btn_item" value="キャンセル" alt="キャンセル">
                        <input type="button" class="btn_item" value="保存" alt="保存">
                        <input type="button" onclick="location.href='Input_Form_2_1.php'" class="btn_item" value="一次→" alt="一次→">
                    </div>
                </form>
            </div>
            

        </body>
    
    </html>


</html>