<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$agentid=$_GET['id'];

//DELETE FROM agent TABLE////////////////

$del="DELETE FROM `agent` WHERE `id`='$agentid'";
$object->query($del);

//****************************************************************************************

//******************************************DELETE FROM sale and sale_phototable************************************************************
$deletesale="DELETE FROM `sale` WHERE `agent_id`='$agentid'";
$object->query($deletesale);

//******************************************DELETE FROM rent and rent_phototable************************************************************
$deletesale="DELETE FROM `rent` WHERE `agent_id`='$agentid'";
$object->query($deletesale);



//GET all Pictures list from sale_photo* AND DELETE FROM FOLDER***********************************************************************
$get="SELECT * FROM `sale_photo` WHERE `agentid`='$agentid'";
$getpics=$object->query($get);
while($me=mysql_fetch_array($getpics)){
	unlink("../properties/{$me['mainpic1']}");
	unlink("../properties/{$me['pic2']}");
	unlink("../properties/{$me['pic3']}");
	}
//*********************************************************************************************************************

//GET all Pictures list from rent_photo* AND DELETE FROM FOLDER***********************************************************************
$gpics="SELECT * FROM `rent_photo` WHERE `agentid`='$agentid'";
$getpics=$object->query($gpics);
while($me=mysql_fetch_array($getpics)){

	unlink("../properties/{$me['mainpic1']}");
	unlink("../properties/{$me['pic2']}");
	unlink("../properties/{$me['pic3']}");
	}
//*********************************************************************************************************************




$deletephoto="DELETE FROM `sale_photo` WHERE `agentid`='$agentid'";
$object->query($deletephoto);
//*********************************************************************************************************************



$deletephoto="DELETE FROM `rent_photo` WHERE `agentid`='$agentid'";
$object->query($deletephoto);
//*********************************************************************************************************************

header("location:agent_to_default.php?status=deleted");

?>
</body>
</html>