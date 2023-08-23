<?php
$servername="localhost";
$username="root";
$password="";
$databasename="emp_data";
$conn=mysqli_connect($servername,$username,$password,$databasename);
if($conn){
   // echo "OK report";
}else{
    echo "Failed";
}
?>
