<?php
    $doc = new DOMDocument();
    $doc->loadHTMLFile("./my_html2.html");
    $my_node = $doc->getElementById("totake");
    
    //echo "<br>";
    // $other = $doc->getElementsByTagName('p')[0];
    // $new_element = $doc->createElement("p","new paragraph");
    // //$new_element->saveHTML();
    // $doc->appendChild($new_element);
    // $doc->appendChild($other);
    
    $doc2 = new DOMDocument("1.0", "utf8");
    //var_dump($doc2);

    echo "<br>";
    echo "<br>";
    echo "<br>";
    //$doc2->appendChild($my_node);
    //$doc2->save();
    $new_element = $doc2->createElement("p","new paragraph");
    var_dump($my_node);
    
    echo "<br>";
    echo "<br>";
    echo "<br>";

    var_dump($new_element);
    
    $doc2->appendChild($new_element);
    echo $doc2->saveHTML();
    
    $doc2->appendChild($my_node->saveXML());
    echo $doc2->saveHTML();

    
    // $html = $doc2.createElement("html");
    // $head = $doc2.createElement("head");
    // $html->appendChild($head);
    // $body = $doc2.createElement("body");
    // $html->appendChild($body);
    // 
    // //$body = $doc2->getElementsByTagName("body")[0];
    // $par1 = $doc2.createElement("p", "Hello WOrld");
    // $body->appendChild($par1);
    //$doc2->appendChild($my_node);

    
?>