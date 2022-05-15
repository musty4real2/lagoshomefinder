<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();


$delete="DELETE FROM `{$_GET['table']}` WHERE `id`='{$_GET['propid']}' AND 	`agent_id`='{$_GET['agentid']}'";
$exe=$object->query($delete);


//GET PHOTOS to DELETE

$get="SELECT * FROM `{$_GET['phototab']}` WHERE `entry_id`='{$_GET['propid']}' AND 	`agentid`='{$_GET['agentid']}'";
$g=$object->query($get);

while($row=mysql_fetch_array($g)){
	unlink("../properties/{$row['mainpic1']}");
	unlink("../properties/{$row['pic2']}");
	unlink("../properties/{$row['pic3']}");
	}

$deletephoto="DELETE FROM `{$_GET['phototab']}` WHERE `id`='{$_GET['propid']}' AND 	`agentid`='{$_GET['agentid']}'";
$exephoto=$object->query($deletephoto);

header("location:{$_GET['page']}?id={$_GET['id']}&agent={$_GET['agent']}&agentid={$_GET['agentid']}");

?>