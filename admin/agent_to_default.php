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
<title>Admin .:: Add new Property</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../css/layout.css" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

</head>
<body id="top">
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
  </marquee></div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <div id="admincontent" style="">

<h1><img src="../images/trash.JPG" width="110" height="117" />Delete Defaulting Agent</h1>
<?php
if(isset($_GET['deleted'])){echo "<h2>{$_SESSION['agent']}&nbsp; has been Deleted!</h2> </p> Notice: Allrecords pertaining to {$_SESSION['agent']} has been entirely deleted from the database";}

?>
<?php
  $display = 30;
  // Determine how many pages there are...
  if (isset($_GET['p']) && is_numeric($_GET
  ['p'])) { // Already been determined.
  
  $pages = $_GET['p'];
  } else { // Need to determine.
  
  // Count the number of records:
  $q = "SELECT * FROM `agent`";
  $r = mysql_query ($q);
  $records=mysql_num_rows($r);
  if(!$r){echo mysql_error();}
  if(empty($r)){echo "Agent record empty";}
  
  
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


$all=$object->allAgent();


if(mysql_num_rows($all)>0){?>
<table width="90%" border="1" style="text-align:center;">
<tr>
<td>Agent Name</td>
<td>email:</td>
<td>Address:</td>
<td>Tel:</td>
<td>Date Listed:</td>
<td></td>
</tr>
<?php
while($row=mysql_fetch_array($all)){?>
	<tr>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['add'];?></td>
	<td><?php echo $row['tel'];?></td>
	<td><?php echo $row['datetime'];?></td>
    
    <td><a onclick="return confirm('Deleting this defaulting agent means all Briefs by this agent will be deleted from database. Go ahead?')" href="<?php echo "delete_defaulting_agent.php?id={$row['id']}&agent={$row['name']}";?>"   title="Delete this agent"><img src="../images/cancel.JPG" width="41" height="36" /></a></td>
	</tr>
    <?php
	}//while $row
?>
</table>
<?php
}//IF num_rows>0
?>

  <?php
 
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="agent_to_default.php?s=' .
($start - $display) . '&p=' . $pages .
'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="agent_to_default.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="agent_to_default.php?s=' .
($start + $display) . '&p=' . $pages .
'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
 }
 ?>

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
