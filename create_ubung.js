var selectet_words=[];
var papa = document.getElementById("papa");
var field = document.getElementById("field").value;
var exercise_no= document.getElementById("ex_no").value;
var total_sum = document.getElementById("total_sum").value;

var gotostep2 = document.getElementById("gotostep2");
gotostep2.addEventListener("click", gotostep2_func);

function gotostep2_func(){
    var my_text=document.getElementById("papa_text").value;
    document.getElementById("papa").innerText=my_text;
    document.getElementById("step2").style.visibility="visible";
    document.getElementById("step1").style.display="none";
}

var remove_selection = document.getElementById("remove_selection");
remove_selection.addEventListener("click", remove_selection_func);

function remove_selection_func(){
    var my_selection = document.getSelection();
    var sel_length = my_selection.focusOffset-my_selection.anchorOffset;
    if (sel_length==0)
        return;
    sel_length+=1;
    var replacement = document.createElement("input");
    replacement.style.width = sel_length+"ch";
    
    selectet_words.push(my_selection.toString().trim());
    replacement.setAttribute("id",selectet_words.length-1);
      
    my_selection.deleteFromDocument();
    var wholeText=my_selection.anchorNode;
    var secondPart= wholeText.splitText(my_selection.anchorOffset);
    papa.insertBefore(replacement,secondPart);
    document.getElementById("number_of_gaps").innerText = selectet_words.length;
    document.getElementById("words").innerText = selectet_words;
}
    
var gotostep3 = document.getElementById("gotostep3");
gotostep3.addEventListener("click", gotostep3_func);

function gotostep3_func(){
    var include_answers = document.getElementById("include_answer").checked;
     
    if (include_answers){
        var selected_words2=selectet_words;
        document.getElementById("selected_words2").innerHTML=selected_words2;
        document.getElementById("selected_words2").style.backgroundColor="antiquewhite";
    } 
    document.getElementById("step2").style.display='none';
    document.getElementById("papa2").innerHTML = document.getElementById("papa").innerHTML;
    document.getElementById("step3").style.visibility='visible';
}

var view_results= document.getElementById("view_results");
view_results.addEventListener("click", view_results_func);

function view_results_func(){
    var papa2 = document.getElementById("papa2");
    var answers = papa2.getElementsByTagName("input");
    var total_sum_p = 0;
    var points_pro_anwer =total_sum/answers.length;
    
    for (var i = 0; i<answers.length; i++){
        if (answers[i].value.trim()==selectet_words[answers[i].id]){
            answers[i].style.backgroundColor="lightgreen";
            total_sum_p+=points_pro_anwer;
            answers[i].setAttribute("disabled"," ");
        }   
        else answers[i].style.backgroundColor="khaki";
    } 
    document.getElementById ("score").innerHTML=total_sum_p.toFixed(2);
}    

var show_right_answers= document.getElementById("show_right_answers");
show_right_answers.addEventListener("click", show_right_answers_func);

function show_right_answers_func(){
    var papa2 = document.getElementById("papa2");
    var answers = papa2.getElementsByTagName("input");
   
    for (var i = 0; i<answers.length; i++){
        if (answers[i].style.backgroundColor!="lightgreen"){
            answers[i].style.backgroundColor="lightblue";
            answers[i].value=selectet_words[answers[i].id];
            view_results.setAttribute("disabled"," ");
       }
    }
}

var send_to_server = document.getElementById("send_to_server");
send_to_server.addEventListener("click", send_to_server_func);

function send_to_server_func(){
    var xhttp = new XMLHttpRequest();
    //xhttp.responseType=document;
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
        // var ne_el =  this.response;
        // ne_el =ne_el;
        // var range = document.createRange();
        // var frag = range.createContextualFragment(ne_el);
        // document.getElementById("step3").appendChild(frag);
        }
    };
    xhttp.open("POST", "create_ubung.php");
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //xhttp.send("data1= "+document.getElementById('papa2').outerHTML);
    //xhttp.send("data2= "+selectet_words.toString());
    xhttp.send("data2= "+selectet_words.toString()+'& data1='+document.getElementById('papa2').outerHTML);
}



function postData() {
    fetch("./create_ubung.php", {
        method: "POST",
        body: document.getElementById('papa2').outerHTML
      }).then(response => {var ne_el =  response;
        ne_el ="<p "+ne_el;
        var range = document.createRange();
        var frag = range.createContextualFragment(ne_el);
        document.getElementById("step3").appendChild(frag);})}


 

