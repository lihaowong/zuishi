<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最师（华南师范大学）</title>
    <link href="<?=base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=base_url().'static/css/style.css'?>" rel='stylesheet' type='text/css' />


 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  
        

    
        <a href="<?=base_url()?>" style="float: left;"><img src="<?=base_url().'static/images/Zuishi.png'?>" width="100px" height="50px"></a>
      
        <a class="navbar-brand" href="<?=base_url().'indexAction/professors/'?>" >名师简介</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/rankprofessors/'?>">我来评师</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/lessons/'?>">相关课程</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/freetalk/'?>">畅所欲言</a>
        

   <ul class="nav navbar-nav navbar-right">

    <form action="<?=base_url().'indexAction/search/'?>" class="navbar-form navbar-left" role="search" >
        <div class="form-group">
          <input type="text" class="form-control" name="info" size="30" placeholder="老师名/课程名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>

      <?php if (isset($_SESSION['username'])) {
      echo "<li><a>欢迎你，".$_SESSION['username']."</a></li>"; }
      else { echo "<li><a href='".base_url()."indexAction/goregister/'>注册</a></li>
        <li><a href='".base_url()."indexAction/gologin/'>登录</a></li>" ;}?>

      </ul>
      </div>
      </nav>

</head>

<body>

<form name="form2" method="post" class="left" action="<?=base_url().'rateCommit/'?>" >

<img src="<?=base_url().'static/'.$lesson['limage']?>" style="position: absolute; left:20%; top: 15% ; "width="180px" height="180px" />


<p>
<font size="6" style="position: absolute; left:40%; top: 15% ;font-weight: bold; ">
<?=$lesson['lname'] ?>
</font>
</p>


<p>
<font size="4" style="position: absolute; left:55%; top: 17% ;font-weight: bold; ">
<?=$lesson['ltype'] ?>
</font>
</p>

<p>
<font size="4" style="position: absolute; left:40%; top: 23% ; ">
<?=$lesson['lapartment'] ?>
</font>
</p>
<p>
<font size="4" style="position: absolute; left:55%; top: 23% ; ">
<?=$lesson['lteachers'] ?>
</font>
</p>

<table border=0  width=300 height=100 style="position: absolute; left:40%; top: 30% ; ">
<tr height=30>
<td>
<?=$lesson['linfo'] ?>
</td>
</tr>
</table>

<table class="table table-striped table-hover table-condensed" style="position: absolute; left:20%; top: 49% ; word-break:break-all;"  >
  <tr align=center>
    <th style="text-align:center;">编号</th>
    <th style="text-align:center;"> 用户名</th>
    <th style="text-align:center;">学院</th>
    <th style="text-align:center;">内容</th>
     <th style="text-align:center;">时间</th>
   
  <?php 
    foreach ($comments as $key => $comment) 
    {
  ?>
  <tr align=center style=" font-size:15px;">
    <td> <?=$comment['num']?></td>
    <td> <?=$comment['username']?></td>
    <td> <?=$comment['apartment']?></td>
    <td> <?=$comment['comments']?></td>
    <td> <?=$comment['rdate']?></td>
  </tr>
  <?php 
    }
  ?>

  </tr>
  <tr align=center style=" font-size:15px;">
   <td> 1 </td>
   <td> ABC</td>
   <td> 计算机学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>

  </tr>
  <tr align=center style=" font-size:15px;">
   <td> 2 </td>
   <td> BCD</td>
   <td> 软件学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>

  </tr>
  <tr align=center style=" font-size:15px;">
   <td> 3 </td>
   <td> CDE</td>
   <td> 软件学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>


<tr align=center style=" font-size:15px;">
   <td> 4 </td>
   <td> DEF</td>
   <td> 软件学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>
<tr align=center style=" font-size:15px;">
   <td> 5 </td>
   <td> EFG</td>
   <td> 软件学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>

<tr align=center style=" font-size:15px;">
   <td> 6 </td>
   <td> FGH</td>
   <td> 计算机学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>

<tr align=center style=" font-size:15px;">
   <td> 7 </td>
   <td> GHI</td>
   <td> 软件学院</td>
   <td> ...............................................</td>
     <td> ........</td>
  </tr>

</table>

<input type="hidden" name="rtype"  value="2"/>
<input type="hidden" name="score1"  value="0"/>
<input type="hidden" name="score2"  value="0"/>
<input type="hidden" name="score3"  value="0"/>
<input type="hidden" name="tid"  value="<?=$lesson['lid'] ?>"/>

<textarea  placeholder="输入评论" name="textArea1" id="textArea1" cols="35" rows="5" style="position: absolute; left:43%; top: 96%; font-size:15px;word-break:break-all;"></textarea>

<button type="submit" style="position: absolute; left:52%; top: 116%;" class="btn btn-default">提交</button>

</form>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="mailto:371839782@qq.com">联系我们</a></li>

      </ul>
   
  </div>
</nav>
<div style="position: absolute; left:43%; top: 130%; font-size:17px;">A</div>
      <script src="<?=base_url().'static/js/jquery-1.11.2.min.js'?>"></script>
      <script src="<?=base_url().'static/js/bootstrap.min.js'?>"></script>

</body>
</html>