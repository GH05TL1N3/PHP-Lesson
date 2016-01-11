<?php
$host = "localhost";
$username = "bookmaster";
$password = "123456";

$sql = @mysqli_connect($host, $username, $password);

if($sql == TRUE){
    echo "Connect Database Complete!! <br>";
}
else{
    echo "Connect Database Failed!! <br>";
    exit();
}

$resultselect = @mysqli_select_db($sql, "bookstore");

if($resultselect == TRUE){
    echo "Select Database Complete!! <br>";
}
else{
    echo "Select Database Failed!! <br>";
   }
$resultquery = @mysqli_query($sql, "SELECT * FROM customers;");
if($resultquery == TRUE){
    echo "Query Database Complete!! <br>";
}
else{
    echo "Query Database Failed!! <br>";
   }

echo "<table border=\"1\">";
echo "<tr>";
echo "<th>CustomerID</th><th>CustomerName</th><th>Address</th><th>Phone</th>";
echo "</tr>";

while($row = mysqli_fetch_array($resultquery)){
echo "<tr>";
    echo "<td>{$row["CustomerID"]}</td>";
    echo "<td>{$row["CustomerName"]}</td>";
    echo "<td>{$row["Address"]}</td>";;
    echo "<td>{$row["Phone"]}</td>";
echo "</tr>";
}

echo "</table>";
echo "<br><br>";





$connection_close = @mysqli_close($sql);

if($connection_close){
echo "Closed DB";
}
else{
echo "unClosed DB";
}

?>












