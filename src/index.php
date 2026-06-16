<?php 

echo "Hello world desde Docker";
echo "L";
$con = new mysqli('mysql_db','root','root','mysql');

if($con){

    echo "Connected";
}
?>