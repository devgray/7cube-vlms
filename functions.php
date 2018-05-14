<script src='script.js'></script>
<?php
session_start();

$db=mysqli_connect("localhost","root","","db_vlms");



function checkLogin($user,$pw){
	global $db;
	$query="SELECT checkLogin('$user','$pw') as result";
	$result=mysqli_fetch_assoc(mysqli_query($db,$query));
	if($result['result']){
		getLoginInfo($user);
		return true;
	}else
		return false;
}
function deleteCookies(){
	$str="";
	$substr="";
	foreach ( $_COOKIE as $key => $value )
{
	//for($i=0; $i < count($_COOKIE); $i++){
	$str=$str.$key."=".$value.";";
}

	$cookies=explode(";", $str);
	for ($i=0; $i < count($cookies)-3; $i++) { 
		$substr=$substr.$cookies[$i]."</br>";
		$parts=explode("=", $substr);
		setcookie($parts[0],'',1);	
	}
}
function registerUser(){
	global $db;
	$query=$_COOKIE['newUser'];
	if(mysqli_query($db,$query)){
		header("location: login.php");
	}else{
		echo "FAILED ADDING NEW USER";
		deleteCookies();
	}
	
}/*
function getUserInfo($username){
	global $db;
	$query="SELECT *FROM userinfo where username=$username";


}*/
function upload($title,$info,$category,$tags){
global $db;
	$tagarray=explode(",", $tags);
	/*for ($i=0; $i < count($tagarray) ; $i++) { 
		if(mysqli_query($db));
	}*/

	$fileExt = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    if($fileExt=='mp4'){

        $code=uniqid("",false);
        while(file_exists("videos/".$code.".mp4")){
            $code=uniqid("",false);
        }

      move_uploaded_file($_FILES['file']['tmp_name'],"videos/".$_SESSION['logid']."-".$code.".mp4");

      $filename="videos/".$_SESSION['logid']."-".$code.".mp4";
      $userid=$_SESSION['logid'];

      $query="CALL upload('$code','$title','$filename','$info','$tags',$userid,$category)";
      if(mysqli_query($db,$query)){
        echo "Uploaded Successfully!";
      }else echo $query;

      
      //header("Refresh:1; URL=");

      $_SESSION['video']="video/".$_FILES['file']['name'];
    }
    header('Location: index?v='.$code);
}
function getInfo($id,$prefix,$table){
    global $db;
    $query = "SHOW COLUMNS FROM $table";

    $result= mysqli_query($db,$query);
    $data= mysqli_query($db,"SELECT *FROM $table where id=$id");
    while($row = mysqli_fetch_array($result)){
        foreach ($data as $rowdata) {
        $colname=$row['Field'];
        $_SESSION[$prefix.$colname]="".$rowdata[$colname];
        }
    }
}
function getVideoInfo($code){
global $db;
    $query = "SHOW COLUMNS FROM videoinfo";

    $result= mysqli_query($db,$query);
    $data= mysqli_query($db,"SELECT *FROM videoinfo where code='$code'");
    while($row = mysqli_fetch_array($result)){
        foreach ($data as $rowdata) {
        $colname=$row['Field'];
        $_SESSION["vid".$colname]="".$rowdata[$colname];
        }
    }
    mysqli_query($db,"UPDATE tbl_video set views=views+1 where code='$code'");
}
function loadDropdown($table,$header,$hide){
    global $db;
    $query="SELECT * from $table";

    $result= mysqli_query($db,$query);
        foreach ($result as $row) {
            $id=$row['id'];
            $x = $row[$header];
            if($hide!=$id){
            	echo  "<option value='$id'>$x</option>" ;
            }
            
        }
}

