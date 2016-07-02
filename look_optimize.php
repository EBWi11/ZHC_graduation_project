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
$db = mysqli_connect("localhost","root","","zhc");
$res=mysqli_query($db,"select * from standard where id=1;");
$row = mysqli_fetch_array($res);
$n_st=$row['standard'];
$res2=mysqli_query($db,"select * from standard where id=2;");
$row2 = mysqli_fetch_array($res2);
$n_st_p=$row2['standard'];


function sum($id)
{
$con = mysqli_connect("localhost","root","","zhc");
  $result1 = mysqli_query($con,"SELECT sum(sum) as s FROM Services where Cid='".$id."';");
  while($row = mysqli_fetch_array($result1))
  {
    $sum = $row['s'];
  }
  $result2 = mysqli_query($con,"SELECT sum(Wg) as w FROM Work where Cid='".$id."';");
  while($row = mysqli_fetch_array($result2))
  {
    $sum = $row['w']+$sum;
  }
  return $sum;
}

function sum_p($id)
{
  $con = mysqli_connect("localhost","root","","zhc");
  $result1 = mysqli_query($con,"SELECT sum(Wp) as s FROM Work where Cid='".$id."';");
  while($row = mysqli_fetch_array($result1))
  {
    $sum_p = $row['s'];
  }
  return $sum_p;
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
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
  function add_optimize(id)
  {
    self.location='add_optimize.php?id='+id;
  }
  </script>

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
                <a class="item">企业信息管理</a>
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
                <a class="item"  href="esb.php">电力数据能效数据上报</a>
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
              高耗能企业优化方案
						</h1>
					</div>
				</div>
			</div>
      <?php
      echo "现在能耗标准为：".$n_st_p."kwh";
      echo "<br>";
      echo "现在功率标准为：".$n_st."kw";
      ?>
		</div>
  </from>
<div align="center">
  <?php
  $result = mysqli_query($db,"SELECT * FROM Company;");
  echo "<table border='1'>
  <tr>
  <th>公司ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>公司名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>优化方案&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>优化方案添加时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>能耗&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>功率&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th>超标情况&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  <th></th>
  </tr>";
  while($row = mysqli_fetch_array($result))
  	{
      $sum=sum($row['Cid']);
      $sum_p=sum_p($row['Cid']);
      if($sum>$n_st&&$sum_p>$n_st_p)
      {
        $remind="功率及能耗均超标";
      }
      if($sum>$n_st&&$sum_p<$n_st_p)
      {
        $remind="能耗超标";
      }if($sum<$n_st&&$sum_p>$n_st_p)
      {
        $remind="功率超标";
      }if($sum<$n_st&&$sum_p<$n_st_p)
      {
        $remind="未超标";
        $row+1;
      }

  	echo "<tr>";
  	echo "<td>" . $row['Cid'] . "</td>";
  	echo "<td>" . $row['Cname'] . "</td>";
    echo "<td>" . $row['add_o'] . "</td>";
    echo "<td>" . $row['add_o_time'] . "</td>";
    echo "<td>" .$sum."</td>";
    echo "<td>" .$sum_p."</td>";
    echo "<td>" .$remind."</td>";
  	echo "<td>".'<button name="'. $row['Cid'] .'"  onclick="add_optimize(this.name)">修改优化方案</button>'." </td>";
  	echo "</tr>";
  	}
  echo "</table>";
  mysqli_close($con);
  ?>
</div>
  </body>
  </html>
