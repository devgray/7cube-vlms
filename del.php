<?php
$db=mysqli_connect("localhost","root","","db_vlms");
$code=$_GET['c'];
    mysqli_query($db,"CALL deleteVideo('$code')");
    header("location: user?u=".$_SESSION['logusername']);
   ?>