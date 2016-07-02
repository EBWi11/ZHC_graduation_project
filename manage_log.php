<?php
session_start();
if(empty($_SESSION['USERNAME']))
{
header("Location:index.php");
}
if(isset($_POST['Lid']))
{
$Lid=$_POST['Lid'];
$db = mysqli_connect("localhost","root","","zhc");
$sql ="delete from Log where Lid='".$Lid."';";
mysqli_query($db,$sql);
header("Location:manage_log.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>高耗能企业电力能效数据上报与管理系统－管理日志</title>
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
                <a class="item" href="change_company.php">企业信息管理</a>
              </div>
            </div>
						<div class="ui dropdown link item">
              日志管理
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item"  href="add_log.php">发布日志</a>
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
              管理日志
						</h1>
					</div>
				</div>
			</div>
		</div>
  </body>
  </html>

<?php
$con = mysqli_connect("localhost","root","","zhc");
$result = mysqli_query($con,"SELECT * FROM  Log;");
echo "<table border='1'>
<tr>
<th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>日志名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>日志内容&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>添加时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Lid'] . "</td>";
  echo "<td>" . $row['Lname'] . "</td>";
  echo "<td>" . $row['Lword'] . "</td>";
  echo "<td>" . $row['Ltime'] . "</td>";
  echo "</tr>";
  echo "<hr>";
  }
echo "</table>";
mysqli_close($con);
?>

<html>
<form name="add_Log" method="post"  onsubmit="return doCheck();" action="">
  <table border="0" align="center" ceellpadding="30"style="margin-top:50px">
  <tr>
    <td>输入要删除日志的ID:</td>
    <td><input  name="Lid" type="text" id="Lid"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="提交">
      <input type="reset" name="reset" value="重置"></td>
    </tr>
  </table>
</form>
</html>
