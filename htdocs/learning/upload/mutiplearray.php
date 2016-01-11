<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Multiple Array</title>
    </head>
    <body>
        <?php
        $myfamily = array(
            "father" => array("name" => "Utai", "age" => 50), 
            "mother" => array("name" => "Tatsanee", "age" => 45)
        ); 
        
        $fathername = $myfamily["father"]["name"];
        $fathergae = $myfamily["father"]["age"];
        $mothername = $myfamily["mother"]["name"];
        $motherage = $myfamily["mother"]["age"];
        
        
        echo "My father name is $fathername and he $fathergae year olds. <br> ";
        echo "My mother name is $mothername and she $motherage year olds. <br> ";    
                
//hererrererererereredoc
$readme = <<<READ
I love u so much XD <br>
I love u so much XD <br>
I love u so much XD <br>
I love u so much XD <br>
I love u so much XD <br>
I love u so much XD <br>
I love u so much XD <br>
READ;


echo $readme;







                
        ?>
    </body>
</html>
