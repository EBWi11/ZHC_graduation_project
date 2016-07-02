<?php
session_start();
if(empty($_SESSION['USERNAME']))
{
header("Location:index.php");
}
if($_SESSION['US']!="1")
{
  header("Location:error.html");
}

$del_id = $_POST['id'];
if(isset($del_id))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql = "delete  from Company where Cid='" . $del_id . "';";
  $res = mysqli_query($db,$sql);
  $check="1";
  $req=array('check'=>$check);
  echo json_encode($req);
}
?>
