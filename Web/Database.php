<?php

 $connect = mysqli_connect("localhost", "root", "", "growbet");

 if(!$connect)
 {
     die("connect attempt has been failed:".mysql_connect_error());
 }
 else
 {
     echo "Connection succefsul";
 }

 ?>
