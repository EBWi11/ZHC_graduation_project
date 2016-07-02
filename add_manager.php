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
if(isset($_POST['Uname']))
{
$username=$_SESSION['USERNAME'];
$Uname=$_POST['Uname'];
$Usex=$_POST['Usex'];
$Utel=$_POST['Utel'];
$Uadmin=$_POST['Uadmin'];
$Upwd=md5($_POST['Upwd']);
$db = mysqli_connect("localhost","root","","zhc");
$sql ="insert into Users(Uname,Usex,Utel,Uadmin,Upwd)  values('$Uname','$Usex','$Utel','$Uadmin','$Upwd');";
mysqli_query($db,$sql);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>高耗能企业电力能效数据上报与管理系统－添加管理员</title>
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
						<div class="header item">企业电力能效数据上报与管理系统</div>
						<div class="ui dropdown link item">
              添加企业
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="add_company.php">添加企业信息</a>
                <a class="item"  href="change_company.php">企业信息管理</a>
              </div>
            </div>
						<div class="ui dropdown link item">
              日志管理
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="add_log.php">发布日志</a>
                <a class="item" href="manage_log.php">管理日志</a>
              </div>
            </div>
						<div class="ui dropdown link item">
              企业电力能效数据上报
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="esb.php">电力数据能效数据上报</a>
                <a class="item" href="mange_ws.php">管理电力企业能效数据</a>
              </div>
            </div>
						<div class="ui dropdown link item">
							企业电力能效分析
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="make_standard.php">设置高耗能企业能效标准</a>
                <a class="item" href="find_high.php">查看高耗能企业</a>
                <a class="item" href="look_optimize.php">高耗能企业优化方案</a>
              </div>
            </div>
						<div class="ui dropdown link item">
              管理员模块
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="add_manager.php">添加管理员</a>
                <a class="item" href="delete_manager.php">管理管理员</a>
              </div>
            </div>
					</div>
					<div class="ui hidden transition information">
						<h1 class="ui inverted header">
							添加管理员
						</h1>
					</div>
				</div>
			</div>
		</div>
    <form name="add_manager" method="post"  onsubmit="return doCheck();" action="">
      <table  border="1" align="center" ceellpadding="30"style="margin-top:50px">
      <tr>
        <td>管理员姓名:</td>
        <td><input  name="Uname" type="text" id="Uname"></td>
      </tr>
      <tr>
        <td>管理员性别:</td>
        <td><input  name="Usex" type="text" id="Usex"></td>
      </tr>
      <tr>
        <td>管理员电话:</td>
        <td><input  name="Utel" type="text" id="Utel"></td>
      </tr>
      <tr>
        <td>管理员账号:</td>
        <td><input  name="Uadmin" type="text" id="Uadmin"></td>
      </tr>
      <tr>
        <td>管理员密码:</td>
        <td><input  name="Upwd" type="password" id="Upwd"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="submit" value="提交">
          <input type="reset" name="reset" value="重置"></td>
        </tr>
      </table>
    </form>

</body>
</html>
