<script src='script.js'></script>
<?php
session_start();
// $db=mysqli_connect("sv59.ifastnet8.org","cubeinfo_admin","dbadmin101","cubeinfo_db");
// if(mysqli_query($db,"SET SESSION SQL_BIG_SELECTS=1")){
//     }else ECHO "FAILED";
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
function getSubCount($user){
    global $db;
    $query="SELECT COUNT(user_id) as c from tbl_subscribers where user_id=$user";
    $result=mysqli_fetch_assoc(mysqli_query($db,$query));
    return $result['c'];
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
		header("location: login");
	}else{
		echo $query;
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
        $_SESSION['video']="video/".$_FILES['file']['name'];
      }else echo $query;

      
      //header("Refresh:1; URL=");

      
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
function getRepVideoInfo($code){
global $db;
    $query = "SHOW COLUMNS FROM videoinfo";

    $result= mysqli_query($db,$query);
    $data= mysqli_query($db,"SELECT *FROM videoinfo where code='$code'");
    while($row = mysqli_fetch_array($result)){
        foreach ($data as $rowdata) {
        $colname=$row['Field'];
        $_SESSION["rep".$colname]="".$rowdata[$colname];
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
function loadSelectedDropdown($table,$header,$selected){
    global $db;
    $query="SELECT * from $table";

    $result= mysqli_query($db,$query);
        foreach ($result as $row) {
            $id=$row['id'];
            $x = $row[$header];
            if($x!=""){
                if($x==$selected){
                    echo  "<option value='$id' selected>$x</option>" ;
                }else
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
    $query="SELECT *FROM videoinfo order by rand()";
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
  function browsevideos($key){
     global $db;
    $query="SELECT DISTINCT category from videoinfo order by rand()";
    $result= mysqli_query($db,$query);
    foreach ($result as $row) {
        $cat=$row['category'];
        echo "<h5 class='category-header'>$cat</h5><div class='row'>";
        $subresult=mysqli_query($db,"SELECT *from videoinfo where category='$cat' and title like '%$key%' ");
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
  function search($key){
    global $db;
        $subresult=mysqli_query($db,"SELECT *from videoinfo where title like '%$key%' OR tags like '%$key%' OR category like '%$key%' OR username like '%$key%' ");
        echo "<h5 class='category-header'>Search result for $key</h5><div class='row'>";
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
            echo "<td width='10%'>";
                if($_SESSION['logusername']==$user){
                    echo "<button type='button' value='$filepath' onclick='delvideo(this.value)' class='btn btn-secondary' data-toggle='modal' data-target='#deleteVideoModal'>Delete</button>";
                }

            echo "</td></tr>";
            
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
function loadReportedVideos(){

    global $db;
    $query="SELECT *FROM reportedvideos";
    $result= mysqli_query($db,$query);
        echo "<table class='table table-borderless' style='font-size:14px;'>";
        foreach ($result as $row) {
            $code=$row['code'];
            $link="index?v=".$row['code'];
            $header=$row['header'];
            $info=$row['description'];
            echo '<tr><td><b><a href="mod?v='.$code.'" onclick="modplayToSide(this.value)" style="font-size:16px;">'.$header.'</a></b><br>';
            echo "<div style='padding-top:5px;text-align:justify;'>$info</div><br>";
            echo '<td width="5%"></td></tr>';
        }
        echo "</table>";
}
function subscribe($userid,$subid){
    global $db;
    $query="CALL sub($userid,$subid)";
    mysqli_query($db,$query);

}
function unsubscribe($userid,$subid){
    global $db;
    $query="CALL unsub($userid,$subid)";
    mysqli_query($db,$query);

}
function checkSub($userid,$subid){
    global $db;
    $query="SELECT checkSub($userid,$subid) as res";
    $result=mysqli_fetch_assoc(mysqli_query($db,$query));
    return $result['res'];
}
function loadSubUsers($subuser){
    global $db;
    $query="SELECT *from subusers where subid='$subuser'";
    $result= mysqli_query($db,$query);
        echo "<table class='table table-borderless' style='font-size:14px;'>";
        foreach ($result as $row) {
            $user=$row['username'];
            $link="user?u=".$user;
            $type=$row['usertype'];
            echo "<tr><td><a href='".$link."'>".$user."</a><span class='subtext'> - ".$type."</span></td></tr>";
        }
        echo "</table>";
}
function addfav($videoid,$userid){
    global $db;
    $query="CALL addfav($videoid,$userid)";
    mysqli_query($db,$query);

}
function unfav($videoid,$userid){
    global $db;
    $query="CALL unfav($videoid,$userid)";
    mysqli_query($db,$query);

}

function checkFav($videoid,$userid){
    global $db;
    $query="SELECT checkFav($videoid,$userid) as res";
    $result=mysqli_fetch_assoc(mysqli_query($db,$query));
    return $result['res'];
}
function loadFavList($u){
    global $db;
    $query="SELECT *from fav where user_id='$u'";
    $result= mysqli_query($db,$query);
        echo "<table class='table table-borderless' style='font-size:14px;'>";
        foreach ($result as $row) {
            $filepath=$row['filepath'];
            $title=$row['title'];
            $code=$row['code'];
            echo "<tr>";
            /*echo "<td>";
            echo "<video width='100%'>";
            echo "<source src='$filepath' type='video/mp4' ></video></a>";
            echo "</td>";*/
            echo "<td style='font-size:13px;'><a href='user?u=$u&v=$code' value='$filepath' onclick='playToSide(this.value)'>
            <i class='fa fa-play-circle-o' aria-hidden='true'></i> $title</a></td>";
        }
        echo "</table>";
}
function loadGallery(){
	for($x=10 ; $x > 0 ; $x--){
		echo "<div class='thumb'> </div>";
	}
} 
function closeReport($code){
    global $db;
    $query="CALL closeReport('$code')";
    if(mysqli_query($db,$query)){
        header("location: mod");
    }
    
}
?>