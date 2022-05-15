<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();
$id=$_GET['id'];
$table=$_GET['table'];
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Admin .:: Add new Property</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

 <!--// documentation resources //-->
	<script src='../js/jquery.js' type="text/javascript"></script>
	<script src='../js/documentation.js' type="text/javascript"></script>
 <link href='documentation.css' type="text/css" rel="stylesheet"/>
 <!--// code-highlighting //-->
	<script type="text/javaScript" src="/jquery/project/chili/jquery.chili-2.0.js"></script> 
	<!--///jquery/project/chili-toolbar/jquery.chili-toolbar.pack.js//-->
 <script type="text/javascript">try{ChiliBook.recipeFolder="/jquery/project/chili/"}catch(e){}</script>
 <!--// plugin-specific resources //-->
 <script src='../js/jquery.form.js' type="text/javascript" language="javascript"></script>
	<script src='../js/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
 <script src='../js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>
 <script src='../js/jquery.blockUI.js' type="text/javascript" language="javascript"></script>
</head>
	<body id="top" oncload="TINY.box.show({html:'Property Info entered succesfully. Upload Picture',animate:false,close:false,mask:true,boxid:'success',autohide:2,top:-14,left:-17})">
<div class="wrapper col0">
  <div id="topbar">
  <p>lagoshomefinder.com</p>
    <ul>
    </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo" >
    <img src="../images/logo.gif" style="float:left;" width="116" height="71" />
      <h1 style="margin-top:22px;"><a href="#">LagosHomeFinder</a></h1>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
  <marquee>
  Advertise with LagosHomeFinder!
  </marquee>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">

<h1>Step Five ::.::</h1>


    <img src="../images/addfoto.JPG" width="102" height="93" /><h1 style="margin:-50px 0 40px 152px;">Upload Property Picture    </h1>

<?php
if(isset($_GET['status'])){
	echo "<h2 style='color:#F00;'>Error Occured while trying to Upload Picture:</h2><br/><p>{$_GET['status']}. PLease try again</p>";
	}

?>


<img src="../images/alert.JPG" width="63" height="59" /><b style="position:relative; top:-20px;">NOTE! Upload the Main pcture first</b><br/>



<?php
$select="SELECT `mainpic1` FROM `rent_photo` WHERE `entry_id`='{$_GET['id']}'";
$select=$object->query($select);
while($row=mysql_fetch_array($select)){
	$pic1=$row['mainpic1'];
}

if(empty($pic1)){?>
<form id="search" action="upload.php" method="post" enctype="multipart/form-data">
    <table cellspacing="5" width="100%"  >
     <tr>
      <td valign="top">
<h3>Main Picture</h3>
      </td>
      <td valign="top" width="10">&raquo;</td>
      <td valign="top" width="300">
       <input type="file" class="multi" maxlength="1" name="photoimg1"/>
       <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" />
              <input type="hidden" value="<?php echo $_GET['table'];?>" name="table" />

       <input type="submit" name="upload" value="UPLOAD MAIN PICTURE"/>
      </td>
     </tr>
    </table>
</form>
<?php }
elseif(!empty($pic1)){
echo "Main Picture uploaded!";
$main=getimagesize("../properties/$pic1");
?>
<img src="../images/mark.JPG" width="59" height="48" /><img class="images"  src="<?php echo "../properties/$pic1";?>"  <?php echo $object->imageResize($main[0], $main[1], 100);?> alt="<?php echo $row['title'];?>" /><br/>
<?php }
?>






<?php
$se="SELECT `pic2` FROM `rent_photo` WHERE `entry_id`='{$_GET['id']}'";
$se=$object->query($se);
while($row=mysql_fetch_array($se)){
	$pic2=$row['pic2'];
}

if(empty($pic2)){?>

<form id="search" action="upload2.php" method="post" enctype="multipart/form-data">
    <table cellspacing="5" width="100%">
     <tr>
      <td valign="top">
<h2>Picture 2</h2>
      </td>
      <td valign="top" width="10">&raquo;</td>
      <td valign="top" width="300">
       <input type="file" class="multi" maxlength="1" name="photoimg2"/>
              <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" />
              <input type="hidden" value="<?php echo $_GET['table'];?>" name="table" />

       <input type="submit" name="upload" value="UPLOAD PICTURE 2"/>
      </td>
     </tr>
    </table>
</form>
<?php }
elseif(!empty($pic2)){
echo "Picture 2 uploaded!";
$main=getimagesize("../properties/$pic2");
?>
<img src="../images/mark.JPG" width="59" height="48" /><img class="images"  src="<?php echo "../properties/$pic2";?>"  <?php echo $object->imageResize($main[0], $main[1], 100);?> alt="<?php echo $row['title'];?>" />
<?php }
?>



<?php
$sel="SELECT `pic3` FROM `rent_photo` WHERE `entry_id`='{$_GET['id']}'";
$sel=$object->query($sel);
while($row=mysql_fetch_array($sel)){
	$pic3=$row['pic3'];
}
if(empty($pic3)){?>

<form id="search" action="upload3.php" method="post" enctype="multipart/form-data">
    <table cellspacing="5" width="100%">
     <tr>
      <td valign="top">
<h2>Picture 3</h2>
      </td>
      <td valign="top" width="10">&raquo;</td>
      <td valign="top" width="300">
       <input type="file" class="multi" maxlength="1" name="photoimg3"/>
              <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" />
              <input type="hidden" value="<?php echo $_GET['table'];?>" name="table" />

       <input type="submit" name="upload" value="UPLOAD PICTURE 3"/>
      </td>
     </tr>
    </table>
</form>
<?php }
elseif(!empty($pic3)){
echo "Picture 3 uploaded!";
$main=getimagesize("../properties/$pic3");
?>
<img src="../images/mark.JPG" width="59" height="48" /><img class="images"  src="<?php echo "../properties/$pic3";?>"  <?php echo $object->imageResize($main[0], $main[1], 100);?> alt="<?php echo $row['title'];?>" />
<?php }
?>


<?php 
if(($pic1 && $pic2 && $pic3)!=""){?>
<h1 style="margin:30px; 0 20px 0"><a href="<?php echo "../admin/admin_home.php?finish=complete";?>"><img src="../images/done.JPG" width="75" height="69" />Click Here if done Uploading Picture</a></h1>
<?php } ?>

<?php 
if(($pic1 && $pic2 && $pic3)==""){?>
<h1><a href="<?php echo "../admin/admin_home.php?finish=okay";?>"><img src="../images/done.JPG" alt="" width="75" height="69" />Click Here if No Picture</a></h1>
<?php }?>

      <div id="respond"></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer"><br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">Westernedge Integrated Consult</a></p>
    <p class="fl_right">LagosHomeFinder.com</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
