<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Aray</title>
    </head>
    <body>
        <?php
        
        //numberic key..
        
        $khongchuai = array("Utai", "Tatsanee", "Uraiwan", "Anuwat", "Rattapong");
        echo $khongchuai[0]."<br>";
        echo $khongchuai[1]."<br>";
        echo $khongchuai[2]."<br>";
        echo $khongchuai[3]."<br>";
        echo $khongchuai[4]."<br>";
        
        $myprogrammingskill[0] = "C";
        $myprogrammingskill[1] = "C++";
        $myprogrammingskill[2] = "HTML/CSS";
        $myprogrammingskill[3] = "PHP/MySQL";
        $myprogrammingskill[4] = "Python/Perl";
        
        echo $myprogrammingskill[0]."<br>";
        echo $myprogrammingskill[1]."<br>";
        echo $myprogrammingskill[2]."<br>";
        echo $myprogrammingskill[3]."<br>";
        echo $myprogrammingskill[4]."<br>";
        
        
        
        //accocery key
        
        $weekend = array(
            "sun" => "วันอาทิตย์",
            "mon" => "วันจันทร์",
            "tue" => "วันอังคาร",
            "wed" => "วันพุธ",
            "thu" => "วันพฤหัส",
            "fri" => "วันศุกร์"
        );
        
       echo $weekend["sun"]."<br>";
       echo $weekend["mon"]."<br>";
       echo $weekend["tue"]."<br>";
       echo $weekend["wed"]."<br>";
       echo $weekend["thu"]."<br>";
       echo $weekend["fri"]."<br>";
       
       
       
    $animals["dog"] = "หมา";
    $animals["cat"] = "แมว";
    $animals["snake"] = "งู";
    $animals["cock"] = "ไก่";
    $animals["frog"] = "กบ";
    $animals["bear"] = "หมี";
    
       echo $animals["dog"]."<br>";
       echo $animals["cat"]."<br>";
       echo $animals["snake"]."<br>";
       echo $animals["cock"]."<br>";
       echo $animals["frog"]."<br>";
       echo $animals["bear"]."<br>";
       
       
//for array
       for($i = 0; $i <= 4; $i++){
           
           echo $khongchuai[$i]."<br>";
           
           
       }
//foreach 
       foreach($weekend as $key => $value){
           echo "Hello ".$key."<br>";
           
           
       }
       
       foreach($weekend as $key => $value){
           echo "Hello ".$value."<br>";
           
           
       }
       
    foreach($khongchuai as $value){
        
        echo "Welcome ".$value." to this page <br>";
        
        
    }
       
        ?>
    </body>
</html>


