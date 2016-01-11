<html>
<head>
<title>Array PHP</title>
</head>
<body>

<?php

/*
//default array


$numbers = array( 1, 2, 3, 4, 5);
foreach( $numbers as $value )
{
  echo "Value is $value <br />";
}

$numbers[0] = "one";
$numbers[1] = "two";
$numbers[2] = "three";
$numbers[3] = "four";
$numbers[4] = "five";

foreach( $numbers as $value )
{
  echo "Value is $value <br />";
}
*/

//Associative Arrays

$highter = array("Anuwat" => 150, 
				 "Pornpimon" => 175,
				 "Akkaradet" => 165,
				 "Detnarupong" => 160	
					);

echo "Anuwat is ".$highter['Anuwat']." CM."."<br>";
echo "Pornpimon is ".$highter['Pornpimon']." CM."."<br>";
echo "Akkaradet is ".$highter['Akkaradet']." CM."."<br>";
echo "Detnarupong is ".$highter['Detnarupong']." CM."."<br>";


 $marks = array( 
		"mohammad" => array
		(
		"physics" => 35,	    
		"maths" => 30,	    
		"chemistry" => 39	    
		),
					"qadir" => array
               		(
                	"physics" => 30,
                	"maths" => 32,
               	 	"chemistry" => 29
                	),
                			"zara" => array
                			(
                			"physics" => 31,
                			"maths" => 22,
              			  	"chemistry" => 39
                			)
	     );
		 
	/* Accessing multi-dimensional array values */
   echo "Marks for mohammad in physics : " ;
   echo $marks['mohammad']['physics'] . "<br />"; 
   echo "Marks for qadir in maths : ";
   echo $marks['qadir']['maths'] . "<br />"; 
   echo "Marks for zara in chemistry : " ;
   echo $marks['zara']['chemistry'] . "<br />"; 


?>

<body>

</html>