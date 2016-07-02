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


$Wid=$_POST['Wid'];
$Wname=$_POST['Wname'];
$Wword=$_POST['Wword'];
$Wnv=$_POST['Wnv'];
$Wna=$_POST['Wna'];
$Wnp=$_POST['Wnp'];
$Wv=$_POST['Wv'];
$Wa=$_POST['Wa'];
$Wp=$_POST['Wp'];
$Wt=$_POST['Wt'];
$Ww=$_POST['Ww'];
$We=$_POST['We'];

$Wg=intval($Wp)*intval($Wt);

if(isset($Wid))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="insert into Work values('".$che_id."','".$Wid."','".$Wname."','".$Wword."','".$Wnv."','".$Wna."','".$Wnp."','".$Wv."','".$Wa."','".$Wp."','".$Ww."','".$We."','".$Wt."','".$Wg."');";
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

  <script>
  var np;
  function np(Wnv,Wna)
  {
    nv=parseInt(String(Wnv));
    na=parseInt(String(Wna));
    np=(na*nv)+"kw";
    document.getElementById("Wnp").value=np;
  }

  function p(Wv,Wa)
  {
    v=parseInt(String(Wv));
    a=parseInt(String(Wa));
    np=(a*v)+"kw";
    document.getElementById("Wp").value=np;
  }

  function e(Wp,Wt,Ww)
  {
    p=parseInt(String(Wp));
    t=parseInt(String(Wt));
    w=parseInt(String(Ww));
    np=(w/(p*t));
    document.getElementById("We").value=np;
  }

  </script>

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
    <td>车间号:</td>
    <td><input style="width:605px;" name="Wid" type="text" id="Wid" ></td>
  </tr>
  <tr>
    <td>车间名称:</td>
    <td><input style="width:605px;" name="Wname" type="text" id="Wname" ></td>
  </tr>
  <tr>
    <td>车间简介:</td>
    <td><textarea  rows="10" cols="73" name="Wword"  id="Wword"></textarea></td>
  </tr>
  <tr>
    <td>额度电压:</td>
    <td><input style="width:605px;" name="Wnv" type="text" id="Wnv" ></td>
  </tr>
  <tr>
    <td>额度电流:</td>
    <td><input style="width:605px;" name="Wna" type="text" id="Wna" onblur="np(Wnv.value,this.value)"／></td>
  </tr>
  <tr>
    <td>额定功率:</td>
    <td><input style="width:605px;" name="Wnp" type="text" id="Wnp"></td>
  </tr>
  <tr>
    <td>实际电压:</td>
    <td><input style="width:605px;" name="Wv" type="text" id="Wv" ></td>
  </tr>
  <tr>
    <td>实际电流:</td>
    <td><input style="width:605px;" name="Wa" type="text" id="Wa"onblur="p(Wv.value,this.value)" ></td>
  </tr>
  <tr>
    <td>实际功率:</td>
    <td><input style="width:605px;" name="Wp" type="text" id="Wp"></td>
  </tr>
  <tr>
    <td>工作时长:</td>
    <td><input style="width:605px;" name="Wt" type="text" id="Wt" ></td>
  </tr>
  <tr>
    <td>有用功:</td>
    <td><input style="width:605px;" name="Ww" type="text" id="Ww"  onblur="e(Wp.value,Wt.value,this.value)"></td>
  </tr>
  <tr>
    <td>功效:</td>
    <td><input style="width:605px;" name="We" type="text" id="We" ></td>
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
