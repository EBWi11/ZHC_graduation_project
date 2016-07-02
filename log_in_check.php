<?php
session_start();
  $username = $_POST['username'];
  $password=$_POST['password'];
	$db = mysqli_connect("127.0.0.1","root","","zhc");
	$sql = "select * from Users where Uadmin='" . $username . "';";
	$res = mysqli_query($db,$sql);
	$row = mysqli_fetch_assoc($res);
	if(isset($username)){
		$pwd = md5($password);
		if($pwd == $row['Upwd'])
		{
			$_SESSION['USERNAME'] = $username;
      $_SESSION['US'] = $row['Us'];
      $check="1";
      $error="";
      $req=array('check'=>$check,'error' => $error);
      echo json_encode($req);
		}
		else
		{
      $error="error";
      $check="0";
      $req = array('check'=>$check,'error' => $error);
      echo json_encode($req);
		}
	}
mysqli_close($db);
?>
