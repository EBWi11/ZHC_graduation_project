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

$che_id = $_GET['id'];


$Sid=$_POST['Sid'];
$St=$_POST['St'];
$Sl=$_POST['Sl'];
$Sp=$_POST['Sp'];

$sum=intval($St)+intval($Sl)+intval($Sp);

if(isset($Sid))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="insert into Services values('".$che_id."','".$Sid."','".$St."','".$Sl."','".$Sp."','".$sum."');";
  $res=mysqli_query($db,$sql);
  header("Location:esb.php");
}

?>

<head>
	<title>高耗能企业电力能效数据上报与管理系统</title>
	<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../Semantic-UI-1.12.1/dist/semantic.css">
	<link rel="stylesheet" type="text/css" href="homepage.css">

	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
  <script src="../Semantic-UI-1.12.1/dist/semantic.js"></script>
	<script src="homepage.js"></script>

</head>
<body>
  <div class="ui inverted masthead segment">
    <div class="ui page grid">
      <div class="column">
        <div class="ui inverted blue menu">
        </div>
        </div>
      </div>
    </div>
  </div>
<form  method="post"  onsubmit="return doCheck();" action="">
  <table  border="1" align="center" ceellpadding="30"style="margin-top:50px">
  <tr>
    <td>后勤号:</td>
    <td><input style="width:605px;" name="Sid" type="text" id="Sid" ></td>
  </tr>
  <tr>
    <td>系统耗能:</td>
    <td><input style="width:605px;" name="St" type="text" id="St" ></td>
  </tr>
  <tr>
    <td>照明耗能:</td>
    <td><input style="width:605px;" name="Sl" type="text" id="Sl" ></td>
  </tr>
  <tr>
    <td>人工耗能:</td>
    <td><input style="width:605px;" name="Sp" type="text" id="Sp"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="提交">
      <input type="reset" name="reset" value="重置"></td>
    </tr>
  </table>
</form>
</body>
<script>
</html>
