<?php
$id=$_GET['uid'];
$first_name=$_GET['first_name'];

$last_name=$_GET['last_name'];
$photo=$_GET['photo'];
$smallPhoto=$_GET['photo_rec'];
$login=$first_name.' '.$last_name;
$fb_name='';
// TODO: Add check for already in db
//print_r($result[0]+' '+);

 $conn = mysql_connect("u389193.mysql.masterhost.ru", "u389193", "me24..NCIng") or die(mysqli_error("error connecting to database"));
 mysql_query("SET NAMES 'utf8'");
 mysql_query("SET CHARACTER SET 'utf8'");

 	if (!$conn) {
 		die('Connection fail: ' . mysql_error());
 	}
  mysql_select_db('u389193') or die(mysql_error ());
  $res= mysql_query("SELECT id from acc where vk_name='$login'");
  	if (!$res) {
  		$message  = 'Wrong sql: ' . mysql_error() . "\n";
  		$message .= 'sql: ' . $res;
  		die($message);
  	}
  	if ($idBd=mysql_result($res,0)==0)
    	{
    		 $sql = "INSERT INTO acc (vk_name, vk_uid, vk_photo, vk_smallPhoto, fb_name) VALUES ('$login', '$id', '$photo', '$smallPhoto', '$fb_name')";
              $retVal = mysql_query( $sql, $conn);
              if(! $retVal )
              {
                die('Could not enter data: ' . mysql_error());
              }
             printf(mysql_insert_id());
             $cookie = 1;

    	}
    	else
    	{
    		$cookie = 0;
    	}

 mysql_close($conn);
$str='&cookie='.$cookie;
   header("Status: 301 Moved Permanently");
   header("Location:../index.html?". $_SERVER['QUERY_STRING'].$str);
   exit;

?>