<?php 

 $json = file_get_contents('data.json');
 $obj = json_decode($json,true);

 //Database Connection
$con=mysqli_connect("localhost","root",NULL,"chandra");

 /* insert data into DB */
    foreach($obj as $item) {
      $q="insert into json_tbl (name, phone, city, email) values
                            ('".$item['name']."', '".$item['phone']."', '".$item['city']."', '".$item['email']."') ";

     $result=mysqli_query($con,$q);

     }
    // echo $result;
  
   ?>