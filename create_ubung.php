<?php
  //  $doc = new DOMDocument();
  //  //$doc->
  //  $document=$_POST;
   //$array1 = $_POST['data1'];
   //$array = array_values($array);
   $words = $_POST['data2'];
   $ex_text= $_POST['data1'];
   $dbconn = pg_connect("host=localhost port=5432 dbname=exercise user=theodor1") or die('Could not connect: ' . pg_last_error());
   $query = 'INSERT INTO exercices (ex_body, ex_words) VALUES ($1, $2)';
   $result = pg_query_params($query, array($ex_text, $words));
   pg_free_result($result);
   pg_close($dbconn);


   //echo $array[0];
   
   //  $doc2=$doc;
  //  $doc2->validateOnParse = true;
  //  //echo gettype($document);
  //  //echo "<br>";
  //  
      
  //  $doc->loadHTML($array[0]);
  //  $doc2->load($array[0]);
  //  echo $doc->saveHTML();
  //  echo $doc2->getElementById('papa')->cloneNode(TRUE);
  
   //$doc->loadHTML($array[0]);
   
   
   
   //var_dump($doc->getElementById('papa'));

  //print($doc->getElementById('papa'));
?>

