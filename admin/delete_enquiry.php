<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include ("../connect.php");
include("../lhfclass.php");
$object=new lhf();

$query="DELETE FROM `contact` WHERE `id`={$_GET['id']}";
$object->query($query);

header("location:enquiries.php?delete=1");


?>