var l1 = document.getElementById('text_info');
var fen = document.getElementsByClassName('first-exam_test');

let first_exam = document.querySelectorAll(`input[type='checkbox'][name='First-stage exam']`);

for (let i = 0; i < first_exam.length;i++) {
    exam_detail(first_exam,i);
}

function exam_detail(first_exam,i){

    first_exam[i].addEventListener('click',function(){
        if (this.checked) {
            l1.innerHTML += '<div id="new'+ i +'" class="testsAll"><p class="title-tests">' + fen[i].textContent + '内容詳細：</p><textarea  class="text-tests" name="details"></textarea></div>';
            check[i] = document.getElementById(ii).textContent;

        } else {
            var ii = 'new' + i;
            var c_name = document.getElementById(ii).lastElementChild.value;
            if(c_name == ""){
                document.getElementById(ii).remove();
            }else{
                var result = window.confirm("記入内容はすべて削除されます。よろしいですか？");

                if(result){
                    document.getElementById(ii).remove();
                }else{
                    first_exam[i].checked = true;
                }
            }
        }},false);
}

<<<<<<< HEAD
function new_login_check() {
        let formElements = document.forms[0];
        
        for (let con = 0; con < 4; con++) {
            if (formElements.elements[con].value != "" )  {
                if (con == 3) {
                    if(formElements.elements[con].value == "8") {
                        alert("科名を入力してください。");
                    }
                }
            } else {
                alert("入力エラー");
                break;
            }
        }
=======
function Input_Form_1_check() {
    let formElements = document.forms[0];
    let flag = false;
    let arraycheck = Array(7);  /*チェックぼっくボックスのboolen値を格納する配列*/
    let i = 0; /*チェックボックスの添え字*/
    let checkfalg = false;
    
    
    //-3は不要なボタン数    
    for(let cnt=0; cnt < formElements.elements.length-3;cnt++){
        switch(cnt){
            case 0:
            case 1:
            case 2:
            case 5:
            case 6:
                if(formElements.elements[cnt].value != ""){
                    ;
                }else {
                    alert(cnt + "番目入力無し");
                }
                break;

            case 3:     /*書類の有無チェック*/
            case 4:
                if(formElements.elements[cnt].checked){
                    flag = true;   
                }
                if(cnt == 4){
                    if(flag == true){
                        console.log("ok");
                    }else {
                        alert("チェックが入っていません。");
                    }
                }
                break;
            
            default:
                /*どれか一つでもtrueならok*/
                if(formElements.elements[cnt].checked){
                    checkfalg = true;
                }       
        }
    }
    /*チェックボックス欄に一つでもチェックが入っているかの判定*/
    if(checkfalg){
        ;
    }else{
        alert("チェックボックス確認して");
    }
     

}


function parseStrToBoolean(str){
    return (str == true) ? true : false;
}




/*

s2_1.addEventListener('click',function(){
if (this.checked) {
    l1.innerHTML = '<p class="p-info">筆記(専門)<br>内容詳細：</span></p><textarea id="once_starge_exam_detail" class=" Input_Form_2_1_input-view"></textarea>';
} else {
    l1.innerHTML = '';
}},false);

var l2 = document.getElementById('text_info2');
s2_2.addEventListener('click',function(){
    if (this.checked) {
        l2.innerHTML = '筆記(一般常識)内容詳細：<textarea id="once_starge_exam_detail" class=" Input_Form_2_1_input-view test-a"></textarea>';
    } else {
        l2.innerHTML = '';
    }},false);


var l3 = document.getElementById('text_info3');
s2_3.addEventListener('click',function(){
    if (this.checked) {
        l3.innerHTML = '適性検査(専門)内容詳細：<textarea id="once_starge_exam_detail" class=" Input_Form_2_1_input-view"></textarea>';
    } else {
        l3.innerHTML = '';
    }},false);
>>>>>>> 569d9c08549c5f1938dd2ab8807fc67b51b9da4a
    
        if (formElements.elements[1].value == formElements.elements[2].value) {
            ;
        } else {
            alert("パスワードが間違っています。");
            formElements.elements[1].value = null;
            formElements.elements[2].value = null;
        }

}