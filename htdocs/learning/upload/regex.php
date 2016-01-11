<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Regular Expression</title>
    </head>
    <body>
        <?php
        $pattern = "p.p";
        $str = "I like pop music";
        
        if(ereg($pattern, $str)){
            echo "Found pattern..";
        }
        else{
            echo "Not Found pattern..";
            
        }
        echo "<br>";
       
        $pattern = "PHP";
        $str = "I like PHP Programing";
        
        if(ereg($pattern, $str)){
            echo "Found pattern..";
        }
        else{
            echo "Not Found pattern..";
            
        }
        
        function regex_match($pattern, $str){
            if(ereg($pattern, $str)){
            echo "Found pattern..";
            }
            else{
            echo "Not Found pattern..";
            }
        }
        
        $p = "[0-9]";
        
        $str1 = "Anuwat";
        
        regex_match($p, $str1);
        echo "<br>";
                
     $attack = mktime(0,0,0,9,11,2001);
     $now = time();
     echo $attack;
     echo "<br>";
     echo $now;
     echo "<br>";
     echo date("l j F Y H:i:s T", $now);
     echo "<br>";
     echo strftime("%B");
     
  
        
        
        
        
        ?>
    </body>
</html>
