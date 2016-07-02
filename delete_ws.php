<?php
$type=$_POST['type'];
$id=$_POST['id'];

if($type="Work")
{
  $con = mysqli_connect("localhost","root","","zhc");
  $result = mysqli_query($con,"delete  from Work where Wid='".$id."';");
}

if($type="Services")
{
  $con = mysqli_connect("localhost","root","","zhc");
  $result = mysqli_query($con,"delete  from Services where Sid='".$id."';");
}

$check="1";
$req=array('check'=>$check);
echo json_encode($req);

?>