function getLoginInfo($username){
    global $db;
    $query = "SHOW COLUMNS FROM userinfo";

    $result= mysqli_query($db,$query);
    $data= mysqli_query($db,"SELECT *FROM userinfo where username='$username'");
    while($row = mysqli_fetch_array($result)){
        foreach ($data as $rowdata) {
            if($rowdata['usertype']=="Moderator"){
                $_SESSION['modid']=true;
            }
        $colname=$row['Field'];
        $_SESSION["log".$colname]="".$rowdata[$colname];
        }
    }
    
}
function getUserInfo($username){
    global $db;
    $query = "SHOW COLUMNS FROM userinfo";

    $result= mysqli_query($db,$query);
    $data= mysqli_query($db,"SELECT *FROM userinfo where username='$username'");
    while($row = mysqli_fetch_array($result)){
        foreach ($data as $rowdata) {
        $colname=$row['Field'];
        $_SESSION[$colname]="".$rowdata[$colname];
        }
    }
    
}
function getValue($id,$table,$idname,$data){
    global $db;
    $query = "SELECT *FROM $table where `$idname`=$id";
    if(mysqli_query($db,$query)){
    	$result=mysqli_query($db,$query);
    	while($row = mysqli_fetch_array($result)){
        return $row[$data];
    	}
    }else return "";
    
}
  function loadvideos(){
     global $db;
    $query="SELECT *FROM videoinfo";
    $result= mysqli_query($db,$query);
        echo "<table class='table table-borderless' style='font-size:14px;'>";
        foreach ($result as $row) {
            $link="?v=".$row['code'];
            $filepath=$row['filepath'];
            $title=$row['title'];
            $u=$row['username'];
            echo "<tr'><td>";
            echo "<a href='$link' class='thumb'><video width='100%' >";
            echo "<source src='$filepath' type='video/mp4' ></video>";
            echo "<div class='thumb-title' style='padding:5px 0 5px 0';><b>$title</b><br>by $u</div></a>";
            echo "</td></tr>";
            
        }
        echo "</table>";
    
  }
  function browsevideos(){
     global $db;
    $query='SELECT DISTINCT category from videoinfo';
    $result= mysqli_query($db,$query);
    foreach ($result as $row) {
        $cat=$row['category'];
        echo "<h5 class='category-header'>$cat</h5><div class='row'>";
        $subresult=mysqli_query($db,"SELECT *from videoinfo where category='$cat'");
        foreach ($subresult as $subrow) {
            $link="index?v=".$subrow['code'];
            $filepath=$subrow['filepath'];
            $title=$subrow['title'];
            $info=$subrow['info'];
            $info=substr($info, 0, 80);
            $code=$subrow['code'];
            $views=$subrow['views'];
            echo "<div class='col-lg-6 col-sm-6'><div class='row category-panel'><div class='col-lg-6 col-sm-12'><a href='$link' class='thumb'><video width='100%' >";
            echo "<source src='$filepath' type='video/mp4' ></video></a></div><div class='col-lg-6 col-sm-12'>";
            echo "<div class='thumb-title browse'>$title</div><br>$info <br>$views views";
            echo "</div></div></div>";
        }
        echo "</div>";
    }
    
  }

function getRandomVideo(){
    global $db;
    $query="SELECT code from videoinfo order by rand() limit 1";
    $result=mysqli_fetch_assoc(mysqli_query($db,$query));
    $c=$result['code'];
    return "index?v=".$c;
}
function manageVideos($user){
    global $db;
    $query="SELECT *FROM videoinfo where username='$user'";
    $result= mysqli_query($db,$query);
        echo "<table class='table table-borderless' style='font-size:14px;'>";
        foreach ($result as $row) {
            $link="index?v=".$row['code'];
            $filepath=$row['filepath'];
            $title=$row['title'];
            $info=$row['info'];
            $info=substr($info, 0, 80);
            $code=$row['code'];
            $views=$row['views'];
            $u=$row['username'];
            echo "<tr><td width='20%'>";
            echo "<a href='user?u=$u&v=$code' value='$filepath' onclick='playToSide(this.value)'><video width='100%'>";
            echo "<source src='$filepath' type='video/mp4' ></video></a></td>";
            echo "<td style='padding:3px 5px; 0px 5px;'><b>$title</b><br>$info<br><p style='font-size:12px;'>$views views</p>";
            echo "<td width='10%'><button type='button' value='$filepath' onclick='delvideo(this.value)' class='btn btn-secondary' data-toggle='modal' data-target='#deleteVideoModal'>Delete</button></td></tr>";
            
        }
        echo "</table>";
}
function getFilePath($code){
    global $db;
    $result=mysqli_fetch_assoc(mysqli_query($db,"SELECT filepath from videoinfo where code='$code'"));
    return $result['filepath'];
}
function getVideoTitle($code){
    global $db;
    $result=mysqli_fetch_assoc(mysqli_query($db,"SELECT title from videoinfo where code='$code'"));
    return $result['title'];
}
function deleteVideo($path){
    global $db;
    setcookie('delvideo','',1);  
    unlink($path);
    mysqli_query($db,"CALL deleteVideo('$path')");
}

function loadGallery(){
	for($x=10 ; $x > 0 ; $x--){
		echo "<div class='thumb'> </div>";
	}
} 
?>