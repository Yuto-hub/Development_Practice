
<?php
    include '../includes/login.php';
    include '../includes/function.php';

    if(isset($_SESSION['reference'])){
        $reference_edit = $_SESSION['reference'];

        if($_POST){
            if(isset($_POST['cancel'])){

            }else{

                $id = intval($_SESSION['ID']);
                $company_name = $_POST['company_name'];
                $company_address = $_POST['company_address'];
                $total_number = intval($_POST['number_of_applications']);
                $method = $_POST['application_method'];
                $document_screening = $_POST['document_screening'];
                $job = $_POST['occupation'];
                //データベースに格納できる様に書式を変更
                //checkboxに複数チェックがあるとき
                //例 履歴書,修了見込み証明書 に加工し1行で纏める。
                $document_submitted = implode(",",$_POST['Documents_submitted']);
                
                
                //DBに接続
                $dsn = 'mysql:host=192.168.1.171;dbname=job_hunt_manage;charset=utf8';
                $user = 'user';
                $password = 'test';

            

                try{
                    $db = new PDO($dsn, $user, $password);
                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    //プリペアドステートメントを作成
                    
                    
                    $stmt = $db->prepare("UPDATE ac_comp_data_tb SET comp_name = :comp_name,comp_address = :comp_address,no_appli = :no_appli,
                                        how_to_apply = :how_to_apply,docmt_screening = :docmt_screening,job = :job,docmt_submit = :docmt_submit 
                                        WHERE reference_number = $reference_edit");
                    
                    // modifiedのtimestampは
                    // 自動初期化されたカラムは、カラムに値を指定しない挿入行に対して現在のタイムスタンプに設定されます。
                    // 自動更新されたカラムは、行内のほかのカラムの値がその現在の値から変更されると、現在のタイムスタンプに自動的に更新されます。自動更新されたカラムは、ほかのすべてのカラムがその現在の値に設定されていれば、変更されないまま保持されます。
                    // なので ステップ１は自動に任せます！

                    $stmt->bindParam(':comp_name',$company_name,PDO::PARAM_STR);
                    $stmt->bindParam(':comp_address',$company_address,PDO::PARAM_STR);
                    $stmt->bindParam(':no_appli',$total_number,PDO::PARAM_INT);
                    $stmt->bindParam(':how_to_apply',$method,PDO::PARAM_STR);
                    $stmt->bindParam(':docmt_screening',$document_screening,PDO::PARAM_STR);
                    $stmt->bindParam(':job',$job,PDO::PARAM_STR);               
                    $stmt->bindParam(':docmt_submit',$document_submitted,PDO::PARAM_STR);

                    //クエリの実行
                    $stmt->execute();

                    
                }catch (PDOException $e) {
                    exit('エラー：' . $e->getMessage());
                }


                try{
                    $db = new PDO($dsn, $user, $password);
                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    //プリペアドステートメントを作成
                    $stmt = $db->prepare("SELECT reference_number FROM ac_comp_data_tb WHERE act_id = :ID AND comp_name =:company_name");
        
                    $stmt->bindParam(':ID',$id, PDO::PARAM_INT);
                    $stmt->bindParam(':company_name',$company_name, PDO::PARAM_INT);
                    $stmt->execute();
        
                    $row = $stmt ->fetch(PDO::FETCH_ASSOC);
                    
        
                }catch(PDOException $e){
                    exit('エラー：' . $e->getMessage());
                }
                //入力したリファレンスnumber取得。
                $_SESSION['reference'] = $row['reference_number'];

                //INSERT完了したらページ遷移
                if(isset($_POST['commit'])){
                    header('Location: edit_Form_2_1.php');
                }
            
            }

        } 

        try{
            //DBに接続
            $dsn = 'mysql:host=192.168.1.171;dbname=job_hunt_manage;charset=utf8';
            $user = 'user';
            $password = 'test';

            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //プリペアドステートメントを作成
            
            
            $stmt = $db->prepare("SELECT * FROM  ac_comp_data_tb WHERE reference_number = $reference_edit");
            
            //クエリの実行
            $stmt->execute();

            $row = $stmt->fetch();

            $company_name = $row['comp_name'];
            $company_address = $row['comp_address'];
            $total_number = $row['no_appli'];
            $method = $row['how_to_apply'];
            $document_screening = $row['docmt_screening'];
            $job = $row['job'];
            //データベースに格納できる様に書式を変更
            //checkboxに複数チェックがあるとき
            //例 履歴書,修了見込み証明書 に加工し1行で纏める。
            $document_submitted = $row['docmt_submit'];
            var_dump($document_submitted);
    
            

        }catch (PDOException $e) {
            exit('エラー：' . $e->getMessage());
        }



    }else{
        header('Location: home_2.php');

    }
    
?>




<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="../cssfiles/style.css">
            <link rel="stylesheet" href="cssfiles/style_Input_Form.css">
            <title>就職活動報告書_ステップ１</title>
        </head>
        <?php include 'header.php' ?>

        <body>
            <div id="main_title"> 
                <h1>就職活動報告(編集)</h1>
                <h2>ステップ１</h2>
            </div>
            <div class="big-div">   
                <form action="edit_Form_1.php" method="post">
                        <!--　ポストで送信 -->
                    <div class="div-info">
                        <div class="divdiv_col_1 divdiv">   
                            <p class="p-info_col_1"><label for="company_name">応募先企業名：</label></p>
                            <div class="denger_field">
                                <input type="text" class="input-view" name="company_name"  id="company_name" value="<?PHP echo $company_name ?>">
                                <!-- ここにエラー文を出力-->
                            </div>
                        </div>
                        <div class="divdiv_col_1 divdiv">   
                            <p class="p-info_col_1"><label for="company_address">応募先住所：</label></p>
                            <div class="denger_field">
                                <input type="text" class="input-view" name="company_address" id="company_address" value="<?PHP echo $company_address ?>">
                                <!-- ここにエラー文を出力-->
                            </div>
                        </div>
                        
                        <div class="divdiv" >   
                            <p class="p-info"><label for="application_method">応募方法：</label></p>
                            <div class="denger_field divsize">
                                <select class="input-view select_box" name="application_method">
                                    <?PHP 
                                        $methods = ["未選択","本校の紹介","職安の紹介","縁故者の紹介","求人情報誌等","その他"];
                                        for($i = 0; $i < count($methods); $i++){
                                            echo '<option value="'. $methods[$i] . '"';
                                            if($methods[$i] == $method){
                                                echo 'selected';
                                            }
                                            echo '>'. $methods[$i] .'</option>';
                                        }
                                    ?>
                                </select>
                                <!-- ここにエラー文を出力-->
                            </div>
                        </div>
                        
                        <div class="divdiv">   
                            <p class="p-info">書類選考：</p>
                            <div class="input-view_1" id="radio">
                                <div class="denger_field">
                                    <div><label><input type="radio" name="document_screening" value="有" <?PHP echo $document_screening == '有' ? 'checked' : ''?>>有</label></div>
                                    <div class="radio_right"><label><input type="radio" name="document_screening" value="無"  <?PHP echo $document_screening == '無' ? 'checked' : ''?>>無</label></div>
                                    <p><!-- ここにエラー文を出力--></p>
                                </div>
                            </div>
                        </div>
                        
                    
                        <div class="divdiv Form_1">   
                            <p class="p-info"><label for="occupation">職種：</label></p>
                            <div class="denger_field divsize"><input type="text" class="input-view" name="occupation" id="occupation" value="<?PHP echo $job ?>"></label></div>
                        </div>
                        
                        <div class="divdiv Form_1">   
                            <p class="p-info"><label for="number_of_applications"> 応募件数：</label></p>
                            <div class="denger_field divsize"><input type="number" min="0" max="10" class="input-view" name="number_of_applications" id="number_of_applications" value="<?PHP echo $total_number ?>"></div>
                        </div>
                        
                        <div class="divdiv_width_all" id="documents_checkbox">   
                            <p class="p-info">提出書類：</p>
                            <div class="docu_sele">
                                <?PHP 
                                    $docmt_submits = ["履歴書","職務経歴書","終了見込証明書","成績証明書","健康診断書","作品","その他"];
                                    $checked_sub = explode(",",$document_submitted);
                                    for($j = 0; $j < count($docmt_submits); $j++){
                                        echo '<div><label><input type="checkbox" name="Documents_submitted[]" value="' .$docmt_submits[$j] . '"';
                                        foreach($checked_sub as $sub){
                                            if($docmt_submits[$j] == $sub){
                                                echo 'checked';
                                            }
                                        }
                                        echo '>' . $docmt_submits[$j] . '</label></div>';
                                    }
                                ?>
                                    <!--<input type="text" name="Documents_submitted">
                                    </label>-->
                                
                                <div class="denger_field"><!-- ここにエラー文を出力--></div>
                            </div>
                        </div>    
                        <div class="denger_field"></div>
                    
                    </div>
                    <div class="button">
                        <input type="reset"  class="btn_item" name="cancel" value="キャンセル" alt="キャンセル">
                        <input type="submit" class="btn_item" name="save" value="保存" alt="保存">
                        <input type="submit" class="btn_item" name="commit" value="一次→" alt="一次→">
                    </div>
                </form>
            </div>
            <script type="text/javascript" src="\DEVELOPMENT_PRACTICE/JS_files/methot.js"></script>
            <script>
                window.onload = validation_check()
                var bool = true;
                var forms = document.forms[0];
                    if(forms.company_name.value == null || forms.company_name.value == ""){
                        bool = false;
                    }
                   
                    if(forms.company_address.value == null || forms.company_address.value == ""){
                        bool = false;
                    }

                    if(forms.application_method.value == null || forms.application_method.value == "" || forms.application_method.value == "未選択"){
                        bool = false;
                    }

                    if(forms.document_screening.value == null || forms.document_screening.value == ""){
                        bool = false;
                    }

                    if(forms.occupation.value == null || forms.occupation.value == ""){
                        bool = false;
                    }

                    if(forms.number_of_applications.value == null || forms.number_of_applications.value == ""){
                        bool = false;
                    }

                    var checkboxs = document.querySelectorAll("input[type='checkbox']");
                    console.log(checkboxs[0].checked);
                    var chk;
                    for(chk = 0; chk < checkboxs.length; chk++){
                        if(checkboxs[chk].checked == true){
                            break;
                        }
                    }
                    if(chk >= checkboxs.length){
                        bool = false;
                    }
                    

                    if(bool){
                        forms.elements[16].disabled = false;
                    }else{
                        forms.elements[16].disabled = true;
                    }

            </script>
        </body>
        

    </html>


</html>