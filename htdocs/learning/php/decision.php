<html>
<head>
<title>Decision PHP</title>
</head>
<body>

<?php 
//if
$day = date("D");
/*
if($day == "Thu"){
	echo "Today is Thuseday.";
	}
	
*/
//if .. else
/*
if($day == "Mon"){
	echo "Today is Thuseday.";
	}
else{
	echo "Have a nice day.";
	
	}
*/

//elseif
/*
if($day == "S"){
	echo "Today is Sunday.";
	}
elseif($day == "M"){
	echo "Today is Monday.";
	}
elseif($day == "W"){
	echo "Today is Wednesday.";
	}
else {
	echo "Noday.";
	}
*/	

//switch..case

switch ($day)
{
case "Mon":
  echo "Today is Monday";
  		break;
case "Tue":
  echo "Today is Tuesday";
  		break;
case "Wed":
  echo "Today is Wednesday";
  		break;
case "Thu":
  echo "Today is Thursday";
  		break;
case "Fri":
  echo "Today is Friday";
  		break;
case "Sat":
  echo "Today is Saturday";
  		break;
case "Sun":
  echo "Today is Sunday";
  		break;
default:
  echo "Wonder which day is this ?";
}



?>


<body>

</html>