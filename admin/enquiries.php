<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

<script type="text/javascript" src="tinybox.js"></script>
</head>
<body id="top">

<?php
if($_GET['delete']==1){?>

<body onload="TINY.box.show({html:'Enquiry deleted successfully!',animate:false,close:false,mask:true,boxid:'success',autohide:2,top:-14,left:-17})">
	<?php }
?>




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
      <div id="topnav">
      <ul>
        <li class="last"><a href="logout.php">Logout</a><img src="../images/logout.JPG" width="50" height="49" /><br/></li>
        <li><a href="admin_home.php">home<br/><img src="../images/home.JPG" width="52" height="54" /><br/>
        </a></li>
      </ul>
    </div>

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
      
      <div id="comments">
        <h2><img src="../images/enquiry.JPG" width="107" height="99" />Enquiries</h2>
        <ul class="commentlist">
        
        <?php 

//IF FORM was submited*************************************************************************************************************




//IF Search is for Rent******************************************orFOR Sale*************************************************
if($_GET['sr']=='Sale'){
	$table='sale';
	$phototable='sale_photo';
	}
if($_GET['sr']=='Rent'){
	$table='rent';
	$phototable='rent_photo';
	}
//IF Search is for Rent******************************************orFOR Sale*************************************************




  $display = 10;
  // Determine how many pages there are...
  if (isset($_GET['p']) && is_numeric($_GET
  ['p'])) { // Already been determined.
  
  $pages = $_GET['p'];
  } else { // Need to determine.
  
  // Count the number of records:
  $q = "SELECT * FROM `contact`";
  $r = mysql_query ($q);
  $records=mysql_num_rows($r);
  if(!$r){echo  "SYSTEM ERROR: Server cannot execute query.".mysql_error();}
  if(empty($r)){echo "SYSTEM ERROR: Server cannot execute query.".mysql_error();}
  
  
  // Calculate the number of pages...
  if ($records > $display) { // More than
  $pages = ceil ($records/$display);
  } else {
  $pages = 1;
  }
  }
  if (isset($_GET['s']) && is_numeric
  ($_GET['s'])) {
  $start = $_GET['s'];
  } else {
  $start = 0;
  }
?>
        
        <?php
		$get="SELECT * FROM `contact` ORDER BY `datetime`";
		$get=$object->query($get);
		if(mysql_num_rows($get)==0){ echo "<p style='margin:30px 0 30px 0; text-align:center; border:1px solid #CCC;'><img src='../images/info.JPG' width='56' height='50' />No Enquiries</p>";}
		
		while($row=mysql_fetch_array($get)){?>
          <li class="comment_odd">
            <div class="submitdate">Enquiry Type: <a href="#"><?php echo $row['type'];?></a></div>
            <table border="0" width="100%">
            <tr>
                        <td width="23%">Property ID: <b>#<?php echo $row['propertyid'];?></b></td>            <td width="77%">Agent : <?php echo $row['agent'];?></td>
</tr>
<td><div class="author"><img class="avatar" src="../images/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#"><?php echo $row['name'];?></a></span> <span class="wrote">wrote:</span></div></td>
           <td> <p><?php echo $row['message'];?></p></td>

            <tr>
            <td>Property category : <b><?php echo $row['sr'];?></b></td>
            </tr>
            <tr>
            <td><div class="submitdate"><?php echo $row['datetime'];?></div></td>
            <td><div class="submitdate"><?php echo $row['tel'];?></div></td>
            </tr>
            <tr>
            <td><div class="submitdate"><?php echo $row['email'];?></div></td>
            <td><a href="<?php echo "delete_enquiry.php?id={$row['id']}";?>" title="remove this enquiry" onclick="return confirm('delete this enquiry');"><img src="../images/cancel.JPG" width="36" height="32" />delete this enquiry</a></td>
           </tr>
           
         </table>
         </li>
        <?php } ?>
        
        
        </ul>
        
        
  <?php
 
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="enquiries.php?s=' .
($start - $display) . '&p=' . $pages .
'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="enquiries.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="enquiries.php?s=' .
($start + $display) . '&p=' . $pages .
'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
}
 ?>

      </div>

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
