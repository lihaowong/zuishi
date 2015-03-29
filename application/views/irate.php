<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最师（华南师范大学）</title>
    <link href="<?=base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=base_url().'static/css/style.css'?>" rel='stylesheet' type='text/css' />


 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  
        

    
        <a href="Index.html" style="float: left;"><img src="<?=base_url().'static/images/Zuishi.png'?>" width="100px" height="50px"></a>
      
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

<form name="form1" method="post" action="<?=base_url().'rateCommit/'?>" >

  <img src="<?=base_url().'static/images/instructors/Tangyong.jpg'?>" style="position: absolute; left:20%; top: 15% ; "width="180px" height="180px" />
    <form action="" method="get" class="left">

<p>
<font size="6" style="position: absolute; left:40%; top: 15% ;font-weight: bold; ">
<?=$basicInfo['tname']?>
</font>
</p>

<p>
<font size="4" style="position: absolute; left:50%; top: 17% ;font-weight: bold; ">
<?=$basicInfo['trank']?>
</font>
</p>

<p>
<font size="4" style="position: absolute; left:40%; top: 23% ; ">
华南师范大学 <?=$basicInfo['tapartment']?>
</font>
</p>

<table id="smalltable"  style="position: absolute; left:40%; top: 30% ;"   align=center >
  <tr align=center>
    <th style="text-align:center;">总体评价</th>
    <th style="text-align:center;">表达清晰</th>
    <th style="text-align:center;">教学严谨</th>
    <th style="text-align:center;">热情耐心</th>
    <th style="text-align:center;">评价人数</th>
    
  </tr>
  <tr align=center style="color:#FF0000; font-weight: bold; font-size:20px;">
   <td style="font-size:35px;"> <?=$basicInfo['total']?> </td>
   <td> <?=$basicInfo['score1']?> </td>
   <td> <?=$basicInfo['score2']?></td>
   <td> <?=$basicInfo['score3']?></td>
   <td> <?=$basicInfo['cnum']?></td>
  </tr>
</table>

<table class="table table-striped table-hover table-condensed" style="position: absolute; left:20%; top: 45% ; word-break:break-all;"  >
  <tr align=center>
    <th style="text-align:center;">编号</th>
    <th style="text-align:center;"> 用户名</th>
    <th style="text-align:center;">学院</th>
    <th style="text-align:center;">内容</th>
     <th style="text-align:center;">时间</th>

  </tr>   
    
 <?php 
    foreach ($comments as $key => $comment) 
    {
  ?>
  <tr align=center style=" font-size:15px;">
   <td> <?=$comment['number']?> </td>
   <td> <?=$comment['username']?></td>
   <td> <?=$comment['apartment']?></td>
   <td> <?=$comment['comments']?></td>
     <td> <?=$comment['rdate']?></td>
  </tr>
  <?php 
    }
  ?>

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


<div style="position: absolute; left:45%; top: 90%; font-size:17px;">

<input type="hidden" name="rtype"  value="1"/>
  <p>表达清晰：
  <input type="radio" name="score1" value="1" /> 1
  <input type="radio" name="score1" value="2" /> 2
  <input type="radio" name="score1" value="3" /> 3
  <input type="radio" name="score1" value="4" /> 4
  <input type="radio" name="score1" value="5" /> 5</p>

  <p>教学严谨：<input type="radio" name="score2" value="1" /> 1
  <input type="radio" name="score2" value="2" /> 2
  <input type="radio" name="score2" value="3" /> 3
  <input type="radio" name="score2" value="4" /> 4
  <input type="radio" name="score2" value="5" /> 5</p>

  <p>热情耐心：<input type="radio" name="score3" value="1" /> 1
  <input type="radio" name="score3" value="2" /> 2
  <input type="radio" name="score3" value="3" /> 3
  <input type="radio" name="score3" value="4" /> 4
  <input type="radio" name="score3" value="5" /> 5</p>

<input type="hidden" name="tid"  value="<?=$basicInfo['tid']?>"/>


<textarea  placeholder="输入评论" name="textArea1" id="textArea1" cols="35" rows="5" style="position: absolute; left:43%; top: 108%; font-size:15px;word-break:break-all;"></textarea>

 <button type="image" style="position: absolute; left:52%; top: 250%;" class="btn btn-default">提交</button>

</div>
</form>


<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="mailto:371839782@qq.com">联系我们</a></li>

      </ul>
   
  </div>
</nav>
<div style="position: absolute; left:43%; top: 140%; font-size:17px;">A</div>
      <script src="<?=base_url().'static/js/jquery-1.11.2.min.js'?>"></script>
      <script src="<?=base_url().'static/js/bootstrap.min.js'?>"></script>

</body>
</html>