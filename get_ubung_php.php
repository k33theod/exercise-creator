<html>
    <head>
        <meta charset="utf8">
    </head>
    <body> 
        
        <h3>Use VIEW RESULTS button when ready to see your result</h3>
        <h3>Use the SHOW RIGHT ANSWERS button to get the solutions</h3>
        
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=exercise user=theodor1") or die('Could not connect: ' . pg_last_error());
            $query = 'SELECT ex_body, ex_words FROM exercices WHERE exercise_id = 3';
            $result = pg_query($query);
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
            pg_free_result($result);
            pg_close($dbconn);
            echo $line['ex_body'];
        ?>

        <input class="step3"  name='button'  value='VIEW RESULTS' id='view_results'   type='button'>
        <input class="step3" value='SHOW RIGHT ANSWERS' id='show_right_answers'   type='button'>
        <!-- End of 2nd page -->

<script>
        var selectet_words =  '<?php echo $line['ex_words']; ?>'.trim().split(',');
        var view_results= document.getElementById("view_results");
        view_results.addEventListener("click", view_results_func);

        function view_results_func(){
            var papa2 = document.getElementById("papa2");
            var answers = papa2.getElementsByTagName("input");
            
            for (var i = 0; i<answers.length; i++){
                if (answers[i].value.trim()==selectet_words[answers[i].id]){
                    answers[i].style.backgroundColor="lightgreen";
                    answers[i].setAttribute("disabled"," ");
                }   
                else answers[i].style.backgroundColor="khaki";
            } 
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
    </script>
    </body>
    </html> 